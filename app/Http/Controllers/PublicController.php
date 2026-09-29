<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\EcosystemItem;
use App\Models\Challenge;
use App\Models\Technology;
use App\Models\Product;
use App\Models\ImpactStat;
use App\Models\EsgMetric;
use App\Models\FieldStory;
use App\Models\Activity;
use App\Models\GalleryItem;
use App\Models\KnowledgeItem;
use App\Models\NewsroomItem;
use App\Models\HakiItem;
use App\Models\Partner;
use App\Models\TeamMember;
use App\Models\Career;
use App\Models\Lead;
use App\Models\MapMarker;
use App\Models\Recognition;
use App\Models\Milestone;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $ecosystem = EcosystemItem::all();
        $challenges = Challenge::all();
        $technologies = Technology::all();
        $products = Product::all();
        $impacts = ImpactStat::orderBy('order_num')->get();
        $stories = FieldStory::latest()->get();
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        
        // Scan public/galeri directory dynamically
        $galleryPath = public_path('galeri');
        $gallery = [];
        if (is_dir($galleryPath)) {
            $files = array_diff(scandir($galleryPath), ['.', '..']);
            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])) {
                    $type = 'photo';
                    $category = 'community';
                    if (str_starts_with(strtolower($file), 'dji')) {
                        $type = 'drone';
                        $category = 'technology';
                    } elseif (str_contains(strtolower($file), 'before') || str_contains(strtolower($file), 'after')) {
                        $category = 'before_after';
                    } else {
                        $hash = crc32($file);
                        $cats = ['community', 'technology', 'events'];
                        $category = $cats[abs($hash) % 3];
                    }
                    
                    $gallery[] = (object)[
                        'title' => str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME)),
                        'type' => $type,
                        'category' => $category,
                        'media_path' => asset('galeri/' . $file),
                        'secondary_media_path' => null
                    ];
                } elseif (in_array($ext, ['mov', 'mp4', 'webm'])) {
                    $gallery[] = (object)[
                        'title' => str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME)),
                        'type' => 'video',
                        'category' => 'events',
                        'media_path' => asset('galeri/' . $file),
                        'secondary_media_path' => null
                    ];
                }
            }
        }

        if (empty($gallery)) {
            $gallery = GalleryItem::latest()->get();
        }

        $haki = HakiItem::orderBy('registration_date', 'desc')->get();
        $partners = Partner::all();
        $team = TeamMember::orderBy('order_num')->get();
        $careers = Career::where('status', 'open')->get();
        $newsroom = NewsroomItem::orderBy('publish_date', 'desc')->get();
        $knowledge = KnowledgeItem::orderBy('published_at', 'desc')->get();
        $mapMarkers = MapMarker::all();

        return view('welcome', compact(
            'settings', 'ecosystem', 'challenges', 'technologies', 'products',
            'impacts', 'stories', 'activities', 'gallery', 'haki', 'partners',
            'team', 'careers', 'newsroom', 'knowledge', 'mapMarkers'
        ));
    }

    public function esg()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $environmental = EsgMetric::where('category', 'environmental')->get();
        $social = EsgMetric::where('category', 'social')->get();
        $governance = EsgMetric::where('category', 'governance')->get();

        return view('esg', compact('settings', 'environmental', 'social', 'governance'));
    }

    public function knowledge(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $query = $request->input('q');
        $category = $request->input('category');

        $itemsQuery = KnowledgeItem::query();

        if ($query) {
            $itemsQuery->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $itemsQuery->where('category', $category);
        }

        $items = $itemsQuery->orderBy('published_at', 'desc')->get();
        $categories = KnowledgeItem::select('category')->distinct()->pluck('category');

        return view('knowledge', compact('settings', 'items', 'categories', 'query', 'category'));
    }

    public function knowledgeDetail($slug)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $item = KnowledgeItem::where('slug', $slug)->firstOrFail();
        $item->increment('views_count');

        $related = KnowledgeItem::where('id', '!=', $item->id)
            ->latest()
            ->take(3)
            ->get();

        return view('knowledge-detail', compact('settings', 'item', 'related'));
    }

    public function investors(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $hasAccess = session()->has('investor_access');

        return view('investors', compact('settings', 'hasAccess'));
    }

    public function journey()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $milestones = Milestone::where('is_published', true)->orderBy('order_num')->get();
        return view('journey', compact('settings', 'milestones'));
    }

    public function requestInvestorAccess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'company' => 'required|string|max:150',
            'message' => 'nullable|string',
        ]);

        Lead::create([
            'type' => 'investor_request',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'subject' => 'Investor Data Room Access Request',
            'message' => $request->message,
            'status' => 'approved', // Auto-approve for demo convenience
        ]);

        session()->put('investor_access', true);
        session()->put('investor_name', $request->name);

        return redirect()->route('investors')->with('success', 'Access granted to the Investor Data Room!');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string',
        ]);

        Lead::create([
            'type' => 'contact',
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will contact you soon.');
    }

    public function credibility()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $recognitions = Recognition::with('teamMember')
            ->where('is_published', true)
            ->orderBy('order_num')
            ->get();
        
        $ceo = TeamMember::where('name', 'Like', '%Tri Febriansah%')->first();
        if (!$ceo) {
            $ceo = TeamMember::first();
        }

        return view('credibility', compact('settings', 'recognitions', 'ceo'));
    }
}
