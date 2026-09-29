@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Recognition Record</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify credentials, certificate data, and relationships to team member profiles.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.recognitions.update', $recognition->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Awards" {{ $recognition->category === 'Awards' ? 'selected' : '' }}>Awards</option>
                        <option value="National Recognition" {{ $recognition->category === 'National Recognition' ? 'selected' : '' }}>National Recognition</option>
                        <option value="Strategic Partnerships" {{ $recognition->category === 'Strategic Partnerships' ? 'selected' : '' }}>Strategic Partnerships</option>
                        <option value="Intellectual Property" {{ $recognition->category === 'Intellectual Property' ? 'selected' : '' }}>Intellectual Property</option>
                        <option value="Publications" {{ $recognition->category === 'Publications' ? 'selected' : '' }}>Publications</option>
                        <option value="Government Programs" {{ $recognition->category === 'Government Programs' ? 'selected' : '' }}>Government Programs</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Year</label>
                    <input type="text" name="year" value="{{ $recognition->year }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. 2025">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Order Number</label>
                    <input type="number" name="order_num" value="{{ $recognition->order_num }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. 1, 2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Link to Team Member Profile (Optional)</label>
                <select name="team_member_id" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    <option value="">General / None (Institutional Record)</option>
                    @foreach($teamMembers as $member)
                        <option value="{{ $member->id }}" {{ $recognition->team_member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>

            @php
                $titleDec = json_decode($recognition->title, true) ?? [];
                $orgDec = json_decode($recognition->organization, true) ?? [];
                $descDec = json_decode($recognition->description, true) ?? [];
                $storyDec = json_decode($recognition->story, true) ?? [];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleDec['id'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Judul Penghargaan/HKI">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleDec['en'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Award/IP Title">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Organization (Indonesian)</label>
                    <input type="text" name="organization_id" value="{{ $orgDec['id'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Organisasi Pemberi">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Organization (English)</label>
                    <input type="text" name="organization_en" value="{{ $orgDec['en'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Awarding Organization">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Short Description (Indonesian)</label>
                <textarea name="description_id" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Ringkasan singkat...">{{ $descDec['id'] ?? '' }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Short Description (English)</label>
                <textarea name="description_en" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Short summary description...">{{ $descDec['en'] ?? '' }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Background Story / Process Narrative (Indonesian)</label>
                <textarea name="story_id" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Kisah di balik penghargaan atau usaha mendapatkan lisensi HKI...">{{ $storyDec['id'] ?? '' }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Background Story / Process Narrative (English)</label>
                <textarea name="story_en" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="The details or story behind securing this recognition...">{{ $storyDec['en'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Related Project Name (Optional)</label>
                    <input type="text" name="related_project" value="{{ $recognition->related_project }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. PasokPasti, HUMARSA">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Verification / Media link (Optional)</label>
                    <input type="text" name="media_coverage" value="{{ $recognition->media_coverage }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://news.agronex.com/...">
                </div>
            </div>

            <!-- Upload files or provide paths -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Award/Org Logo File</label>
                    <input type="file" name="award_logo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Logo Image URL</label>
                    <input type="text" name="award_logo_path" value="{{ $recognition->award_logo_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://upload.wikimedia.org/...">
                </div>
            </div>

            @if($recognition->award_logo_path)
            <div class="space-y-1">
                <span class="font-bold text-forest uppercase tracking-wider block">Current Logo Preview</span>
                <img src="{{ $recognition->award_logo_path }}" class="h-8 w-auto object-contain max-w-[120px] bg-primary-cream/10 p-1 border border-sand" alt="">
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Certificate / PDF Photo</label>
                    <input type="file" name="certificate_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Certificate Path</label>
                    <input type="text" name="certificate_path" value="{{ $recognition->certificate_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/images/certs/...">
                </div>
            </div>

            @if($recognition->certificate_path)
            <div class="space-y-1">
                <span class="font-bold text-forest uppercase tracking-wider block">Current Certificate Preview</span>
                <img src="{{ $recognition->certificate_path }}" class="w-32 h-20 rounded object-cover border border-sand" alt="">
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Documentation Photo</label>
                    <input type="file" name="doc_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Documentation Path</label>
                    <input type="text" name="doc_path" value="{{ $recognition->doc_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/images/docs/...">
                </div>
            </div>

            @if($recognition->doc_path)
            <div class="space-y-1">
                <span class="font-bold text-forest uppercase tracking-wider block">Current Documentation Preview</span>
                <img src="{{ $recognition->doc_path }}" class="w-32 h-20 rounded object-cover border border-sand" alt="">
            </div>
            @endif

            <div class="flex items-center space-x-2 pt-2 border-t border-sand/30">
                <input type="checkbox" name="is_published" value="1" {{ $recognition->is_published ? 'checked' : '' }} class="rounded border-sand text-leaf-green focus:ring-leaf-green">
                <label class="font-bold text-forest uppercase tracking-wider">Publish Immediately</label>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.recognitions') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
