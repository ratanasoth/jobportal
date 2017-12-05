<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class FrontPageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
           app()->setLocale(Session::get("lang"));
            return $next($request);
        });
    }
    public function index($id)
    {    
        $data['categories'] = DB::table('categories')
            ->where('active',1)
            ->orderBy('name')
            ->get();
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('.fronts.pages.index', $data);
    }
}

