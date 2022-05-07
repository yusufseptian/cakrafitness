<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sewa Gedung</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Manajemen_gedung/simpandata', ['class' => 'formGedung']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control " name="gd_id" id="gd_id">
                        <input type="text" class="form-control " name="gd_nama" id="gd_nama">
                        <div class="invalid-feedback error-nama ">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Sewa</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="gd_tgl_sewa" id="gd_tgl_sewa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Lama Sewa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="gd_lama_sewa" id="gd_lama_sewa">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formGedung').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled')
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');

                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable')
                    $('.btnsimpan').html('simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.gd_nama) {
                            $('#gd_nama').addClass('is-invalid');
                            $('.error-nama').html(response.error.gd_nama);
                        } else {
                            $('#gd_nama').removeClass('is-invalid');
                            $('.error-nama').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })
                        $('#modaltambah').modal('hide');
                        dataGedung();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
            return false;
        });
    });
</script>