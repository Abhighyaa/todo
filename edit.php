<?php
	session_start();
	include 'layout.php';

	$text = $_REQUEST['text'];


	$array = explode(' ', $text);
	//print_r($array);
		
	foreach ($array as $key=>$a) {
	 	
		
		if($a=="Taskname"){
			$nameKeyB = $key+2;
			
		}
		if($a=="Description"){
			$nameKeyE = $key-1;
			$descKeyB = $key+2;
			
		}

		if($a=="Due"){
			$descKeyE = $key-1;
			$dueKeyB = $key+3;
		}

		if($a=="Label"){
			$labelKeyB = $key+2;
		}

		if($a=="Status"){
			$labelKeyE=$key-1;
			$statusKeyB=$key+2;
		}

		if($a=="Priority"){
			$statusKeyE = $key-1;
			$priorityKeyB=$key+2;
		}

	}

$taskname ="";
for($i=$nameKeyB;$i<=$nameKeyE;$i++)
	$taskname .= $array[$i]." ";

$desc= "";
for($i=$descKeyB;$i<=$descKeyE;$i++)
	$desc .= $array[$i]." ";

$due=$array[$dueKeyB];

$label="";
for ($i=$labelKeyB; $i <=$labelKeyE ; $i++) { 
	$label .=$array[$i]." ";
}

$status="";
for ($i=$statusKeyB; $i <=$statusKeyE; $i++) { 
	$status .=$array[$i]." ";
}
//echo "$status";
$priority = $array[$priorityKeyB];
//echo "$priority";

$_SESSION['taskname']=$taskname;
$_SESSION['desc']=$desc ;
$_SESSION['due']=$due;
$_SESSION['status']=$status;
$_SESSION['priority']=$priority;
?>
<form id="savechanges" action="savechanges.php" method="POST">
	<fieldset>
		<legend>Create Task</legend>
			<label>What needs to be done?</label><br>
			<input type="text" id="taskname"name="taskname" value="<?php echo $taskname;?>"><br><br>
			<label>Description</label><br>
			<textarea name="description" id="description"><?php echo $desc;?></textarea><br><br>
			<label>Any due dates?</label><br>
			<input type="date" name="date" id="date" value="<?php echo $due;?>" onfocus="<?php echo $due;?>" min="2018-05-30"><br><br>
			<label>Label</label><br>
			<input list="label" type="label" id="label" name="label" value="<?php echo $label;?>">
			<datalist id="label">
				<?php include 'options.php'?>
			</datalist><br><br><br>
			<label>Status</label>
			<select type="status" name="status" id="status">
			
				<option <?php if($status == 'Not Completed') echo "selected" ; ?>>Not Completed</option>
				<option <?php if($status == 'In progress') echo "selected" ;?>>In progress</option>
				<option <?php if($status == 'Completed') echo "selected" ;?>>Completed</option>
			</select>
			<br><br><br>
			<label>Priority</label>
			<select id="priority" name="priority">
				<option  <?php if($priority == 'Normal') echo "selected" ; ?>>Normal</option>
				<option  <?php if($priority == 'Urgent') echo "selected" ; ?>>Urgent</option>
			</select>
			<br><br><br>
			<label>Pin to profile</label>
			<input type="radio" name="pin" value="Yes">Yes
			<input type="radio" name="pin" value="No">No				
			<!--<a href="#" id="cancel">Cancel</a>-->
			<input type="submit" name="Save changes" value="Save changes" >
	</fieldset>
</form>	


<?php
include 'layout2.php';
?>