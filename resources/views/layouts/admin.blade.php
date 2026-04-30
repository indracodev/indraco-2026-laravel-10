<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - INDRACO')</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #343a40; color: #fff; }
        .sidebar a { color: #adb5bd; text-decoration: none; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background-color: rgba(255,255,255,0.1); }
        .sidebar-header { font-size: 0.85rem; text-transform: uppercase; color: #ced4da; font-weight: bold; margin-top: 1.5rem; margin-bottom: 0.5rem; padding: 0 1rem; }
        /* Summernote adjustment for Bootstrap 5 */
        .note-editable { background-color: #fff !important; }
        /* Nestable */
        .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 100%; list-style: none; font-size: 14px; line-height: 20px; }
        .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
        .dd-list .dd-list { padding-left: 30px; }
        .dd-collapsed .dd-list { display: none; }
        .dd-item, .dd-empty, .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 14px; line-height: 20px; }
        .dd-handle { display: block; margin: 5px 0; padding: 10px 15px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc; background: #fafafa; border-radius: 3px; cursor: grab; }
        .dd-handle:hover { color: #2ea8e5; background: #fff; }
        .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 10px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
        .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
        .dd-item > button[data-action="collapse"]:before { content: '-'; }
        .dd-placeholder, .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
        .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5; background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff); background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff); background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff); background-size: 60px 60px; background-position: 0 0, 30px 30px; }
        .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
        .dd-dragel > .dd-item .dd-handle { margin-top: 0; cursor: grabbing; }
        .dd-dragel .dd-handle { box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1); }
    </style>
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" style="width: 250px;">
            <h4 class="text-center mb-4">INDRACO</h4>
            <ul class="nav flex-column">
                @php
                    $role = auth()->user()->role ?? 'superadmin';
                    $menus = \App\Models\AdminMenu::getTreeForRole($role);
                @endphp

                @foreach($menus as $menu)
                    @if($menu->type == 'header')
                        @if(count($menu->children_list) > 0)
                            @php
                                $isActive = false;
                                foreach($menu->children_list as $child) {
                                    if($child->url && request()->is(trim($child->url, '/').'*')) {
                                        $isActive = true;
                                        break;
                                    }
                                }
                            @endphp
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded px-3 py-2 mb-1 d-flex justify-content-between align-items-center {{ $isActive ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#menu-{{ $menu->id }}" style="cursor: pointer; color: #ced4da;">
                                    <div class="text-uppercase fw-bold" style="font-size: 0.85rem;">
                                        @if($menu->icon) <i class="{{ $menu->icon }} me-2"></i> @endif
                                        {{ $menu->title }}
                                    </div>
                                    <i class="bi bi-chevron-down small"></i>
                                </a>
                                <div class="collapse {{ $isActive ? 'show' : '' }}" id="menu-{{ $menu->id }}">
                                    <ul class="nav flex-column ms-3">
                                        @foreach($menu->children_list as $child)
                                            <li class="nav-item">
                                                <a class="nav-link rounded px-3 py-2 mb-2 {{ request()->is(trim($child->url, '/').'*') ? 'active' : '' }}" href="{{ url($child->url ?? '#') }}">
                                                    @if($child->icon) <i class="{{ $child->icon }} me-2"></i> @endif
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="sidebar-header">{{ $menu->title }}</li>
                        @endif
                    @else
                        @if(count($menu->children_list) > 0)
                            @php
                                $isActive = false;
                                foreach($menu->children_list as $child) {
                                    if($child->url && request()->is(trim($child->url, '/').'*')) {
                                        $isActive = true;
                                        break;
                                    }
                                }
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link rounded px-3 py-2 mb-2 d-flex justify-content-between align-items-center {{ $isActive ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#menu-{{ $menu->id }}">
                                    <div>
                                        @if($menu->icon) <i class="{{ $menu->icon }} me-2"></i> @endif
                                        {{ $menu->title }}
                                    </div>
                                    <i class="bi bi-chevron-down small"></i>
                                </a>
                                <div class="collapse {{ $isActive ? 'show' : '' }}" id="menu-{{ $menu->id }}">
                                    <ul class="nav flex-column ms-3">
                                        @foreach($menu->children_list as $child)
                                            <li class="nav-item">
                                                <a class="nav-link rounded px-3 py-2 mb-2 {{ request()->is(trim($child->url, '/').'*') ? 'active' : '' }}" href="{{ url($child->url ?? '#') }}">
                                                    @if($child->icon) <i class="{{ $child->icon }} me-2"></i> @endif
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link rounded px-3 py-2 mb-2 {{ request()->is(trim($menu->url, '/').'*') && $menu->url != '/' ? 'active' : '' }}" href="{{ url($menu->url ?? '#') }}" {!! $menu->url == '/' ? 'target="_blank"' : '' !!}>
                                    @if($menu->icon) <i class="{{ $menu->icon }} me-2"></i> @endif
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

                <li class="nav-item mt-4">
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline w-100">
                        @csrf
                        <button type="submit" class="nav-link text-warning rounded px-3 py-2 w-100 text-start border-0 bg-transparent">
                            <i class="bi bi-box-arrow-left me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        
        <div class="flex-grow-1 @yield('content_class', 'p-4')" style="@yield('content_style', '') min-width:0; overflow:hidden;">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom @yield('header_class', '')">
                <h2 class="h4 mb-0">@yield('page_title', 'Dashboard')</h2>
                <div>
                    @if(session('original_user_id'))
                        <a href="{{ route('admin.users.impersonate.leave') }}" class="btn btn-sm btn-warning me-3">Kembali ke Akun Asli</a>
                    @endif
                    <span class="me-3">Halo, <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})</span>
                    <form action="{{ url('admin/logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </div>
            </div>
            
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    @stack('scripts')
</body>
</html>
