<?php

require 'layout.php';

require 'connectdb.php';

$date1 = date("Y-m-d");
$today = strtotime($date1);	
$sql = "SELECT * from tasks ORDER BY `tasks`.`pin` DESC,  `tasks`.`priority` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
	$date = $row['duedate'];
	$time2 = strtotime($date);
	$difference=$today-$time2;
	$task=$row['task'];
	$des = $row['description'];
	$label=$row['label'];
	$status=$row['done'];
			$pin=$row['pin'];

		$priority=$row['priority'];
			if($difference==0){
			echo '<div class="today tasks">
			<fieldset>
				<legend>Task Details';
				if($pin=="Yes")
					echo '<img id="pin" src="https://png.icons8.com/dusk/50/000000/attach.png"><br>';
				echo '</legend><b> Taskname : '.$task.'</b>
				<br><br><br>
				 Description : '.$des.'
				<br><br><br>
				 Due date : '.$date.'
				<br><br><br>
				 Label : '.$label.'
				<br><br><br>
				 Status : '.$status.'<br><br><br> Priority : '.$priority.'<br><br><br>
				<button class="edit" value="Edit">Edit</button>
				<button class="cancel" value="Cancel">Cancel</button>
			</fieldset>
			</div>';
		}
	}
}

$sql = "SELECT * from tasks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$date = $row['duedate'];
		$time2 = strtotime($date);
		$difference=$today-$time2;
		$task=$row['task'];
		$des = $row['description'];
		$label=$row['label'];
		if($difference>0){
			echo '<div class="prev tasks">
			<fieldset>
				<legend>Task Details</legend>
				<b> Taskname : '.$task.'</b>
				<br><br><br>
				 Description : '.$des.'
				<br><br><br>
				 Due date : '.$date.'
				<br><br><br>
				 Label : '.$label.'
				<br><br><br>
				<button class="edit" value="Edit">Edit</button>
				<button class="cancel" value="Cancel">Cancel</button>
			</fieldset>
			</div>';
		}
	}
}


$sql = "SELECT * from tasks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$date = $row['duedate'];
		$time2 = strtotime($date);
		$difference=$today-$time2;
		$task=$row['task'];
		$des = $row['description'];
		$label=$row['label'];	
		if($difference<0){
			echo '<div class="next tasks">
			<fieldset>
				<legend>Task Details</legend>
				<b> Taskname : '.$task.'</b>
				<br><br><br>
				 Description : '.$des.'
				<br><br><br>
				 Due date : '.$date.'
				<br><br><br>
				 Label : '.$label.'
				<br><br><br>
				<button class="edit" value="Edit">Edit</button>
				<button class="cancel" value="Cancel">Cancel</button>
			</fieldset>
			</div>';
		}
	}

	
}

require 'layout2.php';

?>