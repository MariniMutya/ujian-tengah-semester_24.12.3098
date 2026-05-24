@extends('layouts.admin')

@section('page_title', 'Tambah Partner')
@section('page_subtitle', 'Input data partner baru')

@section('content')
<div class="card shadow-sm mt-6">
    <div class="card-body">
        <h2 class="h4 mb-4">Tambah Partner</h2>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.partners.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Partner</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="logo_url" class="form-label">Logo URL</label>
                <input id="logo_url" type="url" name="logo_url" value="{{ old('logo_url') }}" placeholder="https://placehold.co/200x200" class="form-control @error('logo_url') is-invalid @enderror" required>
                @error('logo_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Partner</button>
            </div>
        </form>
    </div>
</div>
@endsection