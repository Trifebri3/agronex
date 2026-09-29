@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Add Intellectual Property Registry</h1>
        <p class="text-xs text-charcoal/50 mt-1">Register new patents or software copyright filings.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('admin.haki.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Registry Title</label>
                <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="AgroAI Precision Yield Engine">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">IP Category Type</label>
                    <select name="type" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Patent">Patent</option>
                        <option value="Copyright">Copyright</option>
                        <option value="Trademark">Trademark</option>
                        <option value="Industrial Design">Industrial Design</option>
                        <option value="Software Registration">Software Registration</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Registry Number</label>
                    <input type="text" name="registration_number" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="IDS0000...">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Status</label>
                    <input type="text" name="status" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Granted / Registered / Pending">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Registration Date</label>
                    <input type="date" name="registration_date" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Document URL / Path (Optional)</label>
                <input type="text" name="document_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/documents/haki_...">
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.haki') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Register IP</button>
            </div>
        </form>
    </div>
</div>
@endsection
