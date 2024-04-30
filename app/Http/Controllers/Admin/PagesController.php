<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('Admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string |max:100|unique:pages',
            'body' => 'string'
           
        ]);
        

        $data = $request->only(['title', 'body']);
        
        $data['slug'] = Str::slug($data['title']);
        $page = Page::create($data);

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::find($id);
        if ($page) {
            return view('Admin.pages.edit', [
                'page' => $page
            ]);
        }

        return redirect()->route('pages.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = Page::find($id);

        $data = $request->only(['title', 'body']);
        
        if($page->title !== $data['title']){
            $request->validate([
                'title' => 'required|string |max:100|unique:pages',
                'body' => 'string' 
            ]);
            $page->title = $data['title'];
            $data['slug'] = Str::slug($data['title']);
            $page->slug = $data['slug'];
        }
        $page->body = $data['body'];
        $page->save();
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::find($id);
            if ($page) {
                $page->delete();
            }
        return redirect()->route('pages.index');
    }
}
