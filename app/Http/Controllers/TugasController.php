<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Tugas;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $tugass = Tugas::latest()->paginate(5);

        //render view with posts
        return view('tugas.index', compact('tugass'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('tugas.create');
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
        $image->storeAs('public/tugas', $image->hashName());

        //create post
        Tugas::create([
            'image'     => $image->hashName()
        ]);

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $tugas = Tugas::findOrFail($id);

        //render view with post
        return view('tugas.show', compact('tugas'));
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
        $tugas = Tugas::findOrFail($id);

        //render view with post
        return view('tugas.edit', compact('tugas'));
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
        $tugas = Tugas::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/tugas', $image->hashName());

            //delete old image`
            Storage::delete('public/tugas/'.$tugas->image);

            //update post with new image
            $tugas->update([
                'image'     => $image->hashName()
            ]);

        } 

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $tugas = Tugas::findOrFail($id);

        //delete image
        Storage::delete('public/tugas/'. $tugas->image);

        //delete post
        $tugas->delete();

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}