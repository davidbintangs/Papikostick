<div class="container-fluid">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="box box-danger box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><b><i class="fa fa-exclamation-triangle"></i> Skala Penilaian</b></h3>
          <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
        </div>
        <div class="box-body">
            <img src="<?= base_url("assets/images/circle/1.png") ?>" style="height: 20px"/>&emsp; 1. Tidak Pernah</i><br/>
            <img src="<?= base_url("assets/images/circle/2.png") ?>" style="height: 20px"/>&emsp; 2. Jarang</i><br/>
            <img  src="<?= base_url("assets/images/circle/3.png") ?>" style="height: 20px"/>&emsp; 3. Kadang-Kadang</i><br/>
            <img src="<?= base_url("assets/images/circle/4.png") ?>" style="height: 20px"/>&emsp; 4. Sering</i><br/>
            <img src="<?= base_url("assets/images/circle/5.png") ?>" style="height: 20px"/>&emsp; 5. Selalu</i><br/>
        </div>
      </div>
    </div>

    <form role="form" class="form-horizontal" method="post" action="<?= site_url("psikodiagnostik/proses_input_potensi/$hash") ?>">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle"></i>
                    <h3 class="box-title">Kuisoner Analisis Potensi</h3>
                </div>
                <div class="box-body clearfix">
                    <div class ="table-responsive">
                        <table id = "itempotensi" class = "table table-striped" style="width: 100%; margin-top: 0 !important"  cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th><center>1</center></th>
                                    <th><center>2</center></th>
                                    <th><center>3</center></th>
                                    <th><center>4</center></th>
                                    <th><center>5</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach($item->result() as $soal){
                                    echo "<tr>";
                                    echo "<td>$no</td>";
                                    echo "<td>$soal->NAME_ITEM</td>";?>

                                    <td>
                                        <center>
                                            <input type="radio" style="width: 17px; height: 17px;" name="<?php echo $soal->ID_ITEM;
                                            ?>" value="1" required <?php echo set_radio('myradio', '1'); ?> /> 
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <input type="radio" style="width: 17px; height: 17px;" name="<?php echo $soal->ID_ITEM;
                                            ?>" value="2" <?php echo set_radio('myradio', '2'); ?> /> 
                                        </center>
                                         
                                    </td>
                                    <td>
                                        <center>
                                            <input type="radio" style="width: 17px; height: 17px;" name="<?php echo $soal->ID_ITEM;
                                            ?>" value="3" <?php echo set_radio('myradio', '3'); ?> /> 
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <input type="radio" style="width: 17px; height: 17px;" name="<?php echo $soal->ID_ITEM;
                                            ?>" value="4" <?php echo set_radio('myradio', '4'); ?> /> 
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <input type="radio" style="width: 17px; height: 17px;" name="<?php echo $soal->ID_ITEM;
                                            ?>" value="5" <?php echo set_radio('myradio', '5'); ?> />
                                        </center>
                                    </td>
                                    <?php echo "</tr>";
                                    $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();" class="btn btn-info btn-flat pull-right" >SIMPAN</button>
                </div>
            </div>
        </div>
    </form>

</div>