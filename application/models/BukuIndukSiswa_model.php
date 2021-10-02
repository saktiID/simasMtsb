<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuIndukSiswa_model extends CI_Model
{

    /**
     * method untuk mencari buku induk secara pertahun
     */
    public function get_buku_induk_tahun()
    {
        return $this->db->get('buku_induk')->result_array();
    }
}
