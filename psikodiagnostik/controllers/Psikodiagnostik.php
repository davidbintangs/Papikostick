<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;

class psikodiagnostik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_psikodiagnostik");
        $this->load->model("analisa_potensi/m_analisa_potensi");
        $this->load->helper(array('form', 'url'));
    }

    var $module_id = 'psikodiagnostik';
    var $result = 'monitoring_psikodiagnostik';

    private function role() {
        $role = session("role");

        $module = session("module");

        if (is_array($module) && !in_array($this->module_id, $module)) {
            redirect("login");
        } else if (!is_array($module)) {
            redirect("login");
        }
    }

    private function result_page() {
        $role = session("role");

        $module = session("module");

        if (is_array($module) && !in_array($this->result, $module)) {
            redirect("login");
        } else if (!is_array($module)) {
            redirect("login");
        }
    }
 
    private function position($pos2) {
        $data["param"] = http_build_query($_GET);
        $data["position"] = "psikodiagnostik";
        $data["position2"] = "$pos2";

        return $data;
    }

    private function role_login() {
        if (session("user_id") == "") { //change to user_id that not declared on ipku session
            redirect("login");
        }
    }

    function setHash($hash){

        $data = $this->m_psikodiagnostik->getDkp($hash);

        return $data;

    }

    function cekHash($hash){

        $hash = $this->m_psikodiagnostik->cekHash($hash);
        

        return $hash;
    }
    
    public function cekTipe($tipe){

        if ($tipe == 'disc' || $tipe == 'papikostick' || $tipe == 'adversity') {
            
        }else{
            redirect("psikodiagnostik");
        }

    }

    public function setSessionMahasiswa($d_hash, $hash){

        
        // if(session('hash_mahasiswa') != $d_hash){
                  
            $h_data = $d_hash->row();
            
            if($h_data->OPEN == 0){
                redirect("psikodiagnostik/notopen");
            }

            $data = array(
                "nim" => $h_data->NIM,
                "nama_mahasiswa" => $h_data->NAMA,
                "email_mahasiswa" => $h_data->EMAIL,
                'bidang' => $h_data->BIDANG,
                'universitas' => $h_data->UNIVERSITAS,
                'jurusan' => $h_data->JURUSAN,
                'hash_mahasiswa' => $h_data->HASH
            );
            $this->session->set_userdata($data);
            
        //    }
    }

    function timeout(){

        $tittle = "Waktu Pengisian telah selesai/ Belum Dimulai";
        $data["content"] = "v_timeout";
        $this->load->view('ipku', $data);
    }

    function notopen(){

        $tittle = "Waktu Pengisian Belum Dimulai";
        $data["content"] = "v_notopen";
        $this->load->view('ipku', $data);
    }

    public function index() {

        $hash  = $this->input->get("star");
     
        
        
        if($hash != null){

            $d_hash = $this->cekHash($hash);

            
            if($d_hash->num_rows() != null){
                $this->setSessionMahasiswa($d_hash, $hash);
                $h_hash = $d_hash->row();
                $nim = $h_hash->NIM;
            
                // $data["menumodul"] = $this->m_psikodiagnostik->cekmenumodul($person_id);
                $data["status_disc"] = $this->m_psikodiagnostik->getPersenDISC($nim);
                $data["status_papi"] = $this->m_psikodiagnostik->getPersenPapi($nim);
                $data["status_potensi"] = $this->m_psikodiagnostik->getStatusPotensi($nim);

                $data["cek_ipku"] = true;
                $data['hash'] = $hash;
                $data["title"] = "Kuisoner Psikodiagnostik";
                $data["content"] = "v_psikodiagnostik";
                $this->load->view('ipku', $data);
            
           }else{
                 redirect("login");
            }           
        }else{
            redirect("login");
        }


    }

    public function persiapan(){
        
        $tipe = $this->uri->segment("3");
        $hash = $this->uri->segment("4");
        $template = 'template';

       
        if($hash != null){

            $d_hash = $this->cekHash($hash);
            if($d_hash->num_rows() != null){

                $this->setSessionMahasiswa($d_hash, $hash);
                $template = 'ipku';
                $id = session("nim");
                $data['nama'] = session('nama_mahasiswa');
            }else{
                redirect("login");
            }           
        }else{
            redirect("psikodiagnostik");
        }


        $persen_disc= $this->m_psikodiagnostik->getPersenDISC($id);
        $persen_papi = $this->m_psikodiagnostik->getPersenPapi($id);
        $persen_potensi = $this->m_psikodiagnostik->getStatusPotensi($id);

        //$persen_disc = 0;
        //$persen_papi = 0;
        // $persen_adv = 0;
        //$persen_potensi =0;


        if($tipe == 'disc'){

            if($persen_disc == 48){
                $tittle = "Terimakasih telah mengisi kuisoner asesmen";
                $data['hash'] = $hash;
                $data["content"] = "v_selesai";
            }else{
                $tittle = 'Persiapan Kuisoner 1';
                $data["plugin"][] = "persiapan_plugin_disc";
                $data["content"] = "v_k_persiapandisc";
            }

        }elseif($tipe == 'papikostick'){

            if($persen_papi == 90){
                $tittle = "Terimakasih telah mengisi kuisoner asesmen";
                $data['hash'] = $hash;
                $data["content"] = "v_selesai";
            }else{
                $tittle = 'Persiapan Kuisoner 2';
                $data["content"] = "v_k_persiapanpapi";
            }   
        }elseif($tipe == 'adversity'){

            if($persen_adv == 40){
                $tittle = "Terimakasih telah mengisi kuisoner asesmen";
                $data['hash'] = $hash;
                $data["content"] = "v_selesai";
            }else{
                $tittle = 'Persiapan Kuisoner 3';
                $data["content"] = "v_k_persiapanadv";
            }
        }elseif($tipe == 'potensi'){
            if($persen_potensi >= 27){
                $tittle = "Terimakasih telah mengisi kuisoner asesmen";
                $data['hash'] = $hash;
                $data["content"] = "v_selesai";
            }else{
                $tittle = 'Persiapan Kuisoner 3';
                $data["content"] = "v_k_persiapanpotensi";
            }
        }else{
            
            $this->session->set_flashdata('pesan', warning("Kuisoner Asesmen yang dipilih tidak ada.", "warning"));
            redirect("psikodiagnostik/index?star=$hash");
        }
       
        $data["tipe"] = $tipe;
        $data["hash"] = $hash;
        $data["plugin"][] = "plugin/datatable";
        $data["title"] = "$tittle";

        $this->load->view($template, $data);
    }



    public function papikostick(){

        $hash = $this->uri->segment("3");
        $template = 'ipku';
       

        if($hash != null){

            $d_hash = $this->cekHash($hash);
        
            if($d_hash->num_rows() != null){
                
                $h_data = $d_hash->row();
                $id = $h_data->NIM;
                $template = 'ipku';

            }else{
                redirect("login");
            }           
        }else{
            redirect("login");
        }

        $data["kuisoner"] = $this->m_psikodiagnostik->getItemPapi($id);
       
        
        $data["hash"] = $hash;
        $data["plugin"][] = "plugin/datatable";
        $data["plugin"][] = "plugin/toast";
        $data["plugin"][] = "skin_plugin";
        $data["title"] = "Kuisoner Papikostick";
        $data["content"] = "v_papikostick";
        $this->load->view($template, $data);
        
      }





    public function proses(){

        $tipe = $this->uri->segment(3);
        $hash = $this->uri->segment(4);


        if($hash != null){

            $d_hash = $this->cekHash($hash);
            $this->setSessionMahasiswa($d_hash, $hash);
        
            if($d_hash->num_rows() != null){
                
                $h_data = $d_hash->row();
                $id = $h_data->NIM;

            }else{
                redirect("login");
            }           
        }else{
            redirect("login");
        }

        

        if($tipe=='disc'){
            $status_disc = $this->m_psikodiagnostik->getStatusDISC($id)->num_rows();

            if($status_disc == null ){

                $dataitem = $this->m_psikodiagnostik->getItem();

                foreach ($dataitem->result() as $data) {
                $data = array(
                    
                        "NIPEG"=> $id,
                        "ID_KS_ITEM" => $data->KODE_KS_ITEM
                    );
                    
                    $this->m_psikodiagnostik->insertPengisi($data);
            
                }

            }

            redirect("psikodiagnostik/disc/$hash"); 
            
        }elseif($tipe == 'papikostick'){

            $status_papi = $this->m_psikodiagnostik->getStatusPapi($id);
            if($status_papi == null){

                for ($i=1; $i <91 ; $i++) {
                    $data = array(
                        "NIPEG" => $id,
                        "NO_ITEM" => $i,
                        "EKSTERNAL" => '1',
                        "JENIS" => 'MAHASISWA'
                    );
                    
                    $this->m_psikodiagnostik->insertPengisiPapi($data);
                }
            }

            redirect("psikodiagnostik/papikostick/$hash");

        }elseif ($tipe=='adversity') {

            $status_adv = $this->m_psikodiagnostik->getStatusAdv($nipeg);

            if ($status_adv == null) {
                
                for ($i=1; $i < 41 ; $i++) { 
                    $data = array(
                        "NIPEG" => $nipeg,
                        "ID_ITEM" => $i

                    );
                    $this->m_psikodiagnostik->insertPengisiAdv($data);
                }


            }
            
            redirect("psikodiagnostik/adversity/$hash");
        }
        else{
            redirect("psikodiagnostik"); 
        }

    }

    public function proses_input_disc($id = '') {
        
        $tipe = $this->input->post("tipe");
        
        if($tipe == 'Y'){
            $data = array(
                "JAWABAN_Y"=> $this->input->post("jawaban"),
                "EKSTERNAL" => '1',
                "JENIS" => 'MAHASISWA'
            
            );
        }else{
            $data = array(
                "JAWABAN_N"=> $this->input->post("jawaban"),
                "EKSTERNAL" => '1',
                "JENIS" => 'MAHASISWA'
            
            );
        }
        $cond = array(
            
            "NIPEG" => $this->input->post("nipeg"),
            "ID_KS_ITEM" => $this->input->post("id_kode_item"),
           
        );
        
        $this->m_psikodiagnostik->updatePenilaianDISC($data,$cond);
        last_query();
        
      }
      
    public function proses_input_papikostik($id = '') {
        
 
        $data = array(
            "JAWABAN"=> $this->input->post("jawaban"),
            "ID_ITEM"=> $this->input->post("id_item")
        );

         $cond = array(
            "NIPEG" => $this->input->post("nipeg"),
            "NO_ITEM" => $this->input->post("no_item")
        );
        
        $this->m_psikodiagnostik->updatePenilaianPapi($data,$cond);
        last_query();
        
      }

      function proses_input_adversity($id=''){

        
        $data = array(
            "JAWABAN"=> $this->input->post("jawaban")
        );

         $cond = array(
            "NIPEG" => $this->input->post("nipeg"),
            "ID_ITEM" => $this->input->post("id_item")
        );
        
        $this->m_psikodiagnostik->updatePenilaianAdv($data,$cond);
        last_query();


      }

   
    function validasi_papi(){

        $hash = $this->input->post("hash");
        $nipeg = session('nim');

        if($hash != null){

            $d_hash = $this->cekHash($hash);
        
            if($d_hash->num_rows() != null){
                
                $h_data = $d_hash->row();
                $nipeg = $h_data->NIM;

            }else{
                redirect("login");
            }           
        }else{
            redirect("login");
        }


    
        $jawaban = $this->m_psikodiagnostik->validasi_papi($nipeg);
        
        //code for validate data
        if($jawaban->num_rows() == null){
            $this->session->set_flashdata('pesan', warning(" Data Berhasil Disimpan", "success"));
            redirect("psikodiagnostik/index?star=$hash");    
        }else{
            //$print = $jawaban->result_array();
            $result = array();
            foreach ($jawaban->result_array() as $data) {
                $result[] = implode(', ', $data);
            }
            $alert = implode(', ',$result);
            $this->session->set_flashdata('pesan', warning(" Pernyataan Nomor ".$alert." Belum Anda Jawab", "danger"));
            redirect("psikodiagnostik/papikostick/$hash");
            
        }
    }
        
  

    function detail_hasil(){

        $hash = $this->uri->segment(3);


        if($hash != null){

            $d_hash = $this->cekHash($hash);

        
            if($d_hash->num_rows() != null){
                
                $h_data = $d_hash->row();
                $id = $h_data->NIM;

            }else{
                redirect("login");
            }           
        }else{
            redirect("login");
        }

        $periode = 1;

        $data["indikator"] = "['Self Awareness', 'Mental Agility', 'People Agility', 'Change Agility', 'Results Agility']";
        $data['detail'] = $this->m_analisa_potensi->detailnilai($id);

       
        if ($data['detail']->num_rows() > 0) {
            foreach ($data['detail']->result() as $key) {

                if (count((array) $key->ID_FACTOR) > 0) {

                    if ($key->ID_FACTOR == 1) {
                        $self = $key->RATA;
                    } elseif ($key->ID_FACTOR == 2) {
                        $mental = $key->RATA;
                    } elseif ($key->ID_FACTOR == 3) {
                        $change = $key->RATA;
                    } elseif ($key->ID_FACTOR == 4) {
                        $results = $key->RATA;
                    } elseif ($key->ID_FACTOR == 5) {
                        $people = $key->RATA;
                    }
                } else {
                    $self = 0;
                    $mental = 0;
                    $change = 0;
                    $results = 0;
                    $people = 0;
                }
            }
        } else {
            $self = 0;
            $mental = 0;
            $change = 0;
            $results = 0;
            $people = 0;
        }


        $data["datarealisasi"] = '[' . $self . ',' . $mental . ',' . $people . ',' . $change . ',' . $results . ']';



        $papi = $data["papi"] = $this->m_psikodiagnostik->getPapi($id)->row();
        $disc = $data["disc"] = $this->m_psikodiagnostik->getDisc($id)->row();
        
        $data['hasil'] = $d_hash->row();

        $data["title"] = "Detail Hasil Asesmen";
        $data["content"] = "v_detail_eksternal";
        $data["plugin"][] = "assessment_plugin";
        $this->load->view('ipku', $data);


    }

    function monitoring_pengisian(){
        
        $this->result_page();
        $data = $this->position("psikodiagnostik");
        
        $data["resultdata"] = $this->m_psikodiagnostik->getResult();

        //$data["plugin"][] = "plugin/datatable";
        $data["title"] = "Monitoring Pengisian";
        $data["content"] = "v_monitoring_pengisian";
        $this->load->view('template', $data);
    }

    
    function list_hasil(){

        $this->result_page();
        $data = $this->position("psikodiagnostik");
        
        $data["resultdata"] = $this->m_psikodiagnostik->hasil_seluruh();

        //$data["plugin"][] = "plugin/datatable";
        $data["title"] = "Monitoring Hasil Pengisian";
        $data["content"] = "v_monitoring_hasil";
        $this->load->view('template', $data);


    }


    function detail(){

        $this->result_page();
        $nipeg =  $this->uri->segment(3);
        
        $data["pegawai"] = $this->m_psikodiagnostik->getOneDkp($nipeg)->row();
        $papi = $data["papi"] = $this->m_psikodiagnostik->getPapi($nipeg)->row();
        $disc = $data["disc"] = $this->m_psikodiagnostik->getDisc($nipeg)->row();     
        $data["adv"] = $this->m_psikodiagnostik->getAdversity($nipeg)->row();
      

        $data["title"] = "Detail Asesmen";
        $data["content"] = "v_kesimpulan_perpegawai";
        $data["plugin"][] = "assessment_plugin";
        $this->load->view('template', $data);

    }
    
    function kesimpulan(){

        $this->result_page();
        $nipeg = session("nipeg");


        $data["pegawai"] = $this->m_psikodiagnostik->getOneDkp($nipeg)->row();
        $papi = $data["papi"] = $this->m_psikodiagnostik->getPapi($nipeg)->row();
        $disc = $data["disc"] = $this->m_psikodiagnostik->getDisc($nipeg)->row();     
        $data["adv"] = $this->m_psikodiagnostik->getAdversity($nipeg)->row();
        

        $data["title"] = "Kesimpulan Asesmen";
        $data["content"] = "v_kesimpulan_perpegawai";
        $data["plugin"][] = "assessment_plugin";
        $this->load->view('template', $data);


    }

    function feedback(){

        
    }

    function simpan_feedback(){

        
    }

    function filter($id =''){

        $this->result_page();
        
        $data["filterDisc"] = $this->m_psikodiagnostik->getFilterDisc();
        
        if($this->input->get("disc") != null){
            $data["discFilter"] = $discFilter = $this->input->get("disc");
            $pilihanDisc = implode(", ", $discFilter);
        }else{
            $data["discFilter"] = $discFilter = array();
        }

        if($this->input->get("adv") != null){
            $data["advFilter"] = $advFilter = $this->input->get("adv");
            $pilihanAdv = implode("', '", $advFilter);
        }else{
            $data["advFilter"] = $advFilter = array();
        }
    
        $data["variable"] = $v_papi = $this->m_psikodiagnostik->getVariable();
        
        if($this->input->get("min_N") != null){
            foreach ($v_papi->result() as $key){
                $condIn[] = "".$key->KODE_PAPI." >= ".$this->input->get("min_".$key->KODE_PAPI)." AND ".$key->KODE_PAPI." <= ".$this->input->get("max_".$key->KODE_PAPI)."";
            }           
        }else{
            $data["papiFilter"] = $papiFilter = array();
        }

        if($this->input->get("jk") != null){
            $data["jk"] = $jk = $this->input->get("jk");
            $pilihanjK = implode("', '", $jk);
        }else{
            $data["jk"] = $jk = array();
        }

        if($this->input->get("jj") != null){
            $data["jj"] = $jj = $this->input->get("jj");
            $pilihanJj = implode("', '", $jj);
        }else{
            $data["jj"] = $jj = array();
        }

        if($this->input->get("unit") != null){
            $data["unit"] = $unit = $this->input->get("unit");
            $pilihanUnit = implode("', '", $unit);
        }else{
            $data["unit"] = $unit = array();
        }
       
        
        if (count($discFilter) != 0 ) {
            $condIn[] = "DISC IN (" . $pilihanDisc.')';
        }

        if (count($advFilter) != 0 ) {
            $condIn[] = "STATUS_ADVERSITY IN ('" . $pilihanAdv."')";
        }

        if (count($jk) != 0 ) {
            $condIn[] = "SEX IN ('" . $pilihanjK."')";
        }

        if (count($jj) != 0 ) {
            $condIn[] = "JENJANG_JABATAN IN ('" . $pilihanJj."')";
        }

        if (count($unit) != 0 ) {
            $condIn[] = "UNIT_CODE IN ('" . $pilihanUnit."')";
        }


        if (isset($condIn)) {
            $condsIn = implode(" AND ", $condIn);
        } else {
            $condsIn = null;
        }

        $data["list_hasil"] = $this->m_psikodiagnostik->hasilFilter($condsIn);
        //last_query();


        //$data["plugin"][] = "plugin/datatable";
        
        $data["plugin"][] = "plugin/select2";
        $data["plugin"][] = "filter_plugin";
        $data["title"] = "Filter Asesmen";
        $data["content"] = "v_filter";
        $this->load->view('template', $data);
        
    }
    public function ajax_disc() {
        
        $json = [];

        $keyword = $this->input->get("q");
        $x = $this->input->get("l");



        if (!empty($keyword) || !empty($x)) {
            $this->db->like('lower(KODE_DISC)', strtolower($keyword));


            $query = $this->db->select('ID_DISC ID, KODE_DISC||' . " ' ('||NAMA_DISC||')' " . ' as TEXT')
                   ->get("INTTALENT.DISC_DESKRIPSI")
                   ;
                   ;
            
            $json = $query->result();

            foreach ($json as $key) {
                $data[] = array('id' => $key->ID, 'text' => "$key->TEXT");
            }
        }
     
    }

}
?>
