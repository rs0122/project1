<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Information;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $posts = Information::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('info.index', ['headline' => $headline, 'posts' => $posts]);
        
    }
}
