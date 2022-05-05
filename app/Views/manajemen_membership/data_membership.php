<table id="datamembership" class="table table-bordered table-hover nowrap">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Daftar</th>
            <th>Tanggal Habis</th>
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
                <td><?= $row['m_nama']; ?></td>
                <td><?= $row['m_alamat']; ?></td>
                <td><?= $row['m_jk']; ?></td>
                <td><?= $row['m_tgl_daftar']; ?></td>
                <td><?= $row['m_tgl_habis']; ?></td>
                <td>Rp.<?= $row['harga']; ?></td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="edit('<?= $row['m_id'] ?>')">
                        <i class="fa fa-tags"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="hapus('<?= $row['m_id'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#datamembership').DataTables();
    });

    function edit(m_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('manajemen_membership/formedit') ?>",
            data: {
                m_id: m_id
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

    function hapus(m_id) {
        Swal.fire({
            title: 'Hapus',
            text: "Yakin menghapus data membership ini?",
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
                    url: "<?= site_url('manajemen_membership/hapus') ?>",
                    data: {
                        member_id: member_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            });
                            dataMembership();
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