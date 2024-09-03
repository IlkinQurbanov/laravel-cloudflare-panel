<?php

namespace App\Http\Controllers;

use App\Models\PageRule;
use App\Models\Domain;
use Illuminate\Http\Request;

class PageRuleController extends Controller
{
    public function index(Domain $domain)
    {
        $pageRules = $domain->pageRules;
        return view('page_rules.index', compact('pageRules', 'domain'));
    }

    public function create(Domain $domain)
    {
        return view('page_rules.create', compact('domain'));
    }

    public function store(Request $request, Domain $domain)
    {
        $request->validate([
            'url_pattern' => 'required',
            'actions' => 'required|array',
        ]);

        $domain->pageRules()->create($request->all());

        // Синхронизация с Cloudflare API

        return redirect()->route('domains.page-rules.index', $domain)->with('success', 'Page Rule created successfully.');
    }

    public function show(PageRule $pageRule)
    {
        return view('page_rules.show', compact('pageRule'));
    }

    public function edit(PageRule $pageRule)
    {
        return view('page_rules.edit', compact('pageRule'));
    }

    public function update(Request $request, PageRule $pageRule)
    {
        $request->validate([
            'url_pattern' => 'required',
            'actions' => 'required|array',
        ]);

        $pageRule->update($request->all());

        // Синхронизация с Cloudflare API

        return redirect()->route('domains.page-rules.index', $pageRule->domain_id)->with('success', 'Page Rule updated successfully.');
    }

    public function destroy(PageRule $pageRule)
    {
        $domainId = $pageRule->domain_id;
        $pageRule->delete();

        // Синхронизация с Cloudflare API

        return redirect()->route('domains.page-rules.index', $domainId)->with('success', 'Page Rule deleted successfully.');
    }
}
