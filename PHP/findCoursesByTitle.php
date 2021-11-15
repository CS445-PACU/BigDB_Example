<?php
  // Author: 			Chadd Williams
  // File: 				queryFunction.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function findCoursesByTitle($dbh, $Title)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT Title, Section, LName FROM 
		Professors, People, CurrentlyTeaching as CT, Courses as C 
		where People.PersonID=Professors.ProfID and Title like :title
		and CT.ProfID = Professors.ProfID and C.CourseID=CT.CourseID");
		$sth->bindValue(":title", "%$Title%");
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>