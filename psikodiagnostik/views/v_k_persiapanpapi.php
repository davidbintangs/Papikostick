<div class="container-fluid">
    <div class="col-md-2">
        <!-- agar bisa ditengah -->
    </div>
    <div class="col-md-8">
    <div class="box box-solid" style="border-radius:15px;">
        <div class="box-header with-border">
            <i class="fa fa-question-circle"></i>
            <h3 class="box-title">Petunjuk Pengisian Kuisoner 2</h3>
        </div>
            <div class="box-body clearfix">
            <blockquote>
                Hallo, <b><?=$nama?></b>
                    <ul style="list-style-type:cicle;">

                        <li>Ada 90 (sembilan puluh) pasang pernyataan, pilihlah satu dari tiap pasangan tersebut yang anda anggap paling dekat menggambarkan diri anda. </li>       
                        <li>Bila tidak satupun dari sebuah pasangan pernyataan itu cocok, pilihlah yang Saudara anggap paling mendekati.</li>
                        <li>Pilihlah pernyataan salah satu pernyataan A atau B yang Saudara pilih pada lembar jawaban yang tersedia.</li>
                        <li>kerjakan secepat mungkin dan pilihlah hanya satu pernyataan dari tiap pasangan pernyataan</li><br/>

                        <p><b>Contoh: </b><p>

                        <form id="smileys">
                    <div class="box-body clearfix">
<table id="papi" class="table" style="width: 100%; margin-top: 0 !important" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th><center>Jawaban</center></th>
                                    <th>pernyataan</th>
                                </tr>                               
                                <tr>
                                    <td> 
                                        <center>
                                            <div class="emot"> 
                                            <input type="radio" name="1" class="happy" checked disabled required="">  
                                            </div>
                                        </center>
                                    </td>
                                    <td>Saya adalah pekerja keras </td>
                                </tr>                                                                    
                                <tr>
                                    <td> 
                                             <center>
                                             <div class="emot"> 
                                            <input type="radio" name="1" class="happy" disabled required>  
                                            </div>
                                            </center>
                                    </td>
                                    <td>Saya tidak mudah murung </td>
                                </tr>
                                </tbody>
                        </table>
                        </div>
        </form>
                
                        <li>Dalam hal ini anda memilih pilihan pertama , karena pernyataan pernyataan "Saya adalah pekerja keras" merupakan gambaran diri Saudara. Tetapi jika pernyataan b lebih menggambarkan diri Saudara, maka pilihlah pernyataan kedua. </li>
                        <br/>
                        <p>Selamat Mengerjakan</p>
                </blockquote>
                <form action="<?= site_url("psikodiagnostik/proses/papikostick/$hash") ?>">
                <!-- </div> -->
            </div>
            <div class="box-footer clearfix">
                   
                    <button type="submit" onclick="event.preventDefault();this.disabled=true;this.value='Sending, please wait...';this.form.submit();" class="btn btn-info btn-flat pull-right" >Lanjut</button>
                    
                </form> 
            </div>
        </div>
    </div>
</div>



<style>


    .emot{
        font-size: 50px;
        color: #ccc;
        cursor: pointer;
    }

    .emot.green:hover{
        color:green;
        opacity: 0.5;
    }

    .emot.yellow:hover{
        color:orange;
        opacity: 0.5;
    }

    .emot.red:hover{
        color:red;
        opacity: 0.5;
    }

    .emot.green.active{
        color:green;

    }

    .emot.yellow.active{
        color:orange;

    }

    .emot.red.active{
        color:red;

    }
    form#smileys input[type="radio"] {
  -webkit-appearance: none;
  width: 40px;
  height: 40px;
  border: none;
  cursor: pointer;
  -webkit-transition: border .2s ease;
  transition: border .2s ease;
  -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  margin: 0 5px;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}
form#smileys input[type="radio"]:hover, form#smileys input[type="radio"]:checked {
  -webkit-filter: grayscale(0);
          filter: grayscale(0);
}
form#smileys input[type="radio"]:focus {
  outline: 0;
}
form#smileys input[type="radio"].happy {
  background: url(<?= base_url("assets/images/svg/happy_png.png") ?>) center;
  background-size: cover;
}
form#smileys input[type="radio"].neutral {
  background: url("https://res.cloudinary.com/turdlife/image/upload/v1492864443/neutral_t3q8hz.svg") center;
  background-size: cover;
}
form#smileys input[type="radio"].sad {
  background:  url(<?= base_url("assets/images/svg/sad_png.png") ?>) center;
  background-size: cover;
}

.mtt {
  position: fixed;
  bottom: 10px;
  right: 20px;
  color: #999;
  text-decoration: none;
}
.mtt span {
  color: #e74c3c;
}
.mtt:hover {
  color: #666;
}
.mtt:hover span {
  color: #c0392b;
}
</style>