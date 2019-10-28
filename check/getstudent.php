
<?php
   $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	$db = new Database();
?>
<?php 
		if (isset( $_POST['group'])) {
			$group 			= $_POST['group'];
			$course 		= explode('-', $group);
			$course_id 		= $course[0];
			$fac_id 		= $course[1];
			$prog_id 		= $course[2];
			$group_no 		= $course[3];
			$query = "SELECT student.name, student.id FROM teaches LEFT JOIN student ON student.id = teaches.student_id WHERE teaches.course_id = '$course_id' AND teaches.group_no='$group_no'";
			$student_query = $db->select($query);
		}

		
?>
<div class="panel-body">
	<form name="attendance" action="" method="post">
		<div id="datepicker" class="form-group form-data input-group date" data-date-format="dd-mm-yyyy">
				    	<input name="attend-date" id="date" class="form-control" type="text" readonly />
				    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		<table class="table table-striped" style="margin-top: 35px;">

			<thead>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="checkbox" id="checkAll">Select All</td>
				</tr>
				<tr>
					<th width="10%">Serial</th>
					<th width="40%">Name</th>
					<th width="30%">Id</th>
					<th width="20%">Attendance</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if ($student_query) {
					$i= 0;
					while ($students = $student_query->fetch_assoc()) {
						$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $students['name'];?></td>
							<td><?php echo $students['id'];?></td>
							<td>
								<input type="checkbox" name="attendence[]" value="<?php echo $students['id'];?>">
							</td>
						</tr>
					<?php }} else{?>
						<tr>
							<td colspan="4" class="alert-danger error blink" align="center" style="font-size: 24px;">
								Empty Group!!
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="4">
							<input class="btn btn-primary" type="submit" name="submit-attendence" value="Submit">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
<script>
	 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>
<script type="text/javascript">
	$(function () {
		$('#datepicker').datepicker();
	});
</script>