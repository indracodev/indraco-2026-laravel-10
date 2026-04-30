@extends('layouts.admin')

@section('title', 'Pengaturan Situs - Admin Panel')
@section('page_title', 'Pengaturan Situs')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-3 mb-md-0">Daftar Pengaturan</h5>
        <div class="d-flex flex-column flex-md-row gap-2">
            <form action="{{ url('admin/settings') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari pengaturan..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Pengaturan
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Key</th>
                        <th>Value</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($settings as $setting)
                    <tr>
                        <td class="ps-4 fw-medium"><code>{{ $setting->setting_key }}</code></td>
                        <td><span class="d-inline-block text-truncate" style="max-width: 400px;">{{ $setting->setting_value }}</span></td>
                        <td class="text-end pe-4">
                            <button type="button" class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ str_replace('.', '_', $setting->setting_key) }}">Edit</button>
                            <form action="{{ url('admin/settings/'.$setting->setting_key) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaturan ini? Menghapus core setting bisa menyebabkan website error.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ str_replace('.', '_', $setting->setting_key) }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('admin/settings/'.$setting->setting_key) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pengaturan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label class="form-label">Key</label>
                                            <input type="text" name="setting_key" class="form-control" value="{{ $setting->setting_key }}" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Value</label>
                                            <textarea name="setting_value" class="form-control" rows="4">{{ $setting->setting_value }}</textarea>
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
                        <td colspan="3" class="text-center py-4 text-muted">Belum ada data pengaturan.</td>
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
        <form action="{{ url('admin/settings') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengaturan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Key</label>
                        <input type="text" name="setting_key" class="form-control" required placeholder="Contoh: contact_phone">
                        <small class="text-muted">Gunakan format snake_case tanpa spasi.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Value</label>
                        <textarea name="setting_value" class="form-control" rows="4"></textarea>
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
