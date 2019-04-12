
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        
        <form action="<?php echo base_url(). 'user/tahunajaran/simpantahunajaran';?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Tahun Ajaran</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td>Tahun Awal</td>
                <td><input type="number" name="tahun_awal"></td>
            </tr>
            <tr>
                <td>Tahun Akhir</td>
                <td><input type="number" name="tahun_akhir"></td>
            </tr>
            <tr>
                <td>Status Tagihan</td>
                <td><select name="status_tahunajaran">
                        <option disabled> Pilih Status Tahun Ajaran </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Tahun Ajaran</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
        </table>
                <button class="btn btn-success" type="submit">SIMPAN TAHUN AJARAN </button>

        
            </div>
            </div>
        </form>
    </div> <!-- /.card -->
    
