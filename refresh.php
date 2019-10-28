.
<?php include 'inc/header.php'; ?>
<h2>Ajax: Auto Refresh Div Content</h2>
<div class="content">
	<form action="" method="get" accept-charset="utf-8">
		<table>
			<tr>
				<td>Content</td>
				<td>:</td>
				<td><textarea name="body" id="body" cols="30" rows="20" style="resize: none; min-height: 100px;"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="autosubmit" id="autosubmit" value="Post"></td>
			</tr>
		</table>
	</form>
	
	<div id="autostatus">
		
	</div>
</div>
<?php include 'inc/footer.php'; ?>