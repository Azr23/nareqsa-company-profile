@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="row">
    <div class="col-12 col-md-8 col-lg-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Layanan</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Ikon (Class Bootstrap Icon)</label>
                        <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" required>
                        <small class="form-text text-muted">Contoh: <code>bi-laptop</code>, <code>bi-globe</code>. <i class="bi {{ $service->icon }} text-primary"></i> (Ikon saat ini)</small>
                        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Layanan</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px;" required>{{ old('description', $service->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Update Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection