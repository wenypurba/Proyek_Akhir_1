@extends('layouts.app')

@section('content')

<div class="container mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-success mb-3"><< Kembali</a>
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <strong><i class="fa fa-plus"></i> Tambah Produk</strong>
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
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label"><strong>Nama Produk :</strong></label>
                            <input type="text" name="nama" class="form-control" placeholder="nama" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category" class="col-form-label"><strong>Kategori:</strong></label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="buah-buahan">Buah-Buahan</option>
                                <option value="sayur-sayuran">Sayur-Sayuran</option>
                                <option value="biji-bijian">Biji-Bijian</option>
                                <option value="umbi-umbian">Umbi-Umbian</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label"><strong>Harga:</strong></label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Rp" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="qty" class="col-form-label"><strong>Stok:</strong></label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="size" class="col-form-label"><strong>Satuan:</strong></label>
                            <select name="satuan" class="form-control">
                                <option value="Kilogram">Kilogram</option>
                                <option value="Gram">Gram</option>
                                <option value="Ons">Ons</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label for="image" class="col-form-label"><strong>Gambar:</strong></label>
                            <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label"><strong>Deskripsi:</strong></label>
                        <textarea name="deskripsi" id="" rows="5" class="form-control" placeholder="Deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
                </form>
            </div>
        </div>
</div><br>
@endsection
