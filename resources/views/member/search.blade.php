@extends('layouts.app')

@section('title', 'Search Books')

@section('content')
    
    <div class="mb-10">
        <h2 class="text-2xl font-bold mb-1">Search Books</h2>
        <p class="text-sm text-gray-500">Cari dan pinjam koleksi buku Smart Library</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-10">
        <h4 class="text-lg font-semibold mb-5">Search Filters</h4>
        
        <form action="{{ route('member.search') }}" method="GET" class="flex items-center gap-4">
            
            <div class="flex-1 relative">
                <input type="text" 
                       name="search" 
                       placeholder="Search by title or author..." 
                       value="{{ $searchQuery ?? '' }}"
                       class="w-full pl-6 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-smart-blue focus:bg-white transition-all outline-none">
            </div>

            <div class="w-64">
                <select class="w-full pl-6 pr-10 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-smart-blue focus:bg-white transition-all outline-none appearance-none cursor-pointer">
                    <option>All Categories</option>
                    <option>Fiksi</option>
                    <option>Non-Fiksi</option>
                    <option>Teknologi</option>
                </select>
            </div>

            <button type="submit" class="px-8 py-3 bg-smart-blue text-white font-semibold rounded-xl hover:bg-smart-blue-gradient-start transition-colors flex items-center gap-2">
                <i class="fas fa-search"></i>
                Search
            </button>
        </form>
    </div>

    <div>
        <h4 class="text-lg font-semibold mb-6">Book Results</h4>
        
        <div class="grid grid-cols-3 gap-6">
            
            @forelse($books as $book)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full hover:shadow-lg transition-shadow">
                    
                    <div class="w-full h-32 bg-gray-50 rounded-xl flex items-center justify-center text-gray-300 mb-5 border border-gray-100">
                        <i class="fas fa-book fa-3x"></i>
                    </div>

                    <h5 class="font-bold text-lg mb-1">{{ $book->title }}</h5>
                    <p class="text-sm text-gray-500 mb-4 flex items-center gap-2">
                        <i class="fas fa-pen-nib text-gray-400 text-xs"></i> 
                        {{ $book->author }}
                    </p>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                        
                        @if($book->stock > 0)
                            <div class="text-center">
                                <span class="badge bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full mb-1 inline-block">
                                    Available
                                </span>
                                <p class="text-xs text-gray-500 font-medium">Stok: {{ $book->stock }}</p>
                            </div>
                        @else
                            <div class="text-center">
                                <span class="badge bg-red-100 text-red-600 text-xs font-bold px-3 py-1 rounded-full mb-1 inline-block">
                                    Not Available
                                </span>
                                <p class="text-xs text-gray-500 font-medium">Stok habis</p>
                            </div>
                        @endif

                        <form action="{{ route('member.borrow', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="px-5 py-2.5 bg-gray-900 text-white font-semibold text-sm rounded-xl transition-all {{ $book->stock == 0 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-smart-blue-gradient-start' }}"
                                    {{ $book->stock == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-sign-in-alt mr-1.5"></i> Request
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <i class="fas fa-search fa-4x text-gray-200 mb-4"></i>
                    <h5 class="text-xl font-bold text-gray-800">Buku tidak ditemukan</h5>
                    <p class="text-gray-500">Coba ganti kata kunci pencarian Anda dengan judul atau pengarang lain.</p>
                </div>
            @endforelse
            
        </div>
    </div>

@endsection