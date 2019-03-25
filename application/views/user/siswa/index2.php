
<div class="row">
<?php 
        
        foreach ($matpel as $list) {
        ?>
    <div class="col-md-4">
        <a href = "<?php echo base_url();?>user/siswa/mingguan/index/minggu/<?php echo $list->id_gurutahunan;?>">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3"><?php echo $list->nama_matpel ?></strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <h5 class="text-sm-center mt-2 mb-1"><?php echo $list->nama_depan ?></h5>
                    </div>
                    <hr>

                </div>
            </div>
        </a>
    </div>
    <?php
             }
            ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>