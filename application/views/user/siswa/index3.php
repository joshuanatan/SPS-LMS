

<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mata Pelajaran</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1">
                    <option value="" label="default">Pilih Mata Pelajaran</option>
                    <?php foreach($matpel->result() as $a){ ?>
                    <option value = "<?php echo $a->id_matpel;?>"><?php echo $a->nama_matpel;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Line Chart </h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Line Chart </h4>
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tema Ujian</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ikatan Kovalen</td>
                            <td>26/02/2019</td>
                            <td>50</td>
                            <td>Remedial</td>
                        </tr>

                        <tr>
                            <td>Tata Nama</td>
                            <td>26/02/2019</td>
                            <td>100</td>
                            <td>Lulus</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                