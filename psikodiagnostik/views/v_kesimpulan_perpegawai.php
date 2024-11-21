
<div class="row">
    <div class="col-md-3">
        <div class="box box-info">

            <div class="box-body">
              <img class="profile-user-img img-responsive"  src="https://webip.indonesiapower.co.id:6090/api/foto/<?=$pegawai->NIPEG?>"  alt="User profile picture">
              <h3 class="profile-username text-center"><b><?=$pegawai->NAMA?></b></h3>
              <center><?=$pegawai->POSITION_DESC?></center>
              <ul class="list-group list-group-unbordered">

                <li class="list-group-item">
                  <b>Grade</b> <a class="pull-right"><?=$pegawai->GRADE?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenjang</b> <a class="pull-right"><?=$pegawai->JENJANG_JABATAN?></a>
                </li>
              </ul>
            </div>
        </div>

        <!-- <div class="box box-solid">
            <div class="box-header with-border">
            <h5 class="box-title">Ringkasan Hasil Asesmen</h5>
            </div>
            <div class="box-body">

            </div>
      </div> -->
    </div>
    <div class="col-md-9">
        <?= flash("pesan") ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> informasi</h4>
            Hasil Asesmen ini telah melalui interpretasi Tim Psikologi PT Indonesia Power, untuk interpretasi mendalam diperlukan penilaian ahli lebih lanjut.</br>
            Dilarang memperbanyak, mengutip sebagian atau mengedit hasil ini tanpa persetujuan dari DIVTLN Head Office.
        </div>

          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h5 class="box-title">DISC</h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
                <div class="col-md-3">
                    <canvas id="rgraph1" height="500" style="background-color:white"></canvas>
                </div>
                <div class="col-md-3">
                    <canvas id="rgraph2" height="500" style="background-color:white"></canvas>
                </div>
                <div class="col-md-3">
                    <canvas id="rgraph3" height="500" style="background-color:white"></canvas>
                </div>
                <div class="col-md-3">
                    <center><b><?=$disc->KODE_DISC?></b>
                    <p><?=$disc->NAMA_DISC?></p>
                    </center>
                    <hr/>
                    <p><b>Deskripsi :</b></p>
                    <p><?=$disc->DESKRIPSI_DISC?></p>
                    <hr/>
                    <!-- <p><b>Rekomendasi Profesi :</b></p>
                    <p><?=$disc->PROFESI?></p> -->
                </div>
            </div>
          </div>
        </div>

      
        <div class="col-md-5">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h5 class="box-title">PAPIKOSTIC GRAPHIC</h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
            <canvas id="papigraph" style="background-color:white"></canvas>
            </div>
         </div>
         <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h5 class="box-title">ADVERSITY RESULT</h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
         
            <center>
                <img class="img-responsive" src="<?= base_url("assets/images/adv/$adv->STATUS.png") ?>" style="height: 150px"/></i>
                <p><b><h2><?=$adv->STATUS?></h2></b></p>
                <!-- <p>Score : <?=$adv->JML_JWB?></p> -->
                <p><?=$adv->KETERANGAN?></p>
            </center>
            </div>
         </div>

            <!-- <div class="box box-success">
            <div class="box-header with-border">
            <h5 class="box-title">FEEDBACK HASIL</h5>
            </div>
            <div class="box-body">
            <form id="asesmen_feedback" role="form" method="post" action="<?= site_url("k_assessment/simpan_feedback") ?>" onsubmit="return confirm('Mengirim Feedback?');">

            <div class="form-group">
                <label for="asesmen_feedback">Kesesuaian Dengan diri Sendiri</label>
                <select name="rating" class="form-control select2" required>
                    <option value="" selected disabled>--Pilih Jenis Pengembangan--</option>
                    <option value="5">Sangat Sesuai</option>
                    <option value="4">Sesuai</option>
                    <option value="3">Cukup Sesuai</option>
                    <option value="2">Kurang Sesuai</option>
                    <option value="1">Tidak Sesuai</option>
                </select>
            </div>
            <div class="form-group one">
                    <label for="asesmen_feedback">Catatan</label>
                    <textarea id="editor1" name="es" ></textarea>
            </div>

            <center><button type="submit" class="btn btn-md btn-info btn-flat" ><i class="fa fa-save"></i> SIMPAN</button></center>
            </form>
            </div>
      </div> -->
        </div>   

    <div class="col-md-7">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h5 class="box-title">PAPIKOSTIC DETAIL</h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
                    <div class="table-responsive">
                        <table id = "sssb" class = "table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>KELOMPOK</th>
                                    <th>KODE</th>
                                    <!-- <th>NILAI</th> -->
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="3">Work Direction</td>
                                    <td>N</td>
                                    <!-- <td><?=$papi->N?></td> -->
                                    <td><?=$papi->DETAIL_N?></td>
                                </tr>
                                <tr>
                                    <td>G</td>
                                    <!-- <td><?=$papi->G?></td> -->
                                    <td><?=$papi->DETAIL_G?></td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <!-- <td><?=$papi->A?></td> -->
                                    <td><?=$papi->DETAIL_A?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Leadership</td>
                                    <td>L</td>
                                    <!-- <td><?=$papi->L?></td> -->
                                    <td><?=$papi->DETAIL_L?></td>
                                </tr>
                                <tr>
                                    <td>P</td>
                                    <!-- <td><?=$papi->P?></td> -->
                                    <td><?=$papi->DETAIL_P?></td>
                                </tr>
                                <tr>
                                    <td>I</td>
                                    <!-- <td><?=$papi->I?></td> -->
                                    <td><?=$papi->DETAIL_I?></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Activity</td>
                                    <td>T</td>
                                    <!-- <td><?=$papi->T?></td> -->
                                    <td><?=$papi->DETAIL_T?></td>
                                </tr>
                                <tr>
                                    <td>V</td>
                                    <!-- <td><?=$papi->V?></td> -->
                                    <td><?=$papi->DETAIL_V?></td>
                                </tr>
                                <tr>
                                    <td rowspan="4">Social nature</td>
                                    <td>X</td>
                                    <!-- <td><?=$papi->X?></td> -->
                                    <td><?=$papi->DETAIL_X?></td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <!-- <td><?=$papi->S?></td> -->
                                    <td><?=$papi->DETAIL_S?></td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <!-- <td><?=$papi->B?></td> -->
                                    <td><?=$papi->DETAIL_B?></td>
                                </tr>
                                <tr>
                                    <td>O</td>
                                    <!-- <td><?=$papi->O?></td> -->
                                    <td><?=$papi->DETAIL_O?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Workstyle</td>
                                    <td>R</td>
                                    <!-- <td><?=$papi->R?></td> -->
                                    <td><?=$papi->DETAIL_R?></td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <!-- <td><?=$papi->D?></td> -->
                                    <td><?=$papi->DETAIL_D?></td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <!-- <td><?=$papi->C?></td> -->
                                    <td><?=$papi->DETAIL_C?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Temprament</td>
                                    <td>Z</td>
                                    <!-- <td><?=$papi->Z?></td> -->
                                    <td><?=$papi->DETAIL_Z?></td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <!-- <td><?=$papi->E?></td> -->
                                    <td><?=$papi->DETAIL_E?></td>
                                </tr>
                                <tr>
                                    <td>K</td>
                                    <!-- <td><?=$papi->K?></td> -->
                                    <td><?=$papi->DETAIL_K?></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Followership</td>
                                    <td>F</td>
                                    <!-- <td><?=$papi->F?></td> -->
                                    <td><?=$papi->DETAIL_F?></td>
                                </tr>
                                <tr>
                                    <td>W</td>
                                    <!-- <td><?=$papi->W?></td> -->
                                    <td><?=$papi->DETAIL_W?></td>
                                </tr>
                            </tbody>
                    </table>
               
                </div>
            </div>
        </div>
    </div>


