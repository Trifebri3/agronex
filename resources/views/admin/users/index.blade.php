@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">User Accounts</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage personnel access credentials for Admin and Writer roles.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add User Account
        </a>
    </div>

    <!-- Table of users -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Name</th>
                    <th class="py-4 px-6">Email Address</th>
                    <th class="py-4 px-6">System Role</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($users as $user)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $user->name }}</td>
                    <td class="py-4 px-6 font-mono">{{ $user->email }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-0.5 rounded text-[8px] font-bold uppercase tracking-wider 
                            @if($user->role === 'admin') bg-forest text-primary-cream 
                            @elseif($user->role === 'penulis') bg-leaf-green text-white 
                            @else bg-sand text-forest 
                            @endif"
                        >
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Revoke account access?');">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline font-bold">Delete Account</button>
                        </form>
                        @else
                        <span class="text-charcoal/30 italic">Active Account</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
