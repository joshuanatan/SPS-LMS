<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">List Kelas</h4>
            </div>
            <div class="card-body">
                <form class = "form-inline">
                    <select class = "form-control col-lg-12">
                        <option value = "#">10 IPA 1</option>
                        <option value = "#">10 IPA 2</option> <!-- waktu milih, langsung keseleksi yang siswa dikelas itu + yang belum terassign -->
                    </select>
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">LIST MURID</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Joshua Natan</td>
                                <td>ASSIGNED</td>
                                <td><input type = "checkbox"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Joshua Luih</td>
                                <td>NOT ASSIGNED</td>
                                <td><input type = "checkbox"></td>
                                <!--<td><button class = "btn btn-success col-lg-12">ASSIGN</button></td>-->
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            <input type = "submit" class = "btn btn-success"> 
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN KELAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class = "form-group col-lg-12">
                        <label>GURU</label>
                        <select class = "form-control col-lg-12">
                            <option value = "#">TIANGGUR</option>
                            <option value = "#">PETRIANUS</option>
                            <option value = "#">MICHAEL</option>
                        </select>
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN TAHUN AJARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class = "form-group col-lg-12">
                        <label>AWAL TAHUN AJARAN</label>
                        <input type = "number" class = "form-control">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>AKHIR TAHUN AJARAN</label>
                        <input type = "number" class = "form-control">
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