<?php include 'inc/header.php'; ?>
<h2>Ajax: Auto Save Data</h2>
<div class="content">
	<form action="" method="post">
		<table>
			<tr>
				<td>Comment</td>
				<td>:</td>
				<td>
					<textarea name="comment" id="comment" cols="30" rows="20" style="resize: none; min-height: 100px;"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="hidden" name="commentid" id="commentid">
				</td>
			</tr>
		</table>
	<div id="statusautosave"></div>
	</form>		
	
</div>
<?php include 'inc/footer.php'; ?>