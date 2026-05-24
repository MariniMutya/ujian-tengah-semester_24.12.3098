@extends('layouts.admin')

@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Daftar partner di panel admin')

@section('content')
<div class="card shadow-sm mt-6">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h2 class="h4 mb-1">Data Partner</h2>
                <p class="text-muted mb-0">Cari, tambah, edit, dan hapus partner event.</p>
            </div>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Tambah Partner</a>
        </div>

        <form method="GET" action="{{ route('admin.partners.index') }}" class="row g-2 mb-4">
            <div class="col-12 col-md-9">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari partner berdasarkan nama...">
            </div>
            <div class="col-12 col-md-3 d-grid">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Nama Partner</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Diubah</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="img-fluid rounded" style="max-height: 70px;">
                        </td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->created_at->format('d M Y') }}</td>
                        <td>{{ $partner->updated_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus partner ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data partner.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $partners->links() }}
        </div>
    </div>
</div>
@endsection