</div>

<!-- chart js -->
<script src="<?= base_url("assets") ?>/css/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url("assets") ?>/css/chart.js/Chart.bundle.js"></script>
<script src="<?= base_url("assets") ?>/css/chart.js/utils.js"></script>
<script src="<?= base_url("assets") ?>/css/chart.js/analyser.js"></script>
<!-- end of chart js -->

<!-- ck editor -->
<script src="<?= base_url("assets") ?>/ckeditor/ckeditor.js"></script>
<link href="<?= base_url("assets") ?>/ckeditor/content.css" rel="stylesheet" type="text/css"/>


<style>
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<script>
	
    var color = Chart.helpers.color;
    //generate data for graph   
    var graph1 = {
			labels: ['D','I','S','C'],
			datasets: [{
				type: 'line',
				label: '<?=$pegawai->NAMA?>',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
                fill: false,
                pointRadius: 6,
				data: [
					<?=$disc->D_CODE_L1.', '.$disc->I_CODE_L1.', '.$disc->S_CODE_L1.', '.$disc->C_CODE_L1?>
				]
			}]

		};
        var graph2 = {
			labels: ['D','I','S','C'],
			datasets: [{
				type: 'line',
				label: '<?=$pegawai->NAMA?>',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
                fill: false,
                pointRadius: 6,
				data: [
					<?=$disc->D_CODE_L2.', '.$disc->I_CODE_L2.', '.$disc->S_CODE_L2.', '.$disc->C_CODE_L2?>
				]
			}]

		};
        var graph3 = {
			labels: ['D','I','S','C'],
			datasets: [{
				type: 'line',
				label: '<?=$pegawai->NAMA?>',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
                fill: false,
                pointRadius: 6,
				data: [
                    <?=$disc->D_CODE_L3.', '.$disc->I_CODE_L3.', '.$disc->S_CODE_L3.', '.$disc->C_CODE_L3?>
				]
			}]

		};
		
        var papigraph = {
			type: 'radar',
			data: {
				labels: ['N','G','A','L','P','I','T','V','X','S','B','O','R','D','C','Z','E','K','F','W'],
				datasets: [{
					label: '<?=$pegawai->NAMA?>',
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [
                        <?=$papi->N.', '.$papi->G.', '.$papi->A.', '.$papi->L.', '.$papi->P.', '.$papi->I.', '.$papi->T.', '.$papi->V.', '.$papi->X.', '.$papi->S.', '.$papi->B.', '.$papi->O.', '.$papi->R.', '.$papi->D.', '.$papi->C.', '.$papi->Z.', '.$papi->E.', '.$papi->K.', '.$papi->F.', '.$papi->W?>
                    ]
                    
				}]
			},
			options: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'PAPIKOSTICK'
				},
				scale: {
					ticks: {
						beginAtZero: true
					}
				}
			}
		};
		
    // render chart
		window.onload = function() {

        window.myRadar = new Chart(document.getElementById('papigraph'), papigraph);
        
        var rgraph3 = document.getElementById('rgraph3').getContext('2d');
            window.myMixedChart = new Chart(rgraph3, {
                type: 'bar',
                data: graph3,
                options: {
                    elements: {
                        line: {
                            tension: 0.000001
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'GRAPH 3: Mirror Perceived Self'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    
                }
            });
            
        var rgraph2 = document.getElementById('rgraph2').getContext('2d');
			window.myMixedChart = new Chart(rgraph2, {
				type: 'bar',
                data: graph2,
				options: {
                    elements: {
                        line: {
                            tension: 0.000001
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
					responsive: true,
					title: {
						display: true,
						text: 'GRAPH 2: LEAST Core Private Self'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});

        var rgraph1 = document.getElementById('rgraph1').getContext('2d');
			window.myMixedChart = new Chart(rgraph1, {
				type: 'bar',
                data: graph1,
				options: {
                    elements: {
                        line: {
                            tension: 0.000001
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
					responsive: true,
					title: {
						display: true,
						text: 'GRAPH 1: MOST Mask Public Self'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});

		};

    var editor1 = CKEDITOR.replace( 'editor1', {
    language: 'en',
    extraPlugins: 'notification'
      });

    editor1.on( 'required', function( evt ) {
    alert( 'Executive tidak boleh dikosongkan' );
    evt.cancel();
    } );

	</script>


