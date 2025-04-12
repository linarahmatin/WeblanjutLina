@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('stok') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('stok') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="barang_id">Nama Barang</label>
                <select name="barang_id" class="form-control" required>
                    <option value="">- Pilih Barang -</option>
                    @foreach($barang as $b)
                        <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">User Input</label>
                <select name="user_id" class="form-control" required>
                    <option value="">- Pilih User -</option>
                    @foreach($user as $u)
                        <option value="{{ $u->user_id }}">{{ $u->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok_tanggal">Tanggal Stok</label>
                <input type="date" name="stok_tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stok_jumlah">Jumlah Stok</label>
                <input type="number" name="stok_jumlah" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('stok') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection