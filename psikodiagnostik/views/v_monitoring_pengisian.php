<div class="row">
<div class="col-md-12">
<?= flash("pesan") ?>

    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-question-circle"></i>

            <h3 class="box-title">Hasil Kuisoner Asesmen</h3>
        </div>
        <!-- /.box-header --> 
        <div class="box-body clearfix">
            <div class="col-md-10">
               Halaman Monitoring Pengisian Psikodiagnostik
            </div>
            <div class="col-md-2">
            <center>
                <img class="img-responsive" src="<?= base_url("assets/images/result.png") ?>" style="height: 150px"/></i>
            </center>
            </div>
        </div>
    </div>


    <div class="box box-solid">
        <div class="box-body clearfix">
            <div class="table-responsive">
                <center>  <a href="<?=site_url("psikodiagnostik/list_hasil");?>"  target="_blank" type="button" class="btn btn-primary btn-md">Hasil Pengisian Kuisoner Asesmen <i class="fa fa-fw fa-arrow-circle-right"></i></a>
                                </center>
            <table id="monitoring" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>UNIVERSITAS</th>
                            <th>JURUSAN</th>
                            <th>BIDANG</th>
                            <th>DISC</th>
                            <th>PAPIKOSTICK</th>
                            <th>POTENSI</th>
                            <th>DETAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($resultdata->result() as $data) {?>
                            <tr>
                            <td><?=$no?></td>
                            <td><?=$data->NIM?></td>
                            <td><?=$data->NAMA?></td>
                            <td><?=$data->EMAIL?></td>
                            <td><?=$data->UNIVERSITAS?></td>
                            <td><?=$data->JURUSAN?></td>
                            <td><?=$data->BIDANG?></td>
                            <td>
                                <center>
                                    <?php
                                        $detail = 0;
                                        if($data->DISC >= 48){
                                            echo "<small class='label bg-green'>SELESAI</small> ";
                                            $detail++;
                                        }elseif($data->DISC >0 && $data->DISC < 48){
                                            echo "<small class='label bg-yellow'>PROGRES</small> ";
                                        }else{
                                            echo "<small class='label bg-red'>BELUM MENGISI</small> ";
                                        }
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php
                                            if($data->PAPI >= 90){
                                                echo " <small class='label bg-green'>SELESAI</small>";
                                                $detail++;
                                            }elseif($data->PAPI > 0 && $data->PAPI < 90){
                                                echo "<small class='label bg-yellow'>PROGRES</small> ";
                                            }else{
                                                echo "<small class='label bg-red'>BELUM MENGISI</small> ";
                                            }
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php
                                            if($data->POTENSI >= 27){
                                                echo " <small class='label bg-green'>SELESAI</small>";
                                                $detail++;
                                            }elseif($data->POTENSI >0 AND $data->POTENSI     < 27){
                                                echo "<small class='label bg-yellow'>PROGRES</small> ";
                                            }else{
                                                echo "<small class='label bg-red'>BELUM MENGISI</small> ";
                                            }
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php
                                        if($detail == '3'){ ?>
                                            <a href="<?=site_url("psikodiagnostik/detail_hasil/$data->HASH");?>"  target="_blank" type="button" class="btn btn-block btn-default btn-xs">Detail <i class="fa fa-fw fa-arrow-circle-right"></i></a>
                                
                                    <?php }
                                    ?>
                                </center>
                            </td>
                            </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>