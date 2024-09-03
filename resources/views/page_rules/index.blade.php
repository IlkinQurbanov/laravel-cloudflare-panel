@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Page Rules for Domain: {{ $domain->name }}</h1>
    <a href="{{ route('domains.page-rules.create', $domain) }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Add Page Rule
    </a>
    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">URL Pattern</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Actions</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($pageRules as $pageRule)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $pageRule->url_pattern }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ implode(', ', $pageRule->actions) }}</td>
                    <td class="px-6 py-4 border-b border-gray-200 space-x-2">
                        <a href="{{ route('page-rules.show', $pageRule->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            View
                        </a>
                        <a href="{{ route('page-rules.edit', $pageRule->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                            Edit
                        </a>
                        <form action="{{ route('page-rules.destroy', $pageRule->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
