@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Tambah Bahan Rizkies Cheww</h6>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <form action="/bahan/tambah" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama Bahan</label>
                    <input type="text" name="nama_bahan" class="form-control @error('nama_bahan') is-invalid @enderror" value="{{ old('nama_bahan') }}" required>
                    @error('nama_bahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Supplier</label>
                    <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id" required>
                        <option selected disabled>-- Pilih Supplier --</option>
                        @foreach ($supplier as $s)
                            <option value="{{ $s-> id }}" {{ old('supplier_id') == $s->id ? 'selected' : '' }}>{{ $s-> nama_supplier }}</option>
                        @endforeach                        
                    </select>
                    @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="decimal" name="stok" class="form-control" value="{{ old('stok') }}" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan" value="{{ old('satuan') }}" required>
                        <option selected disabled>-- Pilih Satuan --</option>
                        <option value="kg">Kg</option> 
                        <option value="gram">Gram</option>  
                        <option value="liter">Liter</option>  
                        <option value="pcs">Pcs</option>    
                    </select>
                    @error('satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/bahan" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection