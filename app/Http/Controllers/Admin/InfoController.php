<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Info;

class InfoController extends Controller
{
    //
    public function add()
    {
        return view('admin.info.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Info::$rules);
        
        $info = new Info;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $info->image_path = basename($path);
        } else {
            $info->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $info->fill($form);
        $info->save();
        
        return redirect('admin/info/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $post = Info::where('title', $cond_title)->get();
        } else {
            $posts = Info::all();
        }
        return view('admin.info.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
}
