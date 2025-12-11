<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Galeri extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
		$login_status = $this->session->userdata('status');
        if(!$login_status == 'login'){
              redirect(base_url('login'));
        }
	}
	
	public function index()
	{
		$data['title_bar'] = "";
		$data['header_page'] = "";
		
		$query2="SELECT * FROM galeri order by id DESC";
		$query_result2 = $this->db->query($query2)->result();
		$data['galeri'] = $query_result2;

		$query3="SELECT * FROM galeri_video order by id DESC";
		$query_result3 = $this->db->query($query3)->result();
		$data['galeri_video'] = $query_result3;

		$this->load->view('backview/header.php', $data);
		$this->load->view('backview/admin/navbar.php', $data);
		$this->load->view('backview/admin/dashboard/galeri.php', $data);
		$this->load->view('backview/footer.php', $data);
	}
	

	public function youtube(){
		$caption = $this->input->post('caption', TRUE);
		$link = $this->input->post('link', TRUE);
		$data = array(
			'link' => $link,
			'caption' => $caption,
		);

		$this->db->insert('galeri_video', $data);
		$affect_row = $this->db->affected_rows();
		if($affect_row > 0){
			$this->session->set_flashdata('message', 'Berhasil menambahkan konten');
			redirect(base_url('admin/galeri'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menambahkan konten');
		}
	}

	public function delete_youtube($id){
		$this->db->where('id', $id);
		$this->db->delete('galeri_video');
		redirect(base_url('admin/galeri'));
	}
	
// 	public function update_galeri()
//     {
//         $id = $this->input->post('id');
//         $caption = $this->input->post('caption');

//         // Jika ingin mengupdate caption saja
//         $data = array(
//             'caption' => $caption
//         );

//         // Disini kita asumsikan edit hanya mengganti caption. 
//         // Jika ingin mengganti file gambar, logikanya akan lebih panjang (hapus lama -> upload baru).
        
//         $this->db->where('id', $id);
//         $this->db->update('galeri', $data);

//         $affect_row = $this->db->affected_rows();
//         // Cek update berhasil (bisa jadi 0 jika tidak ada perubahan data, jadi kita anggap sukses saja jika tidak error)
//         $this->session->set_flashdata('message', 'Berhasil mengupdate data galeri');
//         redirect(base_url('admin/galeri'));
//     }

    public function update_galeri()
    {
        $id = $this->input->post('id');
        $caption = $this->input->post('caption');
        
        // Ambil data lama dari database untuk mendapatkan nama file gambar yang lama
        $old_data = $this->db->get_where('galeri', ['id' => $id])->row();
    
        // Cek apakah user mengupload file baru
        if (!empty($_FILES['berkas']['name'])) {
            
            // Konfigurasi Upload
            $config['upload_path']   = './assets/galeri/'; // Pastikan path ini sesuai dengan tempat penyimpanan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|webp'; // Tambahkan format lain jika perlu
            $config['encrypt_name']  = TRUE; // Rename file secara acak agar unik
    
            $this->load->library('upload', $config);
    
            if ( ! $this->upload->do_upload('berkas')){
                // Jika upload gagal, kembalikan dengan pesan error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal upload: ' . $error);
                redirect(base_url('admin/galeri'));
            } else {
                // Jika upload berhasil
                $upload_data = $this->upload->data();
                $new_image_name = $upload_data['file_name'];
    
                // Hapus file gambar lama dari folder (jika ada) untuk menghemat penyimpanan
                if ($old_data && $old_data->image_name != '' && file_exists('./assets/galeri/' . $old_data->image_name)) {
                    unlink('./assets/galeri/' . $old_data->image_name);
                }
    
                // Siapkan data update (Caption + Nama File Baru)
                $data = array(
                    'caption' => $caption,
                    'image_name' => $new_image_name
                );
            }
        } else {
            // Jika tidak ada file yang diupload, update caption saja
            $data = array(
                'caption' => $caption
            );
        }
    
        // Eksekusi Update ke Database
        $this->db->where('id', $id);
        $this->db->update('galeri', $data);
    
        $this->session->set_flashdata('message', 'Berhasil mengupdate data galeri');
        redirect(base_url('admin/galeri'));
    }

    public function update_youtube()
    {
        $id = $this->input->post('id');
        $link = $this->input->post('link');
        $caption = $this->input->post('caption');

        $data = array(
            'link' => $link,
            'caption' => $caption
        );

        $this->db->where('id', $id);
        $this->db->update('galeri_video', $data);

        $this->session->set_flashdata('message', 'Berhasil mengupdate video youtube');
        redirect(base_url('admin/galeri'));
    }
	
}