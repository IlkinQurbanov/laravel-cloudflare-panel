<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DomainController extends Controller
{
    public function index(Account $account)
    {
        $domains = $account->domains;
        return view('domains.index', compact('domains', 'account'));
    }

    public function create(Account $account)
    {
        return view('domains.create', compact('account'));
    }

    public function store(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required',
            'ssl_mode' => 'required|in:off,flexible,full,full_strict',
        ]);

        $domain = $account->domains()->create($request->all());

        // Synchronize with Cloudflare API
        Http::withHeaders([
            'Authorization' => 'Bearer ' . $account->api_key,
        ])->post('https://api.cloudflare.com/client/v4/zones', [
            'name' => $domain->name,
            'ssl' => $domain->ssl_mode,
        ]);

        return redirect()->route('accounts.domains.index', $account)->with('success', 'Domain created successfully.');
    }

    public function show(Domain $domain)
    {
        return view('domains.show', compact('domain'));
    }

    public function edit(Domain $domain)
    {
        $account = $domain->account; 
        return view('domains.edit', compact('domain', 'account'));
    }
    

    public function update(Request $request, Domain $domain)
    {
        $request->validate([
            'ssl_mode' => 'required|in:off,flexible,full,full_strict',
        ]);

        $domain->update($request->all());


        return redirect()->route('accounts.domains.index', $domain->account)->with('success', 'Domain updated successfully.');
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();


        return redirect()->route('accounts.domains.index', $domain->account)->with('success', 'Domain deleted successfully.');
    }
}
