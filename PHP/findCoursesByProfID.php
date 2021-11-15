<?php
  // Author: 			Chadd Williams
  // File: 				findCoursesByProfID.php
  // Date:				Nov 15, 2021
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function findCoursesByProfID($dbh, $ProfID)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT Title, Section, LName, CT.ProfID, CT.CourseID FROM 
		Professors, People, CurrentlyTeaching as CT, Courses as C 
		where People.PersonID=Professors.ProfID and Professors.ProfID=:profID
		and CT.ProfID = Professors.ProfID and C.CourseID=CT.CourseID");
		$sth->bindValue(":profID", $ProfID);
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>