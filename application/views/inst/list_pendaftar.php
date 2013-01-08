<script>
    function cancel(item,id_diklat,id_program,id_peserta){
        if(confirm('Anda yakin untuk membatalkan penerimaan peserta ini?')){
            data_post={
                'id_diklat':id_diklat,
                'id_program':id_program,
                'id_peserta':id_peserta
            }
            $.post('<?php echo base_url()?>inst/front/ajax_cancel', data_post, function(res){
                $(item).parent().siblings().filter('.status').text('daftar')
            });
        }else{
            return;
        }
    }
</script>
<div id="display_dialog" class="modal hide modal-wide"></div>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="form-inline" action="inst/front/list_pendaftar" method="GET">
    Tahun Daftar : <?php echo form_dropdown('thn',$tahun, $thn) ?>
    Diklat : <?php echo form_dropdown('id_diklat',$diklat, $id_diklat) ?>
    <input type="submit" class="btn" value="Filter" >
</form>
<?php if($pendaftar){ ?>
<table width="100%" class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Nama Diklat</th>
            <th>Tahun Daftar</th>
            <th>Status</th>
            <th>Batalkan</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($pendaftar);$i++){?>
        <tr>
            <td><?php echo $i+1?></td>
            <td>
                <!--<a href="javascript:view_detail(<?php echo $pendaftar[$i]['id'] ?>)" class="tip-right" title="Klik untuk detail">-->
                    <?php echo $pendaftar[$i]['nama']?>
                <!--</a>-->
            </td>
            <td><?php echo $pendaftar[$i]['nip']?></td>
            <td><?php echo $diklat[$pendaftar[$i]['id_diklat']].' '.$program[$pendaftar[$i]['id_program']]?></td>
            <td><?php echo $pendaftar[$i]['tahun_daftar']?></td>
            <td class="status"><?php echo $this->editor->status($pendaftar[$i]['status'])?></td>
            <td>
                <input class="btn" type="button" value="cancel" onclick="cancel(this,<?php echo $pendaftar[$i]['id_diklat'].','.$pendaftar[$i]['id_program'].','.$pendaftar[$i]['id']?>)"/>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php }else{ ?>
Tidak ada pendaftar
<?php } ?>