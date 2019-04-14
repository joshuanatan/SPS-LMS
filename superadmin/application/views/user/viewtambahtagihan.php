
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        
        <form action="<?php echo base_url(). 'user/tagihan/simpantagihan';?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Tagihan</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                <td>ID Sekolah</td>
                <td><select name="id_sekolah">
                        <option disabled> Pilih ID Sekolah</option>
                        <?php foreach ($sekolah as $list){?>
                        <option value="<?php echo $list->id_sekolah?>"><?php echo $list->id_sekolah." - ".$list->nama_sekolah?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Tahun Ajaran</td>
                <td><select name="id_tahun_ajaran">
                        <option disabled> Pilih ID Tahun Ajaran </option>
                        <?php foreach ($tahunajaran as $list){?>
                        <option value="<?php echo $list->id_tahun_ajaran?>"><?php echo $list->id_tahun_ajaran." - ".$list->tahun_awal."-".$list->tahun_akhir?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Tagihan</td>
                <td>Rp. <input type="number" name="jumlah_tagihan">,-</td>
            </tr>
            <tr>
                <td>Status Tagihan</td>
                <td><select name="status_tagihan">
                        <option disabled> Pilih Status Tagihan </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Tagihan</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
        </table>
                <button class="btn btn-success" type="submit">SIMPAN TAGIHAN </button>

        
            </div>
            </div>
        </form>
    </div> <!-- /.card -->
    
