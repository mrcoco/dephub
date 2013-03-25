<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of editor
 *
 * @author Administrator
 */
class Editor {
    protected $ci;

    // Constructor
    function __construct()
    {
        $this->_ci=&get_instance();
    }
    function status($val){
        switch($val){
            case "accept": return "Diterima";break;
            case "waiting": return "Cadangan";break;
            default      : return "Mendaftar";break;
        }
    }
    function grading($var){
        if($var>80){
            return 'A';         
        }else if($var>65){
            return 'B';         
        }else if($var>55){
            return 'C';         
        }else if($var>45){
            return 'D';         
        }else if($var>0){
            return 'E';         
        }else{
            return '-';
        }        
    }
    function predikat($var){
        if($var>80){
            return 'Dengan Pujian';         
        }else if($var>65){
            return 'Sangat Memuaskan';         
        }else if($var>55){
            return 'Memuaskan';         
        }else{
            return '-';
        }        
    }
    function cek_fdb_pengajar($id_program,$id_materi,$id_pengajar,$id_peserta=null){
        $this->_ci->load->model('mdl_feedback','fdb');
        return $this->_ci->fdb->cek_feedback_pengajar($id_program,$id_materi,$id_pengajar,$id_peserta);
    }
    // Default Template
    function textarea($name,$value=null)
    {
	$js='<script type="text/javascript">$().ready(function() {
		$(\'textarea.tinymce_'.$name.'\').tinymce({
		    // Location of TinyMCE script
		    script_url : \''.base_url().'assets/js/tm/tiny_mce.js\',

		    // General options
		    theme : "advanced",
		    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

		    // Theme options
		    theme_advanced_buttons1 : "newdocument,undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect",
		    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor",
		    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,fullscreen",
		    theme_advanced_toolbar_location : "top",
		    theme_advanced_toolbar_align : "left",
		    theme_advanced_statusbar_location : "bottom",
		    theme_advanced_resizing : true,
		});
	    });</script>';
	return $js.'<textarea name="'.$name.'" class="tinymce_'.$name.'" style="width: 100%;height: 250px;">'.$value.'</textarea>';
    }


    // Alert templates
    function alert_ok($var)
    {
	return '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>'.$var.'</div>';
    }
    function alert_info($var)
    {
	return '<div class="alert alert-info"><a class="close" data-dismiss="alert">&times;</a>'.$var.'</div>';
    }
    function alert_error($var)
    {
	return '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>'.$var.'</div>';
    }
    function alert_warning($var)
    {
	return '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>'.$var.'</div>';
    }

    // Date Correction
    function date_correct($var)
    {
	if($var==0)
	{
	    return '-';
	} else {
	    $date = date('d M Y', strtotime($var));
	    return $date;
	}
    }

    function modal_kamar($id)
    {
	return '<div class="modal fade in" id="kamar'.$id.'" style="display:none;width: 30%;left: 60%;">
		    <div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>Kamar</h3>
		    </div>
		    <div class="modal-body">
			<form method="POST" action="sarpras/asrama/update_kamar/'.$id.'">
			    <table class="table">
				<tr><td colspan="2"><div align="center">Lampu</div></td></tr>
				<tr><td>TL-E 22W</td><td><input type="text" name="lampu1" value="" class="input-small"></td></tr>
			    </table>
			</form>
		    </div>
		    <div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		    </div>
		</div>';
    }

    function get_status_kamar($id,$var)
    {
	$this->_ci->load->model('mdl_sarpras');
	$q=$this->_ci->mdl_sarpras->get_asrama($id)->$var;
    }

    function pagination_custom($url,$total,$limit)
    {
	$this->_ci->load->library('pagination');
	$config['base_url']=$url;
	$config['total_rows']=$total;
	$config['per_page']=$limit;
	$config['uri_segment']=4;
	$config['full_tag_open'] = '<div class="pagination"><ul>';
	$config['full_tag_close'] = '</ul></div>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['prev_link'] = '&lt;';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&gt;';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['first_link'] = 'First';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';
	$this->_ci->pagination->initialize($config);
	return $this->_ci->pagination->create_links();
    }

    function y_selected($var)
    {
	if($this->_ci->uri->segment(5)==$var)
	{
	    return 'selected=selected';
	} else {
	    return '';
	}
    }

    function m_selected($var)
    {
	if($this->_ci->uri->segment(6)==$var)
	{
	    return 'selected=selected';
	} else {
	    return '';
	}
    }

    function w_selected($var)
    {
	if($this->_ci->uri->segment(7)==$var)
	{
	    return 'selected=selected';
	} else {
	    return '';
	}
    }

    function a_selected($var)
    {
	if($this->_ci->uri->segment(8)==$var)
	{
	    return 'selected=selected';
	} else {
	    return '';
	}
    }
}

/* End of file editor.php */
/* Location: ./application/libraries/editor.php */