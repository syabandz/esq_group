<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Looping extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template->load('template', 'looping/looping');
    } 
    
    public function depdrop()
    {
        $this->template->load('template', 'looping/depdrop');
    } 
    
    public function category()
	{

        $categories = $this->input->post('f_jabatan_id');
        if ($categories != '') {
            $category = $this->db->get_where('t_pegawai',array('f_jabatan_id' => $categories ))->result();

        }else{
            $category = $this->db->get('t_pegawai')->result();
        }

        $data = array(
            'pegawai_data' => $category,
        );
        $this->load->view('esq/looping/depdrop2', $data);
	}
        
}