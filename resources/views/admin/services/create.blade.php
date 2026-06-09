@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="row">
    <div class="col-12 col-md-8 col-lg-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Layanan</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Ikon (Class Bootstrap Icon)</label>
                        <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', 'bi-star') }}" required>
                        <small class="form-text text-muted">Contoh: <code>bi-laptop</code>, <code>bi-globe</code>, <code>bi-code-slash</code>. Referensi: <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></small>
                        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Layanan</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px;" required>{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection