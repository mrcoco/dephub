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
<table width="100%" class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Program Diklat</th>
            <th>Tahun Daftar</th>
            <th>Status</th>
            <th>Batalkan</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($pendaftar);$i++){?>
        <tr>
            <td><?php echo $i+1?></td>
            <td><?php echo $pendaftar[$i]['nama']?></td>
            <td><?php echo $diklat[$pendaftar[$i]['id_diklat']].' '.$program[$pendaftar[$i]['id_program']]?></td>
            <td><?php echo $pendaftar[$i]['tahun_daftar']?></td>
            <td class="status"><?php echo $this->editor->status($pendaftar[$i]['status'])?></td>
            <td>
                <input type="button" value="cancel" onclick="cancel(this,<?php echo $pendaftar[$i]['id_diklat'].','.$pendaftar[$i]['id_program'].','.$pendaftar[$i]['id']?>)"/>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
