<?php if($queue){
    echo '<div class="well">Pesanan anda ada yang aktif.<br />';
    foreach ($queue as $number => $n) {
        $date = new DateTime($queue[$number]['availabledate']);
        if($date->format('D')=='Fri'||$date->format('D')=='Thu')
            $date->modify('+4 day');
        else $date->modify('+2 day');
        switch($date->format('N')){
            case 1: $hari='Senin'; break;
            case 2: $hari='Selasa'; break;
            case 3: $hari='Rabu'; break;
            case 4: $hari='Kamis'; break;
            case 5: $hari='Jumat'; break;
            case 6: $hari='Sabtu'; break;
            case 7: $hari='Minggu'; break;
        }
        echo $queue[$number]['title'].' paling lambat '.$hari.', '.$date->format('Y-m-d').'<br />';
    }
    echo '</div>';
} ?>
<div class="well">
    <h2>Pencarian</h2>
    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="button">Search</button>
    </div>
    </form>
</div>
    <div class="row">
        <div class="span4">
            <h2>File Terbaru</h2>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="75%">Nama file</th>
                        <th width="25%">Size</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>File1</td>
                        <td>10MB</td>
                    </tr>
                    <tr>
                        <td>File2</td>
                        <td>100MB</td>
                    </tr>                            
                </tbody>
            </table>
        </div>
        <div class="span4">
            <h2>Informasi</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna non turpis laoreet sed blandit velit accumsan. Nulla posuere tortor eu est egestas iaculis. Curabitur semper, urna sed elementum rutrum, lacus justo scelerisque mi, quis sodales risus est id enim. 
            </p>
        </div>
    </div>