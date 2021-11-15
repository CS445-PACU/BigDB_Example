<?php
  // Author: 			Chadd Williams
  // File: 				queryFunction.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function queryAllProfs($dbh)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT ProfID, FName, LName FROM Professors, People where People.PersonID=Professors.ProfID");
		// run the query
		$sth -> execute();

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>