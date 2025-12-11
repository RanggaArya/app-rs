<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitor extends CI_Model {

    // --- LOGIC FILTER ---
    private function _apply_filter($month, $year) {
        if ($year != 'all') {
            $this->db->where('YEAR(access_date)', $year);
        }
        if ($month != 'all') {
            $this->db->where('MONTH(access_date)', $month);
        }
    }

    // 1. SUMMARY TOTAL
    public function get_summary($month, $year) {
        $this->_apply_filter($month, $year);
        $this->db->select('
            COUNT(DISTINCT ip_address) as unique_visitors,
            COUNT(DISTINCT visit_id) as number_of_visits,
            COUNT(id) as pages
        ');
        return $this->db->get('tb_visitors')->row();
    }

    // 2. TIMELINE UTAMA (Grafik Besar)
    public function get_timeline_stats($month, $year) {
        $this->_apply_filter($month, $year);

        if ($year == 'all') {
            $this->db->select('YEAR(access_date) as label, 
                COUNT(DISTINCT ip_address) as visitors, 
                COUNT(DISTINCT visit_id) as visits, 
                COUNT(id) as pages');
            $this->db->group_by('YEAR(access_date)');
            $this->db->order_by('access_date', 'ASC');
        } elseif ($month == 'all') {
            $this->db->select('DATE_FORMAT(access_date, "%M") as label, 
                MONTH(access_date) as month_num,
                COUNT(DISTINCT ip_address) as visitors, 
                COUNT(DISTINCT visit_id) as visits, 
                COUNT(id) as pages');
            $this->db->group_by('month_num');
            $this->db->order_by('month_num', 'ASC');
        } else {
            $this->db->select('DATE_FORMAT(access_date, "%d %b") as label, 
                DAY(access_date) as tgl,
                COUNT(DISTINCT ip_address) as visitors, 
                COUNT(DISTINCT visit_id) as visits, 
                COUNT(id) as pages');
            $this->db->group_by('access_date');
            $this->db->order_by('access_date', 'ASC');
        }
        return $this->db->get('tb_visitors')->result();
    }

    // 3. STATISTIK PER JAM (LENGKAP: Visitors, Visits, Pages)
    public function get_hours_history($month, $year) {
        $this->_apply_filter($month, $year);
        $this->db->select('HOUR(created_at) as jam,
            COUNT(DISTINCT ip_address) as visitors, 
            COUNT(DISTINCT visit_id) as visits, 
            COUNT(id) as pages');
        $this->db->group_by('jam');
        $this->db->order_by('jam', 'ASC');
        return $this->db->get('tb_visitors')->result();
    }
    
    // 4. STATISTIK HARI (LENGKAP: Visitors, Visits, Pages)
    public function get_days_history($month, $year) {
        $this->_apply_filter($month, $year);
        $this->db->select('DAYNAME(access_date) as hari, DAYOFWEEK(access_date) as idx,
            COUNT(DISTINCT ip_address) as visitors, 
            COUNT(DISTINCT visit_id) as visits, 
            COUNT(id) as pages');
        $this->db->group_by('idx');
        $this->db->order_by('idx', 'ASC');
        return $this->db->get('tb_visitors')->result();
    }
    // 5. STATISTIK PER ARTIKEL (Untuk Frontend Blog Detail)
    public function get_article_stats($slug) {
        // Menghitung Visitors (Orang Unik) dan Views (Total Klik) berdasarkan URL/Slug
        $query = $this->db->query("
            SELECT 
                COUNT(DISTINCT ip_address) as visitors,
                COUNT(id) as views 
            FROM tb_visitors 
            WHERE page_url LIKE ? OR page_slug = ?
        ", array('%'.$slug.'%', $slug));
        
        return $query->row();
    }
    // 6. TOP PAGES (Untuk Dashboard Admin)
    // public function get_top_pages($limit = 10) {
    //     $query = $this->db->query("
    //         SELECT page_url, page_slug, COUNT(*) as views 
    //         FROM tb_visitors 
    //         GROUP BY page_url 
    //         ORDER BY views DESC 
    //         LIMIT $limit
    //     ");
    //     return $query->result();
    // }
    
    // 6. TOP PAGES LENGKAP (Awstats Style) - Filtered
    public function get_top_pages_extended($month, $year, $limit = 25) {
        $this->_apply_filter($month, $year);
        $this->db->select('
            page_url, 
            page_slug, 
            COUNT(DISTINCT ip_address) as visitors,
            COUNT(DISTINCT visit_id) as visits,
            COUNT(id) as pages
        ');
        // Group berdasarkan URL halaman
        $this->db->group_by('page_url'); 
        
        // Urutkan dari Pages (Views) terbanyak
        $this->db->order_by('pages', 'DESC'); 
        
        $this->db->limit($limit);
        return $this->db->get('tb_visitors')->result();
    }
}