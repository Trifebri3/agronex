@extends('layouts.writer')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Add Coordinate Map Marker</h1>
        <p class="text-xs text-charcoal/50 mt-1">Specify coordinate values and customize the key-value statistics for the public tooltip popup.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.map.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Marker Title (Indonesian)</label>
                    <input type="text" name="title_id" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. Stasiun Cuaca Desa Cibodas">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Marker Title (English)</label>
                    <input type="text" name="title_en" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. Cibodas Weather Station">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Latitude Coordinate</label>
                    <input type="text" name="latitude" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. -6.7860">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Longitude Coordinate</label>
                    <input type="text" name="longitude" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. 107.0090">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Marker Type / Icon</label>
                    <select name="marker_type" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="IoT Node">IoT Node</option>
                        <option value="Solar Microgrid">Solar Microgrid</option>
                        <option value="Farmers Community">Farmers Community</option>
                        <option value="Water Well">Water Well</option>
                        <option value="Other Node">Other Node</option>
                    </select>
                </div>
            </div>

            <!-- Dynamic details list (JSON replacement) -->
            <div class="space-y-4 border-t border-sand/30 pt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <label class="font-bold text-forest uppercase tracking-wider block">Custom Detail Metrics</label>
                        <p class="text-[10px] text-charcoal/50">Add custom labels and values that appear on the map popup (e.g. Soil Moisture -> 42%).</p>
                    </div>
                    <button type="button" onclick="addMetricRow()" class="px-4 py-2 bg-primary-cream hover:bg-sand/30 border border-sand text-forest font-bold rounded-lg transition-colors text-[10px] flex items-center space-x-1">
                        <span>+ Add Row</span>
                    </button>
                </div>

                <div id="metrics-container" class="space-y-3">
                    <!-- Dynamic rows go here -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center border border-sand/20 p-4 rounded-xl bg-primary-cream/10 relative" id="row-0">
                        <div class="md:col-span-4 space-y-1">
                            <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Label (Indonesian)</label>
                            <input type="text" name="details_keys_id[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. Kelembapan Lahan">
                        </div>
                        <div class="md:col-span-4 space-y-1">
                            <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Label (English)</label>
                            <input type="text" name="details_keys_en[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. Soil Moisture">
                        </div>
                        <div class="md:col-span-3 space-y-1">
                            <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Value</label>
                            <input type="text" name="details_values[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. 42%">
                        </div>
                        <div class="md:col-span-1 pt-4 text-center">
                            <button type="button" onclick="removeRow('row-0')" class="text-red-500 hover:text-red-700 font-bold text-xs">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.map') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Marker</button>
            </div>
        </form>
    </div>
</div>

<script>
    let rowCounter = 1;
    function addMetricRow() {
        const id = 'row-' + rowCounter;
        const container = document.getElementById('metrics-container');
        const row = document.createElement('div');
        row.className = 'grid grid-cols-1 md:grid-cols-12 gap-3 items-center border border-sand/20 p-4 rounded-xl bg-primary-cream/10 relative';
        row.id = id;
        row.innerHTML = `
            <div class="md:col-span-4 space-y-1">
                <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Label (Indonesian)</label>
                <input type="text" name="details_keys_id[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. Kelembapan Lahan">
            </div>
            <div class="md:col-span-4 space-y-1">
                <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Label (English)</label>
                <input type="text" name="details_keys_en[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. Soil Moisture">
            </div>
            <div class="md:col-span-3 space-y-1">
                <label class="text-[9px] uppercase tracking-wider text-charcoal/50 font-bold block">Value</label>
                <input type="text" name="details_values[]" class="w-full px-3 py-2 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-white text-charcoal" placeholder="e.g. 42%">
            </div>
            <div class="md:col-span-1 pt-4 text-center">
                <button type="button" onclick="removeRow('${id}')" class="text-red-500 hover:text-red-700 font-bold text-xs">Remove</button>
            </div>
        `;
        container.appendChild(row);
        rowCounter++;
    }

    function removeRow(id) {
        const row = document.getElementById(id);
        if (row) {
            row.remove();
        }
    }
</script>
@endsection
