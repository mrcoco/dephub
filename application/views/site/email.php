<div class="row">
    <div class="span12" align="center">
	<a href="http://mail.ppsdma.bpsdm.dephub.go.id/" class="btn btn-info">Login via Zimbra</a>
    </div>
    <hr />
    <div class="span6 offset3" align="center">
	<div class="well">
	    <h4>Login Zimbra</h4>
	    <hr />
	    <form method="POST" action="http://mail.ppsdma.bpsdm.dephub.go.id/" name="loginForm" accept-charset="UTF-8">
		<input type="hidden" name="loginOp" value="login" />
		<table>
		    <tr>
			<td width="120">Username</td>
			<td><input type="text" name="username" /></td>
		    </tr>
		    <tr>
			<td>Password</td>
			<td><input type="password" name="password" /></td>
		    </tr>
		    <tr>
			<td>&nbsp;</td>
			<td>
			    <input type="submit" class="btn btn-success" value="Login"/> &nbsp;
			    <input id="remember" value="1" type="checkbox" name="zrememberme" /> Remember me
			</td>
		    </tr>
		    <tr>
			<td colspan="2">
			    <hr />
			</td>
		    </tr>
		    <tr>
			<td>Version</td>
			<td>
			    <select id="client" name="client" onchange="clientChange(this.options[this.selectedIndex].value)" class="input-small">
				<option value="preferred" selected=""> Default</option>
				<option value="advanced"> Advanced (Ajax)</option>
				<option value="standard"> Standard (HTML)</option>
				<option value="mobile"> Mobile</option>
			    </select>
			</td>
		    </tr>
		</table>
	    </form>
	</div>
    </div>
</div>