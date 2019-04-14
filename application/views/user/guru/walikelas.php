
<?php if($siswakelas->num_rows() != 0){ ?> 
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">LIST SISWA</strong>
            </div>
            <div class="card-body">
                <table class = "table table-bordered">
                    <?php foreach($siswakelas->result() as $a){ ?> 
                    <tr>
                        <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                        <td><a href = "<?php echo base_url();?>user/walikelas/index/detailnilaisiswa/<?php echo $a->id_siswa_angkatan;?>"><button class = "btn btn-success col-lg-12" style = "margin-bottom:10px">Lihat Detail Nilai</button></a></td>
                        <td><a href = "<?php echo base_url();?>user/walikelas/index/detailabsensiswa/<?php echo $a->id_siswa_angkatan;?>"><button class = "btn btn-warning col-lg-12" style = "margin-bottom:10px">Lihat Detail Absen</button></a></td>
                        <td><a href = "<?php echo base_url();?>user/walikelas/index/raporpdf/<?php echo $a->id_siswa_angkatan;?>"><button class = "btn btn-warning col-lg-12" style = "margin-bottom:10px">Cetak Rapor</button></a></td>
                        <td><button class ="btn btn-success col-lg-12">Kirim Rapot</button></td>
                        <td><select class = "form-control" id = "statusNaik"><option value = "0" >Naik Kelas</option><option value = "0" >Tinggal Kelas</option></select></td>
                        <td><a href = "<?php echo base_url();?>walikelas/index/selesai/<?php echo $a->id_siswa_angkatan; ?>"><button class = "btn btn-success col-lg-12">Selesai</button></a></td>
                        
                        <td><a href = "<?php echo base_url();?>user/walikelas/index/emailrapor/<?php echo $a->id_siswa_angkatan;?>"><button class = "btn btn-success col-lg-12" style = "margin-bottom:10px">Email Rapor</button></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php } 
else { ?>
<script>
alert("ANDA TIDAK DITUGASKAN MENJADI GURU TAHUN INI");
window.location.href = "<?php echo base_url();?>user/guru/index";
</script>
<?php /*redirect("user/guru/index");*/} ?>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                