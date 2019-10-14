<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Code');
        $this->load->model('Pegawai_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pegawai/pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pegawai_model->json();
    }

    public function read($f_pegawai_id) 
    {
        $row = $this->Pegawai_model->get_by_id($f_pegawai_id);
        if ($row) {
            $data = array(
            'f_pegawai_id' => $row->f_pegawai_id,
            'f_pegawai_kode' => $row->f_pegawai_kode,
            'f_pegawai_nama' => $row->f_pegawai_nama,
            'f_pegawai_alamat' => $row->f_pegawai_alamat,
            'f_pegawai_gaji' => $row->f_pegawai_gaji,
            'f_pegawai_jk' => $row->f_pegawai_jk,
            'f_pegawai_status' => $row->f_pegawai_status,
            'f_jabatan_id' => $row->f_jabatan_id,
            'f_pegawai_photo' => $row->f_pegawai_photo,
            'f_pegawai_date_join' => $this->Code->timestamp($row->f_pegawai_date_join,'mini2'),
            );
            $this->template->load('template','esq/pegawai/pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message2', 'Record Not Found');
            redirect(site_url('esq/pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create Pegawai',
            'button' => 'SAVE',
            'action' => site_url('esq/pegawai/create_action'),
            'f_pegawai_id' => set_value('f_pegawai_id'),
            'f_pegawai_kode'=> $this->Code->pegawai_code(),
            'f_pegawai_nama' => set_value('f_pegawai_nama'),
            'f_pegawai_alamat' => set_value('f_pegawai_alamat'),
            'f_pegawai_gaji' => set_value('f_pegawai_gaji'),
            'f_pegawai_jk' => set_value('f_pegawai_jk'),
            'f_pegawai_status' => set_value('f_pegawai_status'),
            'f_jabatan_id' => set_value('f_jabatan_id'),
            'f_pegawai_photo' => set_value('f_pegawai_photo'),
            'f_pegawai_date_join' => set_value('f_pegawai_date_join'),
        );
        $this->template->load('template','esq/pegawai/pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $f_pegawai_date_join = $this->input->post('f_pegawai_date_join',TRUE);
        $date = strtotime($f_pegawai_date_join);
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'f_pegawai_kode' => $this->input->post('f_pegawai_kode',TRUE),
                'f_pegawai_nama' => $this->input->post('f_pegawai_nama',TRUE),
                'f_pegawai_alamat' => $this->input->post('f_pegawai_alamat',TRUE),
                'f_pegawai_gaji' => $this->input->post('f_pegawai_gaji',TRUE),
                'f_pegawai_jk' => $this->input->post('f_pegawai_jk',TRUE),
                'f_pegawai_status' => $this->input->post('f_pegawai_status',TRUE),
                'f_jabatan_id' => $this->input->post('f_jabatan_id',TRUE),
                'f_pegawai_photo'        => $foto['file_name'],
                'f_pegawai_date_join' => $date,
                );

            $this->Pegawai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('esq/pegawai'));
        }
    }
    
    public function update($f_pegawai_id) 
    {
        $row = $this->Pegawai_model->get_by_id($f_pegawai_id);

        if ($row) {
            $data = array(
                'title' => 'Update Pegawai',
                'button' => 'SAVE',
                'action' => site_url('esq/pegawai/update_action'),
                'f_pegawai_id' => set_value('f_pegawai_id', $row->f_pegawai_id),
                'f_pegawai_kode' => set_value('f_pegawai_kode', $row->f_pegawai_kode),
                'f_pegawai_nama' => set_value('f_pegawai_nama', $row->f_pegawai_nama),
                'f_pegawai_alamat' => set_value('f_pegawai_alamat', $row->f_pegawai_alamat),
                'f_pegawai_gaji' => set_value('f_pegawai_gaji', $row->f_pegawai_gaji),
                'f_pegawai_jk' => set_value('f_pegawai_jk', $row->f_pegawai_jk),
                'f_pegawai_status' => set_value('f_pegawai_status', $row->f_pegawai_status),
                'f_jabatan_id' => set_value('f_jabatan_id', $row->f_jabatan_id),
                'f_pegawai_photo' => set_value('f_pegawai_photo', $row->f_pegawai_photo),
                'f_pegawai_date_join' => $this->Code->timestamp($row->f_pegawai_date_join,'mini2'),
                );
                $this->template->load('template','esq/pegawai/pegawai_form', $data);
            } else {
            $this->session->set_flashdata('message2', 'Record Not Found');
            redirect(site_url('esq/pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        $f_pegawai_id = $this->input->post('f_pegawai_id',TRUE);
        $f_pegawai_date_join = $this->input->post('f_pegawai_date_join',TRUE);
        $date = strtotime($f_pegawai_date_join);

        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if($foto['file_name'] != ''){
                $data = array(
                    'f_pegawai_kode' => $this->input->post('f_pegawai_kode',TRUE),
                    'f_pegawai_nama' => $this->input->post('f_pegawai_nama',TRUE),
                    'f_pegawai_alamat' => $this->input->post('f_pegawai_alamat',TRUE),
                    'f_pegawai_gaji' => $this->input->post('f_pegawai_gaji',TRUE),
                    'f_pegawai_jk' => $this->input->post('f_pegawai_jk',TRUE),
                    'f_pegawai_status' => $this->input->post('f_pegawai_status',TRUE),
                    'f_jabatan_id' => $this->input->post('f_jabatan_id',TRUE),
                    'f_pegawai_photo'        => $foto['file_name'],
                    'f_pegawai_date_join' => $date,
                );
            }else{
                $data = array(
                    'f_pegawai_kode' => $this->input->post('f_pegawai_kode',TRUE),
                    'f_pegawai_nama' => $this->input->post('f_pegawai_nama',TRUE),
                    'f_pegawai_alamat' => $this->input->post('f_pegawai_alamat',TRUE),
                    'f_pegawai_gaji' => $this->input->post('f_pegawai_gaji',TRUE),
                    'f_pegawai_jk' => $this->input->post('f_pegawai_jk',TRUE),
                    'f_pegawai_status' => $this->input->post('f_pegawai_status',TRUE),
                    'f_jabatan_id' => $this->input->post('f_jabatan_id',TRUE),
                    'f_pegawai_date_join' => $date,
                );
            }
    
            $this->Pegawai_model->update($f_pegawai_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('esq/pegawai/read/'.$f_pegawai_id));
        }
    }
    
	public function delete(){
		$id     = $this->input->post('f_pegawai_id');
        $data=$this->Pegawai_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
		echo json_encode($data);
	}

    public function upload_foto(){
        $config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('f_pegawai_photo');
        return $this->upload->data();
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
            'title'     => 'Pegawai',
            'start' => intval($this->input->get('start')),
            'pegawai_data' => $category,
        );
        $this->load->view('esq/pegawai/pegawai_list2', $data);
	}

    public function categoryjson()
	{

        $categories = $this->input->post('f_jabatan_id');
        $category = $this->db->get_where('t_pegawai',array('f_jabatan_id' => $categories ))->result();
        echo json_encode($category);
	}

    public function _rules() 
    {
	$this->form_validation->set_rules('f_pegawai_nama', 'f pegawai nama', 'trim|required');
	$this->form_validation->set_rules('f_pegawai_alamat', 'f pegawai alamat', 'trim|required');
	$this->form_validation->set_rules('f_pegawai_gaji', 'f pegawai gaji', 'trim|required|numeric');
	$this->form_validation->set_rules('f_pegawai_jk', 'f pegawai jk', 'trim|required');
	$this->form_validation->set_rules('f_pegawai_status', 'f pegawai status', 'trim|required');
	$this->form_validation->set_rules('f_jabatan_id', 'f jabatan id', 'trim|required');
	$this->form_validation->set_rules('f_pegawai_date_join', 'f pegawai date join', 'trim|required');

	$this->form_validation->set_rules('f_pegawai_id', 'f_pegawai_id', 'trim');
	$this->form_validation->set_rules('f_pegawai_kode', 'f pegawai kode', 'trim');
	$this->form_validation->set_rules('f_pegawai_photo', 'f pegawai photo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}