<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersId=Auth::user()->id;
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'deskripsi' => 'required',
        ]);
        $usersId=Auth::user()->id;
        $file = $request->file('gambar');
        $namaFile =$file->getClientOriginalName();
        $tujuanFile ='images/products';
        $file->move($tujuanFile,$namaFile);

        $product = new Product;
        $product->nama = $request->nama;
        $product->kategori = $request->kategori;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->satuan = $request->satuan;
        $product->gambar = $namaFile;
        $product->usersId = $usersId;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('products.index')->with('success','Produk berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($file = $request->file('gambar')) {
            $namaFile =$file->getClientOriginalName();
            $tujuanFile ='images/products';
            $file->move($tujuanFile,$namaFile);
            Product::where('id', $product)
                ->update([
                    'nama' => $request->nama,
                    'kategori' => $request->kategori,
                    'harga' => $request->harga,
                    'stok' => $request->stok,
                    'satuan' => $request->satuan,
                    'gambar' => $namaFile,
                    'deskripsi' => $request->deskripsi,
                ]);
        }else{
            Product::where('id', $product)
                ->update([
                    'nama' => $request->nama,
                    'kategori' => $request->kategori,
                    'harga' => $request->harga,
                    'stok' => $request->stok,
                    'satuan' => $request->satuan,
                    'deskripsi' => $request->deskripsi,
                ]);
        }
        return redirect()->route('products.index')->with('success','produk berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success','produk berhasil dihapus');
    }
    public function modal(Request $request,$id)
    {
        $product=Product::where('id',$request->id)->get();
        return view('products.modal',compact('product'));
    }
    /* FUNCTION SEARCH */
    public function search(Request $request)
    {
        if($request->has('q')){
            $q=$request->q;
            $result=Product::where('nama','like','%' .$q.'%')->orWhere('id','like','%' .$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return view('products.index');
        }
    }

}
