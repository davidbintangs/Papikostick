<div class="container-fluid">
    <div class="col-md-12">
    <?= flash("pesan") == '' ? "<br/><br/><br/>"  : flash("pesan")?>
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><b><i class="fa fa-save "></i> Waktu Pengisian Belum Dimulai</b></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
        <center>
        <h3><p><b>Periode waktu pengisian tes belum dimulai.</b></p></h3>
        <p>Halaman tes psikodiagnostik akan terbuka jika jadwal pengisian telah dimulai.</p>

        <p>Saudara akan mengisi 3 Jenis Asesmen dengan jumlah dan tipe pertanyaan yang berbeda-beda. Jika ada kendala dapat menghubungi PIC yang bersangkutan.</p>

        <img class="img-responsive" src="<?= base_url("assets/images/contoh_tes.PNG") ?>"/>
            
            </p>
            <p>Hormat kami,</p>
            <br/>
            <p><b>PT Indonesia Power</b></p>

        </center>
        
        
        </div>
    </div>
    </div>
</div>