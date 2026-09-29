@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-md">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Add User Account</h1>
        <p class="text-xs text-charcoal/50 mt-1">Register new administrative or editorial team members.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Full Name</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Aditya Yudhistira">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="aditya@agronex.com">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Security Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="••••••••">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">System Role</label>
                <select name="role" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    <option value="penulis">Field Writer (Penulis)</option>
                    <option value="admin">Super Administrator (Admin)</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.users') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Create Account</button>
            </div>
        </form>
    </div>
</div>
@endsection
