@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Edit Account</h1>
    <form action="{{ route('accounts.update', $account) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $account->name) }}" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $account->email) }}" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="api_key" class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
            <input type="text" id="api_key" name="api_key" value="{{ old('api_key', $account->api_key) }}" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Update
        </button>
    </form>
</div>
@endsection
