@extends('layout.app')
@if (session('success'))
<div class="alert alert-success alert-dismissble d-flex justify-content-between p-3" role="alert">
    <p class="m-0">{{ session('success') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@section('content')
    <div class="container container-fluid d-flex flex-column gap-4">
        <h1 class="text-center mt-4">{{ $title }}</h1>
        <div class="card card-default">
            <div class="card-header">
                <form class="form-inline d-flex flex-column">
                    <div class="form-group mt-2 mr-2">
                        <input type="text" class="form-control" name="q" value="{{ $q}}" placeholder="Cari User...">
                    </div>
                    <div class="button-group d-flex gap-2">
                        <div class="form-group mt-2 mr-2">
                            <button class="btn btn-warning"><i class="fas fa-sync"></i>&nbsp;Refresh</button>
                        </div>
                        <div class="form-group mt-2 mr-2">
                            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body p-2 table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-primary" align="center">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Posisi/Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1?>
                        @foreach ($rows as $row)
                        <tr text-align="center">
                            <td align="center">{{ $no++ }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->position }}</td>
                            <td align="center">
                                <a href="{{ route('user.edit', $row) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>&nbsp;Edit</a>
                                <form action="{{ route('user.destroy', $row) }}" style="display:inline-block" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">
                                        <i class="fas fa-trash"></i>&nbsp;Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
