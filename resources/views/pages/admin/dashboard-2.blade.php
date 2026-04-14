<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --primary: #349953;
    --primary-light: #e8f5ec;
    --primary-dark: #237a3e;
    --primary-hover: #2d8647;
    --heading: #18444c;
    --bg: #ffffff;
    --sidebar-bg: #18444c;
    --sidebar-text: #a8c8cc;
    --sidebar-active: #349953;
    --text: #374151;
    --text-light: #6b7280;
    --border: #e5e7eb;
    --surface: #f9fafb;
    --surface2: #f3f4f6;
    --danger: #ef4444;
    --danger-light: #fef2f2;
    --warning: #f59e0b;
    --warning-light: #fffbeb;
    --info: #3b82f6;
    --info-light: #eff6ff;
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
    --shadow: 0 4px 16px rgba(0,0,0,0.08);
    --shadow-lg: 0 10px 32px rgba(0,0,0,0.12);
    --radius: 12px;
    --radius-sm: 8px;
    --sidebar-width: 260px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--surface);
    color: var(--text);
    font-size: 14px;
    line-height: 1.6;
  }

  h1, h2, h3, h4, h5, h6 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--heading);
    font-weight: 700;
  }

  /* LAYOUT */
  .layout { display: flex; min-height: 100vh; }

  /* SIDEBAR */
  .sidebar {
    width: var(--sidebar-width);
    background: var(--sidebar-bg);
    position: fixed;
    top: 0; left: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
    z-index: 100;
    transition: transform 0.3s ease;
    overflow-y: auto;
  }

  .sidebar-logo {
    padding: 24px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    flex-shrink: 0;
  }

  .logo-icon {
    width: 38px; height: 38px;
    background: var(--primary);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .logo-text {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    font-size: 15px;
    color: #fff;
    line-height: 1.2;
  }

  .logo-text span {
    display: block;
    font-size: 11px;
    font-weight: 400;
    color: var(--sidebar-text);
    margin-top: 1px;
  }

  .sidebar-nav {
    flex: 1;
    padding: 16px 0;
  }

  .nav-section-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: rgba(168,200,204,0.5);
    padding: 12px 20px 6px;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 20px;
    color: var(--sidebar-text);
    cursor: pointer;
    transition: all 0.2s;
    border-left: 3px solid transparent;
    font-weight: 500;
    font-size: 13.5px;
    position: relative;
  }

  .nav-item:hover {
    background: rgba(255,255,255,0.06);
    color: #fff;
  }

  .nav-item.active {
    background: rgba(52,153,83,0.15);
    color: #fff;
    border-left-color: var(--primary);
  }

  .nav-item .nav-icon {
    width: 32px; height: 32px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 8px;
    font-size: 15px;
    background: rgba(255,255,255,0.05);
    flex-shrink: 0;
  }

  .nav-item.active .nav-icon {
    background: rgba(52,153,83,0.25);
  }

  .nav-item .nav-badge {
    margin-left: auto;
    background: var(--primary);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 20px;
  }

  .nav-sub {
    padding-left: 12px;
    display: none;
  }

  .nav-sub.open { display: block; }

  .nav-sub .nav-item {
    padding: 8px 20px 8px 32px;
    font-size: 13px;
  }

  .nav-item .arrow {
    margin-left: auto;
    font-size: 10px;
    transition: transform 0.2s;
    color: rgba(168,200,204,0.5);
  }

  .nav-item.open .arrow { transform: rotate(90deg); }

  .sidebar-footer {
    padding: 16px 20px;
    border-top: 1px solid rgba(255,255,255,0.08);
    flex-shrink: 0;
  }

  .user-card {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.2s;
  }

  .user-card:hover { background: rgba(255,255,255,0.06); }

  .user-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 13px; color: #fff;
    flex-shrink: 0;
  }

  .user-info .user-name {
    font-size: 13px; font-weight: 600; color: #fff;
    line-height: 1.2;
  }

  .user-info .user-role {
    font-size: 11px; color: var(--sidebar-text);
  }

  /* MAIN */
  .main {
    margin-left: var(--sidebar-width);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* TOPBAR */
  .topbar {
    background: #fff;
    border-bottom: 1px solid var(--border);
    padding: 0 28px;
    height: 64px;
    display: flex;
    align-items: center;
    gap: 16px;
    position: sticky; top: 0;
    z-index: 50;
    box-shadow: var(--shadow-sm);
  }

  .topbar-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 18px;
    color: var(--heading);
    flex: 1;
  }

  .topbar-title span {
    font-size: 13px;
    font-weight: 400;
    color: var(--text-light);
    display: block;
    margin-top: -2px;
  }

  .topbar-actions {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .icon-btn {
    width: 36px; height: 36px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
    color: var(--text-light);
    transition: all 0.2s;
    position: relative;
  }

  .icon-btn:hover { background: var(--surface); color: var(--heading); }

  .notif-dot {
    position: absolute;
    top: 6px; right: 6px;
    width: 7px; height: 7px;
    background: var(--danger);
    border-radius: 50%;
    border: 2px solid #fff;
  }

  /* CONTENT */
  .content {
    padding: 28px;
    flex: 1;
  }

  .page { display: none; }
  .page.active { display: block; }

  /* PAGE HEADER */
  .page-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 24px;
    gap: 16px;
  }

  .page-header h2 {
    font-size: 22px;
    margin-bottom: 2px;
  }

  .breadcrumb {
    font-size: 12px;
    color: var(--text-light);
    display: flex;
    gap: 6px;
    align-items: center;
    margin-top: 2px;
  }

  .breadcrumb span { color: var(--primary); }

  /* BUTTONS */
  .btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 18px;
    border-radius: var(--radius-sm);
    font-size: 13.5px;
    font-weight: 600;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    border: none;
    transition: all 0.2s;
    white-space: nowrap;
  }

  .btn-primary {
    background: var(--primary);
    color: #fff;
  }

  .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(52,153,83,0.3); }

  .btn-outline {
    background: #fff;
    color: var(--heading);
    border: 1.5px solid var(--border);
  }

  .btn-outline:hover { border-color: var(--primary); color: var(--primary); }

  .btn-danger {
    background: var(--danger-light);
    color: var(--danger);
    border: 1px solid #fecaca;
  }

  .btn-danger:hover { background: var(--danger); color: #fff; }

  .btn-success {
    background: var(--primary-light);
    color: var(--primary-dark);
    border: 1px solid #bbf7d0;
  }

  .btn-success:hover { background: var(--primary); color: #fff; }

  .btn-sm { padding: 5px 12px; font-size: 12px; }
  .btn-icon { padding: 6px; width: 32px; height: 32px; justify-content: center; }

  /* STATS CARDS */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 24px;
  }

  .stat-card {
    background: #fff;
    border-radius: var(--radius);
    padding: 22px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    position: relative;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow); }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
  }

  .stat-card.green::before { background: var(--primary); }
  .stat-card.blue::before { background: var(--info); }
  .stat-card.amber::before { background: var(--warning); }
  .stat-card.teal::before { background: #14b8a6; }

  .stat-icon {
    width: 44px; height: 44px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    margin-bottom: 14px;
  }

  .stat-card.green .stat-icon { background: var(--primary-light); }
  .stat-card.blue .stat-icon { background: var(--info-light); }
  .stat-card.amber .stat-icon { background: var(--warning-light); }
  .stat-card.teal .stat-icon { background: #f0fdfa; }

  .stat-value {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 28px;
    font-weight: 800;
    color: var(--heading);
    line-height: 1;
    margin-bottom: 4px;
  }

  .stat-label {
    font-size: 12.5px;
    color: var(--text-light);
    font-weight: 500;
  }

  .stat-change {
    font-size: 11.5px;
    font-weight: 600;
    margin-top: 8px;
    display: inline-flex;
    align-items: center;
    gap: 3px;
    padding: 2px 7px;
    border-radius: 20px;
  }

  .stat-change.up { background: #dcfce7; color: #16a34a; }
  .stat-change.neutral { background: #f3f4f6; color: #6b7280; }

  /* CARD */
  .card {
    background: #fff;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    overflow: hidden;
  }

  .card-header {
    padding: 18px 22px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }

  .card-header h3 {
    font-size: 15px;
    font-weight: 700;
  }

  .card-body { padding: 22px; }

  /* TABLE */
  .table-wrap { overflow-x: auto; }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead th {
    background: var(--surface);
    padding: 11px 16px;
    text-align: left;
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-light);
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
  }

  tbody td {
    padding: 13px 16px;
    border-bottom: 1px solid var(--border);
    font-size: 13.5px;
    vertical-align: middle;
  }

  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover td { background: var(--surface); }

  .table-actions {
    display: flex;
    gap: 6px;
    align-items: center;
  }

  /* BADGE */
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 600;
  }

  .badge-green { background: #dcfce7; color: #15803d; }
  .badge-red { background: #fee2e2; color: #dc2626; }
  .badge-amber { background: #fef3c7; color: #d97706; }
  .badge-blue { background: #dbeafe; color: #2563eb; }
  .badge-gray { background: #f3f4f6; color: #6b7280; }

  .badge::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: currentColor;
  }

  /* TOGGLE */
  .toggle {
    width: 44px; height: 24px;
    background: #e5e7eb;
    border-radius: 12px;
    position: relative;
    cursor: pointer;
    transition: background 0.2s;
    flex-shrink: 0;
  }

  .toggle.on { background: var(--primary); }

  .toggle::after {
    content: '';
    position: absolute;
    top: 3px; left: 3px;
    width: 18px; height: 18px;
    background: #fff;
    border-radius: 50%;
    transition: transform 0.2s;
    box-shadow: 0 1px 4px rgba(0,0,0,0.15);
  }

  .toggle.on::after { transform: translateX(20px); }

  /* SEARCH & FILTER BAR */
  .filter-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    flex-wrap: wrap;
  }

  .search-input {
    position: relative;
    flex: 1;
    min-width: 200px;
  }

  .search-input input {
    width: 100%;
    padding: 9px 12px 9px 36px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 13.5px;
    font-family: 'DM Sans', sans-serif;
    color: var(--text);
    background: #fff;
    transition: border-color 0.2s;
    outline: none;
  }

  .search-input input:focus { border-color: var(--primary); }

  .search-input .search-icon {
    position: absolute;
    left: 11px; top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 14px;
  }

  /* FORM */
  .form-grid { display: grid; gap: 18px; }
  .form-grid-2 { grid-template-columns: 1fr 1fr; }
  .form-grid-3 { grid-template-columns: 1fr 1fr 1fr; }

  .form-group { display: flex; flex-direction: column; gap: 6px; }
  .form-group.full { grid-column: 1 / -1; }

  label {
    font-size: 13px;
    font-weight: 600;
    color: var(--heading);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  label .required { color: var(--danger); margin-left: 2px; }

  input[type="text"],
  input[type="email"],
  input[type="number"],
  input[type="date"],
  input[type="tel"],
  textarea,
  select {
    padding: 9px 13px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 13.5px;
    font-family: 'DM Sans', sans-serif;
    color: var(--text);
    background: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    width: 100%;
  }

  input:focus, textarea:focus, select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(52,153,83,0.1);
  }

  textarea { resize: vertical; min-height: 100px; }
  select { cursor: pointer; }

  .hint { font-size: 11.5px; color: var(--text-light); }

  /* IMAGE UPLOAD */
  .img-upload {
    border: 2px dashed var(--border);
    border-radius: var(--radius-sm);
    padding: 28px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s;
    position: relative;
    background: var(--surface);
  }

  .img-upload:hover { border-color: var(--primary); background: var(--primary-light); }

  .img-upload .upload-icon { font-size: 28px; margin-bottom: 8px; }
  .img-upload p { font-size: 13px; color: var(--text-light); }
  .img-upload strong { color: var(--primary); }

  .img-preview {
    width: 100%;
    max-height: 160px;
    object-fit: cover;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
    margin-top: 10px;
  }

  .img-preview-circle {
    width: 80px; height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-light);
    margin-top: 10px;
  }

  /* MODAL */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(24,68,76,0.45);
    backdrop-filter: blur(3px);
    z-index: 200;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .modal-overlay.open { display: flex; animation: fadeIn 0.2s ease; }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  .modal {
    background: #fff;
    border-radius: 16px;
    width: 100%;
    max-width: 640px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-lg);
    animation: slideUp 0.25s ease;
  }

  .modal.modal-lg { max-width: 860px; }

  @keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }

  .modal-header {
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky; top: 0;
    background: #fff;
    z-index: 1;
  }

  .modal-header h3 { font-size: 16px; }

  .modal-close {
    width: 30px; height: 30px;
    border-radius: 8px;
    background: var(--surface2);
    border: none;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    color: var(--text-light);
    transition: all 0.2s;
  }

  .modal-close:hover { background: #e5e7eb; color: var(--heading); }

  .modal-body { padding: 24px; }

  .modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: flex-end;
    gap: 10px;
  }

  /* AVATAR in table */
  .tbl-avatar {
    width: 36px; height: 36px;
    border-radius: 8px;
    object-fit: cover;
  }

  .tbl-avatar-circle {
    width: 36px; height: 36px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary-light);
  }

  .tbl-name {
    font-weight: 600;
    color: var(--heading);
    font-size: 13.5px;
  }

  .tbl-sub {
    font-size: 12px;
    color: var(--text-light);
    margin-top: 1px;
  }

  /* DASHBOARD GRID */
  .dash-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-top: 20px;
  }

  /* ACTIVITY ITEM */
  .activity-item {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--border);
    align-items: flex-start;
  }

  .activity-item:last-child { border-bottom: none; }

  .activity-dot {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .activity-dot.green { background: var(--primary-light); }
  .activity-dot.blue { background: var(--info-light); }
  .activity-dot.amber { background: var(--warning-light); }

  .activity-text { font-size: 13px; line-height: 1.5; }
  .activity-time { font-size: 11.5px; color: var(--text-light); margin-top: 2px; }

  /* QUICK STATS in sidebar of dashboard */
  .mini-stat {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid var(--border);
  }

  .mini-stat:last-child { border-bottom: none; }
  .mini-stat-label { font-size: 13px; color: var(--text-light); }
  .mini-stat-value { font-weight: 700; color: var(--heading); font-size: 15px; font-family: 'Plus Jakarta Sans', sans-serif; }
  .mini-stat-bar { height: 4px; background: var(--border); border-radius: 2px; margin-top: 6px; }
  .mini-stat-fill { height: 100%; border-radius: 2px; background: var(--primary); }

  /* No result */
  .empty-state {
    text-align: center;
    padding: 48px 24px;
  }

  .empty-icon { font-size: 40px; margin-bottom: 12px; }

  /* Responsive */
  @media (max-width: 900px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .dash-grid { grid-template-columns: 1fr; }
    .form-grid-2, .form-grid-3 { grid-template-columns: 1fr; }
  }

  @media (max-width: 640px) {
    .stats-grid { grid-template-columns: 1fr; }
    .sidebar { transform: translateX(-100%); }
    .sidebar.mobile-open { transform: translateX(0); }
    .main { margin-left: 0; }
    .content { padding: 16px; }
    .topbar { padding: 0 16px; }
  }

  /* Thumbnail in table */
  .tbl-thumb {
    width: 44px; height: 44px;
    border-radius: 8px;
    object-fit: cover;
    border: 1px solid var(--border);
    background: var(--surface2);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  /* Scrollbar */
  ::-webkit-scrollbar { width: 5px; height: 5px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 3px; }
  ::-webkit-scrollbar-thumb:hover { background: #9ca3af; }

  /* Page transition */
  .page.active { animation: pageFade 0.2s ease; }
  @keyframes pageFade { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }
</style>
</head>
<body>

<div class="layout">
  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon">🌿</div>
      <div class="logo-text">
        SisInfo Admin
        <span>Panel Manajemen</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section-label">Utama</div>

      <div class="nav-item active" onclick="showPage('dashboard', this)">
        <div class="nav-icon">📊</div>
        Beranda
      </div>

      <div class="nav-section-label">Konten</div>

      <div class="nav-item" id="nav-layanan-parent" onclick="toggleSub('sub-layanan', this)">
        <div class="nav-icon">🔧</div>
        Layanan
        <span class="arrow">▶</span>
      </div>
      <div class="nav-sub" id="sub-layanan">
        <div class="nav-item" onclick="showPage('layanan-kategori', this)">
          <div class="nav-icon" style="font-size:12px">📁</div>
          Kategori Layanan
        </div>
        <div class="nav-item" onclick="showPage('layanan-list', this)">
          <div class="nav-icon" style="font-size:12px">📋</div>
          Daftar Layanan
        </div>
      </div>

      <div class="nav-item" id="nav-staf" onclick="showPage('staf-list', this)">
        <div class="nav-icon">👥</div>
        Staf
      </div>

      <div class="nav-item" id="nav-berita-parent" onclick="toggleSub('sub-berita', this)">
        <div class="nav-icon">📰</div>
        Berita
        <span class="arrow">▶</span>
      </div>
      <div class="nav-sub" id="sub-berita">
        <div class="nav-item" onclick="showPage('berita-kategori', this)">
          <div class="nav-icon" style="font-size:12px">🏷️</div>
          Kategori Berita
        </div>
        <div class="nav-item" onclick="showPage('berita-list', this)">
          <div class="nav-icon" style="font-size:12px">📄</div>
          Daftar Berita
        </div>
      </div>

      <div class="nav-section-label">Sistem</div>

      <div class="nav-item">
        <div class="nav-icon">⚙️</div>
        Pengaturan
      </div>

      <div class="nav-item">
        <div class="nav-icon">🔒</div>
        Hak Akses
      </div>
    </nav>

    <div class="sidebar-footer">
      <div class="user-card">
        <div class="user-avatar">A</div>
        <div class="user-info">
          <div class="user-name">Admin Utama</div>
          <div class="user-role">Super Administrator</div>
        </div>
        <span style="margin-left:auto;font-size:14px;color:rgba(168,200,204,0.5)">⋯</span>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main">
    <!-- TOPBAR -->
    <header class="topbar">
      <button class="icon-btn" onclick="toggleSidebar()" style="display:none" id="menu-btn">☰</button>
      <div class="topbar-title" id="topbar-title">
        Beranda
        <span>Selamat datang kembali, Admin 👋</span>
      </div>
      <div class="topbar-actions">
        <div class="icon-btn">
          🔔
          <span class="notif-dot"></span>
        </div>
        <div class="icon-btn">❓</div>
        <div class="user-avatar" style="background:var(--primary);color:#fff;cursor:pointer">A</div>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="content">

      <!-- ===== DASHBOARD PAGE ===== -->
      <div class="page active" id="page-dashboard">
        <div class="page-header">
          <div>
            <h2>Beranda</h2>
            <div class="breadcrumb">🏠 Beranda <span>›</span> <span>Beranda</span></div>
          </div>
          <div style="display:flex;gap:8px;align-items:center">
            <select style="width:auto;padding:8px 12px;font-size:13px">
              <option>Tahun 2025</option>
              <option>Tahun 2024</option>
            </select>
            <button class="btn btn-outline"><span>📥</span> Ekspor</button>
          </div>
        </div>

        <!-- STAT CARDS -->
        <div class="stats-grid">
          <div class="stat-card green">
            <div class="stat-icon">🔧</div>
            <div class="stat-value">24</div>
            <div class="stat-label">Total Layanan</div>
            <span class="stat-change up">↑ 12% bulan ini</span>
          </div>
          <div class="stat-card blue">
            <div class="stat-icon">👥</div>
            <div class="stat-value">38</div>
            <div class="stat-label">Total Staf</div>
            <span class="stat-change up">↑ 3 staf baru</span>
          </div>
          <div class="stat-card amber">
            <div class="stat-icon">📰</div>
            <div class="stat-value">156</div>
            <div class="stat-label">Total Berita</div>
            <span class="stat-change up">↑ 8 artikel baru</span>
          </div>
          <div class="stat-card teal">
            <div class="stat-icon">🖼️</div>
            <div class="stat-value">412</div>
            <div class="stat-label">Total Gallery</div>
            <span class="stat-change neutral">Tidak berubah</span>
          </div>
        </div>

        <!-- DASHBOARD GRID -->
        <div class="dash-grid">
          <!-- Recent Data Table -->
          <div class="card">
            <div class="card-header">
              <h3>📋 Data Terbaru</h3>
              <div style="display:flex;gap:8px">
                <button class="btn btn-outline btn-sm">Layanan</button>
                <button class="btn btn-primary btn-sm">Berita</button>
              </div>
            </div>
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="color:var(--text-light);font-weight:600">01</td>
                    <td>
                      <div class="tbl-name">Pembuatan KTP Elektronik</div>
                      <div class="tbl-sub">Layanan Administrasi</div>
                    </td>
                    <td><span class="badge badge-blue">Administrasi</span></td>
                    <td><span class="badge badge-green">Aktif</span></td>
                    <td style="color:var(--text-light)">12 Jun 2025</td>
                  </tr>
                  <tr>
                    <td style="color:var(--text-light);font-weight:600">02</td>
                    <td>
                      <div class="tbl-name">Pengumuman PPDB 2025</div>
                      <div class="tbl-sub">Berita Pendidikan</div>
                    </td>
                    <td><span class="badge badge-amber">Pendidikan</span></td>
                    <td><span class="badge badge-green">Terbit</span></td>
                    <td style="color:var(--text-light)">10 Jun 2025</td>
                  </tr>
                  <tr>
                    <td style="color:var(--text-light);font-weight:600">03</td>
                    <td>
                      <div class="tbl-name">Pelayanan Akta Kelahiran</div>
                      <div class="tbl-sub">Layanan Kependudukan</div>
                    </td>
                    <td><span class="badge badge-blue">Kependudukan</span></td>
                    <td><span class="badge badge-amber">Proses</span></td>
                    <td style="color:var(--text-light)">09 Jun 2025</td>
                  </tr>
                  <tr>
                    <td style="color:var(--text-light);font-weight:600">04</td>
                    <td>
                      <div class="tbl-name">Kegiatan Posyandu RW 05</div>
                      <div class="tbl-sub">Berita Kesehatan</div>
                    </td>
                    <td><span class="badge badge-green">Kesehatan</span></td>
                    <td><span class="badge badge-green">Terbit</span></td>
                    <td style="color:var(--text-light)">07 Jun 2025</td>
                  </tr>
                  <tr>
                    <td style="color:var(--text-light);font-weight:600">05</td>
                    <td>
                      <div class="tbl-name">Surat Keterangan Domisili</div>
                      <div class="tbl-sub">Layanan Surat-Menyurat</div>
                    </td>
                    <td><span class="badge badge-blue">Surat</span></td>
                    <td><span class="badge badge-red">Nonaktif</span></td>
                    <td style="color:var(--text-light)">05 Jun 2025</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Right: Activity + Distribusi -->
          <div style="display:flex;flex-direction:column;gap:20px">
            <div class="card">
              <div class="card-header"><h3>📈 Ringkasan Data</h3></div>
              <div class="card-body">
                <div class="mini-stat">
                  <div>
                    <div class="mini-stat-label">Layanan Aktif</div>
                    <div class="mini-stat-bar" style="width:120px"><div class="mini-stat-fill" style="width:75%"></div></div>
                  </div>
                  <div class="mini-stat-value">18</div>
                </div>
                <div class="mini-stat">
                  <div>
                    <div class="mini-stat-label">Berita Terbit</div>
                    <div class="mini-stat-bar" style="width:120px"><div class="mini-stat-fill" style="width:88%;background:var(--info)"></div></div>
                  </div>
                  <div class="mini-stat-value">137</div>
                </div>
                <div class="mini-stat">
                  <div>
                    <div class="mini-stat-label">Staf Aktif</div>
                    <div class="mini-stat-bar" style="width:120px"><div class="mini-stat-fill" style="width:92%;background:var(--warning)"></div></div>
                  </div>
                  <div class="mini-stat-value">35</div>
                </div>
                <div class="mini-stat">
                  <div>
                    <div class="mini-stat-label">Gallery Foto</div>
                    <div class="mini-stat-bar" style="width:120px"><div class="mini-stat-fill" style="width:60%;background:#14b8a6"></div></div>
                  </div>
                  <div class="mini-stat-value">248</div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header"><h3>🕐 Aktivitas Terbaru</h3></div>
              <div class="card-body" style="padding:16px 20px">
                <div class="activity-item">
                  <div class="activity-dot green">➕</div>
                  <div>
                    <div class="activity-text">Layanan baru <strong>KTP Elektronik</strong> ditambahkan</div>
                    <div class="activity-time">2 jam lalu</div>
                  </div>
                </div>
                <div class="activity-item">
                  <div class="activity-dot blue">📝</div>
                  <div>
                    <div class="activity-text">Berita <strong>PPDB 2025</strong> dipublikasikan</div>
                    <div class="activity-time">5 jam lalu</div>
                  </div>
                </div>
                <div class="activity-item">
                  <div class="activity-dot amber">👤</div>
                  <div>
                    <div class="activity-text">Staf <strong>Budi Santoso</strong> bergabung</div>
                    <div class="activity-time">Kemarin</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== LAYANAN KATEGORI PAGE ===== -->
      <div class="page" id="page-layanan-kategori">
        <div class="page-header">
          <div>
            <h2>Kategori Layanan</h2>
            <div class="breadcrumb">🏠 Home <span>›</span> Layanan <span>›</span> <span>Kategori</span></div>
          </div>
          <button class="btn btn-primary" onclick="openModal('modal-kategori-layanan-create')">
            ➕ Tambah Kategori
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Daftar Kategori Layanan</h3>
            <div class="filter-bar" style="margin:0">
              <div class="search-input" style="min-width:220px">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Cari kategori...">
              </div>
            </div>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th style="width:50px">#</th>
                  <th>Nama Kategori</th>
                  <th>Jumlah Layanan</th>
                  <th>Dibuat</th>
                  <th style="width:120px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--text-light)">1</td>
                  <td><div class="tbl-name">Administrasi Kependudukan</div></td>
                  <td><span class="badge badge-blue">6 Layanan</span></td>
                  <td style="color:var(--text-light)">01 Jan 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" title="Edit" onclick="openModal('modal-kategori-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Hapus" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">2</td>
                  <td><div class="tbl-name">Layanan Kesehatan</div></td>
                  <td><span class="badge badge-blue">4 Layanan</span></td>
                  <td style="color:var(--text-light)">05 Jan 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">3</td>
                  <td><div class="tbl-name">Surat Menyurat</div></td>
                  <td><span class="badge badge-blue">8 Layanan</span></td>
                  <td style="color:var(--text-light)">10 Feb 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">4</td>
                  <td><div class="tbl-name">Perizinan Usaha</div></td>
                  <td><span class="badge badge-blue">3 Layanan</span></td>
                  <td style="color:var(--text-light)">15 Feb 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">5</td>
                  <td><div class="tbl-name">Sosial & Bantuan</div></td>
                  <td><span class="badge badge-blue">3 Layanan</span></td>
                  <td style="color:var(--text-light)">20 Mar 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== LAYANAN LIST PAGE ===== -->
      <div class="page" id="page-layanan-list">
        <div class="page-header">
          <div>
            <h2>Daftar Layanan</h2>
            <div class="breadcrumb">🏠 Home <span>›</span> Layanan <span>›</span> <span>Daftar</span></div>
          </div>
          <button class="btn btn-primary" onclick="openModal('modal-layanan-create')">
            ➕ Tambah Layanan
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Semua Layanan</h3>
            <div class="filter-bar" style="margin:0">
              <div class="search-input" style="min-width:200px">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Cari layanan...">
              </div>
              <select style="width:160px;padding:8px 12px;font-size:13px">
                <option>Semua Kategori</option>
                <option>Administrasi</option>
                <option>Kesehatan</option>
              </select>
              <select style="width:130px;padding:8px 12px;font-size:13px">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Nonaktif</option>
              </select>
            </div>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Gambar</th>
                  <th>Nama Layanan</th>
                  <th>Slug</th>
                  <th>Kategori</th>
                  <th>Urutan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--text-light)">1</td>
                  <td><div class="tbl-thumb">🪪</div></td>
                  <td>
                    <div class="tbl-name">Pembuatan KTP Elektronik</div>
                    <div class="tbl-sub">Kartu identitas resmi warga negara</div>
                  </td>
                  <td style="color:var(--text-light);font-size:12px;font-family:monospace">pembuatan-ktp-elektronik</td>
                  <td><span class="badge badge-blue">Administrasi</span></td>
                  <td style="font-weight:600;text-align:center">1</td>
                  <td><div class="toggle on" onclick="this.classList.toggle('on')"></div></td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">2</td>
                  <td><div class="tbl-thumb">🏥</div></td>
                  <td>
                    <div class="tbl-name">Pemeriksaan Kesehatan Gratis</div>
                    <div class="tbl-sub">Pemeriksaan kesehatan rutin warga</div>
                  </td>
                  <td style="color:var(--text-light);font-size:12px;font-family:monospace">pemeriksaan-kesehatan-gratis</td>
                  <td><span class="badge badge-green">Kesehatan</span></td>
                  <td style="font-weight:600;text-align:center">2</td>
                  <td><div class="toggle on" onclick="this.classList.toggle('on')"></div></td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">3</td>
                  <td><div class="tbl-thumb">📄</div></td>
                  <td>
                    <div class="tbl-name">Surat Keterangan Domisili</div>
                    <div class="tbl-sub">Surat keterangan tempat tinggal</div>
                  </td>
                  <td style="color:var(--text-light);font-size:12px;font-family:monospace">surat-keterangan-domisili</td>
                  <td><span class="badge badge-amber">Surat</span></td>
                  <td style="font-weight:600;text-align:center">3</td>
                  <td><div class="toggle" onclick="this.classList.toggle('on')"></div></td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">4</td>
                  <td><div class="tbl-thumb">🏪</div></td>
                  <td>
                    <div class="tbl-name">Izin Usaha Mikro</div>
                    <div class="tbl-sub">Perizinan usaha skala mikro dan kecil</div>
                  </td>
                  <td style="color:var(--text-light);font-size:12px;font-family:monospace">izin-usaha-mikro</td>
                  <td><span class="badge badge-blue">Perizinan</span></td>
                  <td style="font-weight:600;text-align:center">4</td>
                  <td><div class="toggle on" onclick="this.classList.toggle('on')"></div></td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">5</td>
                  <td><div class="tbl-thumb">👶</div></td>
                  <td>
                    <div class="tbl-name">Akta Kelahiran</div>
                    <div class="tbl-sub">Pengurusan dokumen akta kelahiran</div>
                  </td>
                  <td style="color:var(--text-light);font-size:12px;font-family:monospace">akta-kelahiran</td>
                  <td><span class="badge badge-blue">Administrasi</span></td>
                  <td style="font-weight:600;text-align:center">5</td>
                  <td><div class="toggle on" onclick="this.classList.toggle('on')"></div></td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-layanan-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== STAF PAGE ===== -->
      <div class="page" id="page-staf-list">
        <div class="page-header">
          <div>
            <h2>Data Staf</h2>
            <div class="breadcrumb">🏠 Home <span>›</span> <span>Staf</span></div>
          </div>
          <button class="btn btn-primary" onclick="openModal('modal-staf-create')">
            ➕ Tambah Staf
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Semua Staf</h3>
            <div class="filter-bar" style="margin:0">
              <div class="search-input" style="min-width:200px">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Cari nama / NIP...">
              </div>
              <select style="width:150px;padding:8px 12px;font-size:13px">
                <option>Semua Jabatan</option>
                <option>Kepala Desa</option>
                <option>Sekretaris</option>
              </select>
            </div>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nama & Jabatan</th>
                  <th>NIP</th>
                  <th>Kontak</th>
                  <th>Jenis Kelamin</th>
                  <th>Bergabung</th>
                  <th>Urutan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--text-light)">1</td>
                  <td>
                    <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#349953,#18444c);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px">B</div>
                  </td>
                  <td>
                    <div class="tbl-name">Budi Santoso, S.Sos</div>
                    <div class="tbl-sub">Kepala Desa • Bidang Pemerintahan</div>
                  </td>
                  <td style="font-family:monospace;font-size:12.5px">19750601 200003 1 001</td>
                  <td>
                    <div style="font-size:12.5px">📧 budi@desa.go.id</div>
                    <div style="font-size:12.5px;color:var(--text-light)">📱 081234567890</div>
                  </td>
                  <td><span class="badge badge-blue">Laki-laki</span></td>
                  <td style="color:var(--text-light)">Mar 2020</td>
                  <td style="font-weight:700;text-align:center;color:var(--heading)">1</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-staf-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">2</td>
                  <td>
                    <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#3b82f6,#1e40af);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px">S</div>
                  </td>
                  <td>
                    <div class="tbl-name">Siti Rahayu, S.E</div>
                    <div class="tbl-sub">Sekretaris Desa • Administrasi</div>
                  </td>
                  <td style="font-family:monospace;font-size:12.5px">19820315 200503 2 002</td>
                  <td>
                    <div style="font-size:12.5px">📧 siti@desa.go.id</div>
                    <div style="font-size:12.5px;color:var(--text-light)">📱 082345678901</div>
                  </td>
                  <td><span class="badge badge-green">Perempuan</span></td>
                  <td style="color:var(--text-light)">Jan 2021</td>
                  <td style="font-weight:700;text-align:center;color:var(--heading)">2</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-staf-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">3</td>
                  <td>
                    <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#b45309);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px">A</div>
                  </td>
                  <td>
                    <div class="tbl-name">Ahmad Fauzi, A.Md</div>
                    <div class="tbl-sub">Kaur Keuangan • Keuangan</div>
                  </td>
                  <td style="font-family:monospace;font-size:12.5px">19900820 201203 1 003</td>
                  <td>
                    <div style="font-size:12.5px">📧 ahmad@desa.go.id</div>
                    <div style="font-size:12.5px;color:var(--text-light)">📱 083456789012</div>
                  </td>
                  <td><span class="badge badge-blue">Laki-laki</span></td>
                  <td style="color:var(--text-light)">Jun 2021</td>
                  <td style="font-weight:700;text-align:center;color:var(--heading)">3</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-staf-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">4</td>
                  <td>
                    <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#14b8a6,#0f766e);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px">D</div>
                  </td>
                  <td>
                    <div class="tbl-name">Dewi Puspitasari</div>
                    <div class="tbl-sub">Kaur Umum • Umum</div>
                  </td>
                  <td style="font-family:monospace;font-size:12.5px">19950101 201903 2 004</td>
                  <td>
                    <div style="font-size:12.5px">📧 dewi@desa.go.id</div>
                    <div style="font-size:12.5px;color:var(--text-light)">📱 084567890123</div>
                  </td>
                  <td><span class="badge badge-green">Perempuan</span></td>
                  <td style="color:var(--text-light)">Sep 2022</td>
                  <td style="font-weight:700;text-align:center;color:var(--heading)">4</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-staf-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">5</td>
                  <td>
                    <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#8b5cf6,#5b21b6);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px">R</div>
                  </td>
                  <td>
                    <div class="tbl-name">Rizky Kurniawan</div>
                    <div class="tbl-sub">Operator Sistem • IT</div>
                  </td>
                  <td style="font-family:monospace;font-size:12.5px">19981212 202203 1 005</td>
                  <td>
                    <div style="font-size:12.5px">📧 rizky@desa.go.id</div>
                    <div style="font-size:12.5px;color:var(--text-light)">📱 085678901234</div>
                  </td>
                  <td><span class="badge badge-blue">Laki-laki</span></td>
                  <td style="color:var(--text-light)">Jan 2023</td>
                  <td style="font-weight:700;text-align:center;color:var(--heading)">5</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-staf-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== BERITA KATEGORI PAGE ===== -->
      <div class="page" id="page-berita-kategori">
        <div class="page-header">
          <div>
            <h2>Kategori Berita</h2>
            <div class="breadcrumb">🏠 Home <span>›</span> Berita <span>›</span> <span>Kategori</span></div>
          </div>
          <button class="btn btn-primary" onclick="openModal('modal-kategori-berita-create')">
            ➕ Tambah Kategori
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Daftar Kategori Berita</h3>
            <div class="search-input" style="min-width:220px;margin:0">
              <span class="search-icon">🔍</span>
              <input type="text" placeholder="Cari kategori...">
            </div>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th style="width:50px">#</th>
                  <th>Nama Kategori</th>
                  <th>Jumlah Berita</th>
                  <th>Dibuat</th>
                  <th style="width:120px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--text-light)">1</td>
                  <td><div class="tbl-name">Pengumuman</div></td>
                  <td><span class="badge badge-amber">28 Berita</span></td>
                  <td style="color:var(--text-light)">01 Jan 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">2</td>
                  <td><div class="tbl-name">Kegiatan</div></td>
                  <td><span class="badge badge-amber">45 Berita</span></td>
                  <td style="color:var(--text-light)">01 Jan 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">3</td>
                  <td><div class="tbl-name">Berita Kesehatan</div></td>
                  <td><span class="badge badge-amber">17 Berita</span></td>
                  <td style="color:var(--text-light)">10 Feb 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">4</td>
                  <td><div class="tbl-name">Infrastruktur</div></td>
                  <td><span class="badge badge-amber">22 Berita</span></td>
                  <td style="color:var(--text-light)">15 Mar 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">5</td>
                  <td><div class="tbl-name">Pendidikan</div></td>
                  <td><span class="badge badge-amber">31 Berita</span></td>
                  <td style="color:var(--text-light)">20 Mar 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-kategori-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== BERITA LIST PAGE ===== -->
      <div class="page" id="page-berita-list">
        <div class="page-header">
          <div>
            <h2>Daftar Berita</h2>
            <div class="breadcrumb">🏠 Home <span>›</span> Berita <span>›</span> <span>Daftar</span></div>
          </div>
          <button class="btn btn-primary" onclick="openModal('modal-berita-create')">
            ➕ Tulis Berita
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Semua Berita</h3>
            <div class="filter-bar" style="margin:0">
              <div class="search-input" style="min-width:200px">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Cari judul berita...">
              </div>
              <select style="width:160px;padding:8px 12px;font-size:13px">
                <option>Semua Kategori</option>
                <option>Pengumuman</option>
                <option>Kegiatan</option>
              </select>
              <select style="width:130px;padding:8px 12px;font-size:13px">
                <option>Semua Status</option>
                <option>Draf</option>
                <option>Terbit</option>
              </select>
            </div>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Thumbnail</th>
                  <th>Judul Berita</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Terbit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--text-light)">1</td>
                  <td><div class="tbl-thumb">🎓</div></td>
                  <td>
                    <div class="tbl-name">Pengumuman PPDB 2025/2026</div>
                    <div class="tbl-sub">Pendaftaran siswa baru dibuka mulai Juni 2025...</div>
                  </td>
                  <td><span class="badge badge-blue">Pendidikan</span></td>
                  <td><span class="badge badge-green">Terbit</span></td>
                  <td style="color:var(--text-light)">10 Jun 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">2</td>
                  <td><div class="tbl-thumb">🏥</div></td>
                  <td>
                    <div class="tbl-name">Posyandu Balita RW 05 Bulan Juni</div>
                    <div class="tbl-sub">Kegiatan posyandu rutin bulanan untuk balita...</div>
                  </td>
                  <td><span class="badge badge-green">Kesehatan</span></td>
                  <td><span class="badge badge-green">Terbit</span></td>
                  <td style="color:var(--text-light)">07 Jun 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">3</td>
                  <td><div class="tbl-thumb">🏗️</div></td>
                  <td>
                    <div class="tbl-name">Pembangunan Jalan Lingkungan RT 03</div>
                    <div class="tbl-sub">Program pembangunan infrastruktur jalan...</div>
                  </td>
                  <td><span class="badge badge-amber">Infrastruktur</span></td>
                  <td><span class="badge badge-gray">Draft</span></td>
                  <td style="color:var(--text-light)">— Belum —</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">4</td>
                  <td><div class="tbl-thumb">📢</div></td>
                  <td>
                    <div class="tbl-name">Jadwal Pemadaman Listrik PLN</div>
                    <div class="tbl-sub">Jadwal pemadaman listrik berencana di wilayah...</div>
                  </td>
                  <td><span class="badge badge-blue">Pengumuman</span></td>
                  <td><span class="badge badge-green">Publish</span></td>
                  <td style="color:var(--text-light)">05 Jun 2025</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="color:var(--text-light)">5</td>
                  <td><div class="tbl-thumb">🎉</div></td>
                  <td>
                    <div class="tbl-name">Perayaan HUT RI ke-80 Tingkat Desa</div>
                    <div class="tbl-sub">Berbagai perlombaan akan diselenggarakan...</div>
                  </td>
                  <td><span class="badge badge-green">Kegiatan</span></td>
                  <td><span class="badge badge-gray">Draft</span></td>
                  <td style="color:var(--text-light)">— Belum —</td>
                  <td>
                    <div class="table-actions">
                      <button class="btn btn-success btn-sm btn-icon" onclick="openModal('modal-berita-edit')">✏️</button>
                      <button class="btn btn-danger btn-sm btn-icon" onclick="openModal('modal-confirm-delete')">🗑️</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div><!-- /content -->
  </div><!-- /main -->
</div><!-- /layout -->

<!-- ============================================================ -->
<!-- MODALS -->
<!-- ============================================================ -->

<!-- MODAL: KATEGORI LAYANAN - CREATE -->
<div class="modal-overlay" id="modal-kategori-layanan-create">
  <div class="modal">
    <div class="modal-header">
      <h3>➕ Tambah Kategori Layanan</h3>
      <button class="modal-close" onclick="closeModal('modal-kategori-layanan-create')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama Kategori <span class="required">*</span></label>
        <input type="text" placeholder="Contoh: Administrasi Kependudukan">
        <span class="hint">Masukkan nama kategori layanan yang deskriptif.</span>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-kategori-layanan-create')">Batal</button>
      <button class="btn btn-primary">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- MODAL: KATEGORI LAYANAN - EDIT -->
<div class="modal-overlay" id="modal-kategori-layanan-edit">
  <div class="modal">
    <div class="modal-header">
      <h3>✏️ Edit Kategori Layanan</h3>
      <button class="modal-close" onclick="closeModal('modal-kategori-layanan-edit')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama Kategori <span class="required">*</span></label>
        <input type="text" value="Administrasi Kependudukan">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-kategori-layanan-edit')">Batal</button>
      <button class="btn btn-primary">💾 Update</button>
    </div>
  </div>
</div>

<!-- MODAL: LAYANAN - CREATE -->
<div class="modal-overlay" id="modal-layanan-create">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>➕ Tambah Layanan Baru</h3>
      <button class="modal-close" onclick="closeModal('modal-layanan-create')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group">
          <label>Nama Layanan <span class="required">*</span></label>
          <input type="text" placeholder="Nama lengkap layanan">
        </div>
        <div class="form-group">
          <label>Slug <span class="required">*</span></label>
          <input type="text" placeholder="nama-layanan-format-url">
          <span class="hint">Auto-generate dari nama. Contoh: pembuatan-ktp</span>
        </div>
        <div class="form-group">
          <label>Kategori Layanan <span class="required">*</span></label>
          <select>
            <option value="">— Pilih Kategori —</option>
            <option>Administrasi Kependudukan</option>
            <option>Layanan Kesehatan</option>
            <option>Surat Menyurat</option>
            <option>Perizinan Usaha</option>
            <option>Sosial & Bantuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Urutan (Sort Order)</label>
          <input type="number" placeholder="1" min="1" value="1">
        </div>
        <div class="form-group full">
          <label>Gambar Layanan</label>
          <div class="img-upload" onclick="document.getElementById('img-layanan-new').click()">
            <div class="upload-icon">📸</div>
            <p><strong>Klik untuk upload</strong> atau drag & drop</p>
            <p style="font-size:11.5px;margin-top:4px">PNG, JPG, WEBP maks. 2MB</p>
          </div>
          <input type="file" id="img-layanan-new" accept="image/*" style="display:none" onchange="previewImg(this,'preview-layanan-new')">
          <img id="preview-layanan-new" class="img-preview" style="display:none">
        </div>
        <div class="form-group full">
          <label>Excerpt <span class="required">*</span></label>
          <textarea rows="2" placeholder="Ringkasan singkat layanan (max 200 karakter)..."></textarea>
        </div>
        <div class="form-group full">
          <label>Deskripsi Lengkap</label>
          <textarea rows="5" placeholder="Deskripsi lengkap tentang layanan ini, syarat, prosedur, dll..."></textarea>
        </div>
        <div class="form-group">
          <label>Status Aktif</label>
          <div style="display:flex;align-items:center;gap:12px;margin-top:4px">
            <div class="toggle on" id="toggle-layanan-new" onclick="this.classList.toggle('on')"></div>
            <span style="font-size:13px;color:var(--text-light)">Layanan aktif dan dapat diakses publik</span>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-layanan-create')">Batal</button>
      <button class="btn btn-primary">💾 Simpan Layanan</button>
    </div>
  </div>
</div>

<!-- MODAL: LAYANAN - EDIT -->
<div class="modal-overlay" id="modal-layanan-edit">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>✏️ Edit Layanan</h3>
      <button class="modal-close" onclick="closeModal('modal-layanan-edit')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group">
          <label>Nama Layanan <span class="required">*</span></label>
          <input type="text" value="Pembuatan KTP Elektronik">
        </div>
        <div class="form-group">
          <label>Slug <span class="required">*</span></label>
          <input type="text" value="pembuatan-ktp-elektronik">
        </div>
        <div class="form-group">
          <label>Kategori Layanan <span class="required">*</span></label>
          <select>
            <option selected>Administrasi Kependudukan</option>
            <option>Layanan Kesehatan</option>
            <option>Surat Menyurat</option>
            <option>Perizinan Usaha</option>
          </select>
        </div>
        <div class="form-group">
          <label>Urutan (Sort Order)</label>
          <input type="number" value="1">
        </div>
        <div class="form-group full">
          <label>Gambar Saat Ini</label>
          <div style="display:flex;align-items:center;gap:14px;padding:12px;background:var(--surface);border-radius:var(--radius-sm);border:1px solid var(--border)">
            <div style="width:60px;height:60px;background:var(--primary-light);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:28px">🪪</div>
            <div>
              <div style="font-size:13px;font-weight:600;color:var(--heading)">ktp-elektronik.jpg</div>
              <div style="font-size:12px;color:var(--text-light);margin-top:2px">512 KB • 800×600px</div>
              <button class="btn btn-outline btn-sm" style="margin-top:8px;font-size:12px" onclick="document.getElementById('img-layanan-edit').click()">📂 Ganti Gambar</button>
            </div>
          </div>
          <input type="file" id="img-layanan-edit" accept="image/*" style="display:none" onchange="previewImg(this,'preview-layanan-edit')">
          <img id="preview-layanan-edit" class="img-preview" style="display:none">
        </div>
        <div class="form-group full">
          <label>Excerpt</label>
          <textarea rows="2">Layanan pembuatan dan pengurusan KTP Elektronik untuk warga negara Indonesia.</textarea>
        </div>
        <div class="form-group full">
          <label>Deskripsi Lengkap</label>
          <textarea rows="5">Kartu Tanda Penduduk Elektronik (e-KTP) adalah identitas resmi penduduk sebagai bukti diri yang diterbitkan oleh Dinas Kependudukan. Syarat pengajuan meliputi surat pengantar RT/RW, KK asli, dan foto 3x4.</textarea>
        </div>
        <div class="form-group">
          <label>Status Aktif</label>
          <div style="display:flex;align-items:center;gap:12px;margin-top:4px">
            <div class="toggle on" onclick="this.classList.toggle('on')"></div>
            <span style="font-size:13px;color:var(--text-light)">Layanan aktif</span>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-layanan-edit')">Batal</button>
      <button class="btn btn-primary">💾 Update Layanan</button>
    </div>
  </div>
</div>

<!-- MODAL: STAF - CREATE -->
<div class="modal-overlay" id="modal-staf-create">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>➕ Tambah Staf Baru</h3>
      <button class="modal-close" onclick="closeModal('modal-staf-create')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <!-- Foto Upload -->
        <div class="form-group full" style="margin-bottom:4px">
          <label>Foto Staf</label>
          <div style="display:flex;align-items:center;gap:16px">
            <div id="foto-placeholder" style="width:80px;height:80px;border-radius:50%;background:var(--surface2);border:2px dashed var(--border);display:flex;align-items:center;justify-content:center;font-size:28px;flex-shrink:0;cursor:pointer" onclick="document.getElementById('foto-staf-new').click()">👤</div>
            <div>
              <button class="btn btn-outline btn-sm" onclick="document.getElementById('foto-staf-new').click()">📸 Upload Foto</button>
              <p class="hint" style="margin-top:6px">JPG, PNG. Ukuran ideal: 400×400px</p>
            </div>
          </div>
          <input type="file" id="foto-staf-new" accept="image/*" style="display:none" onchange="previewFoto(this,'foto-placeholder')">
        </div>

        <div class="form-group">
          <label>Nama Lengkap <span class="required">*</span></label>
          <input type="text" placeholder="Nama lengkap beserta gelar">
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" placeholder="18 digit NIP">
        </div>
        <div class="form-group">
          <label>Jabatan <span class="required">*</span></label>
          <input type="text" placeholder="Contoh: Kepala Desa">
        </div>
        <div class="form-group">
          <label>Profesi</label>
          <input type="text" placeholder="Contoh: Pegawai Negeri Sipil">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" placeholder="email@desa.go.id">
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input type="tel" placeholder="08xxxxxxxxxx">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin <span class="required">*</span></label>
          <select>
            <option value="">— Pilih —</option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date">
        </div>
        <div class="form-group">
          <label>Pendidikan Terakhir</label>
          <select>
            <option>S2 / Magister</option>
            <option>S1 / Sarjana</option>
            <option>D3 / Diploma</option>
            <option>SMA / Sederajat</option>
            <option>SMP / Sederajat</option>
          </select>
        </div>
        <div class="form-group">
          <label>Bergabung Sejak</label>
          <input type="date">
        </div>
        <div class="form-group">
          <label>Urutan Tampil</label>
          <input type="number" placeholder="1" min="1" value="1">
        </div>
        <div class="form-group full">
          <label>Alamat</label>
          <textarea rows="2" placeholder="Alamat lengkap tempat tinggal staf..."></textarea>
        </div>
        <div class="form-group full">
          <label>Deskripsi / Bio</label>
          <textarea rows="3" placeholder="Deskripsi singkat tentang staf, pengalaman, keahlian, dll..."></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-staf-create')">Batal</button>
      <button class="btn btn-primary">💾 Simpan Data Staf</button>
    </div>
  </div>
</div>

<!-- MODAL: STAF - EDIT -->
<div class="modal-overlay" id="modal-staf-edit">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>✏️ Edit Data Staf</h3>
      <button class="modal-close" onclick="closeModal('modal-staf-edit')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group full">
          <label>Foto Staf</label>
          <div style="display:flex;align-items:center;gap:16px">
            <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#349953,#18444c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:28px;font-weight:700;flex-shrink:0">B</div>
            <div>
              <div style="font-weight:600;font-size:13px;color:var(--heading)">Budi Santoso, S.Sos</div>
              <div style="font-size:12px;color:var(--text-light);margin-top:2px">budi-santoso.jpg • 128 KB</div>
              <button class="btn btn-outline btn-sm" style="margin-top:8px;font-size:12px" onclick="document.getElementById('foto-staf-edit').click()">📸 Ganti Foto</button>
            </div>
          </div>
          <input type="file" id="foto-staf-edit" accept="image/*" style="display:none">
        </div>
        <div class="form-group">
          <label>Nama Lengkap <span class="required">*</span></label>
          <input type="text" value="Budi Santoso, S.Sos">
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" value="19750601 200003 1 001">
        </div>
        <div class="form-group">
          <label>Jabatan <span class="required">*</span></label>
          <input type="text" value="Kepala Desa">
        </div>
        <div class="form-group">
          <label>Profesi</label>
          <input type="text" value="Pegawai Negeri Sipil">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" value="budi@desa.go.id">
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input type="tel" value="081234567890">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select>
            <option selected>Laki-laki</option>
            <option>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" value="1975-06-01">
        </div>
        <div class="form-group">
          <label>Pendidikan Terakhir</label>
          <select>
            <option>S2 / Magister</option>
            <option selected>S1 / Sarjana</option>
            <option>D3 / Diploma</option>
          </select>
        </div>
        <div class="form-group">
          <label>Bergabung Sejak</label>
          <input type="date" value="2020-03-01">
        </div>
        <div class="form-group">
          <label>Urutan Tampil</label>
          <input type="number" value="1">
        </div>
        <div class="form-group full">
          <label>Alamat</label>
          <textarea rows="2">Jl. Merdeka No. 12, RT 01/RW 02, Desa Sukamaju, Kec. Bojong, Kab. Purwakarta</textarea>
        </div>
        <div class="form-group full">
          <label>Deskripsi / Bio</label>
          <textarea rows="3">Kepala Desa dengan pengalaman lebih dari 20 tahun di bidang pemerintahan desa. Memimpin berbagai program pembangunan dan pemberdayaan masyarakat.</textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-staf-edit')">Batal</button>
      <button class="btn btn-primary">💾 Perbarui Data Staf</button>
    </div>
  </div>
</div>

<!-- MODAL: KATEGORI BERITA - CREATE -->
<div class="modal-overlay" id="modal-kategori-berita-create">
  <div class="modal">
    <div class="modal-header">
      <h3>➕ Tambah Kategori Berita</h3>
      <button class="modal-close" onclick="closeModal('modal-kategori-berita-create')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama Kategori <span class="required">*</span></label>
        <input type="text" placeholder="Contoh: Pengumuman, Kegiatan, Kesehatan">
        <span class="hint">Nama kategori yang akan tampil di website.</span>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-kategori-berita-create')">Batal</button>
      <button class="btn btn-primary">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- MODAL: KATEGORI BERITA - EDIT -->
<div class="modal-overlay" id="modal-kategori-berita-edit">
  <div class="modal">
    <div class="modal-header">
      <h3>✏️ Edit Kategori Berita</h3>
      <button class="modal-close" onclick="closeModal('modal-kategori-berita-edit')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama Kategori <span class="required">*</span></label>
        <input type="text" value="Pengumuman">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-kategori-berita-edit')">Batal</button>
      <button class="btn btn-primary">💾 Update</button>
    </div>
  </div>
</div>

<!-- MODAL: BERITA - CREATE -->
<div class="modal-overlay" id="modal-berita-create">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>✍️ Tulis Berita Baru</h3>
      <button class="modal-close" onclick="closeModal('modal-berita-create')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group full">
          <label>Judul Berita <span class="required">*</span></label>
          <input type="text" placeholder="Masukkan judul berita yang menarik...">
        </div>
        <div class="form-group full">
          <label>Slug</label>
          <input type="text" placeholder="judul-berita-format-url">
          <span class="hint">Akan otomatis dibuat dari judul jika dikosongkan.</span>
        </div>
        <div class="form-group">
          <label>Kategori <span class="required">*</span></label>
          <select>
            <option value="">— Pilih Kategori —</option>
            <option>Pengumuman</option>
            <option>Kegiatan</option>
            <option>Berita Kesehatan</option>
            <option>Infrastruktur</option>
            <option>Pendidikan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status <span class="required">*</span></label>
          <select>
            <option value="draft">📝 Draft</option>
            <option value="publish">🟢 Publish</option>
          </select>
        </div>
        <div class="form-group full">
          <label>Tanggal Publish</label>
          <input type="date">
          <span class="hint">Kosongkan jika ingin terbitkan sekarang saat status diubah ke Terbit.</span>
        </div>
        <div class="form-group full">
          <label>Excerpt / Ringkasan</label>
          <textarea rows="2" placeholder="Ringkasan singkat berita yang akan tampil di halaman daftar berita..."></textarea>
        </div>
        <div class="form-group full">
          <label>Konten Berita <span class="required">*</span></label>
          <div style="border:1.5px solid var(--border);border-radius:var(--radius-sm);overflow:hidden">
            <div style="padding:8px 12px;background:var(--surface);border-bottom:1px solid var(--border);display:flex;gap:6px;flex-wrap:wrap">
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><strong>B</strong></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><em>I</em></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><u>U</u></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">H1</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">H2</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">🔗</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">📸</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">📋 List</button>
            </div>
            <textarea rows="8" placeholder="Tulis konten berita lengkap di sini..." style="border:none;border-radius:0;outline:none;box-shadow:none"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label>Thumbnail</label>
          <div class="img-upload" onclick="document.getElementById('thumb-berita-new').click()">
            <div class="upload-icon">🖼️</div>
            <p><strong>Upload Thumbnail</strong></p>
            <p style="font-size:11.5px;margin-top:4px">Ukuran ideal 600×400px</p>
          </div>
          <input type="file" id="thumb-berita-new" accept="image/*" style="display:none" onchange="previewImg(this,'preview-thumb-new')">
          <img id="preview-thumb-new" class="img-preview" style="display:none">
        </div>
        <div class="form-group">
          <label>Gambar Utama</label>
          <div class="img-upload" onclick="document.getElementById('img-berita-new').click()">
            <div class="upload-icon">📷</div>
            <p><strong>Upload Gambar Utama</strong></p>
            <p style="font-size:11.5px;margin-top:4px">Ukuran ideal 1200×630px</p>
          </div>
          <input type="file" id="img-berita-new" accept="image/*" style="display:none" onchange="previewImg(this,'preview-img-new')">
          <img id="preview-img-new" class="img-preview" style="display:none">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-berita-create')">Batal</button>
      <button class="btn btn-success">📝 Simpan Draft</button>
      <button class="btn btn-primary">🚀 Terbitkan Sekarang</button>
    </div>
  </div>
</div>

<!-- MODAL: BERITA - EDIT -->
<div class="modal-overlay" id="modal-berita-edit">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3>✏️ Edit Berita</h3>
      <button class="modal-close" onclick="closeModal('modal-berita-edit')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group full">
          <label>Judul Berita <span class="required">*</span></label>
          <input type="text" value="Pengumuman PPDB 2025/2026">
        </div>
        <div class="form-group full">
          <label>Slug</label>
          <input type="text" value="pengumuman-ppdb-2025-2026">
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select>
            <option>Pengumuman</option>
            <option selected>Pendidikan</option>
            <option>Kegiatan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select>
            <option value="draft">📝 Draft</option>
            <option value="publish" selected>🟢 Publish</option>
          </select>
        </div>
        <div class="form-group full">
          <label>Tanggal Publish</label>
          <input type="date" value="2025-06-10">
        </div>
        <div class="form-group full">
          <label>Excerpt</label>
          <textarea rows="2">Pendaftaran Peserta Didik Baru (PPDB) tahun ajaran 2025/2026 dibuka mulai 10 Juni 2025 secara online.</textarea>
        </div>
        <div class="form-group full">
          <label>Konten Berita</label>
          <div style="border:1.5px solid var(--border);border-radius:var(--radius-sm);overflow:hidden">
            <div style="padding:8px 12px;background:var(--surface);border-bottom:1px solid var(--border);display:flex;gap:6px;flex-wrap:wrap">
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><strong>B</strong></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><em>I</em></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px"><u>U</u></button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">H1</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">H2</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">🔗</button>
              <button class="btn btn-outline btn-sm" type="button" style="font-size:12px;padding:3px 10px">📸</button>
            </div>
            <textarea rows="7" style="border:none;border-radius:0;outline:none;box-shadow:none">Dinas Pendidikan mengumumkan bahwa Penerimaan Peserta Didik Baru (PPDB) tahun ajaran 2025/2026 resmi dibuka pada tanggal 10 Juni 2025. Pendaftaran dilakukan secara online melalui website resmi dinas pendidikan setempat.

Persyaratan umum pendaftaran meliputi: fotokopi akta kelahiran, kartu keluarga, ijazah atau STTB, dan pas foto terbaru. Untuk informasi lebih lanjut, silakan menghubungi kantor desa atau mengunjungi website resmi.</textarea>
          </div>
        </div>
        <div class="form-group">
          <label>Thumbnail Saat Ini</label>
          <div style="padding:10px;background:var(--surface);border-radius:var(--radius-sm);border:1px solid var(--border)">
            <div style="display:flex;align-items:center;gap:12px">
              <div style="width:60px;height:45px;background:var(--primary-light);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:22px">🎓</div>
              <div>
                <div style="font-size:12.5px;font-weight:600">ppdb-thumbnail.jpg</div>
                <div style="font-size:11.5px;color:var(--text-light)">256 KB</div>
              </div>
            </div>
            <button class="btn btn-outline btn-sm" style="margin-top:8px;font-size:12px;width:100%;justify-content:center" onclick="document.getElementById('thumb-berita-edit').click()">🔄 Ganti Thumbnail</button>
          </div>
          <input type="file" id="thumb-berita-edit" accept="image/*" style="display:none" onchange="previewImg(this,'preview-thumb-edit')">
          <img id="preview-thumb-edit" class="img-preview" style="display:none">
        </div>
        <div class="form-group">
          <label>Gambar Utama Saat Ini</label>
          <div style="padding:10px;background:var(--surface);border-radius:var(--radius-sm);border:1px solid var(--border)">
            <div style="display:flex;align-items:center;gap:12px">
              <div style="width:60px;height:45px;background:var(--primary-light);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:22px">📷</div>
              <div>
                <div style="font-size:12.5px;font-weight:600">ppdb-main.jpg</div>
                <div style="font-size:11.5px;color:var(--text-light)">1.2 MB</div>
              </div>
            </div>
            <button class="btn btn-outline btn-sm" style="margin-top:8px;font-size:12px;width:100%;justify-content:center" onclick="document.getElementById('img-berita-edit').click()">🔄 Ganti Gambar</button>
          </div>
          <input type="file" id="img-berita-edit" accept="image/*" style="display:none" onchange="previewImg(this,'preview-img-edit')">
          <img id="preview-img-edit" class="img-preview" style="display:none">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-berita-edit')">Batal</button>
      <button class="btn btn-success">📝 Simpan Draft</button>
      <button class="btn btn-primary">💾 Perbarui Berita</button>
    </div>
  </div>
</div>

<!-- MODAL: CONFIRM DELETE -->
<div class="modal-overlay" id="modal-confirm-delete">
  <div class="modal" style="max-width:420px">
    <div class="modal-header">
      <h3 style="color:var(--danger)">🗑️ Konfirmasi Hapus</h3>
      <button class="modal-close" onclick="closeModal('modal-confirm-delete')">✕</button>
    </div>
    <div class="modal-body" style="text-align:center;padding:28px 24px">
      <div style="font-size:48px;margin-bottom:12px">⚠️</div>
      <h4 style="font-size:16px;margin-bottom:8px;color:var(--heading)">Yakin ingin menghapus data ini?</h4>
      <p style="font-size:13.5px;color:var(--text-light);line-height:1.6">Tindakan ini tidak dapat dibatalkan. Data yang sudah dihapus tidak dapat dikembalikan.</p>
    </div>
    <div class="modal-footer" style="justify-content:center;gap:12px">
      <button class="btn btn-outline" onclick="closeModal('modal-confirm-delete')" style="min-width:100px">Batal</button>
      <button class="btn btn-danger" style="min-width:100px;background:var(--danger);color:#fff">🗑️ Hapus</button>
    </div>
  </div>
</div>

<script>
  // ---- PAGE NAVIGATION ----
  function showPage(id, el) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    const page = document.getElementById('page-' + id);
    if (page) page.classList.add('active');

    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    if (el) el.classList.add('active');

    const titles = {
      'dashboard': ['Beranda', 'Selamat datang kembali, Admin 👋'],
      'layanan-kategori': ['Kategori Layanan', 'Layanan › Kategori'],
      'layanan-list': ['Daftar Layanan', 'Layanan › Semua Data'],
      'staf-list': ['Data Staf', 'Manajemen Staf'],
      'berita-kategori': ['Kategori Berita', 'Berita › Kategori'],
      'berita-list': ['Daftar Berita', 'Berita › Semua Artikel'],
    };
    if (titles[id]) {
      const tb = document.getElementById('topbar-title');
      tb.childNodes[0].textContent = titles[id][0];
      tb.querySelector('span').textContent = titles[id][1];
    }
  }

  // ---- SUB NAV ----
  function toggleSub(subId, el) {
    const sub = document.getElementById(subId);
    const isOpen = sub.classList.contains('open');
    sub.classList.toggle('open', !isOpen);
    el.classList.toggle('open', !isOpen);
  }

  // ---- MODAL ----
  function openModal(id) {
    const m = document.getElementById(id);
    if (m) m.classList.add('open');
  }

  function closeModal(id) {
    const m = document.getElementById(id);
    if (m) m.classList.remove('open');
  }

  // Close on overlay click
  document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
      if (e.target === this) this.classList.remove('open');
    });
  });

  // ---- IMAGE PREVIEW ----
  function previewImg(input, previewId) {
    const file = input.files[0];
    const preview = document.getElementById(previewId);
    if (file && preview) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  }

  function previewFoto(input, placeholderId) {
    const file = input.files[0];
    const placeholder = document.getElementById(placeholderId);
    if (file && placeholder) {
      const reader = new FileReader();
      reader.onload = e => {
        placeholder.style.background = 'none';
        placeholder.innerHTML = '';
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.cssText = 'width:80px;height:80px;border-radius:50%;object-fit:cover;';
        placeholder.appendChild(img);
      };
      reader.readAsDataURL(file);
    }
  }

  // ---- SIDEBAR MOBILE ----
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('mobile-open');
  }

  // ---- RESPONSIVE ----
  function checkMobile() {
    const btn = document.getElementById('menu-btn');
    btn.style.display = window.innerWidth <= 640 ? 'flex' : 'none';
  }

  window.addEventListener('resize', checkMobile);
  checkMobile();
</script>
</body>
</html>
