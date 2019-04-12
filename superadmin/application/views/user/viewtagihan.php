
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Tagihan</strong>
            </div>
            <div class="card-body">
                
                
                <a href="<?php echo base_url(). 'user/tagihan/tambahtagihan' ?>"> 
                    <button class = "btn btn-success">TAMBAH TAGIHAN</button></a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Tagihan</th>
                            
                            <th>Nama Sekolah</th>
                            
                            <th>Tahun Ajaran</th>
                            <th>Jumlah Tagihan</th>
                            <th>Status Tagihan</th>
                            <th>Tanggal Submit Tagihan</th>
                            <th>Pdf Tagihan</th>
                            <th>Email Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                $a = 0;
            foreach ($tagihanjoin as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_tagihan ?></td>
                
                <td><?php echo $list->nama_sekolah ?></td>
                
                <td><?php echo $list->tahun_awal.'-'.$list->tahun_akhir ?></td>
                
                <?php 
                  
                    $res = number_format($list->jumlah_tagihan);
                ?>
                
                
                <td>Rp. <?php echo $res ?>,-</td>
                <td><?php if ($list->status_tagihan == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_tagihan ?></td>
                <td><a href="<?php echo base_url().'user/tagihan/pdftagihan/'.$list->id_tagihan;?>"><button class = "btn btn-success">LIHAT</button></a></td>
                <td><a href="<?php echo base_url().'user/tagihan/kirimtagihan/'.$list->id_tagihan;?>"><button class = "btn btn-success">KIRIM TAGIHAN</button></a></td>
                <td><a href="<?php echo base_url().'user/tagihan/edittagihan/'.$list->id_tagihan;?>"><button class = "btn btn-warning">EDIT</button></a><a href="<?php echo base_url().'user/tagihan/hapustagihan/'.$list->id_tagihan;?>"><button class = "btn btn-danger">HAPUS</button></a></td>
            
            </tr>
            <?php
             }
            ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card -->
    </div>
</div>