<script>
    function abc(){
        var jumlah = $('#jumlah').val(); //ngambil jumlah yang dipilih user
        $('#quiz').empty();
        for(var a = 0; a<jumlah; a++){
            
        var html = '<div class = "row"><div class="col-lg-12"><div class="card"><div class="card-header"><strong class="card-title">Soal '+(a+1)+'</strong></div><div class="card-body"><label>Pertanyaan</label><input type = "text" class = "form-control" placeholder="Pertanyaan" name = "pertanyaan[]"><br/><label>Pilihan 1</label><input type = "text" class = "form-control" placeholder="Pilihan 1" name = "pilihan1[]"><br/><label>Pilihan 2</label><input type = "text" class = "form-control" placeholder="Pilihan 2" name = "pilihan2[]"><br/><label>Pilihan 3</label><input type = "text" class = "form-control" placeholder="Pilihan 3" name = "pilihan3[]"><br/><label>Pilihan 4</label><input type = "text" class = "form-control" placeholder="Pilihan 4" name = "pilihan4[]"><br/><label>Jawaban</label><select class = "form-control" name = "jawaban[]"><option value ="1">Pilihan 1</option><option value ="2">Pilihan 2</option><option value ="3">Pilihan 3</option><option value ="4">Pilihan 4</option></select><br/></div></div></div></div>'; 
            $('#quiz').append(html);
        }       
    }
</script>
<script>
    function def(){
         var jumlah = $('#jumlah').val(); //ngambil jumlah yang dipilih user
        $('#quiz').empty();
        for(var a = 0; a<jumlah; a++){
            
        var html = '<div class = "row"><div class="col-lg-12"><div class="card"><div class="card-header"><strong class="card-title">Soal Tambahan '+(a+1)+'</strong></div><div class="card-body"><label>Pertanyaan</label><input type = "text" class = "form-control" placeholder="Pertanyaan" name = "pertanyaan[]"><br/><label>Pilihan 1</label><input type = "text" class = "form-control" placeholder="Pilihan 1" name = "pilihan1[]"><br/><label>Pilihan 2</label><input type = "text" class = "form-control" placeholder="Pilihan 2" name = "pilihan2[]"><br/><label>Pilihan 3</label><input type = "text" class = "form-control" placeholder="Pilihan 3" name = "pilihan3[]"><br/><label>Pilihan 4</label><input type = "text" class = "form-control" placeholder="Pilihan 4" name = "pilihan4[]"><br/><label>Jawaban</label><select class = "form-control" name = "jawaban[]"><option value ="1">Pilihan 1</option><option value ="2">Pilihan 2</option><option value ="3">Pilihan 3</option><option value ="4">Pilihan 4</option></select><br/></div></div></div></div>'; 
            $('#quiz').append(html);
        }       
    }
</script>