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
             var jawaban = $(this).attr("value");
             var tipe = $(this).attr("tipe");
             var id_kode_item = $(this).attr("id_kode_item");
             var emot =  $(this);
             $(this).parent().find(".emot").removeClass("active");
             
                $.ajax({
                url: "<?= base_url("psikodiagnostik/proses_input_disc") ?>",
                method: "POST",
                data: { nipeg: nipeg, jawaban: jawaban, id_kode_item: id_kode_item, tipe: tipe},
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

        // Very simple JS for updating the text when a radio button is clicked
        // const INPUTS = document.querySelectorAll('#smileys input');
        // const updateValue = e => document.querySelector('#result').innerHTML = e.target.value;

        // INPUTS.forEach(el => el.addEventListener('click', e => updateValue(e)));

    

        
</script>

