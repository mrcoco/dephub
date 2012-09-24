<?php
/**
 * Description of profiles
 *
 * @author irhamnurhalim
 */
class Profiles extends Administrator_Controller {
    public function index()
    {
	$this->user();
    }

    function user()
    {
	$data['sub_title']='Pengaturan Pengguna';
	$user = $this->mdl_administrator->get_user_info()->result_array();
	$this->table->set_empty('&nbsp;');
	$this->table->set_heading(
		array('data'=>'No','width'=>'5'),
		array('data'=>'User','width'=>'250'),
		array('data'=>'Action')
		);
	$i=0;
	$data['modal_user']='';
	foreach($user as $row)
	{
	    $btn=anchor('#edit-'.$row['id'],'Edit Password',array('id'=>'edit-'.$row['id'],'class'=>'btn btn-info','data-toggle'=>'modal'));
	    $btn_cancel=anchor('administrator/profiles','Cancel',array('id'=>'cancel-'.$row['id'],'class'=>'btn'));
	    $this->table->add_row(
		    ++$i,
		    $row['name'],
		    array(
			'data'=>$this->session->flashdata('msg-'.$row['id']).$btn,
			'id'=>'box-'.$row['id']
		    )
	    );
	    $data['modal_user'].=$this->script($row['id'],$btn,$btn_cancel);
	}
	$this->table->set_template(array('table_open'=>'<table class="table table-bordered">'));
	$data['table_user']=$this->table->generate();
	$this->template->display('simdik/administrator/profiles',$data);
    }

    protected function script($id,$btn,$btn_cancel)
    {
	return '
	    <script type="text/javascript">
		$(this).ready( function() {
		    $("#edit-'.$id.'").click(function(){
			$("#edit-'.$id.'").remove();
			$("#box-'.$id.'").append(
			    \'<div id="form-'.$id.'">'.form_open('administrator/profiles/edit_password').'<input type="hidden" name="id" value="'.$id.'"><input type="password" class="input-medium" name="old-password" placeholder="Password Lama"/><br /><input class="input-medium" type="password" name="new-password" placeholder="Password Baru"/> <input type="password" name="renew-password" class="input-medium" placeholder="Konfirmasi Password"/><br /><button type="submit" class="btn btn-primary">Simpan</button> '.$btn_cancel.form_close().'</div>\'
			);
		    });
		    $("#cancel-'.$id.'").click(function(){
			$("#form-'.$id.'").remove();
			$("#box-'.$id.'").append(\''.$btn.'\');
		    });
		});
	    </script>
	';
    }

    function edit_password()
    {
	$id = $this->input->post('id');
	$old_password = md5($this->input->post('old-password'));
	$new_password = $this->input->post('new-password');
	$renew_password = $this->input->post('renew-password');
	if($this->mdl_administrator->validate_password($id,$old_password))
	{
	    if($new_password == $renew_password)
	    {
		if($this->mdl_administrator->update_password($id,$new_password))
		{
		    $this->session->set_flashdata('msg-'.$id,$this->editor->alert_ok('Password berhasil diperbarui'));
		    redirect('administrator/profiles');
		}
	    } else {
		$this->session->set_flashdata('msg-'.$id,$this->editor->alert_error('Password konfirmasi yang Anda masukan tidak sama'));
		redirect('administrator/profiles');
	    }
	} else {
	    $this->session->set_flashdata('msg-'.$id,$this->editor->alert_error('Password lama yang Anda masukan salah'));
	    redirect('administrator/profiles');
	}
    }
}
