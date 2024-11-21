<div class="container-fluid">
<?= flash("pesan") ?>
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-question-circle"></i>

            <h3 class="box-title">Kuisoner Asesmen</h3>
        </div>
        <!-- /.box-header --> 
        <div class="box-body clearfix">
            <div class="col-md-10">
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $a = date("H");
                if (($a>=6) && ($a<=11)){
                
                $greeting = "Selamat pagi";
                }
                else if(($a>11) && ($a<=15))
                {
                $greeting = "Selamat Siang";}
                else if (($a>15) && ($a<=18)){
                $greeting = "Selamat Sore";
                }
                else { $greeting = "Selamat Malam";}
            ?> 
                <p>
                    <b> 
                        <?php
                            echo "$greeting, "; echo $nama;
                        ?>
                    </b>
                </p>  
                <p>
                    Dalam rangka mendukung optimasi peta karir dan program pengembangan Pegawai pada PT Indonesia Power, maka diperlukan pengayaan data dalam bentuk pemetaan kecenderuangan kepribadian pegawai melalui asesmen. Saat ini Divisi Talenta telah melakukan adaptasi berupa 3 alat ukur yang dapat memberikan data yang dibutuhkan. 
                </p>
                <p>
                    Berkaitan dengan hal tersebut, kami mohon bantuan Bapak/Ibu untuk dapat mengisi kuesioner terdiri dari pernyataan-pernyataan yang berhubungan dengan kondisi diri anda.Hasil dari kuesioner ini tidak berpengaruh terhadap penilaian kinerja individu/pegawai. Data yang Anda berikan akan langsung masuk ke sistem, diperlakukan sebagai data rahasia dan akan digunakan secara terbatas untuk kepentingan perusahaan. 
                </p>
                <p>
                Jika Anda mengalami kesulitan dalam pengisian survei ini, silakan menghubungi <b>Penanggung Jawab Unit</b> masing-masing<br/>          

                </p>
                <p>
                    Terima kasih atas kesediaan dan kontribusi Anda.
                    Hormat kami<br/>
                    <br/>
                    <b>Talent Management Division</b>
                </p>
            </div>
            <div class="col-md-2">
            <center>
                <img class="img-responsive" src="<?= base_url("assets/images/anpot.png") ?>" style="height: 150px"/></i>
            </center>
            </div>
        </div>
    </div>
<?php
    $persen_disc = ($status_disc/48)*100;
    $persen_disc = round($persen_disc,2);
    $persen_papi = ($status_papi/90)*100;
    $persen_papi = round($persen_papi,2);
    $persen_adv = ($status_adv/40)*100;
    $persen_adv = round($persen_adv,2);
    $hash = $this->uri->segment("3"); //menampung hash
?>
<?php 

?>

    <div  class="col-md-2">
        <form action='<?= site_url("k_assessment/persiapan/disc/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" ><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/1.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 1<?php if ($persen_disc >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_disc?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>

    <div  class="col-md-2">
        <form action='<?= site_url("k_assessment/persiapan/papikostick/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" <?=$persen_disc >= '100' ? '' : 'disabled' ?>><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/2.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 2<?php if ($persen_papi >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_papi?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>


    <div  class="col-md-2">
        <form action='<?= site_url("k_assessment/persiapan/adversity/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" <?=$persen_papi >= '100' ? '' : 'disabled' ?>  ><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/3.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 3 <?php if ($persen_adv >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_adv?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>
    
    <?php foreach ($menumodul->result() as $data) {
        if ($data->MENU_KD =='result_assm' && $cek_ipku == false){?>
                
                <div  class="col-md-2">
                    <form action='<?= site_url("k_assessment/hasil/$hash") ?>'>
                        <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" ><center><img class="img-responsive" src="<?= base_url("assets/images/hasil.png") ?>" style="height: 100px"/></i>
                        <b>MONITORING HASIL </b></center>
                        </button>
                    </form>
                </div>
        
        <?php }
          if ($data->MENU_KD =='filter_result' && $cek_ipku == false){?>
                
            <div  class="col-md-2">
                <form action='<?= site_url("k_assessment/filter/$hash") ?>'>
                    <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" ><center><img class="img-responsive" src="<?= base_url("assets/images/filter.png") ?>" style="height: 100px"/></i>
                    <b>Filter </b></center>
                    </button>
                </form>
            </div>
    
    <?php }
    } ?>   
    <!-- <a href="https://pdf-ace.com/save-as-pdf-button/" target= "_blank">pdf</a>  -->

</div>