<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_psikodiagnostik extends CI_Model{

    public function __construct(){
        $this->load->database();
        parent::__construct();
    }


    var $viewItemDisc = 'INTTALENT.DISC_V_ITEM';
    var $tabledisc = 'INTTALENT.DISC_JAWABAN';
    var $tablepapi = 'INTTALENT.PAPI_JAWABAN';
    var $tableadversity = 'INTTALENT.ADVERSITY_JAWABAN';
    var $item = 'INTTALENT.DISC_V_NULL_ITEM';
    
 


    function CekIsi(){

        $nipeg = session("nipeg");

        $query = $this->db->query("SELECT ID_JAWABAN FROM INTTALENT.DISC_JAWABAN WHERE NIPEG = '$nipeg'");

        $hasil = 0;
        foreach($query->result() as $data){
            if(!empty($data->ID_JAWABAN)){
                $hasil = true;
            }else{
                $hasil = true;
            }
        }

        return $hasil;


    }
    
    function getItem(){


        $query = $this->db->query("SELECT DISTINCT KODE_KS_ITEM FROM INTTALENT.DISC_V_NULL_ITEM");

        return $query;
    }

    function cekHash($hash){

        $query = $this->db->query("SELECT
        NIM,
        HASH,
        NAMA,
        EMAIL,
        BIDANG,
        GENDER,
        ASAL_KOTA_LEMBAGA_PENDIDIKAN,
        UNIVERSITAS,
        JURUSAN,
        OPEN
    FROM
        INTTALENT. KM_PESERTA
    WHERE
        HASH = '$hash'");

        return $query;
    }

    function getItemPapi($id){

        $query = $this->db->query("SELECT
        A.ID_ITEM,
        A.ITEM,
        A.NO_ITEM,
        A.SCORE_ITEM,
        B.JAWABAN,
        B.NIPEG
    FROM
        INTTALENT.PAPI_ITEM A,
        INTTALENT.PAPI_JAWABAN B 
    WHERE
        B.NIPEG = '$id' 
    AND
        A.NO_ITEM = B.NO_ITEM (+)
				AND  NVL(B.TAHUN,'-') <> '2022 A'");

        return $query;
    }


    function insertPengisi($data){

        $this->db->insert($this->tabledisc, $data);
    }

    function insertPengisiPapi($data){

        $this->db->insert($this->tablepapi, $data);

    }



    function getKuisoner($cond = "", $cond_like = "") {
        

            if ($cond != "") {
                $this->db->where($cond);
            }
    
            $this->db->select("*", false);
    
            $this->db->from($this->viewItemDisc);

        return $this->db->get();
    }




    public function getallitem(){

        $query = $this->db->query("SELECT * FROM INTTALENT.PAQ_ITEMS ORDER BY DBMS_RANDOM.VALUE");

        return $query;

    }

   

    function getStatusPapi($id){

        $query = $this->db->query("SELECT NIPEG, JAWABAN, NO_ITEM FROM INTTALENT.PAPI_JAWABAN WHERE NIPEG = '$id' AND NVL(TAHUN,'-') <> '2022 A'");

        if($query->num_rows() == null){
            $result = null;
        }
        if($query->num_rows() != null){
            $result = 0;
            foreach ($query->result() as $data) {
                
                if($data->NIPEG != NULL){
                    $result++;
                }
            }

        }
        return $result;

    }

    function getPersenPapi($nim){

        $query = $this->db->query("SELECT NIPEG, JAWABAN, NO_ITEM FROM INTTALENT.PAPI_JAWABAN WHERE NIPEG = '$nim' AND NVL(TAHUN,'-') <> '2022 A' ");

        if($query->num_rows() == null){
            $result = null;
        }
        if($query->num_rows() != null){
            $result = 0;
            foreach ($query->result() as $data) {
                
                if($data->JAWABAN != NULL){
                    $result++;
                }
            }

        }
        return $result;

    }
    
  



    public function cekValid(){

        $nipeg = session("nipeg");

        $query = $this->db->query("SELECT
            A.NIPEG,
            A.DISC 
        FROM
            INTTALENT.DISC_RESULT A,
            INTTALENT.MASTER_PEGAWAI B 
        WHERE
            A.NIPEG = '$nipeg'");

        if($query->row() != null ){
            
            $result = 1;

        }else{
            $result = 0;
        }


        return $result2;

    }

      
 

   function updatePenilaianPapi($data,$cond="") {
  
            if ($cond != "") {
                $this->db->where($cond);
            }
            $this->db->update($this->tablepapi, $data);  
   }


   function cekJawaban($cond=""){

         if ($cond != "") {
           $this->db->where($cond);
       }
       
        $this->db->select("ID_ITEM", false);
        
        $this->db->from($this->tabledisc);
        $query = $this->db->get();
        if($query->num_rows() != null){

            return true;
        }else{

            return false;
        }


   }

   function validasi_disc($nipeg){

        $query = $this->db->query("SELECT DISC FROM INTTALENT.DISC_RESULT_MAHASISWA WHERE NIPEG = '$nipeg'");
        
        return $query->row();
        
   }

   function validasi_papi($id){


        $query = $this->db->query("SELECT
        NO_ITEM
        FROM
        INTTALENT.PAPI_JAWABAN 
        WHERE
        JAWABAN IS NULL 
        AND NIPEG = '$id'");

        return $query;


   }



   function getOneDkp($nipeg){
       
    $query = $this->db->query("SELECT NIPEG, NAMA, POSITION_DESC, PAYROLL_DESC, GRADE, JENJANG_JABATAN FROM absence.dt_peg WHERE NIPEG = '$nipeg'");

    return $query;
   }

   
    public function cekmenumodul($person_id){

        $query = $this->db->query("SELECT DISTINCT MENU_KD FROM INTTALENT.MENU_V WHERE PERSON_ID = '$person_id'");

        return $query;

    }

    public function getResult(){

        $query = $this->db->query("SELECT
        A.NIM,
        A.NAMA,
        A.HASH,
        A.EMAIL,
        A.UNIVERSITAS,
        A.JURUSAN,
        A.ASAL_KOTA_LEMBAGA_PENDIDIKAN,
        B.JML_DISC DISC,
        C.JML_PAPI PAPI,
        D.JML_POTENSI POTENSI,
        A.BIDANG,
				A.TAHUN
    FROM
        INTTALENT.KM_PESERTA A,
      	(SELECT NIPEG, ( JML_Y + JML_N ) JML_DISC FROM ( SELECT NIPEG, COUNT( JAWABAN_Y ) JML_Y, COUNT( JAWABAN_N ) JML_N FROM INTTALENT.DISC_JAWABAN GROUP BY NIPEG )) B,
        (SELECT NIPEG, COUNT( JAWABAN ) JML_PAPI FROM INTTALENT.PAPI_JAWABAN GROUP BY NIPEG) C,
        (SELECT PENILAI, COUNT(PENILAI) JML_POTENSI FROM INTTALENT.PAQ_ANSWERS GROUP BY PENILAI) D
    WHERE
        A.NIM = B.NIPEG ( + ) 
        AND A.NIM = C.NIPEG ( + ) 
        AND A.NIM = D.PENILAI ( + )
        AND A.BIDANG != 'ADMIN'
				AND A.TAHUN = 'Capeg_2023A'
    ORDER BY
        B.JML_DISC DESC nulls last,
				C.JML_PAPI DESC nulls last,
				D.JML_POTENSI DESC nulls last
    ");


    return $query;

    }

    public function getPapi($id){

        $query = $this->db->query("SELECT * FROM INTTALENT.PAPI_RESULT_DETAIL WHERE NIPEG = '$id'");

        return $query;
    }



    
    function hasilFilter($condIn = "") {



        if ($condIn != "") {
            $this->db->where($condIn);            
        }


        $this->db->select("*", false);

        $this->db->from('INTTALENT.ASESMEN_RESULT');


        return $this->db->get();
    }

    function hasil_seluruh(){
        $query = $this->db->query("SELECT * FROM INTTALENT.PS_RESULT_MAHASISWA");

        return $query;

    }


    function getVariable(){

        $query = $this->db->query("SELECT * FROM INTTALENT.PAPI_VARIABLE");

        return $query;

    }

}?>