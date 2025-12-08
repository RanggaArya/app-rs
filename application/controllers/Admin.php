<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Admin extends CI_Controller {

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
      
      public function index(){
        $data['title_bar'] = "";
        $data['header_page'] = "";
        $query="SELECT blog_id, title, subtitle, author_id, date_created, max_length, image_path, category, tag, bookmark, likes FROM blog order by date_created";
        $query_result = $this->db->query($query)->result();

        $data['blog'] = $query_result;
        $this->load->view('backview/header.php', $data);
        $this->load->view('backview/admin/navbar.php', $data);
        $this->load->view('backview/admin/dashboard/blog.php', $data);
        $this->load->view('backview/footer.php', $data);
      }

        public function statistics() {
            $this->load->model('m_visitor');
        
            // 1. Ambil Filter (Default: Bulan Ini & Tahun Ini)
            // Jika user memilih 'all', maka nilai variabel akan berisi string 'all'
            $filter_month = $this->input->get('month') !== null ? $this->input->get('month') : date('m');
            $filter_year  = $this->input->get('year') !== null ? $this->input->get('year') : date('Y');
        
            $data['title_bar'] = "Statistik Web";
            $data['header_page'] = "Visitor Analytics";
            
            // Kirim status filter ke View
            $data['sel_month'] = $filter_month;
            $data['sel_year']  = $filter_year;
        
            // 2. Label Dinamis untuk Judul Grafik
            if($filter_year == 'all') {
                $data['periode_label'] = "Semua Waktu (Tahunan)";
            } elseif($filter_month == 'all') {
                $data['periode_label'] = "Tahun " . $filter_year;
            } else {
                $data['periode_label'] = date("F", mktime(0, 0, 0, $filter_month, 10)) . " " . $filter_year;
            }
        
            // 3. Ambil Data
            $data['summary']  = $this->m_visitor->get_summary($filter_month, $filter_year);
            $data['timeline'] = $this->m_visitor->get_timeline_stats($filter_month, $filter_year); // Data Utama (Grafik & Tabel)
            
            $data['stats_hour'] = $this->m_visitor->get_hours_history($filter_month, $filter_year);
            $data['stats_day']  = $this->m_visitor->get_days_history($filter_month, $filter_year);
            
            $data['top_pages']  = $this->m_visitor->get_top_pages_extended($filter_month, $filter_year, 25);
        
            // Load View
            $this->load->view('backview/header.php', $data);
            $this->load->view('backview/admin/navbar.php', $data);
            $this->load->view('backview/admin/dashboard/statistik.php', $data);
            $this->load->view('backview/footer.php', $data);
        }

}