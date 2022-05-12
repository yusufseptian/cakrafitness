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
<script>
    $(document).ready(function() {
        $('#dataharga').DataTables();
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