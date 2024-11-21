<link href="http://erpvw.indonesiapower.co.id/erpvw/assets/css/select2/select2.css" rel="stylesheet">
<script src='http://erpvw.indonesiapower.co.id/erpvw/assets/js/select2.min.js'></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

  <script>

    $(function(){

        
        $(".filterDisc").select2({
            placeholder: "Pilih Jenis DISC",
            allowClear: true,
            language: "id"
        });

        $(".filterAdv").select2({
            placeholder: "Pilih Jenis Adversity",
            allowClear: true,
            language: "id"
        });

        $(".filterJk").select2({
            placeholder: "Pilih Jenis Kelamin",
            allowClear: true,
            language: "id"
        });
        $(".filterJj").select2({
            placeholder: "Pilih Jenjang Jabatan",
            allowClear: true,
            language: "id"
        });
        $(".filterUnit").select2({
            placeholder: "Pilih Unit Pegawai",
            allowClear: true,
            language: "id"
        });


    
        <?php 
            foreach ($variable->result() as $data) {
                if($this->input->get("min_".$data->KODE_PAPI) != NULL){
                    $min = $this->input->get("min_".$data->KODE_PAPI);
                    $max = $this->input->get("max_".$data->KODE_PAPI);
                }else{
                    $min = 0;
                    $max = 10;
                }?>

            minconst = <?=$min?>;
            maxcost = <?=$max?>;

                $("#slide_<?=$data->KODE_PAPI?>").slider({
                range : true,
                min : 0,
                max : 10,
                values : [minconst, maxcost],
                slide : function(event, ui) {
                    $("#bawah_<?=$data->KODE_PAPI?>").val(ui.values[0]);
                    $("#atas_<?=$data->KODE_PAPI?>").val(ui.values[1]);

                },
                // change : function() {
                //     $("#highlights").submit();
                // },
                });

                $("#bawah_<?=$data->KODE_PAPI?>").val($("#slide_<?=$data->KODE_PAPI?>").slider("values", 0));
                $("#atas_<?=$data->KODE_PAPI?>").val($("#slide_<?=$data->KODE_PAPI?>").slider("values", 1));
                
            <?php
            }
        
        ?>

        
         $(".selectDisc").select2({
            ajax: {
                url: "<?= site_url("k_assessment/ajax_disc") ?>",
                dataType: 'json',
                delay: 250,
             
                data: function (term, page) {
                    return {
                        q: term, // search term
                    };
                },
                results: function (data) {



                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 2,
                multiple: true,
                 tags: true
        });
        
        <?php
        
        if(isset($TIM) ){
            
            $i=0;
            foreach($TIM as $k=>$v){
                $dt[$i]["id"] = $k;
                $dt[$i]["text"] = $v;
                        
                        $i++;
            }
            
            $dt = json_encode($dt);
            
            ?>
                    $(".select3[name='KODE_DISC']").select2('data', 
   <?=$dt?>       
    
    );
                    
                    <?php
            
        }
        
        ?>
        
    });
</script>


