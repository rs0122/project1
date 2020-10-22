<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;

use App\Condo;
use App\Information;
use App\InfoLike;
use App\User;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function index(Request $request, User $user)
    {
        $user = Auth::user();
        $posts = Information::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('info.index', ['headline' => $headline, 'posts' => $posts, 'user' => $user]);
        
    }
    
     public function map(Request $request)
    {
        $condos = Condo::all();
        return view('info.map', ['keyword' => $request->keyword, 'condos' => $condos]);
    }
    
     public function like($id)
    {
        InfoLike::create([
          'information_id' => $id,
          'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Reply.');
    
        return redirect()->back();
    }
    
      /**
       * 引数のIDに紐づくリプライにUNLIKEする
       *
       * @param $id リプライID
       * @return \Illuminate\Http\RedirectResponse
       */
    public function unlike($id)
    {
        $like = InfoLike::where('information_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
    
}
