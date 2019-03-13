
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tugas</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>ID</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Dateline</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>KIM</td>
                            <td>KIMIA</td>
                            <td>KURNIA</td>
                            <td>28/02/2019</td>
                            <td>NOT DONE</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a href = "<?php echo base_url();?>user/siswa/mingguan/index/minggu/1">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">Nama Mata Pelajaran</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <h5 class="text-sm-center mt-2 mb-1">Nama Guru</h5>
                        <div class="location text-sm-center">Hari Pelajarannya</div>
                    </div>
                    <hr>

                </div>
            </div>
        </a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>