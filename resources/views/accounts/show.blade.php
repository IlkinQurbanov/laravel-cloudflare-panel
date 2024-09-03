@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Account Details</h1>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <p class="mt-1 text-gray-900">{{ $account->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <p class="mt-1 text-gray-900">{{ $account->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">API Key</label>
            <p class="mt-1 text-gray-900">{{ $account->api_key }}</p>
        </div>
        
        <div class="flex space-x-4 mt-6">
            <a href="{{ route('accounts.edit', $account) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Edit
            </a>
            <form action="{{ route('accounts.destroy', $account) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Delete
                </button>
            </form>
        </div>
    </div>
    
    <a href="{{ route('accounts.index') }}" class="mt-6 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
        Back to Accounts
    </a>
</div>
@endsection
