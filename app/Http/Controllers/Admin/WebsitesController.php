<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsitesController extends Controller
{
    public function index()
    {
        $websites = Website::all();

        return view('admin.websites.index', compact('websites'));
    }

    public function create()
    {
        return view('admin.websites.create');
    }

    public function store(StoreWebsiteRequest $request)
    {
        // return $request->all();
        // $request->merge(['api_token'  => Str::random(60)]);

        Website::create($request->all());

        return redirect()->route('admin.websites.index')->withSuccess('Website successfully added.');
    }

    public function edit(Website $website)
    {
        return view('admin.websites.edit', compact('website'));
    }

    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->all());

        return redirect()->route('admin.websites.index');
    }

    public function destroy(Website $website)
    {
        $website->delete();
        return redirect()->route('admin.websites.index');
    }

}
