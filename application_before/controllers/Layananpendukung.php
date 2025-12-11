<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Layananpendukung extends CI_Controller {

      function __construct(){
        parent::__construct();		
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
      }

      public function index(){
        $data['title_bar'] = "";
        $data['header_page'] = "";
        
        $query2="SELECT * FROM layanan_pendukung order by id DESC";
        $query_result2 = $this->db->query($query2)->result();
        $data['daftar_layanan_pendukung'] = $query_result2;

        $this->load->view('backview/header.php', $data);
        $this->load->view('backview/admin/navbar.php', $data);
        $this->load->view('backview/admin/dashboard/layananpendukung.php', $data);
        $this->load->view('backview/footer.php', $data);
      }

      public function edit($id){
        $data['title_bar'] = "";
        $data['header_page'] = "";
        
        $query2="SELECT * FROM layanan_pendukung WHERE id = $id order by id DESC";
        $query_result2 = $this->db->query($query2)->result();
        $data['daftar_layanan_pendukung'] = $query_result2;

        $this->load->view('backview/header.php', $data);
        $this->load->view('backview/admin/navbar.php', $data);
        $this->load->view('backview/admin/dashboard/layananpendukung_edit.php', $data);
        $this->load->view('backview/footer.php', $data);
      }
      
      
      public function submit_layananpendukung(){
        $login_status = $this->session->userdata('status');
        if($login_status == 'login'){
    
            $title = $this->input->post('nama', TRUE);
            $content = $this->input->post('deskripsi', TRUE);
    
            // Buat slug
            $string = preg_replace('/[^a-zA-Z0-9 ]/', '', $title);
            $trim = trim($string);
            $slug = strtolower(str_replace(" ", "-", $trim));
    
            // Upload thumbnail
            $image_path = "";
            if(!empty($_FILES['upload_thumb']['name'])) {
    
                $config['upload_path']   = './assets/layananpendukung/thumb/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif|svg|tif';
                $config['max_size']      = 10000;
                $config['encrypt_name']  = FALSE;
                $config['overwrite']     = FALSE;
    
                $this->load->library('upload', $config);
    
                if($this->upload->do_upload('upload_thumb')){
                    $image_path = $this->upload->data('file_name');
                }else{
                    echo "Gagal upload thumbnail";
                    return;
                }
            }
    
            // Simpan ke database
            $data = array(
                'nama'      => $title,
                'thumb'     => $image_path,
                'slug'      => $slug,
                'deskripsi' => $content
            );
    
            $this->db->insert('layanan_pendukung', $data);
    
            redirect(base_url("admin/pendukung"));
        }
    }

      public function edit_layananpendukung(){
        $login_status = $this->session->userdata('status');
        if($login_status == 'login'){
    
            $id      = $this->input->post('id', TRUE);
            $title   = $this->input->post('nama', TRUE);
            $content = $this->input->post('deskripsi', TRUE);
    
            $string = preg_replace('/[^a-zA-Z0-9 ]/', '', $title);
            $trim   = trim($string);
            $slug   = strtolower(str_replace(" ", "-", $trim));
    
            $data = array(
                'nama'      => $title,
                'slug'      => $slug,
                'deskripsi' => $content
            );
    
            if(!empty($_FILES['upload_thumb']['name'])){
    
                $config['upload_path']   = './assets/layananpendukung/thumb/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif|svg';
                $config['max_size']      = 5000;
                $config['encrypt_name']  = FALSE;
    
                $this->load->library('upload', $config);
    
                if($this->upload->do_upload('upload_thumb')){
                    $data['thumb'] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                    return;
                }
            }
    
            $this->db->where('id', $id);
            $this->db->update('layanan_pendukung', $data);
    
            redirect(base_url("admin/pendukung"));
        }
    }

      public function daftar_layananpendukung(){
          $query="SELECT * FROM layanan_pendukung order by id DESC";
          $query_result = $this->db->query($query);
          $result = json_encode($query_result->result()); 
          echo $result;
      }


      public function layanan_detail($slug){
        $query = "SELECT * FROM layanan_pendukung where slug='$slug'";
        $query_result = $this->db->query($query);
        $query_resulat_array = $this->db->query($query)->result();
        if($query_result->num_rows() > 0 ){
          $x['layanandetail']= $query_result;
          $x['title_bar'] = $query_resulat_array[0]->nama;
          $x['header_page'] = "";
          $x['keyword'] = $query_resulat_array[0]->nama;
          $x['description'] = $query_resulat_array[0]->nama;
          $this->load->view('frontview/header', $x);
          $this->load->view('frontview/navbar', $x);
          $this->load->view('frontview/page/layanan/pendukungdetail', $x);
          $this->load->view('frontview/footer', $x);
        }else{
          redirect(base_url());
        }
      } 

      public function delete($id){
        $login_status = $this->session->userdata('status');
        if($login_status == 'login'){
          $this->db->where('id', $id);
          $this->db->delete('layanan_pendukung');
          redirect(base_url('admin/pendukung'));
        }
      }
  

}