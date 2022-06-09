<?= $this->extend('layout_admin/main'); ?>
<?= $this->section('title'); ?>
Manajemen Data Membership
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-4">
    <a href="" class="btn-c btn-sm btn-c-primary tambah">Tambah Data</a>
    <button type="submit" name="add" class="btn btn-sm btn-dark">Download</button>
</div>
<div class="card">
    <div class="card-body">
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
                    <th>Status</th>
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
                        <td><?= $row['m_status']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="edit('<?= $row['m_id'] ?>')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="hapus('<?= $row['m_id'] ?>')">
                                <i class="fa fa-trash"></i>
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
    $(document).ready(function() {
        $('#datamembership').DataTable({

        });
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
                        m_id: m_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            }).then(function() {
                                location.reload();
                            });
                            // dataMembership();
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

<script>
    function dataMembership() {
        $.ajax({
            url: "<?= site_url('Manajemen_membership/index') ?>",
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
        // dataMembership();
    });

    $(document).ready(function() {
        // dataMembership();
        $('.tambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('Manajemen_membership/formtambah') ?>",
                dataType: "json",

                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambah').modal('show');
                },

                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>