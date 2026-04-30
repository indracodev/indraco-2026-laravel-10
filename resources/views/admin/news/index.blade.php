@extends('layouts.admin')

@section('title', 'Manajemen Berita - Admin Panel')
@section('page_title', 'Manajemen Berita')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-3 mb-md-0">Data Master News</h5>
        <div class="d-flex flex-column flex-md-row gap-2">
            <form action="{{ url('admin/news') }}" method="GET" class="d-flex me-2">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari berita..." value="{{ $search ?? '' }}">
                <input type="hidden" name="sort" value="{{ $sort ?? 'id' }}">
                <input type="hidden" name="order" value="{{ $order ?? 'desc' }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah News
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 60px;">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'order' => ($sort == 'id' && $order == 'asc' ? 'desc' : 'asc')]) }}" class="text-decoration-none text-dark">
                                ID {!! $sort == 'id' ? ($order == 'asc' ? '↑' : '↓') : '' !!}
                            </a>
                        </th>
                        <th style="width: 100px;">Gambar</th>
                        <th>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'judul', 'order' => ($sort == 'judul' && $order == 'asc' ? 'desc' : 'asc')]) }}" class="text-decoration-none text-dark">
                                Judul {!! $sort == 'judul' ? ($order == 'asc' ? '↑' : '↓') : '' !!}
                            </a>
                        </th>
                        <th style="width: 200px;">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'tanggal', 'order' => ($sort == 'tanggal' && $order == 'asc' ? 'desc' : 'asc')]) }}" class="text-decoration-none text-dark">
                                Tanggal {!! $sort == 'tanggal' ? ($order == 'asc' ? '↑' : '↓') : '' !!}
                            </a>
                        </th>
                        <th class="text-center" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                    <tr>
                        <td class="ps-3">{{ $item->id }}</td>
                        <td>
                            @if($item->image_path)
                                <img src="{{ asset($item->image_path) }}" alt="News Image" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center border" style="width: 80px; height: 60px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $item->title }}</div>
                            <small class="text-muted d-block">{{ $item->slug }}</small>
                        </td>
                        <td>{{ $item->date_text ?? '-' }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-warning text-white me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <form action="{{ url('admin/news/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <form action="{{ url('admin/news/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit News</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Judul (ID) <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="{{ $item->title }}" required onkeyup="updateSlug(this, 'slug_edit_{{ $item->id }}')">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Judul (EN) <span class="text-danger">*</span></label>
                                                <input type="text" name="title_en" class="form-control" value="{{ $item->title_en }}" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Slug <span class="text-danger">*</span></label>
                                                <input type="text" name="slug" id="slug_edit_{{ $item->id }}" class="form-control" value="{{ $item->slug }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tanggal Acara/Berita</label>
                                                <input type="text" name="date_text" class="form-control" value="{{ $item->date_text }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tanggal (EN)</label>
                                                <input type="text" name="date_text_en" class="form-control" value="{{ $item->date_text_en }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Gambar Banner</label>
                                                <input type="file" name="image" class="form-control">
                                                @if($item->image_path)
                                                    <small class="text-muted">File saat ini: {{ $item->image_path }}</small>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Konten HTML (ID)</label>
                                                <textarea name="content" class="form-control editor" rows="10">{{ $item->content }}</textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Konten HTML (EN)</label>
                                                <textarea name="content_en" class="form-control editor" rows="10">{{ $item->content_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <div>
                                            <button type="button" class="btn btn-info text-white" onclick="previewNews('editModal{{ $item->id }}')">Preview</button>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">Belum ada data berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ url('admin/news') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 text-start">
                        <div class="col-md-6">
                            <label class="form-label">Judul (ID) <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required onkeyup="updateSlug(this, 'slug_add')">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Judul (EN) <span class="text-danger">*</span></label>
                            <input type="text" name="title_en" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug_add" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Acara/Berita</label>
                            <input type="text" name="date_text" class="form-control" value="{{ date('d F Y') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal (EN)</label>
                            <input type="text" name="date_text_en" class="form-control" value="{{ date('d F Y') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gambar Banner</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konten HTML (ID)</label>
                            <textarea name="content" class="form-control editor" rows="10"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konten HTML (EN)</label>
                            <textarea name="content_en" class="form-control editor" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div>
                        <button type="button" class="btn btn-info text-white" onclick="previewNews('addModal')">Preview</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="preview-area" class="news-preview">
                    <h2 id="preview-title" class="fs-1 fw-bold text-capitalize mb-0"></h2>
                    <p id="preview-date" class="small mb-4"></p>
                    <div id="preview-content"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('.editor').summernote({
        placeholder: 'Tulis konten berita di sini...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});

function updateSlug(input, targetId) {
    let slug = input.value.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById(targetId).value = slug;
}

function previewNews(modalId) {
    let modal = document.getElementById(modalId);
    let title = modal.querySelector('[name="title"]').value;
    let date = modal.querySelector('[name="date_text"]').value;
    
    // Get content from Summernote
    let content = $(modal).find('[name="content"]').summernote('code');

    document.getElementById('preview-title').innerText = title || 'Judul Berita';
    document.getElementById('preview-date').innerText = date || '-';
    document.getElementById('preview-content').innerHTML = content || '<em>Belum ada konten.</em>';

    new bootstrap.Modal(document.getElementById('previewModal')).show();
}
</script>
@endpush
@endsection
