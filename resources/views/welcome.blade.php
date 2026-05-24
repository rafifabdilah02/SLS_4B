<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Library - Welcome</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        'smart-blue': '#3B82F6',
                        'smart-blue-gradient-start': '#4F46E5',
                        'smart-blue-gradient-end': '#3B82F6',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans text-gray-900 flex flex-col min-h-screen">

    <nav class="w-full px-8 py-5 flex justify-between items-center bg-white shadow-sm relative z-20">
        <div class="flex items-center gap-3">
            <div class="bg-gradient-to-r from-smart-blue-gradient-start to-smart-blue-gradient-end text-white p-2.5 rounded-xl shadow-md flex items-center justify-center">
                <i class="fas fa-graduation-cap fa-lg"></i>
            </div>
            <h1 class="text-xl font-bold tracking-tight text-gray-800">Smart Library</h1>
        </div>
        
        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('member.dashboard') }}" class="px-6 py-2.5 bg-smart-blue text-white font-semibold rounded-xl hover:bg-smart-blue-gradient-start shadow-md shadow-smart-blue/20 transition-all">
                    Ke Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-5 py-2.5 text-gray-600 font-semibold hover:text-smart-blue transition-colors">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-smart-blue text-white font-semibold rounded-xl hover:bg-smart-blue-gradient-start shadow-md shadow-smart-blue/30 transition-all">
                        Daftar
                    </a>
                @endif
            @endauth
        </div>
    </nav>

    <main class="flex-1 flex flex-col items-center justify-center text-center px-6 relative overflow-hidden">
        
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-smart-blue/20 rounded-full blur-3xl z-0"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-smart-blue-gradient-start/10 rounded-full blur-3xl z-0"></div>

        <div class="z-10 max-w-4xl">
            <div class="inline-block px-5 py-2 bg-blue-50 text-smart-blue font-bold rounded-full text-sm mb-6 border border-blue-100 shadow-sm">
                <i class="fas fa-book-open mr-2"></i> Sistem Manajemen Perpustakaan Digital
            </div>
            
            <h2 class="text-5xl md:text-6xl font-extrabold mb-6 text-gray-900 leading-tight">
                Membaca Menjadi Lebih <br> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-smart-blue-gradient-start to-smart-blue-gradient-end">
                    Mudah & Menyenangkan
                </span>
            </h2>
            
            <p class="text-lg text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                Jelajahi ribuan koleksi buku, pinjam buku dengan mudah, pantau riwayat bacaan, dan kembangkan pengetahuan Anda dari mana saja bersama Smart Library.
            </p>
            
            <div class="flex items-center justify-center gap-5">
                @auth
                    <a href="{{ route('member.dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-smart-blue-gradient-start to-smart-blue-gradient-end text-white font-bold rounded-2xl hover:shadow-lg hover:shadow-smart-blue/40 transition-all transform hover:-translate-y-1">
                        Buka Portal Saya <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-gradient-to-r from-smart-blue-gradient-start to-smart-blue-gradient-end text-white font-bold rounded-2xl hover:shadow-lg hover:shadow-smart-blue/40 transition-all transform hover:-translate-y-1">
                        Mulai Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-gray-700 font-bold rounded-2xl border-2 border-gray-100 hover:border-smart-blue hover:text-smart-blue transition-all">
                            Buat Akun
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </main>

</body>
</html>