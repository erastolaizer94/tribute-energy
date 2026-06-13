@extends('layouts.dashboard')

@section('content')
<style>
    .page-header {
        margin-bottom: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    @media (min-width: 640px) {
        .page-header {
            flex-direction: row;
            align-items: flex-end;
            justify-content: space-between;
        }
    }

    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        letter-spacing: -0.025em;
        color: var(--foreground);
    }

    .page-description {
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: var(--muted-foreground);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
    }

    @media (min-width: 640px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .stat-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.5rem;
        transition: all 0.15s ease;
    }

    .stat-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .stat-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-info {
        flex: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--muted-foreground);
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 0.25rem;
        color: var(--foreground);
        letter-spacing: -0.025em;
    }

    .stat-change {
        font-size: 0.75rem;
        margin-top: 0.25rem;
        color: var(--success);
        font-weight: 500;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: calc(var(--radius) - 2px);
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 107, 0, 0.1) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 140, 0, 0.2);
    }

    .stat-icon svg {
        width: 20px;
        height: 20px;
        color: var(--primary);
    }

    .content-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    @media (min-width: 1024px) {
        .content-grid {
            grid-template-columns: repeat(7, 1fr);
        }
    }

    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        letter-spacing: -0.025em;
        color: var(--foreground);
        margin-bottom: 1rem;
    }

    .chart-placeholder {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--muted);
        border-radius: calc(var(--radius) - 2px);
        color: var(--muted-foreground);
        font-size: 0.875rem;
    }

    .sales-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .sales-item {
        display: flex;
        align-items: center;
        padding: 0.5rem 0;
    }

    .sales-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 107, 0, 0.1) 100%);
        border: 1px solid rgba(255, 140, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-weight: 600;
        font-size: 0.875rem;
        flex-shrink: 0;
    }

    .sales-info {
        margin-left: 1rem;
        flex: 1;
    }

    .sales-name {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--foreground);
    }

    .sales-email {
        font-size: 0.75rem;
        color: var(--muted-foreground);
    }

    .sales-amount {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--foreground);
    }
</style>

<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-description">Welcome back! Here's what's happening with your business today.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-info">
                <p class="stat-label">Total Revenue</p>
                <p class="stat-value">$45,231.89</p>
                <p class="stat-change">+20.1% from last month</p>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-info">
                <p class="stat-label">Sales</p>
                <p class="stat-value">+2,350</p>
                <p class="stat-change">+180.1% from last month</p>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-info">
                <p class="stat-label">Active Users</p>
                <p class="stat-value">+12,234</p>
                <p class="stat-change">+19% from last month</p>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-info">
                <p class="stat-label">Active Now</p>
                <p class="stat-value">+573</p>
                <p class="stat-change" style="color: var(--muted-foreground);">+201 since last hour</p>
            </div>
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>
    </div>
</div>

<div class="content-grid">
    <div class="card" style="grid-column: span 4;">
        <h3 class="card-title">Overview</h3>
        <div class="chart-placeholder">
            Chart placeholder - Add your chart library here
        </div>
    </div>

    <div class="card" style="grid-column: span 3;">
        <h3 class="card-title">Recent Sales</h3>
        <div class="sales-list">
            <div class="sales-item">
                <div class="sales-avatar">OM</div>
                <div class="sales-info">
                    <p class="sales-name">Olivia Martin</p>
                    <p class="sales-email">olivia.martin@email.com</p>
                </div>
                <p class="sales-amount">+$1,999.00</p>
            </div>
            <div class="sales-item">
                <div class="sales-avatar">JL</div>
                <div class="sales-info">
                    <p class="sales-name">Jackson Lee</p>
                    <p class="sales-email">jackson.lee@email.com</p>
                </div>
                <p class="sales-amount">+$39.00</p>
            </div>
            <div class="sales-item">
                <div class="sales-avatar">IS</div>
                <div class="sales-info">
                    <p class="sales-name">Isabella Nguyen</p>
                    <p class="sales-email">isabella.nguyen@email.com</p>
                </div>
                <p class="sales-amount">+$299.00</p>
            </div>
            <div class="sales-item">
                <div class="sales-avatar">WK</div>
                <div class="sales-info">
                    <p class="sales-name">William Kim</p>
                    <p class="sales-email">will@email.com</p>
                </div>
                <p class="sales-amount">+$99.00</p>
            </div>
            <div class="sales-item">
                <div class="sales-avatar">SC</div>
                <div class="sales-info">
                    <p class="sales-name">Sofia Cooper</p>
                    <p class="sales-email">sofia.cooper@email.com</p>
                </div>
                <p class="sales-amount">+$39.00</p>
            </div>
        </div>
    </div>
</div>
@endsection
