<!--<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php //echo $header ?></h3>
</div>
<div class="modal-body">-->
    <table class="table table-condensed">
        <tr>
            <th>Gedung</th>
            <td><?php echo $pemakaian[0]['gedung'] ?></td>
        </tr>
        <tr>
            <th>Kamar</th>
            <td><?php echo $pemakaian[0]['gedung'].$pemakaian[0]['kamar'] ?>
		</tr>
        <tr>
            <th>Status</th>
            <td><?php echo $pemakaian[0]['status'] ?></td>
        </tr>
        <tr>
            <th>Program</th>
            <td><?php echo $pemakaian[0]['program'] ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo $pemakaian[0]['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <th>Peserta</th>
            <td><?php
			for($i=0;$i<count($pemakaian);$i++)
			{
				echo $pemakaian[$i]['nip']." - ".$pemakaian[$i]['nama']."</br>";
			}
			?></td>
        </tr>
    </table>
<div class="form-actions">
    <button class="btn btn-primary" onclick="history.go(-1)"><i class="icon-arrow-left icon-white"></i> Kembali</button>
</div><!--</div>
<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>-->