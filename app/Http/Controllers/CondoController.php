<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;

use App\Condo;
use App\Like;
use App\User;
use App\Post;

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

        session()->flash('success', 'お気に入り登録を解除しました。');

        return redirect()->back();
    }
    
    public function add(User $user)
    {
        $user = Auth::user();
        return view('info.mypage', ['user' => $user]);
    }
    
    public function condo1(Request $request)
    {
        $condo = Condo::find($request->id);
        return view('condo.condo1',['condo' => $condo]);
    }
    
    public function special1()
    {
        return view('condo.special1');
    }
    
    public function special2()
    {
        return view('condo.special2');
    }
    
    public function special3()
    {
        return view('condo.special3');
    }
    
    public function special4()
    {
        return view('condo.special4');
    }
    
}
