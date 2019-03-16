<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public $table = 't_pegawai';
    public $id = 'f_pegawai_id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('f_pegawai_id,f_pegawai_kode,f_pegawai_nama,f_pegawai_alamat,f_pegawai_gaji,f_pegawai_jk,f_pegawai_status,f_jabatan_nama,f_pegawai_photo,f_pegawai_date_join');
        $this->datatables->from('t_pegawai');
        $this->datatables->join('t_jabatan', 't_pegawai.f_jabatan_id = t_jabatan.f_jabatan_id');
        $this->datatables->add_column('action', '<a href="pegawai/read/$1",<i class="fa fa-eye"></i></a>  <a href="pegawai/update/$1"><i class="fa fa-edit"></i></a>  <a href="javascript:void(0);" onclick="deletedata($1)"><i class="fa fa-trash"></i></a>', 'f_pegawai_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('f_pegawai_id', $q);
        $this->db->or_like('f_pegawai_kode', $q);
        $this->db->or_like('f_pegawai_nama', $q);
        $this->db->or_like('f_pegawai_alamat', $q);
        $this->db->or_like('f_pegawai_gaji', $q);
        $this->db->or_like('f_pegawai_jk', $q);
        $this->db->or_like('f_pegawai_status', $q);
        $this->db->or_like('f_jabatan_id', $q);
        $this->db->or_like('f_pegawai_photo', $q);
        $this->db->or_like('f_pegawai_date_join', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('f_pegawai_id', $q);
        $this->db->or_like('f_pegawai_kode', $q);
        $this->db->or_like('f_pegawai_nama', $q);
        $this->db->or_like('f_pegawai_alamat', $q);
        $this->db->or_like('f_pegawai_gaji', $q);
        $this->db->or_like('f_pegawai_jk', $q);
        $this->db->or_like('f_pegawai_status', $q);
        $this->db->or_like('f_jabatan_id', $q);
        $this->db->or_like('f_pegawai_photo', $q);
        $this->db->or_like('f_pegawai_date_join', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}