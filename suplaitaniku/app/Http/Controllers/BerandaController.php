<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('beranda.index',compact('products'));
    }
    public function show(Request $request)
    {
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);
        return view('beranda.show',compact('products'));
    }
    public function detail(Request $request,$id)
    {
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);
        return view('beranda.detail',compact('products'));
    }
    public function Search(Request $request){
        $inputSearch = $request['inputSearch'];
        $keyResult = DB::table('products')
        ->where('nama','LIKE','%'.$inputSearch.'%')
        ->get();
        echo "$keyResult";
    }
}

