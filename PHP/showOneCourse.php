<?php
	require_once('basicErrorHandling.php');

  // Author: 			Chadd Williams
  // File: 				showOneCourse.php
  // Date:				Nov 15, 2021
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: get data from POST variable and run a query
 
	require_once 'connDB.php';

	$dbh = db_connect();
	$rows = []; // default value of empty
 	
	if( isset ($_GET['ProfID']) && isset($_GET['CourseID']) )
 	{
		 require_once('findCourseByProfIDCourseID.php');
		$ProfID = $_GET['ProfID'];
		$CourseID = $_GET['CourseID'];
		$rows = findCoursesByProfIDCourseID($dbh, $ProfID,$CourseID);
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
		print("<td>Title: ".$row['Title']."</td>");
		print("<td>Section: ".$row['Section']."</td>");
		print("<td>MaxSize: ".$row['MaxSize']."</td>");
		print("<td>Enrolled: ".$row['Enrolled']."</td>");
		print("<td>Professor: ".$row['LName']."</td>");
		print("</tr>");

	}
	print("</table>");
	dba_close($dbh);
?>   
