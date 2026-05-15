<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Kelas — E-Tutor</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f0f2f5;
      color: #1e293b;
      min-height: 100vh;
    }

    .layout { display: flex; min-height: 100vh; }

    /* ================================================================
       SIDEBAR
       ================================================================ */
    .sidebar {
      width: 270px; min-height: 100vh;
      background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
      color: #fff; position: fixed; top: 0; left: 0; z-index: 100;
      display: flex; flex-direction: column;
      border-right: 1px solid rgba(255,255,255,0.06);
    }
    .sidebar-brand { padding: 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 12px; }
    .sidebar-brand .brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 11px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 17px; color: #fff; }
    .sidebar-brand .brand-text { font-weight: 700; font-size: 17px; letter-spacing: -0.02em; }
    .sidebar-brand .brand-sub { font-size: 11px; color: #64748b; margin-top: 1px; }
    .sidebar-nav { flex: 1; padding: 12px 10px; display: flex; flex-direction: column; gap: 2px; overflow-y: auto; }
    .nav-item { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; text-decoration: none; transition: all 0.2s; cursor: pointer; position: relative; }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-item.active { background: linear-gradient(135deg, #3b82f6, #2563eb) !important; color: #fff !important; box-shadow: 0 3px 12px rgba(59,130,246,0.3); font-weight: 600; }
    .nav-item .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-item .notif-badge { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: #ef4444; color: #fff; font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 10px; min-width: 18px; text-align: center; }
    
    .nav-parent { margin: 4px 0 2px; }
    .nav-parent > summary { display: flex; align-items: center; gap: 11px; padding: 10px 14px; border-radius: 9px; font-size: 13.5px; font-weight: 500; color: #94a3b8; cursor: pointer; transition: all 0.2s; user-select: none; list-style: none; }
    .nav-parent > summary::-webkit-details-marker { display: none; }
    .nav-parent > summary:hover { background: rgba(255,255,255,0.06); color: #e2e8f0; }
    .nav-parent > summary .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .nav-parent > summary .chevron { margin-left: auto; font-size: 11px; color: #475569; transition: transform 0.25s ease; }
    .nav-parent[open] > summary .chevron { transform: rotate(90deg); }
    .nav-parent[open] > summary { color: #cbd5e1; }
    .nav-children { padding: 4px 0 6px 0; display: flex; flex-direction: column; gap: 1px; }
    .nav-child { display: flex; align-items: center; gap: 10px; padding: 8px 14px 8px 46px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #64748b; text-decoration: none; transition: all 0.2s; cursor: pointer; position: relative; }
    .nav-child::before { content: ''; position: absolute; left: 30px; top: 50%; transform: translateY(-50%); width: 5px; height: 5px; border-radius: 50%; background: #334155; transition: all 0.2s; }
    .nav-child:hover { color: #cbd5e1; background: rgba(255,255,255,0.04); }
    .nav-child:hover::before { background: #64748b; }
    .nav-child.active { color: #fff; background: rgba(59,130,246,0.15); font-weight: 600; }
    .nav-child.active::before { background: #3b82f6; box-shadow: 0 0 6px rgba(59,130,246,0.5); width: 6px; height: 6px; }
    .nav-separator { height: 1px; background: rgba(255,255,255,0.06); margin: 8px 14px; }
    
    .sidebar-footer { padding: 14px; border-top: 1px solid rgba(255,255,255,0.08); }
    .user-card { display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 10px; background: rgba(255,255,255,0.04); }
    .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; }
    .user-info .user-name { font-size: 12.5px; font-weight: 600; color: #f1f5f9; }
    .user-info .user-role { font-size: 10.5px; color: #64748b; }
    .btn-logout { width: 100%; margin-top: 8px; padding: 8px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(239,68,68,0.1); color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif; border: none; }
    .btn-logout:hover { background: rgba(239,68,68,0.2); }

    /* ================================================================
       MAIN CONTENT
       ================================================================ */
    .main-content {
      margin-left: 270px; flex: 1; min-height: 100vh;
      display: flex; flex-direction: column; background-color: #f0f2f5;
    }
    .topbar {
      background: #fff; padding: 14px 32px;
      display: flex; align-items: center; justify-content: flex-end;
      border-bottom: 1px solid #e2e8f0;
      position: sticky; top: 0; z-index: 50;
    }
    .topbar-right { display: flex; align-items: center; gap: 10px; }
    .topbar-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #64748b; font-size: 16px; transition: all 0.2s; position: relative; }
    .notif-dot { position: absolute; top: 7px; right: 7px; width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; }

    /* ================================================================
       PAGE HEADER
       ================================================================ */
    .page-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e40af 40%, #3b82f6 100%);
      padding: 36px 32px 40px; position: relative; overflow: hidden;
    }
    .page-header::before { content: ''; position: absolute; top: -60%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius: 50%; }
    .page-header-inner { position: relative; z-index: 2; display: flex; align-items: flex-start; justify-content: space-between; }
    .page-header-text h1 { font-size: 26px; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 6px; }
    .page-header-text p { font-size: 14px; color: rgba(255,255,255,0.7); max-width: 540px; line-height: 1.6; }
    
    /* ================================================================
       TABLE SECTION
       ================================================================ */
    .table-section { padding: 28px 32px 40px; flex: 1; }
    .table-wrapper { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.04); }
    table { width: 100%; border-collapse: collapse; }
    thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
    thead th { padding: 14px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #64748b; text-align: left; }
    tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
    tbody td { padding: 16px; font-size: 13px; color: #334155; }

    .status-badge { display: inline-flex; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; }
    .status-past { background: #f1f5f9; color: #64748b; }
    .status-active { background: #dcfce7; color: #16a34a; }
    .status-upcoming { background: #eff6ff; color: #2563eb; }

    .btn-delete { display: inline-flex; align-items: center; gap: 4px; padding: 6px 12px; border-radius: 8px; border: 1px solid #fee2e2; background: #fff; color: #dc2626; font-size: 11px; font-weight: 700; cursor: pointer; transition: all 0.2s; }
    .btn-delete:hover { background: #fee2e2; border-color: #fecaca; }
    .btn-delete:disabled { opacity: 0.5; cursor: not-allowed; background: #f8fafc; border-color: #e2e8f0; color: #94a3b8; }
  </style>
</head>
<body>
<div class="layout">
  <x-sidebar />

  <main class="main-content">
    <div class="topbar">
      <div class="topbar-right">
        <a href="{{ route('notifications.index') }}" class="topbar-btn">
          🔔@if(Auth::user()->notifications()->where('is_read', false)->exists())<span class="notif-dot"></span>@endif
        </a>
      </div>
    </div>

    <div class="page-header">
      <div class="page-header-inner">
        <div class="page-header-text">
          <h1>Kelola Kelas</h1>
          <p>Daftar seluruh kelas yang ada di sistem. Anda dapat menghapus kelas yang sudah selesai atau lewat jadwalnya.</p>
        </div>
        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl px-5 py-3 text-center">
            <div class="text-2xl font-extrabold text-white">{{ $classes->total() }}</div>
            <div class="text-[10px] uppercase tracking-wider font-semibold text-white/60">Total Kelas</div>
        </div>
      </div>
    </div>

    <div class="table-section">
      @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
          <span class="text-xl">✅</span>
          <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
          <span class="text-xl">❌</span>
          <span class="font-medium text-sm">{{ session('error') }}</span>
        </div>
      @endif

      <div class="flex items-center justify-between mb-6">
        <form action="{{ route('admin.manage-classes') }}" method="GET" class="relative group">
          <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-500 transition-colors">🔍</span>
          <input type="text" name="search" placeholder="Cari topik atau tutor..." value="{{ $search }}" class="pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all w-80 shadow-sm">
        </form>
      </div>

      <div class="table-wrapper">
        <div class="overflow-x-auto">
          <table>
            <thead>
              <tr>
                <th class="w-16 text-center">No</th>
                <th>Nama Kelas / Topik</th>
                <th>Tutor</th>
                <th>Waktu & Tanggal</th>
                <th class="text-center">Peserta</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($classes as $index => $class)
                @php
                  $waktu_mulai = explode(' - ', $class->waktu)[0];
                  $start_time = \Carbon\Carbon::parse($class->tanggal->format('Y-m-d') . ' ' . $waktu_mulai);
                  $is_past = $start_time->isPast();
                @endphp
                <tr>
                  <td class="text-center font-medium text-slate-400">{{ $classes->firstItem() + $index }}</td>
                  <td>
                    <div class="font-bold text-slate-700">{{ $class->topik_pembahasan }}</div>
                    <div class="text-[11px] text-slate-400 mt-0.5">ID: #{{ str_pad($class->id, 5, '0', STR_PAD_LEFT) }}</div>
                  </td>
                  <td>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-600">
                            {{ strtoupper(substr($class->user->name, 0, 2)) }}
                        </div>
                        <span class="font-semibold text-slate-600">{{ $class->user->name }}</span>
                    </div>
                  </td>
                  <td>
                    <div class="flex flex-col">
                        <span class="font-medium text-slate-600">{{ $class->tanggal->translatedFormat('d M Y') }}</span>
                        <span class="text-[11px] text-slate-400 font-medium">{{ $class->waktu }}</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <span class="px-2 py-1 bg-slate-100 rounded-lg text-xs font-bold text-slate-600">
                        {{ $class->pendaftaran_count }}
                    </span>
                  </td>
                  <td>
                    @if($is_past)
                      <span class="status-badge status-past">Selesai / Lewat</span>
                    @else
                      <span class="status-badge status-upcoming">Akan Datang</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($is_past)
                      <button onclick="confirmDelete({{ $class->id }}, '{{ $class->topik_pembahasan }}')" class="btn-delete">
                        🗑️ Hapus
                      </button>
                    @else
                      <button class="btn-delete" disabled title="Kelas aktif tidak bisa dihapus">
                        🗑️ Hapus
                      </button>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-20">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="text-5xl mb-4">📂</span>
                        <p class="text-sm font-medium">Tidak ada data kelas yang ditemukan.</p>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        @if($classes->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $classes->links() }}
            </div>
        @endif
      </div>
    </div>
  </main>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    <div class="bg-white rounded-2xl w-full max-w-md relative z-10 shadow-2xl overflow-hidden transform transition-all">
        <div class="p-8 text-center">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6 border-4 border-red-100">
                ⚠️
            </div>
            <h3 class="text-xl font-extrabold text-slate-800 mb-2">Hapus Kelas?</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-8">
                Apakah Anda yakin ingin menghapus kelas <span id="deleteClassName" class="font-bold text-slate-800"></span>? Data pendaftaran dan notifikasi terkait juga akan ikut dihapus secara aman (Soft Delete).
            </p>
            <div class="flex gap-3">
                <button onclick="closeDeleteModal()" class="flex-1 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg shadow-red-600/20 transition-all">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const nameSpan = document.getElementById('deleteClassName');
        
        nameSpan.textContent = name;
        form.action = `/admin/manage-classes/${id}`;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
</body>
</html>
