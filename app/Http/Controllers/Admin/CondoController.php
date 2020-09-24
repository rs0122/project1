<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Condo;

class CondoController extends Controller
{
    public function add()
    {
        return view('admin.condo.create');
    }
    
    public function create(Request $request)
    {
        $condos = new Condo;
        $form = $request->all();
        
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $condos->image_path = basename($path);
      } else {
          $condos->image_path = null;
      }
      
      unset($form['_token']);
      unset($form['image']);
      
      $condos->fill($form);
      $condos->save();
        
        return redirect ('admin/condo/create');
    }
    
    public function index(Request $request)
  {
      $cond_condo = $request->cond_condo;
      if ($cond_condo != '') {
          // 検索されたら検索結果を取得する
          $posts = Condo::where('condos', $cond_condo)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Condo::all();
      }
      return view('admin.condo.index', ['posts' => $posts, 'cond_condo' => $cond_condo]);
  }

}
