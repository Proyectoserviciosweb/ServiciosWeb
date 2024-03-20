<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function destroy(post $post)
    {
        //
        $post->delete();
        return back()->with('succes','Post eliminado correctamete');
        
    }
}
