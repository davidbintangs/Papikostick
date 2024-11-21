<div class="row">
    <div class="col-md-12">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    
        <div class="box box-solid">
            <div class="box-body clearfix">
                <table style="width: 100%; margin-top: 0 !important" cellspacing="0">
                            <tbody>
                            <tr>
                                <th><center>Kode</center></th>
                                <th>keterangan</th>
                            </tr>
                            <tr>
                                <td><center>SS</center></td>
                                <td>Bila pernyataan sangat sesuai dengan keadaan Anda</td>
                            </tr>
                            <tr>
                                <td><center>S</center></td>
                                <td>Bila pernyataan sesuai dengan keadaan Anda</td>
                            </tr>
                            <tr>
                                <td><center>TS</center></td>
                                <td>Bila pernyataan tidak sesuai dengan keadaan Anda</td>
                            </tr>
                            <tr>
                                <td><center>STS</center></td>
                                <td>Bila pernyataan sangat tidak sesuai dengan keadaan Anda</td>
                            </tr>
                            </tbody>
                        </table>
            </div>
        </div>
        <?= flash("pesan") ?>
        </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="box box-solid" style="border-radius:15px;">
            <div class="box-header with-border">
                <i class="fa fa-check-square-o"></i>
                <h3 class="box-title">Kuisoner 3</h3>
            </div>
            <div class="box-body clearfix">
            <div class ="table-responsive">
                    <form id="smileys" role="form" method="post"  action="<?= site_url("k_assessment/validasi_adversity") ?>"><br/>
                    <input type="hidden" name="hash" class="form-control" value="<?=$hash?>"/>
                <center><p><button type="submit" class="btn btn-primary btn-md"> <i class="fa fa-fw fa-chevron-right"></i> Submit</button></p></center>
                    <table id = "itemadversity" class = "table table-striped" style="width: 100%; margin-top: 0 !important">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pernyataan</th>
                                <th><center>STS</center></th>
                                <th><center>TS</center></th>
                                <th><center>S</center></th>
                                <th><center>SS</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach($item->result() as $soal){
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$soal->PERNYATAAN";?>
                                </td> 
                                <?php
                                    if($soal->TIPE == '1'){
                                        $sts = '0';
                                        $ts = '1';
                                        $s = '2';
                                        $ss = '3';
                                    }else{
                                        $sts = '3';
                                        $ts = '2';
                                        $s = '1';
                                        $ss = '0';
                                    }
                                
                                ?>

                                <td>

                                    <div class="emot" id_item="<?=$soal->ID_ITEM?>"  nipeg="<?=$soal->NIPEG?>" jawaban="<?=$sts?>" > 
                                        <input type="radio"  name="<?=$soal->ID_ITEM?>" class="happy" <?=$soal->JAWABAN === $sts ? 'checked' : '' ?> required>  
                                       
                                    </div>
                            
                                </td>
                                <td>
 
                                    <div class="emot" id_item="<?=$soal->ID_ITEM?>"  nipeg="<?=$soal->NIPEG?>" jawaban="<?=$ts?>" > 
                                        <input type="radio"  name="<?=$soal->ID_ITEM?>" class="happy" <?=$soal->JAWABAN == $ts ? 'checked' : '' ?> required>  
                                    </div>
                        
                                </td>
                                <td>

                                    <div class="emot" id_item="<?=$soal->ID_ITEM?>"  nipeg="<?=$soal->NIPEG?>" jawaban="<?=$s?>" > 
                                        <input type="radio"  name="<?=$soal->ID_ITEM?>" class="happy" <?=$soal->JAWABAN == $s ? 'checked' : '' ?> required>  
                                    </div>
                                    
                                </td>
                                <td>

                                    <div class="emot" id_item="<?=$soal->ID_ITEM?>"  nipeg="<?=$soal->NIPEG?>" jawaban="<?=$ss?>" > 
                                        <input type="radio"  name="<?=$soal->ID_ITEM?>" class="happy" <?=$soal->JAWABAN === $ss ? 'checked' : '' ?> required>  
                                    </div>
                                
                                </td>
                                <?php echo "</tr>";
                                $no++;
                            }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function () {
                
        $('.emot').on('change', function () {
            
        
            var nipeg = $(this).attr("nipeg");
            var jawaban = $(this).attr("jawaban");
            var id_item = $(this).attr("id_item");
            var emot =  $(this);

            
                $.ajax({
                url: "<?= base_url("k_assessment/proses_input_adversity") ?>",
                method: "POST",
                data: { nipeg: nipeg, jawaban: jawaban, id_item: id_item},
                success: function (data) {
                    console.log(data);
        emot.addClass("active");
                    $.toast({
                        text: "Jawaban Kuisoner berhasil disimpan",
                        heading: 'Notifikasi',
                        position: 'bottom-right',
                        bgColor: '#01512c',
                        textColor: '#fff',
                    })

                },
                error: function (e) {
                    $.toast({
                        text: "Jawaban Kuisoner  gagal disimpan",
                        heading: 'Warning',
                        position: 'bottom-right',
                        bgColor: 'red',
                        textColor: '#fff',
                    })
                }
            });
            
        });

        });
</script>