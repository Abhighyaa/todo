<?php

$labelreq = $_REQUEST['label'];

require 'layout.php';

require 'connectdb.php';

$sql = "SELECT * from tasks ORDER BY `tasks`.`pin` DESC,  `tasks`.`priority` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

		$task=$row['task'];
		$des = $row['description'];
		$date=$row['duedate'];
		$label=$row['label'];
		$status=$row['done'];
		$priority=$row['priority'];
		$pin=$row['pin'];
		if($label==$labelreq){

			echo '<div class="today tasks">
			<fieldset>
				<legend>'.$labelreq.' Task Details';
				if($pin=="Yes")
					echo '<img id="pin" src="https://png.icons8.com/dusk/50/000000/attach.png"><br>';
				echo '</legend>
				<b> Taskname : '.$task.'</b>
				<br><br><br>
				 Description : '.$des.'
				<br><br><br>
				 Due date : '.$date.'
				<br><br><br>
				 Label : '.$label.'
				<br><br><br>
				 Status : '.$status.'
				 <br><br><br> 
				 Priority : '.$priority.'<br><br><br>
				  Pinned : '.$pin.'<br><br><br>
				<button class="edit" value="Edit">Edit</button>
				<button class="cancel" value="Cancel">Cancel</button>
			</fieldset>
			</div>';


		}		

	}

}

else{
	echo 'No to do lists for '.$labelreq.' label yet!!Create one !';

}

require 'layout2.php';

?>
