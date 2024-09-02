@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Domains for Account: {{ $account->name }}</h1>
    <a href="{{ route('accounts.domains.create', $account) }}" class="btn btn-primary">Add Domain</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>SSL Mode</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domains as $domain)
                <tr>
                    <td>{{ $domain->name }}</td>
                    <td>{{ $domain->ssl_mode }}</td>
                    <td>
                        <a href="{{ route('accounts.domains.edit', [$account, $domain]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('accounts.domains.destroy', [$account, $domain]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
