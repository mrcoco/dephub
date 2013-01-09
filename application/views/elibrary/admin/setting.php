<div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
<?php echo form_open_multipart('elibrary/admin/do_setting');?>
<div>Denda per hari: <input type="text" name="late_fee" value="<?php echo $setting[0]['late_fee'];?>" /></div>
<input type="submit" class="btn btn-primary">
</form>