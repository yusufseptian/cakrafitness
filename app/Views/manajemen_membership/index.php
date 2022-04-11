<?= $this->extend('layout_admin/main') ;?>
<?= $this->section('title') ;?>
Manajemen Data Membership
<?= $this->endSection() ;?>

<?= $this->section('content');?>
<link rel="stylesheet" href="<?= base_url();?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                    <a href="" class="btn-c btn-sm btn-c-primary tambah">Tambah Data</a>
                    <button type="submit" name="add" class="btn btn-sm btn-dark">Download</button>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text viewdata">

            </p>
        </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
    function dataMembership(){
        $.ajax({
            url: "<?= site_url('Manajemen_membership/ambildata')?>",
            dataType: "json",
            success: function(response){
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
            }
        });
    }
    $(document).ready(function() {
        dataMembership();
    });

    $(document).ready(function() {
        dataMembership();
        $('.tambah').click(function(e){
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('Manajemen_membership/formtambah')?>",
                dataType: "json",

                success: function(response){
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambah').modal('show');
                },
                
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
                }
            });
        }); 
    });
</script>
<?= $this->endSection() ;?>