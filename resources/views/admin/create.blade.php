@extends('layouts.app')

@section('title', 'Tambah Buku')
@section('page-title', 'Tambah Buku Baru')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf <div class="mb-3">
            <label class="form-label fw-bold">Judul Buku</label>
            <input type="text" name="title" class="form-control" required placeholder="Masukkan judul buku...">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Pengarang</label>
            <input type="text" name="author" class="form-control" required placeholder="Nama penulis...">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Sinopsis singkat..."></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Jumlah Stok</label>
            <input type="number" name="stock" class="form-control" required min="0" value="0">
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Buku</button>
        </div>
    </form>
</div>
@endsection