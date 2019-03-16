<?php
/* http://localhost/ci/aplication/helpers/  == this is configuration base url
 * http://localhost/ci/aplication/helpers/auth == this is segmen uri 1 / class (auth)
 * http://localhost/ci/aplication/helpers/auth/sign-in == this is segmen 2 / function (sign-in)
 * http://localhost/ci/aplication/helpers/auth/sign-n/1 == this is segmen 3 / id (1)
 * segmen 3 is a function GET['id'] from id table
 * get_instance is implementasion singleton function from controller
 * if you make a library and need more data from database or other resources you can used get_instance
 * this note's mawardi sya'ban (tuesday, dec,18th' 2018 / 06:41)
 * 
 */
?>

<?php
// checked access user level if id_user and id_user level are there access table
function checked_access($user_level_id,$id){
    $ci = get_instance();
    $ci->db->where('user_level_id',$user_level_id);
    $ci->db->where('menu_id',$id);
    $data = $ci->db->get('access');
    if($data->num_rows()>0){
        return "checked='checked'";
    }
}

// function date late at borrow list
function late($date_late,$date_back){
    $date_late = explode(" ", $date_late);
    $date_late = $date_late[1]." ".$date_late[2]." ".$date_late[0];

    $date_back = explode(" ", $date_back);
    $date_back = $date_back[1]." ".$date_back[2]." ".$date_back[3]." ".$date_back[0];

    $result = strtotime($date_back) - strtotime($date_late);
    $data = $result / 86400;
    if ($data>=1) 
    {
        $date_result = floor($data);
    }
    else 
    {
        $date_result = 0;
    }
    return $date_result;
}
    
// function where id_user join address 
function id_user($id_user){
    $ci = get_instance();
    $ci->db->where('id_user',$id_user);
    $data = $ci->db->get('address');
        return $data ;
}

function rename_integer_id_book($integer){
    $book_data = $this->db->get('book')->result();
    $borrow_data = $this->db->get('borrow')->result();
    foreach ($borrow_data as $borrow){
        $bor = $borrow->id_book;
    }
    foreach ($book_data as $book){
        $boo = $book->id_book;
        if ($boo == $bor) {
        $name = $book->book;
        }
    }
    return $integer==$name;
}
    
function rename_string_active($string){
    return $string== 1 ?'Active':'No Active';
}

function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('id_user')){
        redirect('auth');
    }else{
        $modul = $ci->uri->segment(1);
        
        $user_level_id = $ci->session->userdata('user_level_id');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('menu',array('url'=>$modul))->row_array();
        $menu_id = $menu['menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('access',array('menu_id'=>$menu_id,'user_level_id'=>$user_level_id));
        if($hak_akses->num_rows()<1){
            redirect('blokir');
            exit;
        }
    }
}

function cmb_dinamis($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function select2_dinamis($name,$table,$field,$placeholder){
    $ci = get_instance();
    $select2 = '<select name="'.$name.'" class="form-control select2 select2-hidden-accessible" multiple="" 
               data-placeholder="'.$placeholder.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $select2.= ' <option>'.$row->$field.'</option>';
    }
    $select2 .='</select>';
    return $select2;
}

function datalist_dinamis($name,$table,$field,$value=null){
    $ci = get_instance();
    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control">
    <datalist id="'.$name.'">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $string.='<option value="'.$row->$field.'">';
    }
    $string .='</datalist>';
    return $string;
}

function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

function autocomplate_json($table,$field){
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}