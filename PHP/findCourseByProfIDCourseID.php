<?php
  // Author: 			Chadd Williams
  // File: 				queryFunction.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function findCoursesByProfIDCourseID($dbh, $ProfID, $CourseID)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT Title, Section, LName, MaxSize, count(*) as Enrolled FROM 
		Professors, People, CurrentlyTeaching as CT, Courses as C, CurrentlyEnrolled as CE
		where People.PersonID=Professors.ProfID and Professors.ProfID=:profID and 
		C.CourseID=:courseID
		and CT.ProfID = Professors.ProfID and C.CourseID=CT.CourseID 
		and CE.CourseID=C.CourseID
		Group by C.CourseID, Professors.ProfID		
		");
		$sth->bindValue(":profID", $ProfID);
		$sth->bindValue(":courseID", $CourseID);

		print_r($sth);
		
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>