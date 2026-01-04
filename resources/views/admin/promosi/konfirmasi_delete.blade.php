<div class="modal fade" id="konfirmasi_delete{{ $pr->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $pr->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
        <form action="/promosi/delete/{{ $pr->id }}" method="post">
            @csrf
            @method('DELETE')
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $pr->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda yakin akan menghapus data <b>{{ $pr->nama_promo }}</b>?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                </div>
            </div>
        </form>

    </div>
</div>