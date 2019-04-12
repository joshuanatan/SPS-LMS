
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        <?php foreach($user as $lista){?>
        <form action="<?php echo base_url(). 'user/user/updatepassword/'.$lista->id_user;?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Change Password</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                <td>ID User</td>
                <td><?php echo $lista->id_user?></td>
            </tr>
                
            <tr>
                <td>Nama</td>
                <td><?php echo $lista->nama_depan." ".$lista->nama_belakang?></td>
            </tr>    
            
            <tr>
                <td>Email</td>
                <td><?php echo $lista->email?></td>
            </tr>
            
            <tr>
                <td>Password Lama</td>
                <td><input type="password" name="passwordlama"></td>
            </tr>
            <tr>
                <td>Password Baru</td>
                <td><input type="password" name="passwordbaru"></td>
            </tr>  
                
                
                
             
               
        </table>
                <button class="btn btn-success" type="submit">CHANGE PASSWORD </button>

        
            </div>
            </div>
        </form>
        <?php }?>
    </div>
     <!-- /.card -->
    
