@extends('layouts.writer')

@section('content')
<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Log Documented Activity</h1>
        <p class="text-xs text-charcoal/50 mt-1">Publish workshops, FGDs, research trials, and field campaigns to the public timeline.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.activities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Title (Indonesian)</label>
                    <input type="text" name="title_id" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Lokakarya Diagnostik Tanah">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Title (English)</label>
                    <input type="text" name="title_en" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Soil Diagnostic Workshop">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Workshop">Workshop</option>
                        <option value="FGD">FGD</option>
                        <option value="Training">Training</option>
                        <option value="Pilot Project">Pilot Project</option>
                        <option value="Research">Research</option>
                        <option value="Community Meeting">Community Meeting</option>
                        <option value="Hackathon">Hackathon</option>
                        <option value="Expo">Expo</option>
                        <option value="Festival">Festival</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Date</label>
                    <input type="date" name="activity_date" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Location</label>
                    <input type="text" name="location" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Lembang, West Java">
                </div>
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Photo File (Compressed)</label>
                    <input type="file" name="photo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Photo URL / Path</label>
                    <input type="text" name="photo_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://images.unsplash.com/...">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Video Embed URL (Optional)</label>
                <input type="text" name="video_url" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://www.youtube.com/embed/...">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Tags (Comma separated)</label>
                <input type="text" name="tags" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Soil Health, IoT, Lembang">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Description (Indonesian)</label>
                    <textarea name="description_id" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Type brief activity logs here..."></textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Description (English)</label>
                    <textarea name="description_en" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Type brief activity logs here..."></textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.activities') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Publish Activity</button>
            </div>
        </form>
    </div>
</div>
@endsection
