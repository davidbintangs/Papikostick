<div class="row">
    <div class="col-md-12">
    <?= flash("pesan") ?>
        <form role="form">
                <div class="col-md-4">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Pencarian DISC</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">

                                <select class="filterDisc" name="disc[]" multiple="multiple" style="width: 100%">
                                <?php foreach ($filterDisc->result() as $data) { 
                                    $terpilih = '';
                                    foreach ($discFilter as $select) {

                                        if($data->ID_DISC == $select){$terpilih ='selected';}?>
        
                                    
                                    <?php } ?>
                                    <option <?=$terpilih?> value="<?=$data->ID_DISC?>"><?=$data->KODE_DISC.' ('.$data->NAMA_DISC.')'?></option>
                                <?php } ?>

                            </select>
                            </div>
                            <!-- <div class="form-group">
                                    <label >Bobot DISC</label>
                                    <input name="bobot_disc" placeholder="Bobot DISC" class="form-control" rows="2"></textarea>
                                </div> -->
                        
                        </div>
                    </div>
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Pencarian Papikostick</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                                <?php 
                            
                                foreach ($variable->result() as $data) {?>
                                    <div class="form-group">
                                        <label for="papi_<?=$data->KODE_PAPI?>" class="col-sm-1 control-label" ><?=$data->KODE_PAPI?></label>
                                        <div class="col-sm-11">
                                            <div id="slide_<?=$data->KODE_PAPI?>"></div>
                                            <input type="text" name="min_<?=$data->KODE_PAPI?>" id="bawah_<?=$data->KODE_PAPI?>"  style="background-color:#fff; border:0; color:#b81010; font-weight:bold;   width: 70px;"/>
                                            <input class="pull-right" type="text" name="max_<?=$data->KODE_PAPI?>" id="atas_<?=$data->KODE_PAPI?>"  style=" text-align: right; background-color:#fff; border:0; color:#b81010; font-weight:bold;   width: 70px;"/>
                                        </div>
                                    </div></br>
                                <?php
                                }?>

                                <!-- <div class="form-group">
                                    <label >Bobot Papikostic</label>
                                    <input name="bobot_papi" placeholder="Bobot Papikostic" class="form-control" rows="2"></textarea>
                                </div> -->
                          
                        </div>
                    </div>
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Pencarian Adversity</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                        <?php 
                        $climbers = '';
                        $campers = '';
                        $quiters = '';
                            foreach ($advFilter as $select) {
                                if($select=='Climbers'){
                                    $climbers="selected";
                                }elseif($select == 'Campers'){
                                    $campers="selected";
                                }elseif($select == 'Quiters'){
                                    $quiters = 'selected';
                                }
                            }
                        ?>
                        
                        <select class="filterAdv" name="adv[]" multiple="multiple" style="width: 100%">

                            <option <?=$climbers?> value="Climbers"> Climbers</option>
                            <option <?=$campers?> value="Campers"> Campers</option>
                            <option <?=$quiters?> value="Quiters"> Quiters</option>
                        </select>


                        <!-- <div class="form-group">
                                    <label >Bobot Adversity</label>
                                    <input name="bobot_papi" placeholder="Bobot Adversity" class="form-control" rows="2"></textarea>
                                </div> -->
            
                        
                        </div>
                    </div>


                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Data Pegawai</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                        <?php 
                        $m = '';
                        $f = '';
                            foreach ($jk as $select) {
                                if($select=='M'){
                                    $m="selected";
                                }elseif($select == 'F'){
                                    $f ="selected";
                                }
                            }
                        ?>
                            <div class="form-group">
                                    <label >Jenis Kelamin</label>
                                    <select class="filterJk" name="jk[]" multiple="multiple" style="width: 100%">
                                        <option <?=$m ?> value="M"> Laki-Laki</option>
                                        <option <?=$f ?> value="F"> Perempuan</option>
                                    </select>
                            </div>

                            <?php 
                                $eu = '';
                                $es = '';
                                $ek = '';
                                $pa = '';
                                $pd = '';
                                $pk = '';
                                foreach ($jj as $select) {
                                    if($select=='EKSEKUTIF UTAMA'){
                                        $eu="selected";
                                    }elseif($select == 'EKSEKUTIF SENIOR'){
                                        $es ="selected";
                                    }elseif($select == 'EKSEKUTIF'){
                                        $ek ="selected";
                                    }elseif($select == 'PENYELIA ATAS'){
                                        $pa ="selected";
                                    }elseif($select == 'PENYELIA DASAR'){
                                        $pd ="selected";
                                    }elseif($select == 'PELAKSANA'){
                                        $pk ="selected";
                                    }
                                }
                            ?>

                            <div class="form-group">
                                    <label >Jenjang Jabatan</label>
                                    <select class="filterJj" name="jj[]" multiple="multiple" style="width: 100%">
                                        <option <?=$eu?> value="EKSEKUTIF UTAMA"> EKSEKUTIF UTAMA</option>
                                        <option <?=$es?> value="EKSEKUTIF SENIOR"> EKSEKUTIF SENIOR</option>
                                        <option <?=$ek?> value="EKSEKUTIF"> EKSEKUTIF</option>
                                        <option <?=$pa?> value="PENYELIA ATAS"> PENYELIA ATAS</option>
                                        <option <?=$pd?> value="PENYELIA DASAR"> PENYELIA DASAR</option>
                                        <option <?=$pk?> value="PELAKSANA"> PELAKSANA</option>
                                    </select>
                            </div>
                            <?php 
                            $kp = ''; $ujh = ''; $upr = ''; $sla = ''; $mrc =''; $smg = ''; $bli = ''; $sgl = ''; $pgt = ''; $tgp = ''; $kmj = ''; $htc = ''; $bsr = ''; $blb = ''; $blt = ''; $jpr = ''; $adp = ''; $pns = ''; $clg = ''; $bru = ''; $jrj = ''; $sgu = ''; $stg = '';

                                foreach ($unit as $select) {
                                    if($select=='KP'){
                                        $kp="selected";
                                    }elseif($select == 'UJH'){
                                        $ujh ="selected";
                                    }elseif($select == 'UPR'){
                                        $upr ="selected";
                                    }elseif($select == 'SLA'){
                                        $sla ="selected";
                                    }elseif($select == 'MRC'){
                                        $mrc ="selected";
                                    }elseif($select == 'SMG'){
                                        $smg ="selected";
                                    }elseif($select == 'BLI'){
                                        $bli ="selected";
                                    }elseif($select == 'SGL'){
                                        $sgl ="selected";
                                    }elseif($select == 'PGT'){
                                        $pgt ="selected";
                                    }elseif($select == 'TGP'){
                                        $tgp ="selected";
                                    }elseif($select == 'KMJ'){
                                        $kmj ="selected";
                                    }elseif($select == 'HTC'){
                                        $htc ="selected";
                                    }elseif($select == 'BSR'){
                                        $bsr ="selected";
                                    }elseif($select == 'BLB'){
                                        $blb ="selected";
                                    }elseif($select == 'BLT'){
                                        $blt ="selected";
                                    }elseif($select == 'JPR'){
                                        $jpr ="selected";
                                    }elseif($select == 'ADP'){
                                        $adp ="selected";
                                    }elseif($select == 'PNS'){
                                        $pns ="selected";
                                    }elseif($select == 'CLG'){
                                        $clg ="selected";
                                    }elseif($select == 'BRU'){
                                        $bru ="selected";
                                    }elseif($select == 'JRJ'){
                                        $jrj ="selected";
                                    }elseif($select == 'SGU'){
                                        $sgu ="selected";
                                    }elseif($select == 'STG'){
                                        $stg ="selected";
                                    }
                                    
                                    
                                }
                            ?>

                            <div class="form-group">
                                    <label >Unit</label>
                                    <select class="filterUnit" name="unit[]" multiple="multiple" style="width: 100%">
                                        <option <?=$kp?> value="KP"> KANTOR PUSAT</option>
                                        <option <?=$ujh?> value="UJH"> MAINTENANCE SERVICE UNIT</option>
                                        <option <?=$upr?> value="UPR"> PROJECT UNIT</option>
                                        <option <?=$sla?> <?=$sla?> value="SLA"> SURALAYA PGU</option>
                                        <option <?=$mrc?> value="MRC"> MRICA PGU</option>
                                        <option <?=$smg?> value="SMG"> SEMARANG PGU</option>
                                        <option <?=$bli?> value="BLI"> BALI PGU</option>
                                        <option <?=$sgl?> value="SGL"> SAGULING POMU</option>
                                        <option <?=$pgt?> value="PGT"> GRATI POMU</option>
                                        <option <?=$tgp?> value="TGP"> PRIOK POMU</option>
                                        <option <?=$kmj?> value="KMJ"> KAMOJANG POMU</option>
                                        <option <?=$htc?> value="HTC"> HOLTEKAMP POMU</option>
                                        <option <?=$bsr?> value="BSR"> BANTEN 1 SURALAYA OMU</option>
                                        <option <?=$blb?> value="BLB"> LABUAN OMU</option>
                                        <option <?=$blt?> value="BLT"> LONTAR OMU</option>
                                        <option <?=$jpr?> value="JPR"> PELABUHAN RATU OMU</option>
                                        <option <?=$adp?> value="ADP"> ADIPALA OMU</option>
                                        <option <?=$pns?> value="PNS"> PANGKALAN SUSU OMU</option>
                                        <option <?=$clg?> value="CLG"> CILEGON OMU</option>
                                        <option <?=$bru?> value="BRU"> BARRU OMU</option>
                                        <option <?=$jrj?> value="JRJ"> JERANJANG OMU</option>
                                        <option <?=$sgu?> value="SGU"> SANGGAU OMU</option>
                                        <option <?=$stg?> value="STG"> SINTANG OMU</option>
                                    </select>
                            </div>




                        </div>
                    </div>

                    <center>
                        <p><button type="submit" class="btn btn-primary btn-md"> <i class="fa fa-search"></i> Filter</button>
                        <a type="button" class="btn btn-danger btn-md" href="<?= site_url('k_assessment/filter') ?>"><i class="fa fa-remove"></i>Reset</a>
                        </p>
                    </center>
                </div>
                <div class="col-md-8">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Hasil Filter</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                        <div class="table-responsive">
                            <table id="hasil_filter" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIPEG</th>
                                    <th>NAMA</th>
                                    <th>JK</th>
                                    <th>JABATAN</th>
                                    <th>JENJANG</th>
                                    <th>DISC</th>
                                    <th>NAMA DISC</th>
                                    <th>ADVERSITY</th>
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
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list_hasil->result() as $data) {?>
                                    <tr>
                                    <td><?=$no?></td>
                                    <td><?=$data->NIPEG?></td>
                                    <td><?=$data->NAMA?></td>
                                    <td><?=$data->SEX?></td>
                                    <td><?=$data->POSITION_DESC?></td>
                                    <td><?=$data->JENJANG_JABATAN?></td>
                                    <td><?=$data->KODE_DISC?></td>
                                    <td><?=$data->NAMA_DISC?></td>
                                    <td><?=$data->STATUS_ADVERSITY?></td>
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
                                    <td>
                                        <center>
                                            <?php
                                                if($data->KODE_DISC != NULL || $data->STATUS_ADVERSITY != NULL || $data->N != NULL){ ?>
                                                    <a href="<?=site_url("k_assessment/detail/$data->NIPEG");?>"  target="_blank" type="button" class="btn btn-block btn-default btn-xs">Detail <i class="fa fa-fw fa-arrow-circle-right"></i></a>
                                        
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
       
        </form>
    </div>
</div>
            
 
<script>
$(document).ready(function (){

    var table = $('#hasil_filter').DataTable({
        'responsive': true,
        'paging': true,
            'ordering': true,
            'info': true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    
                },
                {
                    extend: 'excelHtml5',
                    orientation: 'landscape',
                    
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    
                }
            ]
    });

});

</script>