<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Condo;
use Storage;

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
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $condos->image_path = Storage::disk('s3')->url($path);
          
        /*$path = $request->file('image')->store('public/image');
        $condos->image_path = basename($path);*/
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
          $posts = Condo::where('condo','like','%'.$cond_condo.'%')->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Condo::all();
      }
      return view('admin.condo.index', ['posts' => $posts, 'cond_condo' => $cond_condo]);
  }
  
  public function edit(Request $request)
  {
      $condos = Condo::find($request->id);
      if (empty($condos)) {
        abort(404);    
      }
      return view('admin.condo.edit', ['condo_form' => $condos]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Condo::$rules);
      // News Modelからデータを取得する
      $condos = Condo::find($request->id);
      // 送信されてきたフォームデータを格納する
      $condo_form = $request->all();
      if (isset($condo_form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$condo_form['image'],'public');
        $condos->image_path = Storage::disk('s3')->url($path);
        
        /*$path = $request->file('image')->store('public/image');
        $condos->image_path = basename($path);*/
        unset($condo_form['image']);
      } elseif (isset($request->remove)) {
        $condos->image_path = null;
        unset($condo_form['remove']);
      }
      unset($condo_form['_token']);

      // 該当するデータを上書きして保存する
      $condos->fill($condo_form)->save();

      return redirect('admin/condo');
  }
  
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $condos = Condo::find($request->id);
      // 削除する
      $condos->delete();
      return redirect('admin/condo/');
  }
  
  public function post($id)
  {
    Post::create([
      'condo_id' => $id,
      'user_id' => User::all(),
      'from_user_id' => Auth::id()
      ]);
    
    return redirect()->back(); 
    
  }

}
