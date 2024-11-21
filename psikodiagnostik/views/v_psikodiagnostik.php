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
                $nama= "David";
            ?> 
                <p>              
                   
                        <?php
                            echo "$greeting,<b>"; echo session('nama_mahasiswa')." (".session('universitas')." | ".session('jurusan').")";
                        ?>
                    </b>
                </p>  
                <!-- <p><b>Selamat Anda telah lulus dalam seleksi administrasi</b></p> -->

                <!-- <p>
                    Dalam rangka seleksi penjaringan akhir kandidat peserta program Magang Kampus Merdeka di PT Indonesia Power diwajibkan untuk mengikuti seleksi akademis dan asesmen psikologi. Asesmen psikologi dilakukan untuk pengayaan data dalam bentuk pemetaan kecenderuangan kepribadian calon peserta magang di lingkungan dunia kerja. Saat ini terdapat 3 jenis Asesmen Psikologi yang harus diikuti oleh peserta magang di PT Indonesia Power.
                </p> -->
                <p>
                    <!-- Berkaitan dengan hal tersebut,
                     -->
                    Dalam rangka pengukuran asesmen kepribadian di lingkungan PT. PLN Indonesia Power, kami mohon bantuan Anda untuk dapat mengisi kuesioner terdiri dari pernyataan-pernyataan yang berhubungan dengan kondisi diri anda. Data yang Anda berikan akan langsung masuk ke sistem, diperlakukan sebagai data rahasia dan akan digunakan secara terbatas untuk kepentingan perusahaan.
                </p>
                <p>
                    Terima kasih atas kesediaan dan kontribusi Anda.
                    Hormat kami<br/>
                    <br/>
                    <b>Pengelola Magang Kampus Merdeka PT Indonesia Power</b>
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
    $persen_potensi = ($status_potensi/27)*100;
    $persen_potensi = round($persen_potensi,2);
?>

    <div  class="col-md-2">
        <form action='<?= site_url("psikodiagnostik/persiapan/disc/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" ><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/1.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 1<?php if ($persen_disc >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_disc?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>

    <div  class="col-md-2">
        <form action='<?= site_url("psikodiagnostik/persiapan/papikostick/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" <?=$persen_disc >= '100' ? '' : 'disabled' ?>><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/2.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 2<?php if ($persen_papi >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_papi?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>


    <div  class="col-md-2">
        <form action='<?= site_url("psikodiagnostik/persiapan/potensi/$hash") ?>'>
            <button type="submit" style="margin-bottom: 10px;background-color:white;  border-radius:15px;" class="btn btn-block btn-default" <?=$persen_papi >= '100' ? '' : 'disabled' ?>  ><center><img class="img-responsive" src="<?= base_url("assets/images/asesmen/3.png") ?>" style="height: 100px"/></i>
            <b>ASESMEN 3 <?php if ($persen_potensi >= '100'){ ?> <small class="label label-success"><i class="fa fa-check"></i> 100%</small>  <?php }else{?>
                <small class="label label-warning"><i class="fa fa-check"></i> <?=$persen_potensi?> %</small>
            <?php } ?></b></center>
            </button>
        </form>
    </div>
    


</div>