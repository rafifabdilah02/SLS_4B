<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Library - @yield('title')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'], },
                    colors: {
                        'smart-blue': '#3B82F6',
                        'smart-blue-gradient-start': '#4F46E5',
                        'smart-blue-gradient-end': '#3B82F6',
                    }
                }
            }
        }
    </script>
    
    <style>
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 flex min-h-screen">

    <aside class="w-64 bg-gradient-to-b from-smart-blue-gradient-start to-smart-blue-gradient-end text-white p-6 flex flex-col fixed h-full z-10 rounded-r-3xl">
        
        <div class="flex items-center gap-3 mb-10">
            <div class="bg-white text-smart-blue p-3 rounded-2xl shadow-lg flex items-center justify-center">
                <i class="fas fa-graduation-cap fa-lg"></i>
            </div>
            <h1 class="text-xl font-bold tracking-tight">Smart Library</h1>
        </div>

        <nav class="flex-1 space-y-2">
            <a href="{{ route('member.dashboard') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-colors {{ request()->routeIs('member.dashboard') ? 'bg-white/20 font-medium' : '' }}">
                <i class="fas fa-th-large w-5"></i>
                Dashboard
            </a>
            
            <a href="{{ route('member.search') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-colors {{ request()->routeIs('member.search') ? 'bg-white/20 font-medium' : '' }}">
                <i class="fas fa-search w-5"></i>
                Search Book
            </a>
            
            <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-colors">
                <i class="fas fa-pen-fancy w-5"></i>
                My Requests
            </a>
            
            <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-colors">
                <i class="fas fa-history w-5"></i>
                Issued Books History
            </a>
        </nav>

        <div class="mt-auto border-t border-white/20 pt-5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full p-3 rounded-xl hover:bg-white/10 text-left transition-colors">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 ml-64 p-8">
        
        <header class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between mb-8">
            <div class="relative w-96">
                <input type="text" placeholder="Ask AI" class="w-full pl-12 pr-4 py-2.5 bg-gray-50 border border-gray-100 rounded-full focus:ring-2 focus:ring-smart-blue focus:bg-white focus:border-smart-blue transition-all outline-none">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
            
            <div class="flex items-center gap-3 cursor-pointer p-1.5 hover:bg-gray-50 rounded-full transition-colors">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=3B82F6&color=fff" 
                     alt="User Profile" class="w-10 h-10 rounded-full border-2 border-smart-blue shadow">
                <div>
                    <p class="font-semibold text-sm">{{ auth()->user()->name ?? 'Student' }}</p>
                    <p class="text-xs text-gray-500">Student</p>
                </div>
                <i class="fas fa-chevron-down text-xs text-gray-400 ml-2"></i>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
        
    </div>

</body>
</html>