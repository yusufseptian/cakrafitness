<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Insidental</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Manajemen_insidental/updatedata', ['class' => 'formInsidental']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control " name="in_id" id="in_id" value="<?= $in_id ?>">
                        <input type="text" class="form-control " name="in_nama" id="in_nama" value="<?= $in_nama ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="in_tgl" id="in_tgl" value="<?= $in_tgl ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="in_status" id="in_status" class="form-control">
                            <option value="Lunas" <?php if ($in_status == 'Lunas') echo "Selected"; ?>>Lunas</option>
                            <option value="Belum lunas" <?php if ($in_status == 'Belum lunas') echo "Selected"; ?>>Belum lunas</option>
                        </select>
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
            $('.formInsidental').submit(function(e) {
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
                        dataInsidental();

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