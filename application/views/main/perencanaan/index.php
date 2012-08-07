Daftar Diklat Tahun 
<div>
    DIKLAT PRAJABATAN
    <?php $this->lib_perencanaan->print_child($program,1) ?>
</div>
<div>
    DIKLAT DALAM JABATAN
    <div>
        Diklat Kepemimpinan
        <?php $this->lib_perencanaan->print_child($program,4) ?>
    </div>
    <div>
        Diklat Fungsional
        <div>
            Diklat Fungsional Keahlian
            <?php $this->lib_perencanaan->print_child($program,8) ?>
        </div>
        <div>
            Diklat Teknis Fungsional
            <?php $this->lib_perencanaan->print_child($program,9) ?>
        </div>
    </div>    
</div>
<div>
    DIKLAT TEKNIS
    <div>
        Diklat Teknis Umum
        <?php $this->lib_perencanaan->print_child($program,6) ?>
    </div>
    <div>
        Diklat Teknis Manajemen
        <?php $this->lib_perencanaan->print_child($program,7) ?>
    </div>    
</div>
