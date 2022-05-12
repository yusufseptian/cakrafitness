<table id="datainsidental" class="table table-bordered table-hover nowrap">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no = 1;
        foreach ($tampildata as $row) : ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $row['in_nama']; ?></td>
                <td><?= $row['in_tgl']; ?></td>
                <td><?= $row['in_status']; ?></td>
                <td>Rp.<?= $row['harga']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="edit('<?= $row['in_id'] ?>')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="hapus('<?= $row['in_id'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#datainsidental').DataTables();
    });

    function edit(in_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('manajemen_insidental/formedit') ?>",
            data: {
                in_id: in_id
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

    function hapus(in_id) {
        Swal.fire({
            title: 'Hapus',
            text: "Yakin menghapus data insidental ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('manajemen_insidental/hapus') ?>",
                    data: {
                        in_id: in_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            });
                            dataInsidental();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            }
        })
    }
</script>