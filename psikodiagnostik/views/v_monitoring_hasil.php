<div class="container-fluid">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle"></i>

                    <h3 class="box-title">Hasil Kuisoner Asesmen</h3>
                </div>
                <!-- /.box-header --> 
                <div class="box-body clearfix">
                    <div class="col-md-10">
                    Halaman Hasil Pengisian Psikodiagnostik
                    </div>
                    <div class="col-md-2">
                    <center>
                        <img class="img-responsive" src="<?= base_url("assets/images/result.png") ?>" style="height: 150px"/></i>
                    </center>
                    </div>
                </div>
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Hasil Psikodiagnostik</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                <div class="table-responsive">
                    <table id="monitoring" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>BIDANG</th>
                            <th>UNIVERSITAS</th>
                            <th>DISC_D</th>
                            <th>DISC_I</th>
                            <th>DISC_S</th>
                            <th>DISC_C</th>
                            <th>DISC</th>
                            <th>NAMA DISC</th>
                            <th class="none">N</th>
                            <th class="none">G</th>
                            <th class="none">A</th>
                            <th class="none">L</th>
                            <th class="none">P</th>
                            <th class="none">I</th>
                            <th class="none">T</th>
                            <th class="none">V</th>
                            <th class="none">X</th>
                            <th class="none">S</th>
                            <th class="none">B</th>
                            <th class="none">O</th>
                            <th class="none">R</th>
                            <th class="none">D</th>
                            <th class="none">C</th>
                            <th class="none">Z</th>
                            <th class="none">E</th>
                            <th class="none">K</th>
                            <th class="none">F</th>
                            <th class="none">W</th>
                            <th>POTENSI</th>
                            <th>Detail</th>
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
                            <td><?=$data->BIDANG?></td>
                            <td><?=$data->UNIVERSITAS?></td>
                            <td><?=$data->D_L3?></td>
                            <td><?=$data->I_L3?></td>
                            <td><?=$data->S_L3?></td>
                            <td><?=$data->C_L3?></td>
                            <td><?=$data->KODE_DISC?></td>
                            <td><?=$data->NAMA_DISC?></td>
                            <td class="none"><?=$data->N?></td>
                            <td class="none"><?=$data->G?></td>
                            <td class="none"><?=$data->A?></td>
                            <td class="none"><?=$data->L?></td>
                            <td class="none"><?=$data->P?></td>
                            <td class="none"><?=$data->I?></td>
                            <td class="none"><?=$data->T?></td>
                            <td class="none"><?=$data->V?></td>
                            <td class="none"><?=$data->X?></td>
                            <td class="none"><?=$data->S?></td>
                            <td class="none"><?=$data->B?></td>
                            <td class="none"><?=$data->O?></td>
                            <td class="none"><?=$data->R?></td>
                            <td class="none"><?=$data->D?></td>
                            <td class="none"><?=$data->C?></td>
                            <td class="none"><?=$data->Z?></td>
                            <td class="none"><?=$data->E?></td>
                            <td class="none"><?=$data->K?></td>
                            <td class="none"><?=$data->F?></td>
                            <td class="none"><?=$data->W?></td>
                            <td><?=$data->NILAI_POTENSI?></td>
                            <td>
                                <center>
                                    <?php
                                        if($data->KODE_DISC != NULL || $data->NILAI_POTENSI != NULL || $data->N != NULL){ ?>
                                            <a href="<?=site_url("psikodiagnostik/detail_hasil/$data->HASH");?>"  target="_blank" type="button" class="btn btn-block btn-default btn-xs">Detail <i class="fa fa-fw fa-arrow-circle-right"></i></a>
                                
                                    <?php } ?>

                                        
                                    
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