<div id="display_dialog2" class="modal hide"></div>
<div id="display_dialog" class="modal hide modal-wide"></div>
<table id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <th width="3%">No</th>
        <th width="9%">Aksi</th>
        <th width="38%">Nama</th>
        <th width="25%">NIP</th>
        <th width="25%">Jenis</th>
    </thead>
    <tbody>
        <?php $i=1 ?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="javascript:view_materi(<?php echo $l['id'] ?>)" class="btn btn-mini">
                    <i class="icon-zoom-in"></i> Lihat Materi
                </a>
            </td>
            <td>
                <a href="javascript:view_detail_pub(<?php echo $l['id'] ?>)" id="nama" class="tip-right" title="Klik untuk detail">
                    <?php echo $l['nama']?>
                </a>
            </td>
            <td><?php echo $l['nip']?></td>
            <td><?php echo $l['jenis']==1?'Non Widyaiswara':'Widyaiwsara'?></td>
        </tr>
        <?php $i++?>
        <?php } ?>
    </tbody>
</table>
<script>
       function view_materi(num){
        $.get("<?php echo base_url() ?>about/materi_pengajar/"+num,function(result){
            $('#display_dialog2').html(result);
            $('#display_dialog2').modal('show');
        })
    }
</script>