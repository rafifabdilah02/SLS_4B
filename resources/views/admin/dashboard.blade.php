<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Smart Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden text-gray-800">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-xl shrink-0">
        <div class="h-20 flex items-center px-6 border-b border-slate-800 gap-3">
            <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1 class="text-xl font-bold tracking-wide text-gray-100">Admin Panel</h1>
        </div>

        <nav class="flex-1 py-6 px-4 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-indigo-600 text-white rounded-xl shadow-md transition-all">
                <i class="fas fa-chart-line w-5"></i> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <i class="fas fa-book w-5"></i> Kelola Buku
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <i class="fas fa-users w-5"></i> Kelola Member
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-all">
                    <i class="fas fa-sign-out-alt w-5"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        
        <header class="h-20 bg-white border-b border-gray-200 px-8 flex items-center justify-between shrink-0">
            <h2 class="text-2xl font-bold text-gray-800">Overview</h2>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-xs text-indigo-500 font-medium">System Admin</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fas fa-book"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Koleksi Buku</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ count($books ?? []) }} Buku</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-5">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fas fa-hand-holding-hand"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Buku Sedang Dipinjam</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ count($borrowings ?? []) }} Transaksi</h3>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                        <h3 class="text-lg font-bold text-gray-800"><i class="fas fa-list text-indigo-500 mr-2"></i>Daftar Buku</h3>
                        <a href="{{ route('admin.books.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            + Tambah Buku
                        </a>
                    </div>
                    <div class="p-0 overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-gray-50 text-gray-500">
                                <tr>
                                    <th class="px-6 py-3 font-medium">Judul Buku</th>
                                    <th class="px-6 py-3 font-medium">Stok</th>
                                    <th class="px-6 py-3 font-medium text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($books as $book)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $book->title }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">{{ $book->stock }} Tersedia</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus buku ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:bg-red-50 px-2 py-1 rounded"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada data buku.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-lg font-bold text-gray-800"><i class="fas fa-exchange-alt text-orange-500 mr-2"></i>Transaksi Peminjaman</h3>
                    </div>
                    <div class="p-0 overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-gray-50 text-gray-500">
                                <tr>
                                    <th class="px-6 py-3 font-medium">Peminjam</th>
                                    <th class="px-6 py-3 font-medium">Buku</th>
                                    <th class="px-6 py-3 font-medium text-right">Aksi / Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($borrowings as $b)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $b->user->name ?? 'User Hapus' }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $b->book->title ?? 'Buku Hapus' }}</td>
                                    <td class="px-6 py-4 text-right">
                                        @if ($b->status == 'dipinjam')
                                            <form action="{{ route('admin.return', $b->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 font-medium rounded-lg text-xs transition-colors">
                                                    Terima Pengembalian
                                                </button>
                                            </form>
                                        @else
                                            <span class="px-2.5 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-semibold">Dikembalikan</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada transaksi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>