<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Condo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CondosController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('condos')->select('condo','image_path','lat', 'lng')->get();
        return $query;
    }
}