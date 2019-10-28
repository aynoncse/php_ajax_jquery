<?php include 'inc/header.php'; ?>
<h2>Ajax: Auto Complete Text Box</h2>
<div class="content">
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" id="username" value="" placeholder="Enter User Name"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input type="password" name="password" id="password" placeholder="Enter Your Password"/>
				</td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="button" name="submit" id="showpassword">Show Password</button>
				</td>
			</tr>
		</table>
	<div id="statuspassword"></div>
	</form>		
	
</div>
<?php include 'inc/footer.php'; ?>