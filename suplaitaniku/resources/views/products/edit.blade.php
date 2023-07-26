@extends('layouts.app')

@section('content')
<div class="container mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-success mb-3"><< Kembali</a>
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <strong><i class="fa fa-plus"></i> Ubah Produk</strong>
            </div>

             @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Maaf!</strong> sepertinya ada kesalahan.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama" class="col-form-label"><strong>Nama Produk :</strong></label>
                            <input type="text" name="nama" class="form-control" placeholder="nama"  value="{{ $product->nama }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kategori" class="col-form-label"><strong>Kategori:</strong></label>
                            <select class="form-control" id="kategori" name="kategori"  value="{{ $product->kategori }}">
                                <option value="buah-buahan">Buah-Buahan</option>
                                <option value="sayur-sayuran">Sayur-Sayuran</option>
                                <option value="biji-bijian">Biji-Bijian</option>
                                <option value="umbi-umbian">Umbi-Umbian</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="harga" class="col-form-label"><strong>Harga:</strong></label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Rp"  value="{{ $product->harga }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="stok" class="col-form-label"><strong>Stok:</strong></label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok"  value="{{ $product->stok }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="satuan" class="col-form-label"><strong>Satuan:</strong></label>
                            <select name="satuan" class="form-control" value="{{ $product->satuan }}">
                                <option value="Kilogram">Kilogram</option>
                                <option value="Gram">Gram</option>
                                <option value="Ons">Ons</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label for="gambar" class="col-form-label"><strong>Gambar:</strong></label>
                            <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Image URL"><br>
                            <div class="slide col-4" data-thumb="{{asset('images/products/'.$product->gambar)}}"><a href="{{asset('images/products/'.$product->gambar)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$product->gambar)}}" alt="{{$product->gambar}}" class="img-fluid img-thumbnail"></a></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label"><strong>Deskripsi:</strong></label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Deskripsi" value="{{ $product->deskripsi }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
                </form>
            </div>
        </div>
</div>
</div>
<br>
@endsection
