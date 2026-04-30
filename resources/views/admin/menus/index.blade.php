@extends('layouts.admin')

@section('title', 'Manajemen Menu')
@section('page_title', 'Manajemen Menu Sidebar')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">Tambah Menu Baru</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('menus.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Tipe</label>
                        <select name="type" class="form-select" id="menuTypeSelect" required>
                            <option value="menu">Menu Link</option>
                            <option value="header">Group Header</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>URL (kosongkan jika Header atau punya Submenu)</label>
                        <input type="text" name="url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Ikon (Bootstrap Icons, cth: bi bi-tags)</label>
                        <input type="text" name="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Induk Menu (Parent)</label>
                        <select name="parent_id" class="form-select">
                            <option value="">- Tidak Ada (Root) -</option>
                            @foreach($menus as $menu)
                                @if($menu->type == 'menu')
                                    <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Urutan (Angka)</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                    <div class="mb-3">
                        <label>Hak Akses (Roles Allowed)</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="superadmin" checked>
                                <label class="form-check-label">Superadmin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="admin">
                                <label class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="markom">
                                <label class="form-check-label">Markom</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                            <label class="form-check-label">Aktif</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan Menu</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Struktur Menu (Drag & Drop)</span>
                <form action="{{ route('menus.reorder') }}" method="POST" id="reorderForm">
                    @csrf
                    <input type="hidden" name="menu_structure" id="menuStructure">
                    <button type="button" class="btn btn-sm btn-success" id="saveOrderBtn">Simpan Urutan</button>
                </form>
            </div>
            <div class="card-body">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach($menus as $menu)
                            <li class="dd-item" data-id="{{ $menu->id }}">
                                <div class="dd-handle d-flex justify-content-between align-items-center {{ $menu->type == 'header' ? 'bg-secondary text-white' : '' }}">
                                    <div>
                                        @if($menu->icon) <i class="{{ $menu->icon }} me-2"></i> @endif
                                        <strong>{{ $menu->title }}</strong>
                                        <small class="ms-2 text-muted">({{ $menu->url }})</small>
                                    </div>
                                    <div class="dd-nodrag">
                                        @if($menu->is_active) <span class="badge bg-success">Aktif</span> @else <span class="badge bg-danger">Inaktif</span> @endif
                                        <button type="button" class="btn btn-sm btn-warning py-0 px-1 ms-2" data-bs-toggle="modal" data-bs-target="#editMenuModal{{ $menu->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger py-0 px-1"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Edit Modal Parent -->
                                <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Menu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Tipe</label>
                                                        <select name="type" class="form-select" required>
                                                            <option value="menu" {{ $menu->type == 'menu' ? 'selected' : '' }}>Menu Link</option>
                                                            <option value="header" {{ $menu->type == 'header' ? 'selected' : '' }}>Group Header</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Judul</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $menu->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>URL</label>
                                                        <input type="text" name="url" class="form-control" value="{{ $menu->url }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Ikon (Bootstrap Icons)</label>
                                                        <input type="text" name="icon" class="form-control" value="{{ $menu->icon }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Hak Akses (Roles Allowed)</label>
                                                        <div>
                                                            @php $allowed = $menu->roles_allowed ?? []; @endphp
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="superadmin" {{ in_array('superadmin', $allowed) ? 'checked' : '' }}>
                                                                <label class="form-check-label">Superadmin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="admin" {{ in_array('admin', $allowed) ? 'checked' : '' }}>
                                                                <label class="form-check-label">Admin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="markom" {{ in_array('markom', $allowed) ? 'checked' : '' }}>
                                                                <label class="form-check-label">Markom</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $menu->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label">Aktif</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if($menu->children->count() > 0)
                                    <ol class="dd-list">
                                        @foreach($menu->children as $child)
                                            <li class="dd-item" data-id="{{ $child->id }}">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    <div>
                                                        @if($child->icon) <i class="{{ $child->icon }} me-2"></i> @endif
                                                        {{ $child->title }}
                                                        <small class="ms-2 text-muted">({{ $child->url }})</small>
                                                    </div>
                                                    <div class="dd-nodrag">
                                                        @if($child->is_active) <span class="badge bg-success">Aktif</span> @else <span class="badge bg-danger">Inaktif</span> @endif
                                                        <button type="button" class="btn btn-sm btn-warning py-0 px-1 ms-2" data-bs-toggle="modal" data-bs-target="#editMenuModal{{ $child->id }}">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <form action="{{ route('menus.destroy', $child->id) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('Yakin hapus?')">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger py-0 px-1"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Edit Modal Child -->
                                                <div class="modal fade" id="editMenuModal{{ $child->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('menus.update', $child->id) }}" method="POST">
                                                            @csrf @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Menu</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label>Tipe</label>
                                                                        <select name="type" class="form-select" required>
                                                                            <option value="menu" {{ $child->type == 'menu' ? 'selected' : '' }}>Menu Link</option>
                                                                            <option value="header" {{ $child->type == 'header' ? 'selected' : '' }}>Group Header</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Judul</label>
                                                                        <input type="text" name="title" class="form-control" value="{{ $child->title }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>URL</label>
                                                                        <input type="text" name="url" class="form-control" value="{{ $child->url }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Ikon (Bootstrap Icons)</label>
                                                                        <input type="text" name="icon" class="form-control" value="{{ $child->icon }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Hak Akses (Roles Allowed)</label>
                                                                        <div>
                                                                            @php $allowedChild = $child->roles_allowed ?? []; @endphp
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="superadmin" {{ in_array('superadmin', $allowedChild) ? 'checked' : '' }}>
                                                                                <label class="form-check-label">Superadmin</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="admin" {{ in_array('admin', $allowedChild) ? 'checked' : '' }}>
                                                                                <label class="form-check-label">Admin</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" name="roles_allowed[]" value="markom" {{ in_array('markom', $allowedChild) ? 'checked' : '' }}>
                                                                                <label class="form-check-label">Markom</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $child->is_active ? 'checked' : '' }}>
                                                                            <label class="form-check-label">Aktif</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#nestable').nestable({
        maxDepth: 2
    });

    $('#saveOrderBtn').click(function() {
        var structure = window.JSON.stringify($('#nestable').nestable('serialize'));
        $('#menuStructure').val(structure);
        $('#reorderForm').submit();
    });
});
</script>
@endpush
