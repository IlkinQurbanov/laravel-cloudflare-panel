@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Page Rule Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">URL Pattern</label>
            <p class="mt-1 text-gray-900">{{ $pageRule->url_pattern }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Actions</label>
            <p class="mt-1 text-gray-900">{{ implode(', ', $pageRule->actions) }}</p>
        </div>
        <div class="flex space-x-4 mt-6">
            <a href="{{ route('page-rules.edit', $pageRule->id) }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                Edit
            </a>
            <form action="{{ route('page-rules.destroy', $pageRule->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page rule?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                    Delete
                </button>
            </form>
        </div>
        <a href="{{ route('domains.page-rules.index', $pageRule->domain_id) }}" class="mt-6 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
            Back to Page Rules
        </a>
    </div>
</div>
@endsection
