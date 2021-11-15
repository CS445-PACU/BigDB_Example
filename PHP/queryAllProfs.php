<?php
  // Author: 			Chadd Williams
  // File: 				queryAllProfs.php
  // Date:				Nov 15, 2021
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: demonstrate a function to run an SQL query and return
  // 							the results as an array

  
	function queryAllProfs($dbh)
	{
		$rows = array();

		$sth = $dbh -> prepare("SELECT ProfID, FName, LName FROM Professors, People where People.PersonID=Professors.ProfID");
		try
		{
			// run the query
			$sth -> execute();
		}
		catch(PDOException $e)
		{
			print("The query failed.\n");
			print("Code: ".$e->getCode(). "\n");
			print("Message: ". $e->getMessage() . "\n");
		}

		while ($row = $sth -> fetch())
		{
			$rows[] = $row;
		}
		return $rows;
	}
?>