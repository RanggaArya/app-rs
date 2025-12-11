<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        // Load helper & library
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
        $this->load->database();
    }

    public function index()
    {
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('backview/login', $data);
    }

    public function login()
    {
        // Ambil input POST dengan XSS filtering
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));

        // Query dengan binding agar aman dari SQL injection
        $query = $this->db->query(
            "SELECT id_user, role 
             FROM users 
             WHERE username = ? AND password = ?",
            [$username, $password]
        );

        $user = $query->row_array();

        if ($user) {

            // Set session
            $this->session->set_userdata([
                'id_user' => $user['id_user'],
                'status'  => 'login',
                'role'    => $user['role']
            ]);

            $this->session->set_flashdata('message', 'Login Berhasil');

            // Redirect berdasarkan role
            if ($user['role'] == 'pelanggan') {
                return redirect('pelanggan');
            }
            if ($user['role'] == 'admin') {
                return redirect('admin/statistics');
            }

            return redirect(base_url());
        }

        // Login gagal
        $this->session->set_flashdata('message', 'Username atau Password salah!');
        redirect('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
