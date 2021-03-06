
<html lang="en">
	<head>
		<title>academic</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="main.css" rel="stylesheet" type="text/css"/>
	</head>

	<body >
		<div class="container">
		
		<header>
			<p><img src="ut.png" alt="ut" style="width:70px;height:70px;margin-left:15px;"></p>
			<h1 id="branding">CSCB20 - Introduction to Database and Web Applications</h1>
		</header>
		
		<nav>
			<li><a class="active" href="academic.php">Back</a></li>			
		</nav>

		<main>
			<!-- table to show the marks of all the students to instructor -->
			<p><h1>Marks</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<table class="data-table">
				<!-- table body -->
				<thead>
					<tr>
						<th>UTORid</th>
						<th>Quiz1</th>
						<th>Quiz2</th>
						<th>Quiz3</th>
						<th>Midterm</th>
						<th>Assignment1</th>
						<th>Assignment2</th>
						<th>Assignment3</th>
						<th>Final</th>
					</tr>
				</thead>
				
				<!-- php body -->
				<tbody >
					<?php
						include('../config.php');
						session_start();

						// Get students'id and which part he wants to remark
						$mysql = "SELECT * FROM Mark";
						$result = mysqli_query($db, $mysql);

						// Move what we get from table "Mark" to the table in HTML
						if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>
								<td>'.$row['UTORid'].'</td>
								<td>'.$row['quiz1'].'</td>
								<td>'.$row['quiz2'].'</td>
								<td>'.$row['quiz3'].'</td>
								<td>'.$row['midterm']. '</td>
								<td>'.$row['assignment1'].'</td>
								<td>'.$row['assignment2'].'</td>
								<td>'.$row['assignment3'].'</td>
								<td>'.$row['final']. '</td>
								</tr>';
							}
						}
					?>
				</tbody>

			</table>
			
			<p><h1>Remark Requests</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<!-- table to show all the remark requests to instructor -->
			<table class="data-table">
					<thead>
						<tr>
							<th>UTORid</th>
							<th>Remark</th>
							<th>Message</th>
						</tr>
					</thead>
					<tbody>
						<?php
							// select the remark requests from database
							$sql = "SELECT * FROM Remark";
							$result1 = mysqli_query($db,$sql);
							if(mysqli_num_rows($result1) > 0){
								while ($row1 = mysqli_fetch_assoc($result1)) {
									// change the int type to the corresponding
									if ($row1['remarkreq'] == 1)	$mark = "Quiz1";
									if ($row1['remarkreq'] == 2)	$mark = "Quiz2";
									if ($row1['remarkreq'] == 3)	$mark = "Quiz3";
									if ($row1['remarkreq'] == 4)	$mark = "Midterm";
									if ($row1['remarkreq'] == 5)	$mark = "Assignment1";
									if ($row1['remarkreq'] == 6)	$mark = "Assignment2";
									if ($row1['remarkreq'] == 7)	$mark = "Assignment3";
									if ($row1['remarkreq'] == 8)	$mark = "Final";
									echo '<tr>
									<td>'.$row1['UTORid'].'</td>
									<td>'.$mark.'</td>
									<td>'.$row1['message'].'</td>
									</tr>';
								}
							}
						?>
					</tbody>
			</table>
			
			<form action="changemark.php" method="POST">
				<!-- place can update the mark of students -->
				<p><h1>Update Marks</h1></p>
				<HR style="border:1  black" width="100%" color=black SIZE=1>
				<a>Enter Student's UTORid</a>
					<input type="text" name="Studentid" required>
				<a>Select type</a>
					<select name="markop" id="type1">
						<option value=Null selected>--SELECT--</option>
						<option value="1">Quiz1</option>
						<option value="2">Quiz2</option>
						<option value="3">Quiz3</option>
						<option value="4">Midterm</option>
						<option value="5">Assignment1</option>
						<option value="6">Assignment2</option>
						<option value="7">Assignment3</option>
						<option value="8">Final</option>
					</select><br>
				<a>Enter Mark:</a>
					<input type="text" name="mark" required><br>
				<input style="margin-top:10px" type="submit" name="" value="Update">

			</form>

			<p><h1>Anonymous Feedback</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<!-- feedback body here -->
			
			<?php
				// Get all anonymously feedback
				$mysql = "SELECT * FROM Feedback";
				$result = mysqli_query($db, $mysql);

				// Move what we get from table "Feedback" to website
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['feedback'];
						echo "<br>";
					}
				}
			?>

        </main>

	<footer>
		<a href="http://web.cs.toronto.edu/">cs lab</a>
		<p>Copyright © Wenyun Liu, Xinyi Liao</p>
	</footer>

		</div>	
	</body>
</html>