    <div class="modal fade" id="modaledit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Membership</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('Manajemen_membership/updatedata',['class'=>'formMembership']) ;?>
                <?= csrf_field() ;?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control " name="member_id" id="member_id" value="<?= $member_id?>">
                            <input type="text" class="form-control " name="member_nama" id="member_nama" value="<?= $member_nama?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="member_alamat" id="member_alamat" value="<?= $member_alamat?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="member_jk" id="member_jk" class="form-control">
                                <option value="Laki-Laki" <?php if($member_jk == 'Laki-Laki') echo "Selected"; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if($member_jk == 'Perempuan') echo "Selected"; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" name="member_tgl_daftar" id="member_tgl_daftar" value="<?= $member_tgl_daftar?>">
                    </div>
            </div>
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <?= form_close() ;?>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.formMembership').submit(function(e){
            e.preventDefault();
            $.ajax({
                type : "post",
                url : $(this).attr('action'),
                data : $(this).serialize(),
                dataType : "json",
                beforeSend : function(){
                    $('.btnsimpan').attr('disable','disabled')
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');

                },
                complete:function(){
                    $('.btnsimpan').removeAttr('disable')
                    $('.btnsimpan').html('Update');
                },
                success: function(response){
                        Swal.fire({
                        icon : 'success',
                        title: 'Berhasil',
                        text: response.sukses
                        })

                        $('#modaledit').modal('hide');
                        dataMembership();
                    
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
                }
            });
            return false;
        });
    });
</script>