@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b; }
    .form-layout { display:grid;grid-template-columns:1fr;gap:1.25rem; }
    @media(min-width:1024px) { .form-layout { grid-template-columns:2fr 1fr; } }
    .card { background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden; }
    .card-header { padding:1.125rem 1.5rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:0.75rem; }
    .card-header-icon { width:32px;height:32px;border-radius:8px;background:rgba(255,140,0,0.1);display:flex;align-items:center;justify-content:center; }
    .card-header-icon svg { width:16px;height:16px;color:#FF8C00; }
    .card-title { font-size:0.9375rem;font-weight:700;color:#0f172a; }
    .card-body { padding:1.5rem; }
    .form-group { margin-bottom:1.25rem; } .form-group:last-child { margin-bottom:0; }
    .form-label { display:block;font-size:0.8125rem;font-weight:600;color:#374151;margin-bottom:0.4rem; }
    .req { color:#ef4444; }
    .form-hint { font-size:0.75rem;color:#94a3b8;margin-top:0.3rem; }
    .form-input,.form-select,.form-textarea { width:100%;padding:0.5625rem 0.875rem;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;color:#1e293b;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s;background:#fff;outline:none; }
    .form-input:focus,.form-select:focus,.form-textarea:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .form-textarea { resize:vertical;min-height:100px; }
    .form-grid-2 { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
    .checkbox-group { display:flex;flex-direction:column;gap:0.625rem; }
    .checkbox-item { display:flex;align-items:flex-start;gap:0.75rem;padding:0.75rem;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;transition:all 0.15s; }
    .checkbox-item:hover { border-color:#FF8C00;background:rgba(255,140,0,0.03); }
    .checkbox-item input { width:16px;height:16px;accent-color:#FF8C00;cursor:pointer;margin-top:2px; }
    .checkbox-item-label { font-size:0.8125rem;font-weight:600;color:#374151; }
    .checkbox-item-desc { font-size:0.75rem;color:#94a3b8;margin-top:1px; }
    .img-preview { width:100%;aspect-ratio:16/9;border-radius:10px;background:#f1f5f9;border:2px dashed #e2e8f0;display:flex;flex-direction:column;align-items:center;justify-content:center;overflow:hidden;transition:all 0.2s; }
    .img-preview img { width:100%;height:100%;object-fit:cover;display:none; }
    .img-preview-placeholder { display:flex;flex-direction:column;align-items:center;gap:0.5rem;color:#94a3b8; }
    .img-preview-placeholder svg { width:36px;height:36px; }
    .img-preview-placeholder span { font-size:0.75rem; }
    .form-footer { display:flex;gap:0.75rem;padding:1.25rem 1.5rem;border-top:1px solid #f1f5f9;background:#f8fafc; }
    .btn-primary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.35);transform:translateY(-1px); }
    .btn-secondary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;font-weight:600;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-secondary:hover { background:#f8fafc;border-color:#cbd5e1; }
    .btn-primary svg,.btn-secondary svg { width:15px;height:15px; }
    .alert-error { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;background:#fee2e2;color:#b91c1c;border:1px solid #fecaca; }
</style>
@endpush

@section('content')
@if($errors->any())
<div class="alert-error">
    <strong>Errors:</strong>
    <ul style="margin-top:0.4rem;padding-left:1.25rem;">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
</div>
@endif

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span>
    <a href="{{ route('admin.gallery.index') }}">Gallery</a> <span>›</span>
    <span style="color:#0f172a;">Add Image</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Add Gallery Image</h1>
        <p class="page-description">Upload a new image to the gallery</p>
    </div>
</div>

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-layout">
        <div style="display:flex;flex-direction:column;gap:1.25rem;">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
                    <h3 class="card-title">Image Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Title <span class="req">*</span></label>
                        <input type="text" name="title" class="form-input" value="{{ old('title') }}" required placeholder="e.g. Solar Farm Installation – Dodoma">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-textarea">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Image <span class="req">*</span></label>
                        <input type="file" name="image" class="form-input" accept="image/*" required>
                        <div class="form-hint">Upload image (JPEG, PNG, GIF - Max 2MB)</div>
                    </div>
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                @foreach(['installations','commercial','residential','agricultural','industrial','community','general'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-input" value="{{ old('order', 0) }}" min="0">
                            <div class="form-hint">Lower = appears first</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1.25rem;">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    <h3 class="card-title">Preview</h3>
                </div>
                <div class="card-body">
                    <div class="img-preview" id="imgPreviewBox">
                        <img id="imgPreviewEl" src="" alt="Preview">
                        <div class="img-preview-placeholder" id="imgPlaceholder">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Enter URL above to preview</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg></div>
                    <h3 class="card-title">Visibility</h3>
                </div>
                <div class="card-body">
                    <div class="checkbox-group">
                        <label class="checkbox-item"><input type="checkbox" name="is_active" value="1" checked><div><div class="checkbox-item-label">Active</div><div class="checkbox-item-desc">Visible on the gallery page</div></div></label>
                        <label class="checkbox-item"><input type="checkbox" name="is_featured" value="1"><div><div class="checkbox-item-label">⭐ Featured</div><div class="checkbox-item-desc">Highlight in featured section</div></div></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:1.25rem;background:#fff;border:1px solid #e2e8f0;border-radius:12px;">
        <div class="form-footer">
            <button type="submit" class="btn-primary">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Add to Gallery
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </div>
</form>

<script>
function previewImage(url) {
    const img = document.getElementById('imgPreviewEl');
    const placeholder = document.getElementById('imgPlaceholder');
    if (url.trim()) {
        img.src = url.trim();
        img.style.display = 'block';
        placeholder.style.display = 'none';
        img.onerror = () => { img.style.display = 'none'; placeholder.style.display = 'flex'; };
    } else {
        img.style.display = 'none';
        placeholder.style.display = 'flex';
    }
}
</script>
@endsection
