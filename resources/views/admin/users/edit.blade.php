@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b;display:flex;align-items:center;gap:6px; }
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
    .form-footer { display:flex;gap:0.75rem;padding:1.25rem 1.5rem;border-top:1px solid #f1f5f9;background:#f8fafc;flex-wrap:wrap;align-items:center; }
    .btn-primary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.35);transform:translateY(-1px); }
    .btn-secondary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;font-weight:600;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-secondary:hover { background:#f8fafc;border-color:#cbd5e1; }
    .btn-danger { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#ef4444;border:1px solid #fecaca;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-danger:hover { background:#fee2e2; }
    .btn-primary svg,.btn-secondary svg,.btn-danger svg { width:15px;height:15px; }
    .badge { display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px; }
    .badge-admin { background:rgba(255,107,0,0.1);color:#c2410c;border:1px solid rgba(255,107,0,0.2); }
    .badge-user  { background:#f1f5f9;color:#475569; }
    .alert-success { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;display:flex;align-items:center;gap:0.75rem;background:#dcfce7;color:#15803d;border:1px solid #bbf7d0; }
    .alert-success svg { width:16px;height:16px;flex-shrink:0; }
    .alert-error { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;background:#fee2e2;color:#b91c1c;border:1px solid #fecaca; }
    .avatar-lg { width:72px;height:72px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.75rem;font-weight:700;color:#fff;margin:0 auto 1rem; }
    .user-meta { text-align:center;margin-bottom:1.5rem; }
    .user-meta-name { font-size:1rem;font-weight:700;color:#0f172a; }
    .user-meta-email { font-size:0.8125rem;color:#94a3b8;margin-top:2px; }
    .user-meta-joined { font-size:0.75rem;color:#cbd5e1;margin-top:4px; }
</style>
@endpush

@section('content')
@if(session('success'))
<div class="alert-success">
    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    {{ session('success') }}
</div>
@endif
@if($errors->any())
<div class="alert-error">
    <strong>Please fix the following errors:</strong>
    <ul style="margin-top:0.5rem;padding-left:1.25rem;">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
</div>
@endif

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span>
    <a href="{{ route('admin.users.index') }}">Users</a> <span>›</span>
    <span style="color:#0f172a;">Edit: {{ Str::limit($user->name, 20) }}</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Edit User</h1>
        <p class="page-description">
            ID #{{ $user->id }}
            @if($user->roles->count() > 0)
                @foreach($user->roles as $r) <span class="badge badge-admin">{{ $r->name }}</span> @endforeach
            @else
                <span class="badge badge-user">User</span>
            @endif
            · Joined {{ $user->created_at->format('M Y') }}
        </p>
    </div>
</div>

<div class="form-container">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf @method('PUT')

        <div class="card" style="margin-bottom:1.25rem;">
            <div class="card-header">
                <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                <h3 class="card-title">Account Information</h3>
            </div>
            <div class="card-body">
                @php $colors = ['#FF6B00','#6366f1','#10b981','#f59e0b','#3b82f6','#ec4899']; $avatarColor = $colors[$user->id % count($colors)]; @endphp
                <div class="user-meta">
                    <div class="avatar-lg" style="background:{{ $avatarColor }};">{{ strtoupper(substr($user->name,0,1)) }}</div>
                    <div class="user-meta-name">{{ $user->name }}</div>
                    <div class="user-meta-email">{{ $user->email }}</div>
                    <div class="user-meta-joined">Member since {{ $user->created_at->format('F d, Y') }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Full Name <span class="req">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address <span class="req">*</span></label>
                    <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-input" value="{{ old('phone', $user->phone ?? '') }}" placeholder="+255 7XX XXX XXX">
                </div>
            </div>
        </div>

        <div class="card" style="margin-bottom:1.25rem;">
            <div class="card-header">
                <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg></div>
                <h3 class="card-title">Change Password</h3>
            </div>
            <div class="card-body">
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-input" placeholder="Leave blank to keep current">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm new password">
                    </div>
                </div>
                <div class="form-hint">Leave both fields empty to keep the current password unchanged.</div>
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
                        @php $currentRole = $user->roles->first()?->name ?? ''; @endphp
                        <option value="admin"   {{ $currentRole === 'admin'   ? 'selected' : '' }}>Admin</option>
                        <option value="manager" {{ $currentRole === 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="editor"  {{ $currentRole === 'editor'  ? 'selected' : '' }}>Editor</option>
                    </select>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;">
            <div class="form-footer">
                <button type="submit" class="btn-primary">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Save Changes
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Cancel</a>
                <div style="margin-left:auto;">
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-danger"
                                onclick="return confirm('Delete {{ addslashes($user->name) }}? This cannot be undone.')">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
