@extends('layout.app')
@push('style')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <div class="row justify-content-center align-items-center d-flex flex-column">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger alert-dismissble d-flex justify-content-between w-50" role="alert">
                    <p class="m-0">{{ $err }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <h2 class="text-center mt-4">Tambah User</h2>
        <nav aria-label="breadcrumb" class="nav-breadcrumb col-md-6 mt-4">
            <ol class="breadcrumb first shadow-lg px-md-4 align-items-center">
                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="{{ route('user.index') }}"><span class="dark">Dashboard</span></a></li>
                <i class="fas fa-angle-double-right mx-2"></i>
                <li class="breadcrumb-item font-weight-bold active" aria-current="page"><a class="black-text text-uppercase active-2" disabled>Tambah User</a></li>
            </ol>
        </nav>
        <div class="card col-md-6 mt-3 shadow-lg">
            <form action="{{ route('user.store') }}" method="post" class="d-flex flex-column gap-3 p-3 my-3">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username"
                        value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="position">Posisi/Jabatan</label>
                    <select name="position" id="position" class="form-control">
                        @foreach ($position as $option => $val)
                            @if ($option == old('position'))
                                <option value="{{ $option }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $option }}">{{ $val }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
