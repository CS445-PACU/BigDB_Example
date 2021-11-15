<?php
	require_once('basicErrorHandling.php');

  // Author: 			Chadd Williams
  // File: 				showWorksOn.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: get data from POST variable and run a query
 
	require_once 'connDB.php';

	$dbh = db_connect();
	$rows = []; // default value of empty
 	
	if( isset ($_POST['ProfID']) )
 	{
		 require_once('findCoursesByProfID.php');
		$ProfID = $_POST['ProfID'];
		$rows = findCoursesByProfID($dbh, $ProfID);

 	}
	 elseif (isset ($_POST['Title']))
	 {
		 //require_once('findCoursesByTitle.php');
		$Title = $_POST['Title'];
		//$rows = findCoursesByTitle($dbh, $Ttitle);
	 }
	 else
	 {
		header('Location: main.php');
	 }

	// display data in table

	print("<table>");
	foreach ($rows as $row)
	{
		print("<tr>");
		print("<td>".$row['Title']."</td>");
		print("<td>".$row['Section']."</td>");
		print("<td>".$row['LName']."</td>");
		print("</tr>");

	}
	print("</table>");
?>   
