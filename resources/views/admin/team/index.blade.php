@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Team Profiles</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage team members, roles, categories, biographies and skills.</p>
        </div>
        <a href="{{ route('admin.team.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Team Member
        </a>
    </div>

    <!-- Table of Team members -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Photo</th>
                    <th class="py-4 px-6">Name</th>
                    <th class="py-4 px-6">Role</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Order</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($team as $member)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6">
                        @if($member->photo_path)
                            <img src="{{ $member->photo_path }}" class="w-10 h-10 rounded-full object-cover border border-sand/40" alt="avatar">
                        @else
                            <div class="w-10 h-10 rounded-full bg-forest text-primary-cream flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr(trans_db($member->name), 0, 1) }}
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($member->name) }}</td>
                    <td class="py-4 px-6">{{ trans_db($member->role) }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-semibold bg-leaf-green/10 text-leaf-green">
                            {{ $member->category }}
                        </span>
                    </td>
                    <td class="py-4 px-6 font-mono">{{ $member->order_num }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.team.edit', $member->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this team member profile?');">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline font-bold">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
