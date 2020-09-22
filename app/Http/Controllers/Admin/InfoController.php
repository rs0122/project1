<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Information;
use Carbon\Carbon;
use App\History;

class InfoController extends Controller
{
    //
    public function add()
    {
        return view('admin.info.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Information::$rules);
        
        $information = new Information;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $information->image_path = basename($path);
        } else {
            $information->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $information->fill($form);
        $information->save();
        
        return redirect('admin/info/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $post = Information::where('title', $cond_title)->get();
        } else {
            $posts = Information::all();
        }
        return view('admin.info.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $information = Information::find($request->id);
        if (empty($information)) {
            abort(404);
        }
        return view('admin.info.edit', ['information_form' =>$information]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Information::$rules);
        $information = Information::find($request->id);
        $information_form =$request->all();
        if (isset($information_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $information ->image_path = basename($path);
            unset($information_form['image']);
        } elseif (isset($request->remove)) {
            $information->image_path = null;
            unset($information_form['remove']);
        }
        unset($information_form['_token']);
        $information->fill($information_form)->save();
        
        $history = new History;
        $history->information_id = $information->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/info');
    }
    
    public function delete(Request $request)
    {
        $information = Information::find($request->id);
        $information->delete();
        return redirect('admin/info/');
    }
    
     public function map()
    {
        return view('info.map');
    }
    
}
