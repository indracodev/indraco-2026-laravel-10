@extends('layouts.admin')

@section('title', 'Manajemen Asset - Admin Panel')
@section('page_title', 'Manajemen Asset')

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

<!-- Global Settings (Logo & Banner) -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-2">
                <small class="fw-bold text-uppercase" style="font-size: 0.7rem;">Logo (Light)</small>
            </div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center bg-light">
                @if(isset($settings['logo_light']))
                    <img src="{{ asset($settings['logo_light']) }}" alt="Logo Light" class="img-fluid mb-2" style="max-height: 80px;">
                    <small class="text-muted text-truncate w-100 text-center">{{ basename($settings['logo_light']) }}</small>
                @else
                    <span class="text-muted">Not Set</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-2">
                <small class="fw-bold text-uppercase" style="font-size: 0.7rem;">Logo (Dark)</small>
            </div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center bg-dark text-white">
                @if(isset($settings['logo_dark']))
                    <img src="{{ asset($settings['logo_dark']) }}" alt="Logo Dark" class="img-fluid mb-2" style="max-height: 80px;">
                    <small class="text-muted text-truncate w-100 text-center">{{ basename($settings['logo_dark']) }}</small>
                @else
                    <span class="text-muted">Not Set</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-2">
                <small class="fw-bold text-uppercase" style="font-size: 0.7rem;">Pengaturan Banner Index</small>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.assets.settings') }}" method="POST">
                    @csrf
                    <div class="row g-2 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label small mb-1">Tipe Banner</label>
                            <select name="banner_type" class="form-select form-select-sm">
                                <option value="youtube" {{ ($settings['banner_type'] ?? '') == 'youtube' ? 'selected' : '' }}>YouTube Video</option>
                                <option value="asset" {{ ($settings['banner_type'] ?? '') == 'asset' ? 'selected' : '' }}>Asset Image/Video</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label small mb-1">ID YouTube / Path Asset</label>
                            <input type="text" name="banner_value" class="form-control form-control-sm" value="{{ $settings['banner_value'] ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm btn-success w-100">Simpan</button>
                        </div>
                    </div>
                    <div class="mt-2" style="font-size: 0.7rem; color: #666;">
                        Jika tipe YouTube, isi dengan ID (misal: <span class="text-danger">ePqLLciPHKg</span>). Jika tipe Asset, bisa klik tombol "Gunakan Sebagai..." di tabel bawah.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('admin/assets') }}">Root</a></li>
                @php $crumbs = explode('/', $path); $currentCrumb = ''; @endphp
                @foreach($crumbs as $crumb)
                    @if($crumb == 'images') @continue @endif
                    @php $currentCrumb .= ($currentCrumb ? '/' : 'images/') . $crumb; @endphp
                    <li class="breadcrumb-item active">{{ $crumb }}</li>
                @endforeach
            </ol>
        </nav>
        <div class="d-flex gap-2 mt-3 mt-md-0">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="bi bi-upload me-1"></i> Upload File
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 100px;">Gambar</th>
                        <th>Informasi</th>
                        <th class="text-center" style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($parentPath)
                    <tr>
                        <td class="text-center">
                            <a href="{{ url('admin/assets?path=' . $parentPath) }}" class="text-warning fs-3">
                                <i class="bi bi-folder-symlink"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ url('admin/assets?path=' . $parentPath) }}" class="text-decoration-none text-dark">.. (Kembali ke folder sebelumnya)</a>
                        </td>
                        <td></td>
                    </tr>
                    @endif

                    @foreach($directories as $dir)
                    <tr>
                        <td class="text-center">
                            <a href="{{ url('admin/assets?path=' . $dir['path']) }}" class="text-warning fs-3">
                                <i class="bi bi-folder-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ url('admin/assets?path=' . $dir['path']) }}" class="text-decoration-none text-dark fw-bold">{{ $dir['name'] }}</a>
                            <div class="text-muted small">Folder</div>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach

                    @foreach($files as $file)
                    <tr>
                        <td class="text-center p-2">
                            @if($file['is_image'])
                                <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <i class="bi bi-file-earmark fs-2 text-secondary"></i>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $file['name'] }}</div>
                            <div class="d-flex gap-2 align-items-center mt-1">
                                <span class="badge bg-light text-dark border" style="font-size: 0.65rem;">{{ $file['type'] }}</span>
                                <span class="text-muted" style="font-size: 0.75rem;">{{ $file['size'] }}</span>
                                @if($file['dimensions'])
                                    <span class="text-primary d-flex align-items-center" style="font-size: 0.75rem;">
                                        <i class="bi bi-aspect-ratio me-1"></i> {{ $file['dimensions'] }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ $file['url'] }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-check-circle me-1"></i> Gunakan Sebagai...
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <form action="{{ route('admin.assets.settings') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="logo_light" value="{{ $file['path'] }}">
                                                <button type="submit" class="dropdown-item small">Set Logo (Light)</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.assets.settings') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="logo_dark" value="{{ $file['path'] }}">
                                                <button type="submit" class="dropdown-item small">Set Logo (Dark)</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.assets.settings') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="banner_type" value="asset">
                                                <input type="hidden" name="banner_value" value="{{ $file['path'] }}">
                                                <button type="submit" class="dropdown-item small">Set Sebagai Banner Index</button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><button type="button" class="dropdown-item small" onclick="copyUrl('{{ $file['url'] }}')">Copy URL</button></li>
                                    </ul>
                                </div>
                                <form action="{{ route('admin.assets.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="path" value="{{ $file['path'] }}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if(empty($directories) && empty($files))
                    <tr>
                        <td colspan="3" class="text-center py-5 text-muted">
                            <i class="bi bi-folder2-open fs-1"></i>
                            <p class="mt-2">Folder ini kosong.</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white py-3">
            <div class="d-flex justify-content-center">
                {{ $files->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.assets.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="path" value="{{ $path }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File ke {{ $path }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih File</label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="text-muted">Max size: 5MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function copyUrl(url) {
    navigator.clipboard.writeText(url).then(function() {
        alert('URL berhasil disalin ke clipboard!');
    }, function(err) {
        console.error('Gagal menyalin: ', err);
    });
}
</script>
@endpush
@endsection
