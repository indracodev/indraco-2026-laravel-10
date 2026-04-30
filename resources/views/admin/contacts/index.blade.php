@extends('layouts.admin')

@section('title', 'Manajemen Kontak - Admin Panel')
@section('page_title', 'Manajemen Kontak')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-3 mb-md-0">Data Masuk dari Hubungi Kami</h5>
        <div class="d-flex flex-column flex-md-row gap-2">
            <form action="{{ url('admin/contacts') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari pesan..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 200px;">Pengirim</th>
                        <th style="width: 250px;">Subjek</th>
                        <th>Pesan</th>
                        <th style="width: 180px;">Tanggal</th>
                        <th class="text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">{{ $contact->nama }}</div>
                            <small class="text-muted d-block">{{ $contact->email }}</small>
                            <small class="text-muted d-block">{{ $contact->telepon }}</small>
                        </td>
                        <td>{{ $contact->judul_pesan }}</td>
                        <td>
                            <div class="text-truncate" style="max-width: 400px;" title="{{ $contact->pesan }}">
                                {{ $contact->pesan }}
                            </div>
                        </td>
                        <td>{{ $contact->tanggal_kirim }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-info text-white me-1" data-bs-toggle="modal" data-bs-target="#viewModal{{ $contact->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <form action="{{ url('admin/contacts/'.$contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pesan dari {{ $contact->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Nama</div>
                                        <div class="col-md-8">: {{ $contact->nama }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Email</div>
                                        <div class="col-md-8">: {{ $contact->email }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Telepon</div>
                                        <div class="col-md-8">: {{ $contact->telepon }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Subjek</div>
                                        <div class="col-md-8">: {{ $contact->judul_pesan }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Tanggal Kirim</div>
                                        <div class="col-md-8">: {{ $contact->tanggal_kirim }}</div>
                                    </div>
                                    <hr>
                                    <div class="fw-bold mb-2">Pesan:</div>
                                    <div class="p-3 bg-light rounded" style="white-space: pre-wrap;">{{ $contact->pesan }}</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
