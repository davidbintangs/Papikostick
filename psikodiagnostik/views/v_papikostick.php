    
<div class="container-fluid">
    <a id="button"></a>
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body clearfix">
                Hallo
                <ul>
                            <li>Pada soal ini <b>tidak ada jawaban yang benar maupun salah</b>. Oleh karena itu anda diminta untuk memberikan jawaban <b>apa adanya</b> sesuai dengan penghayatan anda terhadap diri anda.</li>
                            
                            <li>Jabawan akan <b>otomatis disimpan ke database</b> tekan tombol <i>submit</i> untuk melanjutkan dan mengecek apakah jawaban sudah selesai semua</li>

                    </ul>
                </div>
            </div>
            <?= flash("pesan") ?>
        </div>

        <form id="smileys" role="form" method="post"  action="<?= site_url("psikodiagnostik/validasi_papi") ?>">
        <input type="hidden" name="hash" class="form-control" value="<?=$hash?>"/>
        <div class="pag">
        <?php
        for ($i=1; $i<91 ; $i++) {
            if($i == 1 || ($i-1)%6=='0'){
                echo "<div class='row'>";
            }
            ?>
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-body clearfix">
                        <table id = "papi" class = "table" style="width: 100%; margin-top: 0 !important"  cellspacing="0">
                            <tr>
                                <th><center>Jawaban </center></th>
                                <th>pernyataan <?=$i?></th>
                            </tr>
                                <?php
                                foreach ($kuisoner->result() as $data) {
                                    
                                    if($data->NO_ITEM == $i){?>
                                        
                                        <tr>
                                            <td> 
                                                <center>
                                                    <div class="emot" id_item="<?=$data->ID_ITEM?>"  nipeg="<?=$data->NIPEG?>" jawaban="<?=$data->SCORE_ITEM?>" no_item="<?=$data->NO_ITEM?>"> 
                                                    <input type="radio"  name="<?=$data->NO_ITEM?>" class="happy" <?=$data->JAWABAN == $data->SCORE_ITEM ? 'checked' : '' ?>>  
                                                    </div>
                                                </center>
                                            </td>
                                            <td><?=$data->ITEM?></td>
                                        </tr>
                                                

                                    <?php }
                                } ?>
                        </table>
                    </div>
                </div>
            </div> 
        <?php
        if($i%6=='0'){
            echo "</div>";
        }
        if($i=='90'){
            echo "
            <div class='row'>
            <center><p><button type='submit' class='btn btn-primary btn-lg'> <i class='fa fa-fw fa-chevron-right'></i> Selesai</button></p></center></div>";
            }
        }
        ?>
    </div>
    </form>
        <center>
        <ul class="pagination" data-page-size="2">
            <li><a href="" rel="prev">Prev</a></li>
            <li class="active"><a href="">1</a></li>
            <li><a href="" rel="next">Next</a></li>
        </ul>
    </center>
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

<script>
$(document).ready(function () {
        
$('.emot').on('change', function () {
      
   
     var nipeg = $(this).attr("nipeg");
     var jawaban = $(this).attr("jawaban");
     var no_item = $(this).attr("no_item");
     var id_item = $(this).attr("id_item");
     var emot =  $(this);
     $(this).parent().find(".emot").removeClass("active");
     
        $.ajax({
        url: "<?= base_url("psikodiagnostik/proses_input_papikostik") ?>",
        method: "POST",
        data: { nipeg: nipeg, jawaban: jawaban, no_item: no_item, id_item: id_item},
        success: function (data) {
            console.log(data);
emot.addClass("active");
            $.toast({
                text: "Jawaban Kuisoner berhasil disimpan",
                heading: 'Notifikasi',
                position: 'bottom-right',
                bgColor: '#01512c',
                textColor: '#fff',
            })

        },
        error: function (e) {
            $.toast({
                text: "Jawaban Kuisoner  gagal disimpan",
                heading: 'Warning',
                position: 'bottom-right',
                bgColor: 'red',
                textColor: '#fff',
            })
        }
    });
      
});

});
$(function () {
    //
    //  get num of rows and compute num of pages
    //
    var nRows = $('.pag .row').length;
    var nPages = Math.ceil(nRows / $('.pagination').data('page-size'));
    //
    // save num pages as a data attribute of pagination element
    //
    $('.pagination').data('num-pages', nPages);
    //
    // Create the buttons on the fly
    //
    for(var i=1; i<nPages; i++) {
        $('<li/>').append($('<a/>', {href: "#", text: i + 1})).insertBefore('.pagination li:has([rel]):last');
    }
    //
    // handle pagination
    //
    $('.pagination li').on('click', function (e) {
        //
        // prevent default action
        //
        e.preventDefault();

        //
        // The clicked element is the next one......
        //
        var eleClicked = $(this);
        var nextEle = eleClicked;

        //
        // ....if the clicked element is Next or Prev buttons
        //
        var nextPrevAnchorEle = eleClicked.find('a[rel]');
        if (nextPrevAnchorEle.length == 1) {
            //
            // compute the next element
            //
            if (nextPrevAnchorEle.text().trim() == 'Next') {
                nextEle = $('.pagination li.active').next('li:not(:has([rel]))');
                if (nextEle.length == 0) {
                    nextEle = $('.pagination li:not(:has([rel])):first');
                }
            } else {
                nextEle = $('.pagination li.active').prev('li:not(:has([rel]))');
                if (nextEle.length == 0) {
                    nextEle = $('.pagination li:not(:has([rel])):last');
                }
            }
        }
        //
        // toggle active page
        //
        $('.pagination li.active').removeClass('active');
        nextEle.addClass('active');

        //
        // get the number of active page
        //
        var currentPageNumber = +nextEle.find('a').text().trim() - 1;

        //
        // get the page size
        //
        var pageSize = +$('.pagination').data('page-size');
        //
        // toggle visibility
        //
        $('.pag .row:visible').toggle(false);
        $('.pag .row').slice(currentPageNumber * pageSize, (currentPageNumber + 1) * pageSize).toggle(true);
    });
    //
    // show the active page
    //
    $('.pagination li.active a').trigger('click');
});



</script>

