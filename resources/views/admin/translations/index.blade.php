@extends('layouts.admin')

@section('title', 'Manajemen Bahasa & Teks Halaman - Admin Panel')
@section('page_title', 'Manajemen Teks (Bahasa)')
@section('content_class', 'p-0')
@section('content_style', 'display:flex; flex-direction:column; height:calc(100vh - 0px);')
@section('header_class', 'px-4 pt-3')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="translations-layout flex-grow-1" style="display: flex; overflow: hidden; margin-top: 0;">

    <!-- ===== LEFT: Translation Editor ===== -->
    <div id="editorPanel" class="border-end bg-white d-flex flex-column" style="width: 380px; min-width: 280px; max-width: 500px; flex-shrink: 0; overflow: hidden;">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0 fw-bold">Teks Halaman (ID / EN)</h6>
                <small class="text-muted">Ubah teks dan lihat preview di kanan.</small>
            </div>
            <div class="d-flex gap-1">
                <button type="button" class="btn btn-xs btn-outline-secondary" id="undoBtn" disabled title="Undo (Ctrl+Z)">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </button>
                <button type="button" class="btn btn-xs btn-outline-secondary" id="redoBtn" disabled title="Redo (Ctrl+Y)">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>

        <div class="p-3 border-bottom">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Cari teks atau kunci...">
            </div>
        </div>

        <div class="flex-grow-1 overflow-auto">
            <form action="{{ url('admin/translations') }}" method="POST" id="translationForm">
                @csrf
                @method('PUT')

                <div class="accordion accordion-flush" id="translationAccordion">
                    @foreach($groupedTranslations as $groupKey => $translations)
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed py-2 px-3 small" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $groupKey }}">
                                <span class="fw-bold">{{ $groupLabels[$groupKey] ?? ucfirst($groupKey) }}</span>
                                <span class="badge bg-secondary ms-2" style="font-size: 0.6rem;">{{ count($translations) }}</span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $groupKey }}" class="accordion-collapse collapse" data-bs-parent="#translationAccordion">
                            <div class="accordion-body p-0">
                                <table class="table table-sm mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-3" style="font-size: 0.65rem; width: 30%;">KEY</th>
                                            <th style="font-size: 0.65rem;">ID</th>
                                            <th style="font-size: 0.65rem;">EN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($translations as $key => $texts)
                                        <tr class="translation-row" data-key="{{ $key }}">
                                            <td class="ps-3 align-top py-1">
                                                <code class="edit-key-trigger" data-key="{{ $key }}" style="font-size: 0.6rem; word-break: break-all; cursor: pointer; color: #0d6efd; text-decoration: underline dotted;">{{ $key }}</code>
                                            </td>
                                            <td class="py-1">
                                                <textarea name="translations[{{ $key }}][id]" class="form-control form-control-sm trans-input p-1" rows="1" data-key="{{ $key }}" data-lang="id" style="font-size: 0.75rem;">{{ $texts['id'] }}</textarea>
                                            </td>
                                            <td class="py-1 pe-2">
                                                <textarea name="translations[{{ $key }}][en]" class="form-control form-control-sm trans-input p-1" rows="1" data-key="{{ $key }}" data-lang="en" style="font-size: 0.75rem;">{{ $texts['en'] }}</textarea>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3 border-top">
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-save me-1"></i> Simpan Semua Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Resizer Handle -->
    <div id="resizerHandle" style="width: 5px; background: #dee2e6; cursor: col-resize; flex-shrink: 0; transition: background 0.2s;"
         onmouseover="this.style.background='#0d6efd'" onmouseout="this.style.background='#dee2e6'"></div>

    <!-- ===== RIGHT: Dual Preview ===== -->
    <div class="flex-grow-1 d-flex flex-column bg-light overflow-hidden">

        <!-- Shared page selector -->
        <div class="border-bottom bg-white px-3 py-2 d-flex align-items-center gap-3 justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-eye text-primary"></i>
                <span class="fw-bold small">Live Preview</span>
                <div class="vr"></div>
                <select id="previewPageSelect" class="form-select form-select-sm" style="width: 160px;">
                    <option value="/">Home Page</option>
                    <option value="/about">About Us</option>
                    <option value="/products">Products</option>
                    <option value="/businesses">Businesses</option>
                    <option value="/stores">Stores</option>
                    <option value="/news">News & Events</option>
                    <option value="/download">Downloads</option>
                    <option value="/career">Careers</option>
                    <option value="/equipment">Equipment</option>
                    <option value="/foodservice">Food Service</option>
                    <option value="/contact">Contact</option>
                    <option value="/privacy">Privacy Policy</option>
                    <option value="/terms">Terms & Conditions</option>
                </select>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-sm btn-outline-secondary" id="toggleKeysBtn" title="Show/Hide Translation Keys on Preview">
                    <i class="bi bi-tag"></i> Show Keys
                </button>
                <button class="btn btn-sm btn-outline-secondary" id="syncScrollBtn" title="Sync scroll both previews">
                    <i class="bi bi-link-45deg"></i> Sync Scroll
                </button>
            </div>
        </div>

        <!-- Two preview panels side by side -->
        <div class="flex-grow-1 d-flex overflow-hidden">

            <!-- Preview: Bahasa Indonesia -->
            <div class="preview-panel d-flex flex-column border-end" style="flex: 1; overflow: hidden;" data-lang="id" data-locale="id">
                <div class="preview-toolbar px-2 py-1 bg-white border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger" style="font-size: 0.65rem;">🇮🇩 Bahasa Indonesia</span>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-xs btn-outline-secondary device-toggle active" data-device="desktop" data-panel="id" title="Desktop (1280px)">
                                <i class="bi bi-display"></i>
                            </button>
                            <button class="btn btn-xs btn-outline-secondary device-toggle" data-device="tablet" data-panel="id" title="Tablet (768px)">
                                <i class="bi bi-tablet"></i>
                            </button>
                            <button class="btn btn-xs btn-outline-secondary device-toggle" data-device="mobile" data-panel="id" title="Mobile (375px)">
                                <i class="bi bi-phone"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span class="badge bg-light text-dark border res-badge" style="font-size: 0.6rem;">1280px</span>
                        <button class="btn btn-xs btn-outline-secondary reload-btn" data-panel="id" title="Reload"><i class="bi bi-arrow-clockwise"></i></button>
                    </div>
                </div>
                <div class="iframe-scaler-wrap flex-grow-1 overflow-hidden d-flex justify-content-center bg-secondary bg-opacity-10 p-2">
                    <div class="iframe-scaler" style="transform-origin: top center; width: 1280px;">
                        <iframe class="preview-iframe" data-panel="id"
                            src="{{ url('/') }}?preview=1&preview_locale=id"
                            style="width: 1280px; height: 100vh; border: 0; display: block;"></iframe>
                    </div>
                </div>
            </div>

            <!-- Preview: Bahasa Inggris -->
            <div class="preview-panel d-flex flex-column" style="flex: 1; overflow: hidden;" data-lang="en" data-locale="en">
                <div class="preview-toolbar px-2 py-1 bg-white border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary" style="font-size: 0.65rem;">🇬🇧 English</span>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-xs btn-outline-secondary device-toggle active" data-device="desktop" data-panel="en" title="Desktop (1280px)">
                                <i class="bi bi-display"></i>
                            </button>
                            <button class="btn btn-xs btn-outline-secondary device-toggle" data-device="tablet" data-panel="en" title="Tablet (768px)">
                                <i class="bi bi-tablet"></i>
                            </button>
                            <button class="btn btn-xs btn-outline-secondary device-toggle" data-device="mobile" data-panel="en" title="Mobile (375px)">
                                <i class="bi bi-phone"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span class="badge bg-light text-dark border res-badge" style="font-size: 0.6rem;">1280px</span>
                        <button class="btn btn-xs btn-outline-secondary reload-btn" data-panel="en" title="Reload"><i class="bi bi-arrow-clockwise"></i></button>
                    </div>
                </div>
                <div class="iframe-scaler-wrap flex-grow-1 overflow-hidden d-flex justify-content-center bg-secondary bg-opacity-10 p-2">
                    <div class="iframe-scaler" style="transform-origin: top center; width: 1280px;">
                        <iframe class="preview-iframe" data-panel="en"
                            src="{{ url('/') }}?preview=1&preview_locale=en"
                            style="width: 1280px; height: 100vh; border: 0; display: block;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Translation Modal -->
<div class="modal fade" id="editTranslationModal" tabindex="-1" aria-labelledby="editTranslationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editTranslationModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>Edit Terjemahan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-bold text-muted small text-uppercase">Key Teks</label>
                    <div class="p-2 bg-light rounded border">
                        <code id="modalTranslationKey" class="text-primary fw-bold"></code>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="modalInputID" class="form-label fw-bold">Bahasa Indonesia (ID)</label>
                        <textarea id="modalInputID" class="form-control" rows="8" placeholder="Masukkan teks dalam Bahasa Indonesia..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="modalInputEN" class="form-label fw-bold">Bahasa Inggris (EN)</label>
                        <textarea id="modalInputEN" class="form-control" rows="8" placeholder="Enter text in English..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-top">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary px-4 shadow-sm" id="saveModalBtn">
                    <i class="bi bi-check2-circle me-1"></i> Terapkan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.btn-xs { padding: 0.15rem 0.35rem; font-size: 0.7rem; border-radius: 0.2rem; }
.trans-input { resize: none; overflow: hidden; min-height: 28px; }
.trans-input:focus { min-height: 60px; overflow-y: auto; z-index: 10; position: relative; }
.translation-row:hover td { background-color: #f0f7ff; }
.accordion-button:not(.collapsed) { background-color: #e7f1ff; color: #0c63e4; }
.accordion-button::after { width: 0.9rem; height: 0.9rem; background-size: 0.9rem; }
.preview-panel { transition: flex 0.3s ease; }
.device-toggle.active { background-color: #0d6efd; color: white; border-color: #0d6efd; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.trans-input');
    const searchInput = document.getElementById('searchInput');
    const undoBtn = document.getElementById('undoBtn');
    const redoBtn = document.getElementById('redoBtn');
    const previewPageSelect = document.getElementById('previewPageSelect');
    const syncScrollBtn = document.getElementById('syncScrollBtn');

    // ===== Device config =====
    const devices = {
        desktop: { width: 1280, label: '1280px' },
        tablet:  { width: 768,  label: '768px'  },
        mobile:  { width: 375,  label: '375px'  },
    };

    // ===== Apply device sizing =====
    function applyDevice(panelId, device) {
        const panel = document.querySelector(`.preview-panel[data-lang="${panelId}"]`);
        if (!panel) return;

        const wrap = panel.querySelector('.iframe-scaler-wrap');
        const scaler = panel.querySelector('.iframe-scaler');
        const iframe = panel.querySelector('.preview-iframe');
        const badge = panel.querySelector('.res-badge');
        const targetWidth = devices[device].width;

        iframe.style.width = targetWidth + 'px';
        scaler.style.width = targetWidth + 'px';

        const wrapWidth = wrap.clientWidth;
        const scale = Math.min(1, wrapWidth / targetWidth);
        scaler.style.transform = `scale(${scale})`;
        scaler.style.transformOrigin = 'top center';
        // Adjust wrap min-height so scaled content doesn't overflow
        scaler.style.height = (window.innerHeight * 0.8) + 'px';

        badge.innerText = devices[device].label;
    }

    // ===== Device toggle buttons =====
    document.querySelectorAll('.device-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const panelId = btn.dataset.panel;
            const device = btn.dataset.device;
            // Update active state in this panel only
            document.querySelectorAll(`.device-toggle[data-panel="${panelId}"]`).forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyDevice(panelId, device);
        });
    });

    // Apply defaults on load
    function initPanels() {
        applyDevice('id', 'desktop');
        applyDevice('en', 'desktop');
    }
    initPanels();
    window.addEventListener('resize', initPanels);

    // ===== Reload buttons =====
    document.querySelectorAll('.reload-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const panelId = btn.dataset.panel;
            const iframe = document.querySelector(`.preview-iframe[data-panel="${panelId}"]`);
            if (iframe) iframe.contentWindow.location.reload();
        });
    });

    // ===== Page selector (both iframes) =====
    previewPageSelect.addEventListener('change', () => {
        const page = previewPageSelect.value;
        document.querySelectorAll('.preview-iframe').forEach(iframe => {
            const locale = iframe.dataset.panel;
            iframe.src = `${window.location.origin}${page}?preview=1&preview_locale=${locale}`;
        });
    });

    // ===== Toggle Keys on Preview =====
    const toggleKeysBtn = document.getElementById('toggleKeysBtn');
    let keysVisible = false;

    toggleKeysBtn.addEventListener('click', () => {
        keysVisible = !keysVisible;
        toggleKeysBtn.classList.toggle('btn-primary', keysVisible);
        toggleKeysBtn.classList.toggle('btn-outline-secondary', !keysVisible);
        toggleKeysBtn.innerHTML = keysVisible ? '<i class="bi bi-tag-fill"></i> Hide Keys' : '<i class="bi bi-tag"></i> Show Keys';

        document.querySelectorAll('.preview-iframe').forEach(iframe => {
            if (iframe.contentWindow) {
                iframe.contentWindow.postMessage({
                    type: 'toggleKeys',
                    show: keysVisible
                }, '*');
            }
        });
    });

    // Re-apply toggle state when iframe loads
    document.querySelectorAll('.preview-iframe').forEach(iframe => {
        iframe.addEventListener('load', () => {
            if (keysVisible && iframe.contentWindow) {
                iframe.contentWindow.postMessage({
                    type: 'toggleKeys',
                    show: true
                }, '*');
            }
        });
    });

    // ===== Sync Scroll =====
    let syncEnabled = false;
    syncScrollBtn.addEventListener('click', () => {
        syncEnabled = !syncEnabled;
        syncScrollBtn.classList.toggle('btn-primary', syncEnabled);
        syncScrollBtn.classList.toggle('btn-outline-secondary', !syncEnabled);
    });

    document.querySelectorAll('.preview-iframe').forEach(iframe => {
        iframe.addEventListener('load', () => {
            if (!syncEnabled) return;
            try {
                iframe.contentWindow.addEventListener('scroll', () => {
                    if (!syncEnabled) return;
                    const scrollY = iframe.contentWindow.scrollY;
                    document.querySelectorAll('.preview-iframe').forEach(other => {
                        if (other !== iframe) {
                            try { other.contentWindow.scrollTo(0, scrollY); } catch(e) {}
                        }
                    });
                });
            } catch(e) {}
        });
    });

    // ===== Undo/Redo =====
    let history = [];
    let historyIndex = -1;
    const MAX_HISTORY = 50;

    function captureState() {
        const state = {};
        inputs.forEach(input => { state[input.name] = input.value; });
        return state;
    }

    function saveToHistory() {
        if (historyIndex < history.length - 1) history = history.slice(0, historyIndex + 1);
        history.push(captureState());
        if (history.length > MAX_HISTORY) history.shift();
        historyIndex = history.length - 1;
        updateHistoryButtons();
    }

    function updateHistoryButtons() {
        undoBtn.disabled = historyIndex <= 0;
        redoBtn.disabled = historyIndex >= history.length - 1;
    }

    function applyState(state) {
        for (const name in state) {
            const input = document.querySelector(`[name="${name}"]`);
            if (input) input.value = state[name];
        }
    }

    undoBtn.addEventListener('click', () => { if (historyIndex > 0) { historyIndex--; applyState(history[historyIndex]); updateHistoryButtons(); } });
    redoBtn.addEventListener('click', () => { if (historyIndex < history.length - 1) { historyIndex++; applyState(history[historyIndex]); updateHistoryButtons(); } });

    document.addEventListener('keydown', e => {
        if (e.ctrlKey && e.key === 'z') { e.preventDefault(); undoBtn.click(); }
        if (e.ctrlKey && e.key === 'y') { e.preventDefault(); redoBtn.click(); }
    });

    saveToHistory();
    let debounceTimer;
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(saveToHistory, 600);
        });
    });

    // ===== Search =====
    searchInput.addEventListener('input', () => {
        const term = searchInput.value.toLowerCase();
        document.querySelectorAll('.accordion-item').forEach(item => {
            let hasMatch = false;
            item.querySelectorAll('.translation-row').forEach(row => {
                const key = row.dataset.key.toLowerCase();
                const idVal = row.querySelector('[data-lang="id"]').value.toLowerCase();
                const enVal = row.querySelector('[data-lang="en"]').value.toLowerCase();
                const match = !term || key.includes(term) || idVal.includes(term) || enVal.includes(term);
                row.style.display = match ? '' : 'none';
                if (match) hasMatch = true;
            });
            item.style.display = (!term || hasMatch) ? '' : 'none';
            if (term && hasMatch) {
                const collapse = item.querySelector('.accordion-collapse');
                bootstrap.Collapse.getOrCreateInstance(collapse).show();
            }
        });
    });

    // ===== Editor Panel Resize Handle =====
    const resizerHandle = document.getElementById('resizerHandle');
    const editorPanel = document.getElementById('editorPanel');
    let isResizing = false;

    resizerHandle.addEventListener('mousedown', e => {
        isResizing = true;
        document.body.style.cursor = 'col-resize';
        document.body.style.userSelect = 'none';
    });
    document.addEventListener('mousemove', e => {
        if (!isResizing) return;
        const newWidth = Math.max(280, Math.min(600, e.clientX));
        editorPanel.style.width = newWidth + 'px';
        initPanels();
    });
    document.addEventListener('mouseup', () => {
        isResizing = false;
        document.body.style.cursor = '';
        document.body.style.userSelect = '';
    });

    // ===== Modal Logic =====
    const editModal = new bootstrap.Modal(document.getElementById('editTranslationModal'));
    const modalKeyLabel = document.getElementById('modalTranslationKey');
    const modalInputID = document.getElementById('modalInputID');
    const modalInputEN = document.getElementById('modalInputEN');
    const saveModalBtn = document.getElementById('saveModalBtn');
    let currentEditingKey = null;

    document.querySelectorAll('.edit-key-trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            currentEditingKey = trigger.dataset.key;
            const row = trigger.closest('.translation-row');
            const idTextarea = row.querySelector('[data-lang="id"]');
            const enTextarea = row.querySelector('[data-lang="en"]');

            modalKeyLabel.innerText = currentEditingKey;
            modalInputID.value = idTextarea.value;
            modalInputEN.value = enTextarea.value;

            editModal.show();
        });
    });

    saveModalBtn.addEventListener('click', () => {
        if (!currentEditingKey) return;

        const row = document.querySelector(`.translation-row[data-key="${currentEditingKey}"]`);
        if (row) {
            const idTextarea = row.querySelector('[data-lang="id"]');
            const enTextarea = row.querySelector('[data-lang="en"]');

            idTextarea.value = modalInputID.value;
            enTextarea.value = modalInputEN.value;

            // Trigger updates
            updateLivePreview(idTextarea);
            updateLivePreview(enTextarea);
            saveToHistory();
            
            // Highlight the row briefly
            row.classList.add('bg-warning', 'bg-opacity-25');
            setTimeout(() => row.classList.remove('bg-warning', 'bg-opacity-25'), 2000);
        }

        editModal.hide();
    });
});
</script>
@endpush
@endsection
