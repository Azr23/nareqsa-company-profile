@extends('layouts.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="row">
    <div class="col-12">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Daftar Layanan</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Layanan
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Ikon</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                        @forelse($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="bi {{ $service->icon }} fs-4 text-primary"></i></td>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data layanan.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection