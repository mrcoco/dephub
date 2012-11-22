<script>
    $(document).ready(function() {
        load(1,'');
        $('#cari').keyup(function(){
            load(1,$(this).val());
        });
    });
<?php if($this->uri->segment(3)=='list_pinjam')$url="elibrary/admin/list_pinjam_ajax/";
        else $url="elibrary/admin/list_pinjam_ajax/"
?>    
    function load(page,filter){
        $('#body_table').empty();
        $('#body_table').append('<center>Loading... <img src="<?php echo base_url()?>assets/img/spinner.gif"/></center>');
        if(filter!=''){
            $.get('<?php echo base_url().$url?>'+page+'/'+filter, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url().$url?>'+page, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    
    
</script>

<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
Search: <input type="text" id="cari" placeholder="Nama, NIP,No Peminjaman, atau judul buku" rel="tooltip" title="Masukkan Nama, NIP,No Pemesanan, atau judul buku" class="tip"/>
<div id="body_table"></div>    