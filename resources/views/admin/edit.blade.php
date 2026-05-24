@extends('layouts.app')

@section('title', 'Edit Buku')
@section('page-title', 'Edit Data Buku')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
        @csrf 
        @method('PUT') <div class="mb-3">
            <label class="form-label fw-bold">Judul Buku</label>
            <input type="text" name="title" class="form-control" required value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Pengarang</label>
            <input type="text" name="author" class="form-control" required value="{{ $book->author }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Jumlah Stok</label>
            <input type="number" name="stock" class="form-control" required min="0" value="{{ $book->stock }}">
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Update Buku</button>
        </div>
    </form>
</div>
@endsection