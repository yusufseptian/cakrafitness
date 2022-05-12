<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Manajemen_harga/updatedata', ['class' => 'formHarga']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Layanan</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control " name="harga_id" id="harga_id" value="<?= $harga_id ?>">
                        <input type="text" class="form-control " name="harga_keterangan" id="harga_keterangan" value="<?= $harga_keterangan ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="harga" id="harga" value="<?= $harga ?>">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.formHarga').submit(function(e) {
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
                        $('.btnsimpan').html('Update');
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })

                        $('#modaledit').modal('hide');
                        dataHarga();

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