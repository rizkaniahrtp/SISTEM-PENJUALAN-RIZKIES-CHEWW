<div class="modal fade" id="konfirmasi_delete{{ $k->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $k->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <form action="/keranjang/delete/{{ $k->id }}" method="post">
            @csrf
            @method('DELETE')
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $k->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <span>Apakah Anda yakin ingin menghapus <b>{{ $k->produk->nama_produk }}</b>?</span>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                </div>
            </div>
        </form>

    </div>
</div>