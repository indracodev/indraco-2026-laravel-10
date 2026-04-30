@extends('layouts.admin')

@section('title', 'Manajemen Varian - Admin Panel')
@section('page_title', 'Manajemen Varian')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-3 mb-md-0">Daftar Varian</h5>
        <div class="d-flex flex-column flex-md-row gap-2">
            <form action="{{ url('admin/variants') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari varian..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Varian
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Nama Varian</th>
                        <th>Slug</th>
                        <th>Taste</th>
                        <th>Acidity / Body</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($variants as $variant)
                    <tr>
                        <td class="ps-4 fw-medium">{{ $variant->name }}</td>
                        <td>{{ $variant->slug }}</td>
                        <td>{{ $variant->taste ?: '-' }}</td>
                        <td>
                            <span class="badge bg-info">A: {{ $variant->acidity }}</span>
                            <span class="badge bg-secondary">B: {{ $variant->body }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <button type="button" class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $variant->id }}">Edit</button>
                            <form action="{{ url('admin/variants/'.$variant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus varian ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $variant->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('admin/variants/'.$variant->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Varian</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Varian</label>
                                            <input type="text" name="name" class="form-control" value="{{ $variant->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="description" class="form-control" rows="2">{{ $variant->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Taste / Rasa</label>
                                            <input type="text" name="taste" class="form-control" value="{{ $variant->taste }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Acidity</label>
                                                <input type="number" step="0.1" name="acidity" class="form-control" value="{{ $variant->acidity }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Body</label>
                                                <input type="number" step="0.1" name="body" class="form-control" value="{{ $variant->body }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Roast Level</label>
                                            <input type="text" name="roast" class="form-control" value="{{ $variant->roast }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ingredients / Komposisi</label>
                                            <input type="text" name="ingredient" class="form-control" value="{{ $variant->ingredient }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data varian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('admin/variants') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Varian Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Varian</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Taste / Rasa</label>
                        <input type="text" name="taste" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Acidity</label>
                            <input type="number" step="0.1" name="acidity" class="form-control" value="0.0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Body</label>
                            <input type="number" step="0.1" name="body" class="form-control" value="0.0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Roast Level</label>
                        <input type="text" name="roast" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingredients / Komposisi</label>
                        <input type="text" name="ingredient" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
