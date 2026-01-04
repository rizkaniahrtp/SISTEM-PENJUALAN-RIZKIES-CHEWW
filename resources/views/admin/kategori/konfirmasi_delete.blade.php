<div class="modal fade" id="konfirmasi_delete{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $k->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
        <form action="/kategori/delete/{{ $k->id }}" method="post">
            @csrf
            @method('DELETE')
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $k->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda yakin akan menghapus data <b>{{ $k->nama_kategori }}</b>?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                </div>
            </div>
        </form>

    </div>
</div>