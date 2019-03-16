<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'jabatan/jabatan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jabatan_model->json();
    }

    public function read($f_jabatan_id) 
    {
        $row = $this->Jabatan_model->get_by_id($f_jabatan_id);
        if ($row) {
            $data = array(
            'f_jabatan_id' => $row->f_jabatan_id,
            'f_jabatan_nama' => $row->f_jabatan_nama,
	    );
            $this->template->load('template', 'jabatan/jabatan_read', $data);
        } else {
            $this->session->set_flashdata('message2', 'Record Not Found');
            redirect(site_url('esq/jabatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create Jabatan',
            'button' => 'SAVE',
            'action' => site_url('esq/jabatan/create_action'),
            'f_jabatan_id' => set_value('f_jabatan_id'),
            'f_jabatan_nama' => set_value('f_jabatan_nama'),
	);
    $this->template->load('template', 'jabatan/jabatan_form', $data);
}
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'f_jabatan_nama' => $this->input->post('f_jabatan_nama',TRUE),
	    );

            $this->Jabatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('esq/jabatan'));
        }
    }
    
    public function update($f_jabatan_id) 
    {
        $row = $this->Jabatan_model->get_by_id($f_jabatan_id);

        if ($row) {
            $data = array(
                'title' => 'Update Jabatan',
                'button' => 'SAVE',
                'action' => site_url('esq/jabatan/update_action'),
                'f_jabatan_id' => set_value('f_jabatan_id', $row->f_jabatan_id),
                'f_jabatan_nama' => set_value('f_jabatan_nama', $row->f_jabatan_nama),
                );
            $this->template->load('template', 'jabatan/jabatan_form', $data);
        } else {
            $this->session->set_flashdata('message2', 'Record Not Found');
            redirect(site_url('esq/jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        $f_jabatan_id = $this->input->post('f_jabatan_id',TRUE);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'f_jabatan_nama' => $this->input->post('f_jabatan_nama',TRUE),
	    );

            $this->Jabatan_model->update($f_jabatan_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('esq/jabatan/read/'.$f_jabatan_id));
        }
    }
    
    public function delete()
    {
		$id     = $this->input->post('f_jabatan_id');
        $data=$this->Jabatan_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
		echo json_encode($data);
	}

    public function _rules() 
    {
	$this->form_validation->set_rules('f_jabatan_nama', 'f jabatan nama', 'trim|required');

	$this->form_validation->set_rules('f_jabatan_id', 'f_jabatan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}