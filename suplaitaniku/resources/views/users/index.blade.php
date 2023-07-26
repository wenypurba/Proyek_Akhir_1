@extends('layouts.app')

@section('content')

<div class="container mt-3">
<div class="border-success">
    <div class="col-lg-12 margin-tb mb-3">
        <div class="pull-left">
            <h2>Data Pengguna</h2>
        </div>
        <div class="pull-right">
          @can('role-create')
            <a class="btn btn-success" href="{{ route('users.create') }}"> Tambah Pengguna</a>
          @else
            <a class="btn btn-success" href="{{ route('beranda.index') }}"><< Kembali</a>
          @endif
        </div>
    </div>
</div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class="input-group w-100 mx-auto">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="icon-line-search"></i>
          </span>
        </div>
      <input type="text" class="form-control searchInput" value="" placeholder="Cari Akun..">
    </div>
<div class="table-responsive">
  @can('role-create')
  <table class="table cart">
  <thead>
    <tr>
      <th class="cart-product-name">Nama</th>
      <th class="cart-product-name">No.Whatsapp</th>
      <th class="cart-product-quantity">Email</th>
      <th class="cart-product-quantity">Roles</th>
      <th class="cart-product-quantity">Aksi</th>
    </tr>
  </thead>
    <tbody class="searchResult">
  @foreach ($data as $key => $user)
    <tr>
      <td class="cart-product-name">{{ $user->name }}</td>
      <td class="cart-product-name">{{ $user->notelp }}</td>
      <td class="cart-product-quantity">{{ $user->email }}</td>
      <td class="cart-product-quantity">
        @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
          @endforeach
        @endif
      </td>
      <td>
        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Lihat</a>
        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}

      </td>
    </tr>
  @endforeach
    </tbody>
  </table>
{!! $data->render() !!}
</div>
</div>
@else
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th class="cart-product-quantity">No.Whatsapp</th>
      <th width="200px" class="cart-product-quantity">Aksi</th>
    </tr>
  </thead>
    <tbody>
    @foreach ($data as $key => $user)
    @if(Auth::user()->id==$user->id)
    <tr>
      <td>{{ $user->name }}</td>
      <td class="cart-product-quantity">{{ $user->email }}</td>
      <td class="cart-product-quantity">{{ $user->notelp }}</td>
      <td class="cart-product-quantity">
        <a class="btn" href="{{ route('users.show',$user->id) }}"><i class="i-rounded i-small icon-tasks"></i></a>
        <a class="btn" href="{{ route('users.edit',$user->id) }}"><i class="i-rounded i-small icon-edit"></i></a>
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
{!! $data->render() !!}
</div>
</div>
@endif
<br><br><br><br><br><br><br>
<br><br><br><br>
@endsection
