@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('users.index') }}" class="btn btn-success mb-3"><< Kembali</a>
<div class="card border-success">
        <div class="card border-success">
            <div class="card-header bg-success text-white">
            @can('role-create')
                <strong><i class="fa fa-plus"></i>Ubah Data Pengguna</strong>
            @else
                <strong><i class="fa fa-plus"></i>Ubah Data Akun</strong>
            @endif
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
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="form-row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Konfirmasi Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Konfirmasi Password','class' => 'form-control')) !!}
        </div>
    </div>
    @can('role-create')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    @else
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="hidden" class="form-control" name="roles" id="roles" value="member"><br>
        </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit"  class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
    </div>
</div>
</div>
</div>
</div>
</div><br><br><br>
{!! Form::close() !!}

@endsection
