
	<div class="well">
	    <h4>LOGIN</h4>
	    <p>
		<?php echo form_open('login/auth'); ?>
                <input type="text" name="user" placeholder="administrator" class="input-medium" disabled/>
		<input type="hidden" name="username" value="4"/>
		<input type="password" name="password" placeholder="password" class="input-medium"/>
		<input type="submit" class="btn btn-primary" name="submit" value="Login" />
		<?php echo form_close(); ?>
	</div>
	<div class="well">
	    <h4>USULAN PESERTA DIKLAT</h4>
	    <p><a href="site/dashboard/registrasi/" class="btn btn-success" rel="popover" title="Klik untuk melakukan usulan peserta diklat">Registrasi</a></p>
	</div>
