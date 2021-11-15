<?php
	// Author: 			Chadd Williams
  // File: 				main.php
  // Date:				MNov 15, 2021
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: skeleton file for PHP/HTML mix

 	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	
	session_start();

	 $dbh = db_connect();
?>

<html>

	<head>
		<title>Search CLasses</title>
	</head>

	<body>

	<form method="post" action="showCourseList.php">
		Title: <input type="text" Name="Title"/>
		<input type="submit" name="Search" value="Search"/>
</form>

<form method="post" action="showCourseList.php">
	Professor:
	<select NAME="ProfID">
		<?php
			require_once('queryAllProfs.php');
			$allProfs = queryAllProfs($dbh);

			foreach ($allProfs as $prof)
			{
				print("<option value=" . $prof['ProfID'].">".
				$prof['FName']. " " . $prof['LName']."</option>");
			}
		?>
    </select>
      <input TYPE="submit" NAME="Search" VALUE="Search" />


		</form>
	</body>

</html>

<?php
	db_close($dbh);
?>