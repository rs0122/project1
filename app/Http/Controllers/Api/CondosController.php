<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Condo;
use App\Http\Controllers\Controller;

class CondosController extends Controller
{
    public function index(Request $request)
    {
        $query = Condo::all()->sortByDesc('updated_at');
        return $query;
    }
}