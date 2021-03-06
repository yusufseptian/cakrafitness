    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Membership</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('Manajemen_membership/simpandata', ['class' => 'formMembership']); ?>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control " name="m_id" id="m_id">
                            <input type="hidden" class="form-control " name="tm_id" id="tm_id">
                            <input type="text" class="form-control " name="m_nama" id="m_nama">
                            <div class="invalid-feedback error-nama ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="m_alamat" id="m_alamat">
                            <div class="invalid-feedback error-alamat ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="m_jk" id="m_jk" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="m_tgl_daftar" id="m_tgl_daftar">
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
            $('.formMembership').submit(function(e) {
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
                            if (response.error.m_nama) {
                                $('#m_nama').addClass('is-invalid');
                                $('.error-nama').html(response.error.m_nama);
                            } else {
                                $('#m_nama').removeClass('is-invalid');
                                $('.error-nama').html('');
                            }

                            if (response.error.m_alamat) {
                                $('#m_alamat').addClass('is-invalid');
                                $('.error-alamat').html(response.error.m_alamat);
                            } else {
                                $('#m_alamat').removeClass('is-invalid');
                                $('.error-alamat').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            }).then(function() {
                                location.reload();
                                $('#modaltambah').modal('hide');
                            });
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