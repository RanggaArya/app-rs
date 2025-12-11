<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rec_visitor {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library(['user_agent', 'session']);
        $this->CI->load->database();
    }

    public function record_visit() {
        $current_uri = $this->CI->uri->uri_string();
        
        // 1. FILTER: Abaikan Admin, Login, Assets, AJAX
        if (strpos($current_uri, 'admin') !== false || 
            strpos($current_uri, 'login') !== false || 
            strpos($current_uri, 'assets') !== false ||
            $this->CI->input->is_ajax_request()) {
            return; 
        }

        // 2. FILTER: Abaikan File Statis (Extension check)
        $ignored_extensions = ['.ico', '.png', '.jpg', '.jpeg', '.gif', '.css', '.js', '.map', '.json', '.xml', '.txt', '.svg', '.woff', '.woff2'];
        foreach ($ignored_extensions as $ext) {
            if (substr($current_uri, -strlen($ext)) === $ext) return;
        }
        
        // 3. FILTER: Robot/Bot
        if ($this->CI->agent->is_robot()) return;

        // 4. LOGIC VISIT ID (SESSION BASED)
        // Jika user belum punya session visit_id, buatkan baru.
        // Ini mendefinisikan "1 Sesi Kunjungan" (Visit)
        if (!$this->CI->session->userdata('visit_id')) {
            $visit_id = md5(uniqid(rand(), true)); // Generate Random ID
            $this->CI->session->set_userdata('visit_id', $visit_id);
        } else {
            $visit_id = $this->CI->session->userdata('visit_id');
        }

        // 5. SIMPAN DATA (Setiap Halaman/View dicatat)
        $ip = $this->CI->input->ip_address();
        $agent = $this->CI->agent->browser() . ' ' . $this->CI->agent->version();
        $platform = $this->CI->agent->platform();
        $url = current_url();
        $slug = $this->CI->uri->segment(2) ? $this->CI->uri->segment(2) : 'home'; 

        $data = [
            'ip_address' => $ip,
            'visit_id'   => $visit_id, // Kolom Baru
            'user_agent' => $agent,
            'platform'   => $platform,
            'browser'    => $this->CI->agent->browser(),
            'page_url'   => $url,
            'page_slug'  => $slug,
            'access_date'=> date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->CI->db->insert('tb_visitors', $data);
    }
}