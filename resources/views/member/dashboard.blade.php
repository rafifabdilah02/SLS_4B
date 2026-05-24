<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Smart Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: { fontFamily: { sans: ['Poppins', 'sans-serif'] } }
            }
        }
    </script>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden font-sans text-gray-800">

    <aside class="w-24 bg-white m-4 rounded-[2rem] shadow-sm border border-gray-100 flex flex-col items-center py-8 z-10 shrink-0">
        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-400 rounded-2xl flex items-center justify-center text-white shadow-md mb-10">
            <i class="fas fa-graduation-cap text-2xl"></i>
        </div>

        <nav class="flex flex-col gap-6 w-full items-center">
            <a href="{{ route('member.dashboard') }}" class="w-12 h-12 rounded-xl flex items-center justify-center bg-blue-50 text-blue-600 shadow-inner group" title="Dashboard">
                <i class="fas fa-home text-lg group-hover:scale-110 transition-transform"></i>
            </a>
            <a href="{{ route('member.search') }}" class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-blue-500 transition-colors group" title="Search Book">
                <i class="fas fa-search text-lg group-hover:scale-110 transition-transform"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-orange-500 transition-colors group" title="My Requests">
                <i class="fas fa-hourglass-half text-lg group-hover:scale-110 transition-transform"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-red-500 transition-colors group" title="Books to Return">
                <i class="fas fa-undo text-lg group-hover:scale-110 transition-transform"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-teal-500 transition-colors group" title="History">
                <i class="fas fa-history text-lg group-hover:scale-110 transition-transform"></i>
            </a>
        </nav>

        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-500 transition-colors group" title="Logout">
                    <i class="fas fa-sign-out-alt text-lg group-hover:scale-110 transition-transform"></i>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col my-4 mr-4 overflow-hidden">
        
        <header class="bg-white rounded-3xl shadow-sm border border-gray-100 h-20 px-6 flex items-center justify-between shrink-0 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-700 to-blue-500 rounded-lg flex items-center justify-center text-white shadow-sm">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-800 tracking-tight">Smart Library</h1>
            </div>

            <div class="flex-1 max-w-xl mx-8 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-sparkles text-blue-400"></i>
                </div>
                <input type="text" placeholder="Search, ask AI..." class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 transition-colors">
            </div>

            <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Member' }}</p>
                    <p class="text-xs text-gray-500">Student</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-blue-600 font-bold shadow-sm">
                    {{ substr(Auth::user()->name ?? 'M', 0, 1) }}
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-2 pb-6">
            
            <div class="mb-8">
                <p class="text-sm text-gray-500 mb-1 font-medium">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                <h2 class="text-3xl font-bold text-gray-900">
                    Welcome back, {{ explode(' ', Auth::user()->name ?? 'Member')[0] }}! <span class="text-yellow-500">👋</span>
                </h2>
                <p class="text-gray-500 mt-1">Here is the latest update on your library activities.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                
                <a href="{{ route('member.search') }}" class="bg-[#EEF2FF] p-6 rounded-[2rem] border-2 border-transparent hover:border-blue-400 transition-all cursor-pointer group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-book-open text-xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-1">Issued Books</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $issuedCount ?? 0 }}</h3>
                </a>

                <a href="#" class="bg-[#FFF3E0] p-6 rounded-[2rem] border-2 border-transparent hover:border-orange-400 transition-all cursor-pointer group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-orange-500 mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-hourglass-half text-xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-1">Pending Requests</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $pendingCount ?? 0 }}</h3>
                </a>

                <a href="#" class="bg-[#FFEBEE] p-6 rounded-[2rem] border-2 border-transparent hover:border-red-400 transition-all cursor-pointer group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-red-500 mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-undo text-xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-1">Books to Return</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $toReturnCount ?? 0 }}</h3>
                </a>

                <a href="#" class="bg-[#E0F2F1] p-6 rounded-[2rem] border-2 border-transparent hover:border-teal-400 transition-all cursor-pointer group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-teal-600 mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-history text-xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-1">Total Borrowed</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $totalBorrowedCount ?? 0 }}</h3>
                </a>

            </div>

        </div>
    </main>

</body>
</html>