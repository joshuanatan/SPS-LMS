
<button type="button" class="form-control" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal2">TAMBAH MATERI MINGGUAN</button>
<br/>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Week n</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="text-sm-center mt-2 mb-1">Tanggal</h5>
                    <div class="location text-sm-center">Materi</div>
                </div>

                <hr>
                <a href ="<?php echo base_url();?>user/guru/mingguan/quiz"><button class = "form-control">Tambah Quiz</button></a>
                <button type="button" class="btn btn-secondary btn-warning col-lg-12" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal">Dokumen</button>
                <button type="button" class="btn btn-secondary btn-success col-lg-12" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal2">Edit</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN DOKUMEN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-xl-12"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">DOKUMEN</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-stats">
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Nama File</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>KURNIA.docx</td>
                                                <td>28/02/2019</td>
                                                <td><button class = "col-lg-12">HAPUS</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                </div> 
                <form>
                    <div class = "form-group col-lg-12">
                        <label>Judul Dokumen</label>
                        <input type = "text" class = "form-control">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Tipe Dokumen</label>
                        <select class = "form-control">
                            <option>TUGAS</option>
                            <option>MATERI</option>
                        </select>
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>File Dokumen</label><br/>
                        <input type = "file">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PERUBAHAN DATA MINGGUAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class = "form-group col-lg-12">
                        <label>Tanggal</label>
                        <input type = "date" class = "form-control">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Materi</label><br/>
                        <input type = "text" class = "form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>