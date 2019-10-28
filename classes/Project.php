<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Project{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function checkUserName($username){
		$query 	= "SELECT * FROM user WHERE username = '$username'";
		$getuser 	= $this->db->select($query);

		if ($username == "") {
			echo "<span class='error'>Please Enter User Name</span>";
			exit();
		}
		elseif ($getuser) {
			echo "<span class='error'><strong>".$username."</strong> is not available...!!</span>";
			exit();
		}else{
			echo "<span class='success'><strong>".$username."</strong> is available</span>";
			exit();
		}
	}

	public function autoComplete($skill){
		$query 		= "SELECT * FROM skill WHERE skill_name LIKE '%$skill%'";
		$getskill 	= $this->db->select($query);
		$result 	= '';
		$result 	.= '<div class="autocomplete-val"><ul>';

		if ($getskill) {
			while ($data = $getskill->fetch_assoc()) {
				$result .= '<li>'.$data['skill_name'].'</li>';
			}
		}else{
			$result 	.= '<li> No Result Found</li>';
		}
		$result .= '</ul></div>';
		echo $result;
	}

	public function autoRefresh($body){
		$query 		= "INSERT INTO refresh (body) VALUES ('$body')";
		$putContent	= $this->db->insert($query);
	}

	public function getWithoutRefresh(){
		$query 		= "SELECT * FROM refresh ORDER BY id";
		$getcontent 	= $this->db->select($query);
		$result 	= '';
		$result 	.= '<div class="autocomplete-val"><ul>';

		if ($getcontent) {
			while ($data = $getcontent->fetch_assoc()) {
				$result .= '<li>'.$data['body'].'</li>';
			}
		}else{
			$result 	.= '<li> No Result Found</li>';
		}
		$result .= '</ul></div>';
		echo $result;
	}

	public function liveSearch($search) {
		$query 		= "SELECT * FROM search WHERE username LIKE '%$search%'";
		$getdata 	= $this->db->select($query);
		if ($getdata) {
			$data = '';
			$data .= '<table class="tblsearch"><tr>';
			$data .= 	'<th>Username</th>
						<th>Name</th>
						<th>Email</th> </tr>';
			while ($result = $getdata->fetch_assoc()) {
				$data .= '<tr>
						<td>'.$result["username"].'</td>
						<td>'.$result["name"].'</td>
						<td>'.$result["email"].'</td>
						</tr>';
			}
			$data .= '</table>';
			echo $data;

		}else{
			echo "No Data Found.";
		}
	}

	public function autoSave($comment, $commentid){
		if ($commentid !='') {
			$query 		= "UPDATE autosave
							SET
								comment = '$comment'
							WHERE id 	= '$commentid'";
			$update_row = $this->db->update($query);
		}else{
			$query 		= "INSERT INTO autosave (comment, status) VALUES ('$comment', 'Draft')";
			$insertdata	= $this->db->insert($query);
			$lastid 	= $this->db->link->insert_id;
			echo $lastid;
			exit();
		}
	}
}
?>