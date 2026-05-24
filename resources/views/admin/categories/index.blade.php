@extends('layouts.admin')

@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Daftar kategori untuk panel admin')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-3">
            <div>
                <h2 class="h4 mb-1">Daftar Kategori</h2>
                <p class="text-muted mb-0">Kelola kategori event di AmikomEventHub.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>

        <form method="GET" action="{{ route('admin.categories.index') }}" class="row g-2 mb-4">
            <div class="col-12 col-md-8">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari kategori berdasarkan nama...">
            </div>
            <div class="col-12 col-md-4 d-grid">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Diubah</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at->format('d M Y') }}</td>
                        <td>{{ $category->updated_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada kategori. Tambahkan kategori baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection