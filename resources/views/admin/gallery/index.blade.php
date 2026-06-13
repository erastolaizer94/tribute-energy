@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b; }

    .view-toggle { display:flex;background:#f1f5f9;border-radius:8px;padding:3px; }
    .view-btn { padding:5px 12px;border:none;background:transparent;border-radius:6px;cursor:pointer;color:#64748b;transition:all 0.15s;font-family:inherit;display:flex;align-items:center;gap:5px;font-size:0.8125rem;font-weight:600; }
    .view-btn.active,.view-btn:hover { background:#fff;color:#FF6B00;box-shadow:0 1px 3px rgba(0,0,0,0.08); }
    .view-btn svg { width:14px;height:14px; }

    .card { background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden; }
    .card-toolbar { display:flex;align-items:center;justify-content:space-between;padding:1.125rem 1.5rem;border-bottom:1px solid #f1f5f9;flex-wrap:wrap;gap:0.75rem; }
    .search-box { position:relative;display:flex;align-items:center; }
    .search-box svg { position:absolute;left:11px;width:15px;height:15px;color:#94a3b8;pointer-events:none; }
    .search-box input { padding:0.5625rem 0.875rem 0.5625rem 2.125rem;border:1px solid #e2e8f0;border-radius:8px;font-size:0.8125rem;color:#374151;outline:none;width:220px;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s; }
    .search-box input:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .filter-row { display:flex;gap:6px;flex-wrap:wrap; }
    .filter-btn { padding:0.4375rem 0.875rem;font-size:0.8125rem;font-weight:600;border:1px solid #e2e8f0;border-radius:7px;background:#fff;color:#64748b;cursor:pointer;transition:all 0.15s;font-family:inherit; }
    .filter-btn:hover,.filter-btn.active { border-color:#FF8C00;color:#FF6B00;background:rgba(255,140,0,0.06); }

    /* Grid View */
    .gallery-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1.25rem;padding:1.5rem; }
    .gallery-card { border-radius:10px;overflow:hidden;border:1px solid #e2e8f0;transition:all 0.2s;position:relative; }
    .gallery-card:hover { box-shadow:0 8px 24px rgba(0,0,0,0.12);transform:translateY(-2px); }
    .gallery-thumb { width:100%;height:180px;object-fit:cover;background:#f1f5f9;display:block; }
    .gallery-thumb-placeholder { width:100%;height:180px;background:linear-gradient(135deg,#f1f5f9,#e2e8f0);display:flex;align-items:center;justify-content:center; }
    .gallery-thumb-placeholder svg { width:40px;height:40px;color:#cbd5e1; }
    .gallery-card-body { padding:0.875rem; }
    .gallery-card-title { font-size:0.875rem;font-weight:700;color:#1e293b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis; }
    .gallery-card-cat { font-size:0.75rem;color:#94a3b8;margin-top:2px;text-transform:capitalize; }
    .gallery-card-actions { display:flex;gap:6px;margin-top:0.75rem; }
    .gallery-featured-badge { position:absolute;top:8px;left:8px;background:#FF8C00;color:#fff;font-size:10px;font-weight:700;padding:2px 7px;border-radius:20px; }
    .gallery-status-badge { position:absolute;top:8px;right:8px;font-size:10px;font-weight:700;padding:2px 7px;border-radius:20px; }
    .status-active { background:#dcfce7;color:#15803d; }
    .status-inactive { background:#f1f5f9;color:#94a3b8; }

    /* Table View */
    .table-wrap { overflow-x:auto; }
    .data-table { width:100%;border-collapse:collapse; }
    .data-table th { text-align:left;padding:0.75rem 1.5rem;font-size:0.6875rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#94a3b8;border-bottom:1px solid #f1f5f9;white-space:nowrap; }
    .data-table td { padding:1rem 1.5rem;font-size:0.875rem;color:#374151;border-bottom:1px solid #f8fafc;vertical-align:middle; }
    .data-table tr:last-child td { border-bottom:none; }
    .data-table tbody tr:hover td { background:#fafafa; }

    .badge { display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:600;padding:3px 9px;border-radius:20px;white-space:nowrap; }
    .badge-green { background:#dcfce7;color:#15803d; } .badge-gray { background:#f1f5f9;color:#94a3b8; }
    .badge-orange { background:rgba(255,140,0,0.1);color:#c2410c; }

    .action-btn { display:inline-flex;align-items:center;gap:4px;padding:5px 11px;border-radius:7px;font-size:0.8125rem;font-weight:600;text-decoration:none;border:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .action-edit { background:#eff6ff;color:#1d4ed8; } .action-edit:hover { background:#dbeafe; }
    .action-delete { background:#fee2e2;color:#b91c1c; } .action-delete:hover { background:#fecaca; }
    .action-btn svg { width:12px;height:12px; }

    .btn-primary { display:inline-flex;align-items:center;gap:7px;padding:0.5625rem 1.125rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:700;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.3);transform:translateY(-1px); }
    .btn-primary svg { width:15px;height:15px; }

    .table-footer { padding:1rem 1.5rem;border-top:1px solid #f1f5f9;font-size:0.8125rem;color:#94a3b8;display:flex;justify-content:space-between;align-items:center; }
    .alert-success { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;display:flex;align-items:center;gap:0.75rem;background:#dcfce7;color:#15803d;border:1px solid #bbf7d0; }
    .alert-success svg { width:16px;height:16px;flex-shrink:0; }
    .empty-state { padding:3.5rem 2rem;text-align:center;color:#94a3b8; }
    .empty-state svg { width:48px;height:48px;margin:0 auto 0.875rem;color:#e2e8f0; }
    .empty-state h3 { font-size:1rem;font-weight:700;color:#475569;margin-bottom:0.25rem; }
</style>
@endpush

@section('content')
@if(session('success'))
<div class="alert-success">
    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    {{ session('success') }}
</div>
@endif

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span> <span style="color:#0f172a;">Gallery</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Gallery</h1>
        <p class="page-description">{{ $gallery->count() }} images</p>
    </div>
    <div style="display:flex;align-items:center;gap:0.75rem;">
        <div class="view-toggle">
            <button class="view-btn active" id="btnGrid" onclick="switchView('grid')">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Grid
            </button>
            <button class="view-btn" id="btnTable" onclick="switchView('table')">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                List
            </button>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="btn-primary">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Image
        </a>
    </div>
</div>

<div class="card">
    <div class="card-toolbar">
        <div class="search-box">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="gallerySearch" placeholder="Search images…" oninput="filterGallery()">
        </div>
        <div class="filter-row">
            <button class="filter-btn active" onclick="setCatFilter('all',this)">All</button>
            @foreach(['installations','commercial','residential','agricultural','industrial','community','general'] as $cat)
                <button class="filter-btn" onclick="setCatFilter('{{ $cat }}',this)">{{ ucfirst($cat) }}</button>
            @endforeach
        </div>
    </div>

    {{-- Grid View --}}
    <div id="galleryGrid" class="gallery-grid">
        @forelse($gallery as $item)
        <div class="gallery-card" data-title="{{ strtolower($item->title) }}" data-cat="{{ $item->category }}">
            @if($item->is_featured)<span class="gallery-featured-badge">⭐ Featured</span>@endif
            <span class="gallery-status-badge {{ $item->is_active ? 'status-active' : 'status-inactive' }}">{{ $item->is_active ? 'Active' : 'Inactive' }}</span>
            @if($item->image)
                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="gallery-thumb" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <div class="gallery-thumb-placeholder" style="display:none;"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
            @else
                <div class="gallery-thumb-placeholder"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
            @endif
            <div class="gallery-card-body">
                <div class="gallery-card-title">{{ $item->title }}</div>
                <div class="gallery-card-cat">{{ $item->category ?? 'General' }} · Order {{ $item->order }}</div>
                <div class="gallery-card-actions">
                    <a href="{{ route('admin.gallery.edit', $item) }}" class="action-btn action-edit" style="flex:1;justify-content:center;">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" style="flex:1;">
                        @csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete" style="width:100%;justify-content:center;"
                                onclick="return confirm('Delete this image?')">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1;">
            <div class="empty-state">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <h3>No gallery images yet</h3>
                <p>Start building your gallery.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn-primary" style="margin-top:1rem;display:inline-flex;">Add Image</a>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Table View --}}
    <div id="galleryTable" style="display:none;">
        <div class="table-wrap">
            <table class="data-table" id="galleryTableEl">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gallery as $item)
                    <tr data-title="{{ strtolower($item->title) }}" data-cat="{{ $item->category }}">
                        <td>
                            <div style="width:54px;height:54px;border-radius:8px;overflow:hidden;background:#f1f5f9;flex-shrink:0;">
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none'">
                                @endif
                            </div>
                        </td>
                        <td>
                            <div style="font-weight:600;color:#1e293b;">{{ $item->title }}</div>
                            <div style="font-size:0.75rem;color:#94a3b8;margin-top:1px;">{{ Str::limit($item->description ?? '', 40) }}</div>
                        </td>
                        <td><span style="text-transform:capitalize;color:#64748b;">{{ $item->category ?? 'General' }}</span></td>
                        <td style="color:#64748b;">{{ $item->order }}</td>
                        <td>
                            <div style="display:flex;gap:4px;flex-wrap:wrap;">
                                @if($item->is_active) <span class="badge badge-green">Active</span> @else <span class="badge badge-gray">Inactive</span> @endif
                                @if($item->is_featured) <span class="badge badge-orange">⭐ Featured</span> @endif
                            </div>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.gallery.edit', $item) }}" class="action-btn action-edit">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="action-btn action-delete" onclick="return confirm('Delete this image?')">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6"><div class="empty-state">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <h3>No gallery images</h3>
                    </div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="table-footer">
        <span>Showing <strong id="visibleCount">{{ $gallery->count() }}</strong> of {{ $gallery->count() }} images</span>
    </div>
</div>

<script>
let catFilter = 'all', currentView = 'grid';

function switchView(v) {
    currentView = v;
    document.getElementById('galleryGrid').style.display  = v === 'grid'  ? 'grid'  : 'none';
    document.getElementById('galleryTable').style.display = v === 'table' ? 'block' : 'none';
    document.getElementById('btnGrid').classList.toggle('active', v === 'grid');
    document.getElementById('btnTable').classList.toggle('active', v === 'table');
}

function setCatFilter(cat, btn) {
    catFilter = cat;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filterGallery();
}

function filterGallery() {
    const q = document.getElementById('gallerySearch').value.toLowerCase();
    const gridCards = document.querySelectorAll('#galleryGrid .gallery-card');
    const tableRows = document.querySelectorAll('#galleryTableEl tbody tr[data-title]');
    let n = 0;

    function test(el) {
        const title = el.dataset.title, cat = el.dataset.cat;
        const mQ = !q || title.includes(q);
        const mC = catFilter === 'all' || cat === catFilter;
        return mQ && mC;
    }

    gridCards.forEach(el => { const show = test(el); el.style.display = show ? '' : 'none'; if(show) n++; });
    tableRows.forEach(el => { el.style.display = test(el) ? '' : 'none'; });
    document.getElementById('visibleCount').textContent = n;
}
</script>
@endsection
