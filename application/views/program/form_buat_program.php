<script type="text/javascript">
    $(document).ready(function() {    
        var container = $('div.alert');
        var validator = $("#form1").validate({
            errorLabelContainer: container,
            errorContainer: $(container),
            rules: {
                angkatan: "required",
                tahun_program: "required",
                tanggal_mulai: "required",
                tanggal_akhir: "required",
                asrama: "required",
                kelas: "required"
            },
            messages: {
                name: "Angkatan wajib diisi!<br />",
                tahun_program: "Tahun program wajib diisi!<br />",
                tanggal_mulai: "Tanggal mulai wajib diisi!<br />",
                tanggal_akhir: "Tanggal akhir wajib diisi!<br />",
                asrama: "Asrama wajib diisi!<br />",
                kelas: "kelas wajib diisi!<br />"
            }

        });
        $(".cancel").click(function() {
            validator.resetForm();
        });
        $('#kelas').change(function(){
            mulai=$('#tgl_mulai').val();
            akhir=$('#tgl_akhir').val();
            if(mulai==''||akhir==''){
                alert('Harap isikan tanggal terlebih dahulu');
            }else{
                data={
                    'id_ruangan':$(this).val(),
                    'mulai':mulai,
                    'akhir':akhir
                };
                console.log(data);
                $.post('<?php echo base_url()?>program/ajax_cek_kelas',data,function(res){
                    console.log(res);
                    if(res!='true'){
                        alert('Kelas telah terpakai pada rentang tanggal yang dipilih');
                        $('#kelas').val('-1');
                    }
                });
            }
        });
    });
    
</script>
<div class="alert alert-error hide">
    <a class="close" data-dismiss="alert">&times;</a>
    <h4>Error!</h4>
</div>
<form method="post" id="form1" action="program/insert_program" class="form-horizontal">
    <input type="hidden" name="parent" value="<?php echo $pil_diklat['id']?>"/>
    <fieldset>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#pelaksanaan" data-toggle="tab">Pelaksanaan</a></li>
            <li><a href="#pelaksana" data-toggle="tab">Pelaksana dan Fasilitator</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Angkatan</label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">ke-</span><input type="text" class="input-mini" id="input01" title="Anda belum memasukkan angkatan" name="angkatan" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input02">Tahun Program</label>
                    <div class="controls">
                    <?php
                    $now = date('Y');
                    $arr_thn = array($now => $now, $now + 1 => $now + 1, $now + 2 => $now + 2, $now + 3 => $now + 3, $now + 4 => $now + 4);
                    ?>
                    <?php echo form_dropdown('tahun_program', $arr_thn, $now, 'id="input02" class="input-small"') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
                    <div class="controls">
                        <input id="tgl_mulai" type="text" placeholder="tgl-bulan-tahun" name="tanggal_mulai"  class="datepicker"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_akhir">Tanggal Selesai</label>
                    <div class="controls">
                        <input id="tgl_akhir" type="text" placeholder="tgl-bulan-tahun" name="tanggal_akhir" class="datepicker"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Ruang kelas</label>
                    <div class="controls">
                        <?php echo form_dropdown('kelas',$kelas,'','id="kelas"')?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Asrama</label>
                    <div class="controls">
                        <?php foreach($asrama as $a){?>
                        <label class="checkbox">
                            <input type="checkbox" name="asrama[]" value="<?php echo $a['id']?>"/> <?php echo $a['nama']?> <br/>
                        </label>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksanaan">
                <div class="control-group">
                    <label class="control-label">Lama Pendidikan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('lama_pendidikan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara Pelaksanaan Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksanaan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pelaksanaan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tempat') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div class="control-group">
                    <label class="control-label">Pelaksana Penanggung Jawab Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksana') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fasilitator</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('fasilitator') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary btn-large" value="Simpan"/>
            <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
        </div>
    </fieldset>
</form>
