<html>
    <head>
        <style>
            *{
                font-size: 10pt;
            }
            .jadwal{
                border-collapse:collapse;
            }
            .jadwal td{
                border: 1px black solid;
            }
        </style>
    </head>
    <body>
        <?php for($p=1;$p<=$week;$p++){?>
        <table width="100%" class="judul">
            <tr>
                <td width="20%">
                    <img src="<?php echo base_url()?>assets/img/logo-dephub.png" width="75" height="75">
                </td>
                <td width="60%" align="center">
                    JADWAL TENTATIVE <?php echo strtoupper($program['name']) ?>
                    <br/>
                    KEMENTRIAN PERHUBUNGAN TAHUN <?php echo $program['tahun_program'] ?>
                    <br/>
                    <?php echo $this->date->konversi4($program['tanggal_mulai'])?> S/D <?php echo $this->date->konversi4($program['tanggal_akhir'])?>
                </td>
                <td width="20%" align="right">
                    <img src="<?php echo base_url()?>assets/img/logo-dephub.png" width="75" height="75">
                </td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <table width="100%" class="jadwal">
            <tr>
                <td width="10%">
                    Hari ke/Tgl
                </td>
                <?php for($i=7*$p-6;$i<=7*$p;$i++){?>
                <td>
                    <?php echo $i?>
                </td>
                <?php }?>
            </tr>
            <tr>
                <td>/</td>
                <?php for($i=1;$i<=7;$i++){?>
                <td rowspan="2">
                    <?php echo $i?>
                </td>
                <?php }?>
            </tr>
            <tr>
                <td>
                    Waktu
                </td>
            </tr>
            <?php foreach($arr_jam as $j){?>
            <tr>
                <td width="10%">
                    <?php echo $j?>
                </td>
                <?php for($i=1;$i<=7;$i++){?>
                <td>
                    <?php echo $i?>
                </td>
                <?php }?>
            </tr>
            <?php } ?>
        </table>
        <br/>
        <br/>
        <br/>
        <?php } ?>
    </body>
</html>