@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Edit Domain: {{ $domain->name }}</h1>
    <form action="{{ route('accounts.domains.update', [$domain->account, $domain]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Domain Name</label>
            <input type="text" id="name" name="name" value="{{ $domain->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" disabled>
        </div>
        <div class="mb-4">
            <label for="ssl_mode" class="block text-sm font-medium text-gray-700">SSL Mode</label>
            <select id="ssl_mode" name="ssl_mode" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="off" {{ $domain->ssl_mode == 'off' ? 'selected' : '' }}>Off</option>
                <option value="flexible" {{ $domain->ssl_mode == 'flexible' ? 'selected' : '' }}>Flexible</option>
                <option value="full" {{ $domain->ssl_mode == 'full' ? 'selected' : '' }}>Full</option>
                <option value="full_strict" {{ $domain->ssl_mode == 'full_strict' ? 'selected' : '' }}>Full (strict)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
