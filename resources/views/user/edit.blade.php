@extends('layout.app')
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
        <h1 class="text-center mt-4">Edit User</h1>
        <div class="card col-md-6 mt-4">
            <form action="{{ route('user.update', $row) }}" method="post" class="d-flex flex-column gap-3 p-3">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username"
                        value="{{ old('username', $row->username) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email"
                        value="{{ old('email', $row->email) }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                    <p class="form-text mb-0">Kosongkan jika tidak ingin merubah password yang dimiliki</p>
                </div>
                <div class="form-group">
                    <label for="position">Posisi/Jabatan</label>
                    <select name="position" id="position" class="form-control">
                        @foreach ($position as $option => $val)
                            @if ($option == old('position', $row->position))
                                <option value="{{ $option }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $option }}">{{ $val }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('user.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
