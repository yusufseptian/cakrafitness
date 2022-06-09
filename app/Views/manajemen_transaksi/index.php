<?= $this->extend('layout_admin/main'); ?>
<?= $this->section('title'); ?>
Manajemen Data Transaksi
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Membership</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Insidental</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sewa Gedung</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <button type="submit" name="add" class="btn btn-sm btn-dark">Download</button>
                        </div>
                        <table id="datamembership" class="table table-bordered table-hover nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                foreach ($tampildata as $row) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['m_nama']; ?></td>
                                        <td><?= $row['tm_tanggal']; ?></td>
                                        <td>Rp.<?= number_format($row['harga'], 0, ',', '.') ?></td>
                                        <td><?= $row['tm_status']; ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                sss
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                Sewa Gedung
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>