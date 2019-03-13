<div class = "row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mata Pelajaran</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1">
                    <option value="" label="default">Pilih Mata Pelajaran</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Aland Islands">Aland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Bulan</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1">
                    <option value="" label="default">Pilih Bulan</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Aland Islands">Aland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                </select>
            </div>
        </div>
    </div>
        
</div>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Absensi</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam Masuk Kelas</th>
                            <th>Bahan Pelajaran</th>
                            <th>Status Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>28/02/2019</td>
                            <td>15:15</td>
                            <td>Gaya Gesek</td>
                            <td>Masuk</td>
                        </tr>
                        <tr>
                            <td>26/02/2019</td>
                            <td>10:15</td>
                            <td>Gaya Gerak</td>
                            <td>Sakit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Pie Chart </h4>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>