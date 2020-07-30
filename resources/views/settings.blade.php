@extends('layouts.stisla.index', ['title' => 'Pengaturan', 'page_heading' => 'Pengaturan'])

@section('content')
<div class="card">
    <div class="row px-3 py-3">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('settings.simpan')}}" method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{\Auth::user()->id}}">
                <div class="card-body">
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session()->get('error')}}
                        </div>
                    </div>
                    @endif
                    @if (session()->has('sukses'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session()->get('sukses')}}
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control" value="{{\Auth::user()->name}}" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" value="{{\Auth::user()->email}}" required>
                        </div>
                    </div>
                    Ganti Password
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>New Password</label>
                            <input name="newpassword" type="password" class="form-control" placeholder="Masukkan Password Baru">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Re Password</label>
                            <input name="repassword" type="password" class="form-control" placeholder="Masukkan Ulang Password Baru">
                        </div>
                    </div>
                    Verifikasi
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                            <div class="text-muted form-text">
                                Masukkan Password yang berlaku untuk menyimpan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection