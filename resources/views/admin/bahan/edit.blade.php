@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Bahan Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/bahan/update/{{ $bahan->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Bahan</label>
                    <input type="text" name="nama_bahan" class="form-control @error('nama_bahan') is-invalid @enderror" value="{{ old('nama_bahan', $bahan->nama_bahan) }}" required>
                    @error('nama_bahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Supplier</label>
                    <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id" required>
                        <option selected disabled>-- Pilih Supplier --</option>
                        @foreach ($supplier as $s)
                            <option value="{{ $s-> id }}" {{ old('supplier_id', $bahan->supplier_id) == $s->id ? 'selected' : '' }}>{{ $s-> nama_supplier }}</option>
                        @endforeach                        
                    </select>
                    @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="decimal" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $bahan->stok) }}" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan" required>
                        <option disabled value="">-- Pilih Satuan --</option>                        
                        <option value="kg" {{ (old('satuan', $bahan->satuan) == 'kg') ? 'selected' : '' }}>Kg</option>
                        <option value="gram" {{ (old('satuan', $bahan->satuan) == 'gram') ? 'selected' : '' }}>Gram</option>
                        <option value="liter" {{ (old('satuan', $bahan->satuan) == 'liter') ? 'selected' : '' }}>Liter</option>
                        <option value="pcs" {{ (old('satuan', $bahan->satuan) == 'pcs') ? 'selected' : '' }}>Pcs</option>
                    </select>                    
                    @error('satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/bahan" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection