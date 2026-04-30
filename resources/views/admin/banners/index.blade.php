@extends('layouts.admin')

@section('title', 'Manajemen Banner - Admin Panel')
@section('page_title', 'Manajemen Banner')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-3 mb-md-0">Daftar Banner</h5>
        <div class="d-flex flex-column flex-md-row gap-2">
            <form action="{{ url('admin/banners') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari banner..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Banner
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Judul Banner (ID)</th>
                        <th>Subjudul (ID)</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $banner)
                    <tr>
                        <td class="ps-4 fw-medium">{{ $banner->title_id }}</td>
                        <td>{{ $banner->subtitle_id }}</td>
                        <td>
                            <span class="badge {{ $banner->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $banner->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <button type="button" class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $banner->id }}">Edit</button>
                            <form action="{{ url('admin/banners/'.$banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus banner ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $banner->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('admin/banners/'.$banner->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Banner</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label class="form-label">Judul (ID)</label>
                                            <input type="text" name="title_id" class="form-control" value="{{ $banner->title_id }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Subjudul (ID)</label>
                                            <input type="text" name="subtitle_id" class="form-control" value="{{ $banner->subtitle_id }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Judul (EN)</label>
                                            <input type="text" name="title_en" class="form-control" value="{{ $banner->title_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Subjudul (EN)</label>
                                            <input type="text" name="subtitle_en" class="form-control" value="{{ $banner->subtitle_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tautan (Link)</label>
                                            <input type="url" name="link" class="form-control" value="{{ $banner->link }}">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="is_active" class="form-check-input" value="1" id="isActiveEdit{{ $banner->id }}" {{ $banner->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="isActiveEdit{{ $banner->id }}">Banner Aktif</label>
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
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data banner.</td>
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
        <form action="{{ url('admin/banners') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Banner Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul (ID)</label>
                        <input type="text" name="title_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjudul (ID)</label>
                        <input type="text" name="subtitle_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul (EN)</label>
                        <input type="text" name="title_en" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjudul (EN)</label>
                        <input type="text" name="subtitle_en" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tautan (Link)</label>
                        <input type="url" name="link" class="form-control" value="https://indracostore.com/">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" id="isActiveAdd" checked>
                        <label class="form-check-label" for="isActiveAdd">Banner Aktif</label>
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
