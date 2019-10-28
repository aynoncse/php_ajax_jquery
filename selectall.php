<?php include 'inc/header.php'; ?>
<style type="text/css" media="screen">
	#datepicker {
	width: 180px;
	float: left;
}
#datepicker > span:hover{cursor: pointer;}

#datepicker > .form-control[readonly]{
	background-color: #fff;
	opacity: 1;
}

#datepicker > .input-group-addon {
	color: #0000FF;
	background-color: #87CEEB;
}
.datepicker-days table {
	width: 360px;
}
.datepicker-days table thead{
	background-color: #1585aa;
	color: #193e42;
}
.datepicker-days table tbody{
	background-color: #129385;
	color: #fff
}
.datepicker-days table tbody td{
	cursor: pointer;
	border: 1px solid #34A294;
	text-align: center;
}
.datepicker-days table tbody td:hover {
	background-color: #c82f24;
}
</style>
<h2>Ajax: Select All</h2>

<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-attendence'])) {
		$attend_id		= $_POST['attendence'];
		$attend_date 	= $_POST['attend-date'];

		$count			= sizeof($attend_id);
		echo $count."<br>";
		print_r($attend_id);
	}
?>

<div class="content">
	<div class="panel-heading clearfix">
		<form name="attend-date" action="" method="post" class="header-form">
			<div class="form-group form-data input-group pull-left">
				<select name="group" id='group' required="required" class="select-item">
					<option disabled selected value>Select a Group</option>
					<?php
					$query = "SELECT * FROM groups WHERE teacher_id='1830019'";
					$groups_query = $db->select($query);

					if ($groups_query) {
						while ($groupsData = $groups_query->fetch_assoc()) { ?>
					<option value="<?php echo $groupsData['course_id']."-".$groupsData['fac_id']."-".$groupsData['prog_id']."-".$groupsData['group_no'];?>">
						<?php echo $groupsData['course_id'];?> Group <?php echo $groupsData['group_no'];?>
					</option>';
						<?php }} ?>
				</select>

			</div>
			
		</form>
	</div>
<script>
	$('#group').on('change', function() {
	  var value = $(this).val();
	  if (value != '') {
			$.ajax({
				url:"check/getstudent.php",
				method:"POST",
				data:{group:value},
				dataType:"text",
				success:function(data){
					$('#statuslive').html(data);
				}
			});
		}else{
			$('#statuslive').html('');
		}
	});
</script>
	<div id="statuslive"></div>
</div>
<?php include 'inc/footer.php'; ?>