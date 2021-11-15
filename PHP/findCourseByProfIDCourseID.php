<?php
  // Author: 			Chadd Williams
  // File: 				findCoursesByProfIDCourseID.php
  // Date:				Nov 15, 2021
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function findCoursesByProfIDCourseID($dbh, $ProfID, $CourseID)
	{
		$rows = array();


		// this is a tricky query since you want to show courses with
		// zero students.  So a LEFT JOIN with CurrentlyEnrolled is necessary.
		// This means you always get at least 1 row back, so you can't just
		// count the rows to determine how many students are enrolled.
		//
		// CE.CourseID is NULL if no students are enrolled.
		// use a CASE (like a switch in C++) to check for NULL to determine 
		// if there is an enrolled student.

		// NOTE: the database does not track student per course section so
		// the Enrolled calculation is only best effort.
		$sth = $dbh -> prepare("SELECT Title, Section, LName, MaxSize, sum(CASE WHEN CE.CourseID is NULL THEN 0 ELSE 1 END) as Enrolled FROM 
		Professors, People, CurrentlyTeaching as CT, Courses as C left join CurrentlyEnrolled as CE 
		on (C.CourseID=CE.CourseID)
		where People.PersonID=Professors.ProfID and Professors.ProfID=:pID and 
		C.CourseID=:cID
		and CT.ProfID = Professors.ProfID and C.CourseID=CT.CourseID 
		Group by C.CourseID, Professors.ProfID		
		");
		$sth->bindValue(":pID", $ProfID);
		$sth->bindValue(":cID", $CourseID);

		//print_r($sth);
		
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>