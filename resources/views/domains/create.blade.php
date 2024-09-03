@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Domain for Account: {{ $account->name }}</h1>
    <form action="{{ route('accounts.domains.store', $account) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Domain Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="ssl_mode" class="block text-sm font-medium text-gray-700">SSL Mode</label>
            <select id="ssl_mode" name="ssl_mode" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="off">Off</option>
                <option value="flexible">Flexible</option>
                <option value="full">Full</option>
                <option value="full_strict">Full (strict)</option>
            </select>
        </div>
        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Create
        </button>
    </form>
</div>
@endsection
