@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Accounts</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Add Account</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->email }}</td>
                    <td>
                        <a href="{{ route('accounts.show', $account) }}" class="btn btn-info">View</a>
                        <a href="{{ route('accounts.edit', $account) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display:inline;">
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
