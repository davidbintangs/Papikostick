<div class="container-fluid">
    <div class="col-md-12">
    <?= flash("pesan") == '' ? "<br/><br/><br/>"  : flash("pesan")?>
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><b><i class="fa fa-save "></i> Anda Telah Menyelesaikan Pengisian Asesmen</b></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
        <center>
        <img class="img-responsive" src="<?= base_url("assets/images/asesmen/terimakasih.jpg") ?>"/>
            <p></p>
            Terima kasih atas partisipasi <?=session('nama')?> dalam pengisian kuisoner asesmen ini. Data asesmen anda telah kami terima dengan baik. Data yang telah diberikan akan kami jaga kerahasiannya dan hanya akan digunakan secara terbatas untuk kepentingan perusahaan.  
            </p>
            <p>Hormat kami,</p>
            <br/>
            <p><b>Tim Talent Management</b></p>

            <p><a href="<?= base_url("psikodiagnostik/index?star=$hash") ?>"><button type="button"class="btn btn-success waves-effect waves-light">Halaman Kuisoner Asesmen</button></a></p>
        </center>
        
        
        </div>
    </div>
    </div>
</div>