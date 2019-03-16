<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Code extends CI_Model
{

    function timestamp($timestamp,$format) 
    {

        date_default_timezone_set('Asia/Jakarta');
        $array_day   = array(1=>"Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $day         = $array_day[date('N')];
        $today       = $day.", ".date('j F Y'); // Monday, 29 December 2018
        $date        = date('Ymd');
        $num         = substr($date, 2); 


        switch ($format) 
        {
			case 'substar':
			$the_date = date($num,$timestamp); // 20181229 to be 181229
			break;
			case 'today':
			$the_date = $day.", ".date('j F Y',$timestamp); // Saturday, 29 December 2019
			break;
			case 'full':
			$the_date = date('l jS \of F Y \a\t h:i:s A',$timestamp); // Saturday 29th of December 2018 at 08:09:48 AM
			break;
			case 'cool':
			$the_date = date('l jS \of F Y',$timestamp); // Saturday 29th of December 2018
			break;
			case 'shorter':
			$the_date = date('jS \of F Y',$timestamp); // 29th of December 2018
			break;
			case 'mini':
			$the_date = date('jS M Y',$timestamp); // 29th Dec 2018
			break;
			case 'mini2':
			$the_date = date('d M Y',$timestamp); // 29th Dec 2018
			break;
			case 'audit':
			$the_date = date('j-M-Y h:i:s',$timestamp); // 29-Dec-2018 08:09:48
			break;
			case 'oldschool2':
			$the_date = date('j\/n\/y',$timestamp); // 29/12/18
			break;
			case 'oldschool':
			$the_date = date('d/m/Y',$timestamp); // 29/12/2018
			break;
			case 'oldschool3':
			$the_date = date('j\/n\/Y',$timestamp); // 5/2/2018
			break;
			case 'datepicker':
			$the_date = date('d\-m\-Y',$timestamp); // 29-12-2018
			break;
			case 'monthyear':
			$the_date = date('F Y',$timestamp); // December 2018
			break;
			case 'date':
			$the_date = date('j F Y h:i:s',$timestamp); // 29 December 2018 08:09:48
			break;
		}
        return$the_date;
    }

    function user_code() {
        $date = date('Ymd');
        $num =substr($date, 2); 
        $this->db->select('RIGHT(user.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('user');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$num".$codemax;     
            return $codenumber;
    }

    function book_code() {
        $date = date('Ymd');
        $num =substr($date, 2); 
        $this->db->select('RIGHT(book.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('book');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$num".$codemax;     
            return $codenumber;
    }

    function office_code() {
        $date = date('Ymd');
        $num =substr($date, 2); 
        $this->db->select('RIGHT(office.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('office');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$num".$codemax;     
            return $codenumber;
    }

    function material_code() {
        $this->db->select('RIGHT(material.code,4) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('material');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 4, "0", STR_PAD_LEFT);    
            $codenumber = "MAT".$codemax;     
            return $codenumber;
    }

    function product_code() {
        $this->db->select('RIGHT(product.code,4) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('product');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 4, "0", STR_PAD_LEFT);    
            $codenumber = "PROD".$codemax;     
            return $codenumber;
    }

    function borrow_code() {
        $date = date('Ymd');
        $this->db->select('RIGHT(borrow.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('borrow');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$date".$codemax;     
            return $codenumber;
    }

    function apply_code() {
        $date = date('Ym');
        $this->db->select('RIGHT(apply.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('apply');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$date".$codemax;     
            return $codenumber;
    }

    function delivery_code() {
        $date = date('mY');
        $this->db->select('RIGHT(delivery.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('delivery');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$date".$codemax;     
            return $codenumber;
    }

    function transaction_code() {
        $date = date('dmY');
        $this->db->select('RIGHT(transaction.code,3) as code', FALSE);
        $this->db->order_by('code','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('transaction');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->code) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);    
            $codenumber = "$date".$codemax;     
            return $codenumber;
    }
    function pegawai_code() {
        $this->db->select('RIGHT(t_pegawai.f_pegawai_kode,3) as f_pegawai_kode', FALSE);
        $this->db->order_by('f_pegawai_kode','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('t_pegawai');      
        // check data on user table
        if($query->num_rows() <> 0){       
            // if data are there
            $data = $query->row();      
            $code = intval($data->f_pegawai_kode) + 1;     
        }else{       
            // if data are NOT there
            $code = 1;     
        }
            $codemax = str_pad($code, 4, "0", STR_PAD_LEFT);    
            $codenumber = "PEG".$codemax;     
            return $codenumber;
    }
}