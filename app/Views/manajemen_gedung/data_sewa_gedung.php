<table id="datagedung" class="table table-bordered table-hover nowrap">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
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
                <td><?= $row['gd_nama']; ?></td>
                <td><?= $row['gd_tgl_sewa']; ?></td>
                <td><?= $row['gd_lama_sewa']; ?> jam</td>
                <td>Rp.<?= $row['harga']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="edit('<?= $row['gd_id'] ?>')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="hapus('<?= $row['gd_id'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#datagedung').DataTables({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,

        });
    });

    function edit(gd_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('manajemen_gedung/formedit') ?>",
            data: {
                gd_id: gd_id
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

    function hapus(gd_id) {
        Swal.fire({
            title: 'Hapus',
            text: "Yakin menghapus data gedung ini?",
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
                    url: "<?= site_url('manajemen_gedung/hapus') ?>",
                    data: {
                        gd_id: gd_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            });
                            dataGedung();
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