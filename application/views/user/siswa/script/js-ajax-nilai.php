<script>
function ambilnilai(){
    $(document).ready(function(){
        var idmatpel = $("#idmatpel").val();
        $.ajax({
            url:"<?php echo base_url();?>validate/nilaiulangansiswa",
            data: {id_matpel:idmatpel},
            type: "POST",
            dataType:"JSON",
            success:function(respond){
                $("#nilaiharian").html(respond);
                $.ajax({
                    url:"<?php echo base_url();?>validate/nilaiulanganuntukchart",
                    data: {id_matpel:idmatpel},
                    type: "POST",
                    dataType:"JSON",
                    success:function(respond){
                        var result1 = respond.split(",");
                        var detail = [];
                        var namaujian = [];
                        var nilai = [];
                        var rata2 = [];
                        for(var a = 0 ;a<(result1.length-1); a++){
                            detail[a] = result1[a].split("-");
                            namaujian[a] = detail[a][0];
                            nilai[a] = detail[a][1];
                            rata2[a] = detail[a][2];
                        }   
                        ( function ( $ ) {
                            var ctx = document.getElementById( "lineChart" );
                            ctx.height = 150;
                            var myChart = new Chart( ctx, {
                                type: 'line',
                                data: {
                                    labels: namaujian,
                                    datasets: [
                                        {
                                            label: "Nilai Siswa",
                                            borderColor: "rgba(0,0,0,.09)",
                                            borderWidth: "1",
                                            backgroundColor: "rgba(0,0,0,.07)",
                                            data: nilai
                                                    },
                                        {
                                            label: "Rata-Rata",
                                            borderColor: "rgba(0, 194, 146, 0.9)",
                                            borderWidth: "1",
                                            backgroundColor: "rgba(0, 194, 146, 0.5)",
                                            pointHighlightStroke: "rgba(26,179,148,1)",
                                            data: rata2
                                                    },
                                        {
                                            label: "Scale",
                                            borderColor: "rgba(0, 194, 146, 0)",
                                            borderWidth: "1",
                                            backgroundColor: "rgba(0, 194, 146, 0)",
                                            pointHighlightStroke: "rgba(26,179,148,0)",
                                            data: [10,20,30,40,50,60,70,80,90,100]
                                                    }
                                                ]
                                },
                                options: {
                                    responsive: true,
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    }

                                }
                            } );
                        } )( jQuery );
                    }
                });
                $.ajax({
                    url:"<?php echo base_url();?>validate/nilaiutamasiswa",
                    data: {id_matpel:idmatpel},
                    type: "POST",
                    dataType:"JSON",
                    success:function(response){
                        $("#nilaiutama").html(response);
                    }
                });
                $.ajax({
                    url:"<?php echo base_url();?>validate/nilairataratauntukchart",
                    data: {id_matpel:idmatpel},
                    type: "POST",
                    dataType:"JSON",
                    success:function(respon){
                        var result = respon.split(",");
                        var nilai = [];
                        var nama = [];
                        for(var a = 0; a<result.length-1 ; a++){
                            nilai[a] = result[a][0];
                            nama[a] = result[a][1];
                        }
                        ( function ( $ ) {
                            var ctx = document.getElementById( "lineChart2" );
                            ctx.height = 150;
                            var myChart = new Chart( ctx, {
                                type: 'line',
                                data: {
                                    labels: nama,
                                    datasets: [
                                        {
                                            label: "Rata-rata Nilai Mata Pelajaran",
                                            borderColor: "rgba(0,0,0,.09)",
                                            borderWidth: "1",
                                            backgroundColor: "rgba(0,0,0,.07)",
                                            data: nilai},
                                        {
                                            label: "Scale",
                                            borderColor: "rgba(0, 194, 146, 0)",
                                            borderWidth: "1",
                                            backgroundColor: "rgba(0, 194, 146, 0)",
                                            pointHighlightStroke: "rgba(26,179,148,0)",
                                            data: [ 0,10,20,30,40,50,60,70,80,90,100 ]
                                                    }
                                                ]
                                },
                                options: {
                                    responsive: true,
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    }

                                }
                            } );
                        } )( jQuery );
                    }
                    
                });
            }
        });
    });
}
</script>
<script>

/*
    ( function ( $ ) {
    var ctx = document.getElementById( "lineChart2" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June", "July" ],
            datasets: [
                {
                    label: "Nilai Siswa",
                    borderColor: "rgba(0,0,0,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0,0,0,.07)",
                    data: [ 20, 47, 35, 43, 65, 45, 35 ]
                            },
                {
                    label: "Rata-rata Kelas",
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 194, 146, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [ 16, 32, 18, 27, 42, 33, 44 ]
                            }
                        ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    } );
} )( jQuery );
*/
</script>