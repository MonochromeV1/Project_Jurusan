<?php

namespace App\Http\Controllers;
use App\Models\Post;

use App\Models\Guru;

use App\Models\Fasilitas;

use App\Models\Posting;

use App\Models\Tugas;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  index(){
        $posts = Post::all();
        $gurus=  Guru::paginate(4);
        $fasilitass = Fasilitas ::paginate(4);
        $postings = Posting::all();
        $tugass = Tugas::all();

        return view('userHome',compact('posts','gurus','fasilitass','postings','tugass'));
 }
}
