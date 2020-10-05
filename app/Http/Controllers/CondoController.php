<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;

use App\Condo;
use App\Like;
use App\User;

class CondoController extends Controller
{
    //
    public function index(Request $request, User $user)
    {
        $user = Auth::user();
        $posts = Condo::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('condo.index', ['headline' => $headline, 'posts' => $posts, 'user' => $user]);
        
    }
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
  
    public function like($id)
    {
     Like::create([
       'condo_id' => $id,
       'user_id' => Auth::id(),
        ]);

        session()->flash('success', '物件をお気に入りしました。');

        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('condo_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'お気に入りを削除しました。');

        return redirect()->back();
    }
    
    public function add(User $user)
    {
        $user = Auth::user();
        return view('info.mypage', ['user' => $user]);
    }
    
    
}
