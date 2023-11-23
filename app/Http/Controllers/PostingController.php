<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Posting;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostingController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postings = Posting::latest()->paginate(5);

        //render view with posts
        return view('posting.index', compact('postings'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posting.create');
    }
 
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:204800'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posting', $image->hashName());

        //create post
        Posting::create([
            'image'     => $image->hashName()
        ]);

        //redirect to index
        return redirect()->route('posting.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $posting = Posting::findOrFail($id);

        //render view with post
        return view('posting.show', compact('posting'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $posting = Posting::findOrFail($id);

        //render view with post
        return view('posting.edit', compact('posting'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:204800'
        ]);

        //get post by ID
        $posting = Posting::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posting', $image->hashName());

            //delete old image`
            Storage::delete('public/posting/'.$posting->image);

            //update post with new image
            $posting->update([
                'image'     => $image->hashName()
            ]);

        } 

        //redirect to index
        return redirect()->route('posting.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $posting = Posting::findOrFail($id);

        //delete image
        Storage::delete('public/posting/'. $posting->image);

        //delete post
        $posting->delete();

        //redirect to index
        return redirect()->route('posting.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}