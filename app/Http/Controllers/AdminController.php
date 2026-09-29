<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\EcosystemItem;
use App\Models\Product;
use App\Models\Technology;
use App\Models\Partner;
use App\Models\HakiItem;
use App\Models\TeamMember;
use App\Models\Career;
use App\Models\Lead;
use App\Models\User;
use App\Models\ImpactStat;
use App\Models\EsgMetric;
use App\Models\JourneyChapter;
use App\Models\Recognition;
use App\Models\Milestone;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $leadsCount = Lead::count();
        $recentLeads = Lead::latest()->take(5)->get();
        $ecosystemCount = EcosystemItem::count();
        $productCount = Product::count();
        $teamCount = TeamMember::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('leadsCount', 'recentLeads', 'ecosystemCount', 'productCount', 'teamCount', 'usersCount'));
    }

    // 1. settings
    public function settings()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $impacts = ImpactStat::orderBy('order_num')->get();
        $esg = EsgMetric::all();
        return view('admin.settings', compact('settings', 'impacts', 'esg'));
    }

    public function updateSettings(Request $request)
    {
        $keys = [
            'hero_headline',
            'hero_subheadline',
            'who_quote',
            'who_vision',
            'who_mission',
            'who_values'
        ];

        foreach ($keys as $k) {
            Setting::updateOrCreate(
                ['key' => $k],
                ['value' => json_encode([
                    'id' => $request->input($k . '_id') ?? '',
                    'en' => $request->input($k . '_en') ?? ''
                ])]
            );
        }

        $nonBilinguals = ['contact_email'];
        foreach ($nonBilinguals as $nb) {
            if ($request->has($nb)) {
                Setting::updateOrCreate(
                    ['key' => $nb],
                    ['value' => $request->input($nb)]
                );
            }
        }

        return back()->with('success', 'Global settings updated successfully.');
    }

    public function updateImpacts(Request $request)
    {
        $request->validate([
            'impacts' => 'required|array',
        ]);

        foreach ($request->impacts as $id => $val) {
            $stat = ImpactStat::find($id);
            if ($stat) {
                $stat->update([
                    'value' => $val['value'],
                    'label' => json_encode([
                        'id' => $val['label_id'] ?? '',
                        'en' => $val['label_en'] ?? ''
                    ]),
                ]);
            }
        }
        return back()->with('success', 'Impact statistics updated.');
    }

    public function updateEsg(Request $request)
    {
        $request->validate([
            'esg' => 'required|array',
        ]);

        foreach ($request->esg as $id => $val) {
            $metric = EsgMetric::find($id);
            if ($metric) {
                $metric->update([
                    'value' => $val['value'],
                    'description' => $val['description'] ?? null,
                ]);
            }
        }
        return back()->with('success', 'ESG dashboard metrics updated.');
    }

    // 2. Ecosystem CRUD
    public function ecosystemIndex()
    {
        $items = EcosystemItem::all();
        return view('admin.ecosystem.index', compact('items'));
    }

    public function ecosystemEdit($id)
    {
        $item = EcosystemItem::findOrFail($id);
        return view('admin.ecosystem.edit', compact('item'));
    }

    public function ecosystemUpdate(Request $request, $id)
    {
        $item = EcosystemItem::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'subtitle_id' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'use_case_id' => 'required|string',
            'use_case_en' => 'required|string',
            'status' => 'required|string',
            'demo_url' => 'nullable|string',
            'target_url' => 'nullable|string',
            'features' => 'nullable|string',
        ]);

        $featuresArr = $request->features ? array_filter(array_map('trim', explode("\n", $request->features))) : [];

        $item->update([
            'name' => $request->name,
            'subtitle' => json_encode(['id' => $request->subtitle_id ?? '', 'en' => $request->subtitle_en ?? '']),
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'use_case' => json_encode(['id' => $request->use_case_id, 'en' => $request->use_case_en]),
            'status' => $request->status,
            'demo_url' => $request->demo_url,
            'target_url' => $request->target_url,
            'features' => $featuresArr,
        ]);

        return redirect()->route('admin.ecosystem')->with('success', 'Ecosystem item updated.');
    }

    // 3. Product CRUD
    public function productIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function productCreate()
    {
        return view('admin.products.create');
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'image_path' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'image_file' => 'nullable|image',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/products');
        }

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'features' => $request->features,
            'image_path' => $imagePath,
            'detail_content' => $request->detail_content,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function productUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:products,slug,' . $id,
            'description' => 'required|string',
            'features' => 'nullable|string',
            'image_path' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'image_file' => 'nullable|image',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/products');
        }

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'features' => $request->features,
            'image_path' => $imagePath,
            'detail_content' => $request->detail_content,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product updated.');
    }

    public function productDestroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted.');
    }

    // 4. Partner CRUD
    public function partnerIndex()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function partnerEdit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function partnerUpdate(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'logo_path' => 'nullable|string',
            'logo_file' => 'nullable|image',
            'type' => 'required|string',
            'collaboration_story_id' => 'nullable|string',
            'collaboration_story_en' => 'nullable|string',
            'goal_id' => 'nullable|string',
            'goal_en' => 'nullable|string',
            'program_id' => 'nullable|string',
            'program_en' => 'nullable|string',
            'results_id' => 'nullable|string',
            'results_en' => 'nullable|string',
            'impact_id' => 'nullable|string',
            'impact_en' => 'nullable|string',
        ]);

        $logoPath = $request->logo_path;
        if ($request->hasFile('logo_file')) {
            $logoPath = compress_and_store_image($request->file('logo_file'), 'uploads/partners');
        }

        $partner->update([
            'name' => $request->name,
            'logo_path' => $logoPath,
            'type' => $request->type,
            'collaboration_story' => json_encode(['id' => $request->collaboration_story_id ?? '', 'en' => $request->collaboration_story_en ?? '']),
            'goal' => json_encode(['id' => $request->goal_id ?? '', 'en' => $request->goal_en ?? '']),
            'program' => json_encode(['id' => $request->program_id ?? '', 'en' => $request->program_en ?? '']),
            'results' => json_encode(['id' => $request->results_id ?? '', 'en' => $request->results_en ?? '']),
            'impact' => json_encode(['id' => $request->impact_id ?? '', 'en' => $request->impact_en ?? '']),
        ]);

        return redirect()->route('admin.partners')->with('success', 'Partner collaboration updated.');
    }

    // 5. HAKI CRUD
    public function hakiIndex()
    {
        $haki = HakiItem::all();
        return view('admin.haki.index', compact('haki'));
    }

    public function hakiCreate()
    {
        return view('admin.haki.create');
    }

    public function hakiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'registration_number' => 'required|string',
            'status' => 'required|string',
            'registration_date' => 'required|date',
            'document_path' => 'nullable|string',
        ]);

        HakiItem::create($request->all());
        return redirect()->route('admin.haki')->with('success', 'HAKI registration created.');
    }

    public function hakiEdit($id)
    {
        $item = HakiItem::findOrFail($id);
        return view('admin.haki.edit', compact('item'));
    }

    public function hakiUpdate(Request $request, $id)
    {
        $item = HakiItem::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'registration_number' => 'required|string',
            'status' => 'required|string',
            'registration_date' => 'required|date',
            'document_path' => 'nullable|string',
        ]);

        $item->update($request->all());
        return redirect()->route('admin.haki')->with('success', 'HAKI registration updated.');
    }

    public function hakiDestroy($id)
    {
        HakiItem::findOrFail($id)->delete();
        return redirect()->route('admin.haki')->with('success', 'HAKI registration deleted.');
    }

    // 6. Lead viewer
    public function leadsIndex()
    {
        $leads = Lead::latest()->get();
        return view('admin.leads.index', compact('leads'));
    }

    // 7. Users management
    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }

    public function usersDestroy($id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'Cannot delete yourself!');
        }
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted.');
    }

    // 8. Team Profiles CRUD
    public function teamIndex()
    {
        $team = TeamMember::orderBy('order_num')->get();
        return view('admin.team.index', compact('team'));
    }

    public function teamCreate()
    {
        return view('admin.team.create');
    }

    public function teamStore(Request $request)
    {
        $request->validate([
            'name_id' => 'required|string',
            'name_en' => 'required|string',
            'role_id' => 'required|string',
            'role_en' => 'required|string',
            'category' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'linkedin_url' => 'nullable|string',
            'email' => 'nullable|email',
            'bio_id' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'skills' => 'nullable|string',
            'contributions_id' => 'nullable|string',
            'contributions_en' => 'nullable|string',
            'order_num' => 'nullable|integer',
        ]);

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/team');
        }

        $data = $request->except(['name_id', 'name_en', 'role_id', 'role_en', 'bio_id', 'bio_en', 'contributions_id', 'contributions_en', 'photo_file']);
        $data['photo_path'] = $photoPath;
        $data['name'] = json_encode(['id' => $request->name_id, 'en' => $request->name_en]);
        $data['role'] = json_encode(['id' => $request->role_id, 'en' => $request->role_en]);
        $data['bio'] = json_encode(['id' => $request->bio_id ?? '', 'en' => $request->bio_en ?? '']);
        $data['contributions'] = json_encode(['id' => $request->contributions_id ?? '', 'en' => $request->contributions_en ?? '']);

        TeamMember::create($data);
        return redirect()->route('admin.team')->with('success', 'Team profile added successfully.');
    }

    public function teamEdit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function teamUpdate(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);
        $request->validate([
            'name_id' => 'required|string',
            'name_en' => 'required|string',
            'role_id' => 'required|string',
            'role_en' => 'required|string',
            'category' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'linkedin_url' => 'nullable|string',
            'email' => 'nullable|email',
            'bio_id' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'skills' => 'nullable|string',
            'contributions_id' => 'nullable|string',
            'contributions_en' => 'nullable|string',
            'order_num' => 'nullable|integer',
        ]);

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/team');
        }

        $data = $request->except(['name_id', 'name_en', 'role_id', 'role_en', 'bio_id', 'bio_en', 'contributions_id', 'contributions_en', 'photo_file']);
        $data['photo_path'] = $photoPath;
        $data['name'] = json_encode(['id' => $request->name_id, 'en' => $request->name_en]);
        $data['role'] = json_encode(['id' => $request->role_id, 'en' => $request->role_en]);
        $data['bio'] = json_encode(['id' => $request->bio_id ?? '', 'en' => $request->bio_en ?? '']);
        $data['contributions'] = json_encode(['id' => $request->contributions_id ?? '', 'en' => $request->contributions_en ?? '']);

        $member->update($data);
        return redirect()->route('admin.team')->with('success', 'Team profile updated.');
    }

    public function teamDestroy($id)
    {
        TeamMember::findOrFail($id)->delete();
        return redirect()->route('admin.team')->with('success', 'Team profile deleted.');
    }

    // Journey Chapters CRUD
    public function journeyIndex()
    {
        $chapters = JourneyChapter::orderBy('order_num')->get();
        return view('admin.journey.index', compact('chapters'));
    }

    public function journeyCreate()
    {
        return view('admin.journey.create');
    }

    public function journeyStore(Request $request)
    {
        $request->validate([
            'chapter_tag' => 'required|string',
            'year_label' => 'required|string',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'features' => 'nullable|string',
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image',
            'order_num' => 'required|integer',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/journey');
        }

        $featuresArr = $request->features ? array_filter(array_map('trim', explode("\n", $request->features))) : null;

        JourneyChapter::create([
            'chapter_tag' => $request->chapter_tag,
            'year_label' => $request->year_label,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'features' => $featuresArr,
            'image_path' => $imagePath,
            'order_num' => $request->order_num,
        ]);

        return redirect()->route('admin.journey')->with('success', 'Journey chapter created successfully.');
    }

    public function journeyEdit($id)
    {
        $chapter = JourneyChapter::findOrFail($id);
        return view('admin.journey.edit', compact('chapter'));
    }

    public function journeyUpdate(Request $request, $id)
    {
        $chapter = JourneyChapter::findOrFail($id);
        $request->validate([
            'chapter_tag' => 'required|string',
            'year_label' => 'required|string',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'features' => 'nullable|string',
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image',
            'order_num' => 'required|integer',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/journey');
        }

        $featuresArr = $request->features ? array_filter(array_map('trim', explode("\n", $request->features))) : null;

        $chapter->update([
            'chapter_tag' => $request->chapter_tag,
            'year_label' => $request->year_label,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'features' => $featuresArr,
            'image_path' => $imagePath,
            'order_num' => $request->order_num,
        ]);

        return redirect()->route('admin.journey')->with('success', 'Journey chapter updated successfully.');
    }

    public function journeyDestroy($id)
    {
        JourneyChapter::findOrFail($id)->delete();
        return redirect()->route('admin.journey')->with('success', 'Journey chapter deleted.');
    }

    // Recognitions CRUD
    public function recognitionIndex()
    {
        $recognitions = Recognition::with('teamMember')->orderBy('order_num')->get();
        return view('admin.recognitions.index', compact('recognitions'));
    }

    public function recognitionCreate()
    {
        $teamMembers = TeamMember::orderBy('name')->get();
        return view('admin.recognitions.create', compact('teamMembers'));
    }

    public function recognitionStore(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'year' => 'required|string',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'organization_id' => 'required|string',
            'organization_en' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'story_id' => 'nullable|string',
            'story_en' => 'nullable|string',
            'related_project' => 'nullable|string',
            'media_coverage' => 'nullable|string',
            'team_member_id' => 'nullable|integer',
            'order_num' => 'required|integer',
            
            'award_logo_path' => 'nullable|string',
            'award_logo_file' => 'nullable|image',
            'certificate_path' => 'nullable|string',
            'certificate_file' => 'nullable|image',
            'doc_path' => 'nullable|string',
            'doc_file' => 'nullable|image',
        ]);

        $awardLogo = $request->award_logo_path;
        if ($request->hasFile('award_logo_file')) {
            $awardLogo = compress_and_store_image($request->file('award_logo_file'), 'uploads/recognitions');
        }

        $certificate = $request->certificate_path;
        if ($request->hasFile('certificate_file')) {
            $certificate = compress_and_store_image($request->file('certificate_file'), 'uploads/recognitions');
        }

        $doc = $request->doc_path;
        if ($request->hasFile('doc_file')) {
            $doc = compress_and_store_image($request->file('doc_file'), 'uploads/recognitions');
        }

        Recognition::create([
            'category' => $request->category,
            'year' => $request->year,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'organization' => json_encode(['id' => $request->organization_id, 'en' => $request->organization_en]),
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'story' => json_encode(['id' => $request->story_id ?? '', 'en' => $request->story_en ?? '']),
            'award_logo_path' => $awardLogo,
            'certificate_path' => $certificate,
            'doc_path' => $doc,
            'related_project' => $request->related_project,
            'media_coverage' => $request->media_coverage,
            'team_member_id' => $request->team_member_id ? $request->team_member_id : null,
            'order_num' => $request->order_num,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.recognitions')->with('success', 'Recognition record created successfully.');
    }

    public function recognitionEdit($id)
    {
        $recognition = Recognition::findOrFail($id);
        $teamMembers = TeamMember::orderBy('name')->get();
        return view('admin.recognitions.edit', compact('recognition', 'teamMembers'));
    }

    public function recognitionUpdate(Request $request, $id)
    {
        $recognition = Recognition::findOrFail($id);
        $request->validate([
            'category' => 'required|string',
            'year' => 'required|string',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'organization_id' => 'required|string',
            'organization_en' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'story_id' => 'nullable|string',
            'story_en' => 'nullable|string',
            'related_project' => 'nullable|string',
            'media_coverage' => 'nullable|string',
            'team_member_id' => 'nullable|integer',
            'order_num' => 'required|integer',
            
            'award_logo_path' => 'nullable|string',
            'award_logo_file' => 'nullable|image',
            'certificate_path' => 'nullable|string',
            'certificate_file' => 'nullable|image',
            'doc_path' => 'nullable|string',
            'doc_file' => 'nullable|image',
        ]);

        $awardLogo = $request->award_logo_path;
        if ($request->hasFile('award_logo_file')) {
            $awardLogo = compress_and_store_image($request->file('award_logo_file'), 'uploads/recognitions');
        }

        $certificate = $request->certificate_path;
        if ($request->hasFile('certificate_file')) {
            $certificate = compress_and_store_image($request->file('certificate_file'), 'uploads/recognitions');
        }

        $doc = $request->doc_path;
        if ($request->hasFile('doc_file')) {
            $doc = compress_and_store_image($request->file('doc_file'), 'uploads/recognitions');
        }

        $recognition->update([
            'category' => $request->category,
            'year' => $request->year,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'organization' => json_encode(['id' => $request->organization_id, 'en' => $request->organization_en]),
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'story' => json_encode(['id' => $request->story_id ?? '', 'en' => $request->story_en ?? '']),
            'award_logo_path' => $awardLogo,
            'certificate_path' => $certificate,
            'doc_path' => $doc,
            'related_project' => $request->related_project,
            'media_coverage' => $request->media_coverage,
            'team_member_id' => $request->team_member_id ? $request->team_member_id : null,
            'order_num' => $request->order_num,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.recognitions')->with('success', 'Recognition record updated.');
    }

    public function recognitionDestroy($id)
    {
        Recognition::findOrFail($id)->delete();
        return redirect()->route('admin.recognitions')->with('success', 'Recognition record deleted.');
    }

    // Milestones CRUD
    public function milestoneIndex()
    {
        $milestones = Milestone::orderBy('order_num')->get();
        return view('admin.milestones.index', compact('milestones'));
    }

    public function milestoneCreate()
    {
        return view('admin.milestones.create');
    }

    public function milestoneStore(Request $request)
    {
        $request->validate([
            'year' => 'required|string',
            'status' => 'required|string|in:Research,Prototype,Pilot,Live',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'subtitle_id' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'lessons_learned_id' => 'nullable|string',
            'lessons_learned_en' => 'nullable|string',
            'impact_id' => 'nullable|string',
            'impact_en' => 'nullable|string',
            'achievements_id' => 'nullable|string',
            'achievements_en' => 'nullable|string',
            'related_product' => 'nullable|string',
            'order_num' => 'required|integer',
            'locations' => 'nullable|string',
            'technologies' => 'nullable|string',
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image',
            'video_path' => 'nullable|string',
            'video_file' => 'nullable|file',
            'document_path' => 'nullable|string',
            'document_file' => 'nullable|file',
            'gallery_files.*' => 'nullable|image',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/milestones');
        }

        $videoPath = $request->video_path;
        if ($request->hasFile('video_file')) {
            $videoPath = $request->file('video_file')->store('uploads/milestones/videos', 'public');
            $videoPath = '/storage/' . $videoPath;
        }

        $docPath = $request->document_path;
        if ($request->hasFile('document_file')) {
            $docPath = $request->file('document_file')->store('uploads/milestones/docs', 'public');
            $docPath = '/storage/' . $docPath;
        }

        $galleryArr = [];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $galleryArr[] = compress_and_store_image($file, 'uploads/milestones/gallery');
            }
        }

        $locs = $request->locations ? array_filter(array_map('trim', explode(',', $request->locations))) : [];
        $techs = $request->technologies ? array_filter(array_map('trim', explode(',', $request->technologies))) : [];

        Milestone::create([
            'year' => $request->year,
            'status' => $request->status,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'subtitle' => json_encode(['id' => $request->subtitle_id ?? '', 'en' => $request->subtitle_en ?? '']),
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'lessons_learned' => json_encode(['id' => $request->lessons_learned_id ?? '', 'en' => $request->lessons_learned_en ?? '']),
            'impact' => json_encode(['id' => $request->impact_id ?? '', 'en' => $request->impact_en ?? '']),
            'achievements' => json_encode(['id' => $request->achievements_id ?? '', 'en' => $request->achievements_en ?? '']),
            'image_path' => $imagePath,
            'video_path' => $videoPath,
            'document_path' => $docPath,
            'gallery' => $galleryArr,
            'locations' => $locs,
            'technologies' => $techs,
            'related_product' => $request->related_product,
            'order_num' => $request->order_num,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.milestones')->with('success', 'Milestone created successfully.');
    }

    public function milestoneEdit($id)
    {
        $milestone = Milestone::findOrFail($id);
        return view('admin.milestones.edit', compact('milestone'));
    }

    public function milestoneUpdate(Request $request, $id)
    {
        $milestone = Milestone::findOrFail($id);
        $request->validate([
            'year' => 'required|string',
            'status' => 'required|string|in:Research,Prototype,Pilot,Live',
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'subtitle_id' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'lessons_learned_id' => 'nullable|string',
            'lessons_learned_en' => 'nullable|string',
            'impact_id' => 'nullable|string',
            'impact_en' => 'nullable|string',
            'achievements_id' => 'nullable|string',
            'achievements_en' => 'nullable|string',
            'related_product' => 'nullable|string',
            'order_num' => 'required|integer',
            'locations' => 'nullable|string',
            'technologies' => 'nullable|string',
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image',
            'video_path' => 'nullable|string',
            'video_file' => 'nullable|file',
            'document_path' => 'nullable|string',
            'document_file' => 'nullable|file',
            'gallery_files.*' => 'nullable|image',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = compress_and_store_image($request->file('image_file'), 'uploads/milestones');
        }

        $videoPath = $request->video_path;
        if ($request->hasFile('video_file')) {
            $videoPath = $request->file('video_file')->store('uploads/milestones/videos', 'public');
            $videoPath = '/storage/' . $videoPath;
        }

        $docPath = $request->document_path;
        if ($request->hasFile('document_file')) {
            $docPath = $request->file('document_file')->store('uploads/milestones/docs', 'public');
            $docPath = '/storage/' . $docPath;
        }

        $galleryArr = $milestone->gallery ?? [];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $galleryArr[] = compress_and_store_image($file, 'uploads/milestones/gallery');
            }
        }

        $locs = $request->locations ? array_filter(array_map('trim', explode(',', $request->locations))) : [];
        $techs = $request->technologies ? array_filter(array_map('trim', explode(',', $request->technologies))) : [];

        $milestone->update([
            'year' => $request->year,
            'status' => $request->status,
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'subtitle' => json_encode(['id' => $request->subtitle_id ?? '', 'en' => $request->subtitle_en ?? '']),
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'lessons_learned' => json_encode(['id' => $request->lessons_learned_id ?? '', 'en' => $request->lessons_learned_en ?? '']),
            'impact' => json_encode(['id' => $request->impact_id ?? '', 'en' => $request->impact_en ?? '']),
            'achievements' => json_encode(['id' => $request->achievements_id ?? '', 'en' => $request->achievements_en ?? '']),
            'image_path' => $imagePath,
            'video_path' => $videoPath,
            'document_path' => $docPath,
            'gallery' => $galleryArr,
            'locations' => $locs,
            'technologies' => $techs,
            'related_product' => $request->related_product,
            'order_num' => $request->order_num,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.milestones')->with('success', 'Milestone updated successfully.');
    }

    public function milestoneDestroy($id)
    {
        Milestone::findOrFail($id)->delete();
        return redirect()->route('admin.milestones')->with('success', 'Milestone deleted.');
    }
}
