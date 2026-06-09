@extends('layouts.admin')

@section('title', 'Pengaturan Company Profile')

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
                <h4>Form Company Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Perusahaan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $profile->company_name ?? '') }}" required>
                            @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo Perusahaan</label>
                        <div class="col-sm-12 col-md-7">
                            @if(isset($profile) && $profile->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile" accept="image/*">
                                <label class="custom-file-label" for="customFile">Pilih file logo baru...</label>
                            </div>
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, SVG. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah logo.</small>
                            @error('logo') <div class="text-danger mt-1" style="font-size: 80%;">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang Perusahaan (About)</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="about" class="form-control @error('about') is-invalid @enderror" style="height: 150px;" required>{{ old('about', $profile->about ?? '') }}</textarea>
                            @error('about') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email ?? '') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->phone ?? '') }}" required>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" style="height: 100px;" required>{{ old('address', $profile->address ?? '') }}</textarea>
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection