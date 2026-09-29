<?php

namespace App\Http\Controllers;

use App\Models\FieldStory;
use App\Models\Activity;
use App\Models\GalleryItem;
use App\Models\KnowledgeItem;
use App\Models\NewsroomItem;
use App\Models\MapMarker;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function dashboard()
    {
        $storiesCount = FieldStory::count();
        $activitiesCount = Activity::count();
        $galleryCount = GalleryItem::count();
        $knowledgeCount = KnowledgeItem::count();
        $newsCount = NewsroomItem::count();

        $recentStories = FieldStory::latest()->take(3)->get();
        $recentActivities = Activity::latest()->take(3)->get();

        return view('writer.dashboard', compact(
            'storiesCount', 'activitiesCount', 'galleryCount', 'knowledgeCount', 'newsCount',
            'recentStories', 'recentActivities'
        ));
    }

    // 1. Field Stories CRUD (Suara Lapangan)
    public function storiesIndex()
    {
        $stories = FieldStory::latest()->get();
        return view('writer.stories.index', compact('stories'));
    }

    public function storiesCreate()
    {
        return view('writer.stories.create');
    }

    public function storiesStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'slug' => 'required|string|unique:field_stories,slug',
            'village_name' => 'required|string',
            'story_id' => 'required|string',
            'story_en' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'video_url' => 'nullable|string',
            'validation_data_id' => 'nullable|string',
            'validation_data_en' => 'nullable|string',
            'problems_id' => 'nullable|string',
            'problems_en' => 'nullable|string',
            'solutions_id' => 'nullable|string',
            'solutions_en' => 'nullable|string',
            'lessons_id' => 'nullable|string',
            'lessons_en' => 'nullable|string',
            'quotes_raw' => 'nullable|string',
        ]);

        $quotes = [];
        if ($request->quotes_raw) {
            $lines = explode("\n", $request->quotes_raw);
            foreach ($lines as $line) {
                $parts = explode('|', $line, 2);
                if (count($parts) === 2) {
                    $quotes[] = [
                        'author' => trim($parts[0]),
                        'quote' => trim($parts[1]),
                    ];
                }
            }
        }

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/stories');
        }

        FieldStory::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'slug' => $request->slug,
            'village_name' => $request->village_name,
            'story' => json_encode(['id' => $request->story_id, 'en' => $request->story_en]),
            'photo_path' => $photoPath,
            'video_url' => $request->video_url,
            'validation_data' => json_encode(['id' => $request->validation_data_id ?? '', 'en' => $request->validation_data_en ?? '']),
            'problems' => json_encode(['id' => $request->problems_id ?? '', 'en' => $request->problems_en ?? '']),
            'solutions' => json_encode(['id' => $request->solutions_id ?? '', 'en' => $request->solutions_en ?? '']),
            'lessons' => json_encode(['id' => $request->lessons_id ?? '', 'en' => $request->lessons_en ?? '']),
            'interview_quotes' => $quotes,
        ]);

        return redirect()->route('writer.stories')->with('success', 'Field story published successfully.');
    }

    public function storiesEdit($id)
    {
        $story = FieldStory::findOrFail($id);
        $quotes_raw = '';
        if (is_array($story->interview_quotes)) {
            foreach ($story->interview_quotes as $q) {
                $quotes_raw .= $q['author'] . '|' . $q['quote'] . "\n";
            }
        }
        return view('writer.stories.edit', compact('story', 'quotes_raw'));
    }

    public function storiesUpdate(Request $request, $id)
    {
        $story = FieldStory::findOrFail($id);
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'slug' => 'required|string|unique:field_stories,slug,' . $id,
            'village_name' => 'required|string',
            'story_id' => 'required|string',
            'story_en' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'video_url' => 'nullable|string',
            'validation_data_id' => 'nullable|string',
            'validation_data_en' => 'nullable|string',
            'problems_id' => 'nullable|string',
            'problems_en' => 'nullable|string',
            'solutions_id' => 'nullable|string',
            'solutions_en' => 'nullable|string',
            'lessons_id' => 'nullable|string',
            'lessons_en' => 'nullable|string',
            'quotes_raw' => 'nullable|string',
        ]);

        $quotes = [];
        if ($request->quotes_raw) {
            $lines = explode("\n", $request->quotes_raw);
            foreach ($lines as $line) {
                $parts = explode('|', $line, 2);
                if (count($parts) === 2) {
                    $quotes[] = [
                        'author' => trim($parts[0]),
                        'quote' => trim($parts[1]),
                    ];
                }
            }
        }

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/stories');
        }

        $story->update([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'slug' => $request->slug,
            'village_name' => $request->village_name,
            'story' => json_encode(['id' => $request->story_id, 'en' => $request->story_en]),
            'photo_path' => $photoPath,
            'video_url' => $request->video_url,
            'validation_data' => json_encode(['id' => $request->validation_data_id ?? '', 'en' => $request->validation_data_en ?? '']),
            'problems' => json_encode(['id' => $request->problems_id ?? '', 'en' => $request->problems_en ?? '']),
            'solutions' => json_encode(['id' => $request->solutions_id ?? '', 'en' => $request->solutions_en ?? '']),
            'lessons' => json_encode(['id' => $request->lessons_id ?? '', 'en' => $request->lessons_en ?? '']),
            'interview_quotes' => $quotes,
        ]);

        return redirect()->route('writer.stories')->with('success', 'Field story updated.');
    }

    public function storiesDestroy($id)
    {
        FieldStory::findOrFail($id)->delete();
        return redirect()->route('writer.stories')->with('success', 'Field story deleted.');
    }

    // 2. Activities CRUD
    public function activitiesIndex()
    {
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        return view('writer.activities.index', compact('activities'));
    }

    public function activitiesCreate()
    {
        return view('writer.activities.create');
    }

    public function activitiesStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'category' => 'required|string',
            'activity_date' => 'required|date',
            'location' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'video_url' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/activities');
        }

        Activity::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'category' => $request->category,
            'activity_date' => $request->activity_date,
            'location' => $request->location,
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'photo_path' => $photoPath,
            'video_url' => $request->video_url,
            'tags' => $request->tags,
        ]);

        return redirect()->route('writer.activities')->with('success', 'Timeline activity added.');
    }

    public function activitiesEdit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('writer.activities.edit', compact('activity'));
    }

    public function activitiesUpdate(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'category' => 'required|string',
            'activity_date' => 'required|date',
            'location' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'photo_path' => 'nullable|string',
            'photo_file' => 'nullable|image',
            'video_url' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $photoPath = $request->photo_path;
        if ($request->hasFile('photo_file')) {
            $photoPath = compress_and_store_image($request->file('photo_file'), 'uploads/activities');
        }

        $activity->update([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'category' => $request->category,
            'activity_date' => $request->activity_date,
            'location' => $request->location,
            'description' => json_encode(['id' => $request->description_id, 'en' => $request->description_en]),
            'photo_path' => $photoPath,
            'video_url' => $request->video_url,
            'tags' => $request->tags,
        ]);

        return redirect()->route('writer.activities')->with('success', 'Timeline activity updated.');
    }

    public function activitiesDestroy($id)
    {
        Activity::findOrFail($id)->delete();
        return redirect()->route('writer.activities')->with('success', 'Timeline activity deleted.');
    }

    // 3. Gallery Items CRUD
    public function galleryIndex()
    {
        $items = GalleryItem::latest()->get();
        return view('writer.gallery.index', compact('items'));
    }

    public function galleryCreate()
    {
        return view('writer.gallery.create');
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|string',
            'media_path' => 'nullable|string',
            'secondary_media_path' => 'nullable|string',
            'media_file' => 'nullable|image',
            'secondary_media_file' => 'nullable|image',
        ]);

        $mediaPath = $request->media_path;
        if ($request->hasFile('media_file')) {
            $mediaPath = compress_and_store_image($request->file('media_file'), 'uploads/gallery');
        }

        $secondaryMediaPath = $request->secondary_media_path;
        if ($request->hasFile('secondary_media_file')) {
            $secondaryMediaPath = compress_and_store_image($request->file('secondary_media_file'), 'uploads/gallery');
        }

        GalleryItem::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'type' => $request->type,
            'category' => $request->category,
            'media_path' => $mediaPath,
            'secondary_media_path' => $secondaryMediaPath,
        ]);
        return redirect()->route('writer.gallery')->with('success', 'Gallery media uploaded.');
    }

    public function galleryDestroy($id)
    {
        GalleryItem::findOrFail($id)->delete();
        return redirect()->route('writer.gallery')->with('success', 'Gallery item deleted.');
    }

    // 4. Knowledge items CRUD
    public function knowledgeIndex()
    {
        $items = KnowledgeItem::latest()->get();
        return view('writer.knowledge.index', compact('items'));
    }

    public function knowledgeCreate()
    {
        return view('writer.knowledge.create');
    }

    public function knowledgeStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'slug' => 'required|string|unique:knowledge_items,slug',
            'category' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'file_path' => 'nullable|string',
            'author' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        KnowledgeItem::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'file_path' => $request->file_path,
            'author' => $request->author,
            'published_at' => $request->published_at,
        ]);
        return redirect()->route('writer.knowledge')->with('success', 'Knowledge resources published.');
    }

    public function knowledgeEdit($id)
    {
        $item = KnowledgeItem::findOrFail($id);
        return view('writer.knowledge.edit', compact('item'));
    }

    public function knowledgeUpdate(Request $request, $id)
    {
        $item = KnowledgeItem::findOrFail($id);
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'slug' => 'required|string|unique:knowledge_items,slug,' . $id,
            'category' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'file_path' => 'nullable|string',
            'author' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        $item->update([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'file_path' => $request->file_path,
            'author' => $request->author,
            'published_at' => $request->published_at,
        ]);
        return redirect()->route('writer.knowledge')->with('success', 'Knowledge resources updated.');
    }

    public function knowledgeDestroy($id)
    {
        KnowledgeItem::findOrFail($id)->delete();
        return redirect()->route('writer.knowledge')->with('success', 'Knowledge resources deleted.');
    }

    // 5. Newsroom CRUD
    public function newsIndex()
    {
        $items = NewsroomItem::latest()->get();
        return view('writer.news.index', compact('items'));
    }

    public function newsCreate()
    {
        return view('writer.news.create');
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'category' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'link_url' => 'nullable|string',
            'publish_date' => 'required|date',
            'source' => 'nullable|string',
        ]);

        NewsroomItem::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'category' => $request->category,
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'link_url' => $request->link_url,
            'publish_date' => $request->publish_date,
            'source' => $request->source,
        ]);
        return redirect()->route('writer.news')->with('success', 'News published.');
    }

    public function newsEdit($id)
    {
        $item = NewsroomItem::findOrFail($id);
        return view('writer.news.edit', compact('item'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $item = NewsroomItem::findOrFail($id);
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'category' => 'required|string',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'link_url' => 'nullable|string',
            'publish_date' => 'required|date',
            'source' => 'nullable|string',
        ]);

        $item->update([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'category' => $request->category,
            'content' => json_encode(['id' => $request->content_id, 'en' => $request->content_en]),
            'link_url' => $request->link_url,
            'publish_date' => $request->publish_date,
            'source' => $request->source,
        ]);
        return redirect()->route('writer.news')->with('success', 'News updated.');
    }

    public function newsDestroy($id)
    {
        NewsroomItem::findOrFail($id)->delete();
        return redirect()->route('writer.news')->with('success', 'News deleted.');
    }

    // 6. Map Markers CRUD
    public function mapIndex()
    {
        $markers = MapMarker::all();
        return view('writer.map.index', compact('markers'));
    }

    public function mapCreate()
    {
        return view('writer.map.create');
    }

    public function mapStore(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'marker_type' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'details_keys_id' => 'nullable|array',
            'details_keys_en' => 'nullable|array',
            'details_values' => 'nullable|array',
        ]);

        $details = [];
        if ($request->details_keys_id && is_array($request->details_keys_id)) {
            foreach ($request->details_keys_id as $index => $keyId) {
                $keyEn = $request->details_keys_en[$index] ?? '';
                $val = $request->details_values[$index] ?? '';
                if ($keyId !== '' || $keyEn !== '' || $val !== '') {
                    $details[] = [
                        'key_id' => $keyId,
                        'key_en' => $keyEn,
                        'value' => $val,
                    ];
                }
            }
        }

        MapMarker::create([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'marker_type' => $request->marker_type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'details' => json_encode($details),
        ]);

        return redirect()->route('writer.map')->with('success', 'Map coordinate marker added successfully.');
    }

    public function mapEdit($id)
    {
        $marker = MapMarker::findOrFail($id);
        
        $rawDetails = $marker->getRawOriginal('details') ?? $marker->details;
        $details = json_decode($rawDetails, true) ?? [];
        if (!is_array($details)) {
            $details = [];
        }

        return view('writer.map.edit', compact('marker', 'details'));
    }

    public function mapUpdate(Request $request, $id)
    {
        $marker = MapMarker::findOrFail($id);
        $request->validate([
            'title_id' => 'required|string',
            'title_en' => 'required|string',
            'marker_type' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'details_keys_id' => 'nullable|array',
            'details_keys_en' => 'nullable|array',
            'details_values' => 'nullable|array',
        ]);

        $details = [];
        if ($request->details_keys_id && is_array($request->details_keys_id)) {
            foreach ($request->details_keys_id as $index => $keyId) {
                $keyEn = $request->details_keys_en[$index] ?? '';
                $val = $request->details_values[$index] ?? '';
                if ($keyId !== '' || $keyEn !== '' || $val !== '') {
                    $details[] = [
                        'key_id' => $keyId,
                        'key_en' => $keyEn,
                        'value' => $val,
                    ];
                }
            }
        }

        $marker->update([
            'title' => json_encode(['id' => $request->title_id, 'en' => $request->title_en]),
            'marker_type' => $request->marker_type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'details' => json_encode($details),
        ]);

        return redirect()->route('writer.map')->with('success', 'Map coordinate marker updated successfully.');
    }

    public function mapDestroy($id)
    {
        MapMarker::findOrFail($id)->delete();
        return redirect()->route('writer.map')->with('success', 'Map coordinate marker deleted.');
    }
}
