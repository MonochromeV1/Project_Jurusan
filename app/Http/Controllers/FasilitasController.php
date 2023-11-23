<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index(): View
    {
        $fasilitass = Fasilitas::latest()->paginate(5);
        return view('fasilitas.index', compact('fasilitass'));
    }

    public function create(): View
    {
        return view('fasilitas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        Fasilitas::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('fasilitas.show', compact('fasilitas'));
    }

    public function edit(string $id): View
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        $fasilitas = Fasilitas::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload new image

            // Delete old image
            Storage::delete('public/fasilitas/'.$fasilitas->image);

            // Update post with new image
            $fasilitas->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'image'     => $request->file('image')->store('fasilitas', 'public')
            ]);
        } else {
            // Update post without image
            $fasilitas->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $fasilitas = Fasilitas::findOrFail($id);
        // Storage::delete('public/fasilitas/' . $fasilitas->image);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
