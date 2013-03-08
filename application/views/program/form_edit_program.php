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
                $.post('<?php echo base_url()?>program/ajax_cek_kelas',data,function(res){
                    if(res!='true'){
                        alert('Kelas telah terpakai pada rentang tanggal yang dipilih');
                        $('#kelas').val('-1');
                    }
                });
            }
        });
    });
    function cek_asrama(id_asrama,item){
        data={
            'tgl_awal':$('#tgl_mulai').val(),
            'tgl_akhir':$('#tgl_akhir').val(),
            'id_asrama':id_asrama,
            'id_diklat':$('#parent').val()
        }
        
        $.post("<?php echo base_url()?>program/ajax_cek_vacant_kamar", data, function(data){
            console.log(data);
            console.log($(item).siblings('#result'));
            $(item).siblings('#result').text(data);
        });
    }
</script>
<div class="alert alert-error hide">
    <a class="close" data-dismiss="alert">&times;</a>
    <h4>Error!</h4>
</div>
<h2><?php echo $pil_diklat['name'] . ' Angkatan ' . $program['angkatan']; ?></h2>
<form method="post" id="form1" action="program/update_program" class="form-horizontal">
    <input type="hidden" id="parent" name="parent" value="<?php echo $pil_diklat['id']?>"/>
    <input type="hidden" name="id" value="<?php echo $program['id']?>"/>
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
                            <span class="add-on">ke-</span><input type="text" class="input-mini" id="input01" title="Anda belum memasukkan angkatan" name="angkatan" value="<?php echo $program['angkatan']?>" />
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
                    <?php echo form_dropdown('tahun_program', $arr_thn, $program['tahun_program'], 'id="input02" class="input-small"') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_mulai" class="datepicker" value="<?php echo $this->date->konversi1($program['tanggal_mulai'])?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_akhir">Tanggal Selesai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_akhir" class="datepicker" value="<?php echo $this->date->konversi1($program['tanggal_akhir'])?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Ruang kelas</label>
                    <?php if(count($kelas)>0) {?>
                    <div class="controls">
                        <?php echo form_dropdown('kelas',$kelas,$program['kelas'],'id="kelas"')?>
                    </div>
                    <?php } else {?>
                    <div class="controls">
                        Tidak ada kelas yang dapat memenuhi jumlah peserta
                    </div>
                    <?php } ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Asrama</label>
                    <div class="controls">
                        <?php foreach($asrama as $a){?>
                        <?php 
                            $checked='';
                            if(array_key_exists($a['id'], $pil_asrama)){
                                $checked=' checked="checked"';
                            } ?>
                            <div>
                            <label class="checkbox">
                                <input type="checkbox"<?php echo $checked?> name="asrama[]" value="<?php echo $a['id']?>"/> <?php echo $a['nama']?>
                            </label>
                             <span class="btn btn-mini" onclick="cek_asrama(<?php echo $a['id']?>,this)">Cek Ketersediaan</span>
                            <span id="result"></span>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksanaan">
                <div class="control-group">
                    <label class="control-label">Lama Pendidikan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('lama_pendidikan',$program['lama_pendidikan']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara Pelaksanaan Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksanaan',$program['pelaksanaan']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pelaksanaan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tempat',$program['tempat']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div class="control-group">
                    <label class="control-label">Pelaksana Penanggung Jawab Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksana',$program['pelaksana']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fasilitator</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('fasilitator',$program['fasilitator']) ?>
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
