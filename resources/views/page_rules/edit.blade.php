@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Page Rule</h1>
    <form action="{{ route('page-rules.update', $pageRule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="url_pattern" class="block text-sm font-medium text-gray-700">URL Pattern</label>
            <input type="text" id="url_pattern" name="url_pattern" value="{{ old('url_pattern', $pageRule->url_pattern) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="actions" class="block text-sm font-medium text-gray-700">Actions</label>
            <input type="text" id="actions" name="actions[]" value="{{ implode(', ', old('actions', $pageRule->actions)) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <small class="text-gray-600">Enter actions separated by commas.</small>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
