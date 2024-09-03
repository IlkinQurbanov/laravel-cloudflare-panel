@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Domains for Account: {{ $account->name }}</h1>
    <a href="{{ route('accounts.domains.create', $account) }}" class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Add Domain
    </a>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100 border-b border-gray-300">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">SSL Mode</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($domains as $domain)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $domain->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $domain->ssl_mode }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('domains.edit', $domain->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mr-2">
                            Edit
                        </a>
                        <form action="{{ route('domains.destroy', $domain->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
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
