<div class="row">
    <div class="span3">
        <div class="well">
            <?php echo form_open_multipart('elibrary/user');?> <!-- tambahin login -->
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
    </div>
    <div class="span9">
        <div class="input-append">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Cari file" class="input-xlarge"/><button class="btn" type="button">Search</button>
            </form>                
            <h1>Selamat Datang</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna non turpis laoreet sed blandit velit accumsan. Nulla posuere tortor eu est egestas iaculis. Curabitur semper, urna sed elementum rutrum, lacus justo scelerisque mi, quis sodales risus est id enim. Aenean molestie augue id tortor elementum auctor. Sed eleifend erat porta justo gravida convallis. Maecenas ut ipsum sit amet tellus lacinia mattis. Vivamus sit amet sapien tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
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
        </div>
    </div>
</div>