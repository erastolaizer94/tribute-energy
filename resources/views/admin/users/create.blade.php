@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b; }
    .form-container { max-width:680px; }
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
    .form-input,.form-select { width:100%;padding:0.5625rem 0.875rem;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;color:#1e293b;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s;background:#fff;outline:none; }
    .form-input:focus,.form-select:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .form-grid-2 { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
    .form-footer { display:flex;gap:0.75rem;padding:1.25rem 1.5rem;border-top:1px solid #f1f5f9;background:#f8fafc; }
    .btn-primary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.35);transform:translateY(-1px); }
    .btn-secondary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;font-weight:600;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-secondary:hover { background:#f8fafc;border-color:#cbd5e1; }
    .btn-primary svg,.btn-secondary svg { width:15px;height:15px; }
    .alert-error { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;background:#fee2e2;color:#b91c1c;border:1px solid #fecaca; }
    .avatar-preview { width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.5rem;font-weight:700;color:#fff;background:linear-gradient(135deg,#FF8C00,#FF6B00);margin:0 auto 1rem; }
    .strength-bar { height:4px;border-radius:4px;background:#e2e8f0;margin-top:0.5rem;overflow:hidden; }
    .strength-fill { height:100%;border-radius:4px;width:0;transition:width 0.3s,background 0.3s; }
</style>
@endpush

@section('content')
@if($errors->any())
<div class="alert-error">
    <strong>Please fix the following errors:</strong>
    <ul style="margin-top:0.5rem;padding-left:1.25rem;display:flex;flex-direction:column;gap:2px;">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
</div>
@endif

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span>
    <a href="{{ route('admin.users.index') }}">Users</a> <span>›</span>
    <span style="color:#0f172a;">New User</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Add New User</h1>
        <p class="page-description">Create a new user account</p>
    </div>
</div>

<div class="form-container">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="card" style="margin-bottom:1.25rem;">
            <div class="card-header">
                <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                <h3 class="card-title">Account Information</h3>
            </div>
            <div class="card-body">
                <div style="text-align:center;margin-bottom:1.5rem;">
                    <div class="avatar-preview" id="avatarPreview">?</div>
                    <p style="font-size:0.75rem;color:#94a3b8;">Avatar generated from name</p>
                </div>
                <div class="form-group">
                    <label class="form-label">Full Name <span class="req">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" required
                           oninput="updateAvatar(this.value)" placeholder="e.g. John Mwangi">
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address <span class="req">*</span></label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required placeholder="user@example.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="+255 7XX XXX XXX">
                </div>
            </div>
        </div>

        <div class="card" style="margin-bottom:1.25rem;">
            <div class="card-header">
                <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg></div>
                <h3 class="card-title">Password</h3>
            </div>
            <div class="card-body">
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Password <span class="req">*</span></label>
                        <input type="password" name="password" class="form-input" required
                               oninput="checkStrength(this.value)" placeholder="Min 8 characters">
                        <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                        <div class="form-hint" id="strengthText">Enter a password</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password <span class="req">*</span></label>
                        <input type="password" name="password_confirmation" class="form-input" required placeholder="Repeat password">
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin-bottom:1.25rem;">
            <div class="card-header">
                <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
                <h3 class="card-title">Role</h3>
            </div>
            <div class="card-body">
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Assign Role</label>
                    <select name="role" class="form-select">
                        <option value="">— Regular User —</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="manager" {{ old('role') === 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                    </select>
                    <div class="form-hint">Leave blank for standard user access</div>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;">
            <div class="form-footer">
                <button type="submit" class="btn-primary">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Create User
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script>
const colors = ['#FF6B00','#6366f1','#10b981','#f59e0b','#3b82f6','#ec4899'];
function updateAvatar(val) {
    const el = document.getElementById('avatarPreview');
    el.textContent = val ? val.trim()[0].toUpperCase() : '?';
    el.style.background = val ? colors[val.charCodeAt(0) % colors.length] : 'linear-gradient(135deg,#FF8C00,#FF6B00)';
}
function checkStrength(p) {
    const fill = document.getElementById('strengthFill');
    const txt  = document.getElementById('strengthText');
    let score = 0;
    if (p.length >= 8) score++;
    if (/[A-Z]/.test(p)) score++;
    if (/[0-9]/.test(p)) score++;
    if (/[^A-Za-z0-9]/.test(p)) score++;
    const map = {0:['0%','#e2e8f0',''],1:['25%','#ef4444','Weak'],2:['50%','#f59e0b','Fair'],3:['75%','#3b82f6','Good'],4:['100%','#10b981','Strong']};
    fill.style.width = map[score][0]; fill.style.background = map[score][1];
    txt.textContent = map[score][2] || 'Enter a password'; txt.style.color = map[score][1];
}
</script>
@endsection
