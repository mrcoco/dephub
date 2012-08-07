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
		    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect",
		    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image",
		    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,fullscreen",
		    theme_advanced_toolbar_location : "top",
		    theme_advanced_toolbar_align : "left",
		    theme_advanced_statusbar_location : "bottom",
		    theme_advanced_resizing : false,
		});
	    });</script>';
	return $js.'<textarea name="'.$name.'" class="tinymce_'.$name.'" style="width: 100%;height: 300px;">'.$value.'</textarea>';
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

    // Upload functionality

    function upload_input2($id,$val,$action)
    {
	$uploadpath = "";
	$uploadpath = str_ireplace($_SERVER['DOCUMENT_ROOT'],"",realpath($_SERVER['SCRIPT_FILENAME']));
	$uploadpath = str_ireplace("index.php","",$uploadpath);
	$button = form_open_multipart('upload/index').'<input type="file" name="'.$id.'" id="'.$id.'"/><input type="hidden" name="'.$id.'" value="'.$val.'" />
		    <a href="javascript:$(\'#'.$id.'\').uploadifyUpload();" class="btn">Upload</a>'.form_close();
	$button.= "<script type=\"text/javascript\" language=\"javascript\">
			$(document).ready(function()
			{
				$(\"#$id\").uploadify({
							uploader: '".base_url()."application/uploadify/uploadify.swf',
							script: '".base_url()."application/uploadify/uploadify.php',
							cancelImg: '".base_url()."application/uploadify/cancel.png',
							folder: '".$uploadpath."assets/uploads',
							scriptAccess: 'always',
							multi: true,
							'onError' : function(a, b, c, d){
								if(d.status=404)
									alert('Could not find upload script');
								else if(d.type === \"HTTP\")
									alert('error'+d.type+\": \"+d.info);
								else if(d.type === \"File Size\")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
								else
									alert('error'+d.type+\": \"+d.text);
							},
							'onComplete' : function(event,queueID,fileObj,response,data){
									$.post('".site_url('activity/edit/'.$action)."',{filearray: response},function(info){ $(\"#info-$id\").append(info);});
							},
							'onAllComplete' : function(event,data){

							}
						    });
			});
		    </script>";
	return $button;
    }

    function upload_input($id,$course_id)
    {

	$button = form_open_multipart('upload/index').'<div id="div-'.$id.'"><input type="file" name="'.$id.'" id="btn-upload-'.$id.'"/>
		    <a href="javascript:$(\'#btn-upload-'.$id.'\').uploadify(\'upload\');" class="btn" id="btn-do-upload-'.$id.'">Upload</a>'.form_close().'</div>';
	$button .="<script type=\"text/javascript\" language=\"javascript\">
			$(document).ready(function()
			    {
			    $(\"#btn-upload-$id\").uploadify({
				height:22,
				swf:'".base_url()."assets/up/uploadify.swf',
				uploader:'".base_url()."application/uploadify/uploadify.php',
				width:80,
				multi:true,
				auto: false,
				buttonText: '<i class=\"icon icon-upload icon-white\"></i> Select',
				'onUploadStart' : function(){
					$(\"#pub_$id\").remove();
					$(\"#info-$id\").append(\"<img src='assets/img/loading.gif' width='16px' id='img_$id'/>\");
				},
				'onUploadSuccess' : function(file){
					$.ajax({
					    url: '".site_url('activity/upload_file/'.$course_id.'/'.$id)."',
					    type: 'POST',
					    dataType: 'json',
					    data: {fileName: file.name}
					}).done(function(data){
					    window.location.reload();
					});
				}
			    });
			});
		    </script>";
	return $button;
    }

    function modal_aktifitas($i,$kursil,$label_kursil,$kelengkapan,$label_kelengkapan,$peserta,$label_peserta)
    {
	return '<div class="modal fade in" id="aktifitas'.$i.'" style="display:none;width: 30%;left: 60%;">
		    <div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>Aktifitas Pelatihan</h3>
		    </div>
		    <div class="modal-body">
			<table class="table table-condensed">
			    <tr><th>Aktifitas</th><th>Action</th><th>Status</th></tr>
			    <tr><td>Kursil</td><td>'.$kursil.'</td><td>'.$label_kursil.'</td></tr>
			    <tr><td>Kelengkapan</td><td>'.$kelengkapan.'</td><td>'.$label_kelengkapan.'</td></tr>
			    <tr><td>Peserta</td><td>'.$peserta.'</td><td>'.$label_peserta.'</td></tr>
			</table>
		    </div>
		    <div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		    </div>
		</div>';
    }
    
        function modal_cancel($id,$ket_cancel)
    {
	return '<div class="modal fade in" id="cancel'.$id.'" style="display:none;width: 30%;left: 60%;">
		    <div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>Alasan</h3>
		    </div>
		    <div class="modal-body">
			'.$ket_cancel.'
		    </div>
		    <div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		    </div>
		</div>';
    }
        function modal_popupcancel($id)
    {
	return '<div class="modal fade in" id="popup'.$id.'" style="display:none;width: 30%;left: 60%;">
		    <div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>Alasan</h3>
		    </div>
		    <div class="modal-body">
			<form action="dashboard/cancel/'.$id.'" method="POST"><textarea name="ket" style="width: 260px;"></textarea><br><br><button class="btn btn-primary" type="submit">Submit</button></form>
		    </div>
		    <div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		    </div>
		</div>';
    }
}

/* End of file editor.php */
/* Location: ./application/libraries/editor.php */