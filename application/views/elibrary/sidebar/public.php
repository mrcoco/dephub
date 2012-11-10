<div class="well">
    <?php echo form_open_multipart('elibrary/user'); ?> <!-- tambahin login -->
    <legend>Login</legend>
    <input type="text" name="username" placeholder="username" class="input-medium"/>
    <input type="password" name="password" placeholder="password" class="input-medium"/>
    <input type="submit" class="btn btn-primary" name="submit" value="Login" />
</form>
</div>      
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Kategori file</li>
        <li ><a href="#"><i class="icon-file icon-white"></i>Kategori 1</a></li>
        <li><a href="#"><i class="icon-film"></i>Kategori 2</a></li>
        <li><a href="#"><i class="icon-picture"></i>Kategori 3</a></li>
        <li><a href="#"><i class="icon-book"></i>Kategori 4</a></li>
        <li class="divider"></li>
        <li><a href="#">Peraturan</a></li>
        <li><a href="#">Tentang E-library</a></li>
    </ul>
</div>
