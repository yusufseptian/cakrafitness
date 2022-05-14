<?= $this->extend('layout_admin/main'); ?>
<?= $this->section('title'); ?>
Manajemen Data Harga Layanan
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <table id="dataharga" class="table table-bordered table-hover nowrap">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($tampildata as $row) : ?>
                    <tr class="text-center">
                        <td><?= $row['harga_id']; ?></td>
                        <td><?= $row['harga_keterangan']; ?></td>
                        <td>Rp.<?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="edit('<?= $row['harga_id'] ?>')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
    function dataHarga() {
        $.ajax({
            url: "<?= site_url('Manajemen_harga/index') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }
    $(document).ready(function() {
        // dataHarga();
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataharga').DataTable();
    });

    function edit(harga_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('manajemen_harga/formedit') ?>",
            data: {
                harga_id: harga_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }
</script>
<?= $this->endSection(); ?>