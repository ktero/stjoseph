		<?php

		$studentedit_key= $_GET['studentedit_key'];
		$connection= mysql_connection('localhost','root','');
		mysql_select_db('sjhs');

		$query= "SELECT * FROM student where StudentID= $studentedit_key";

		$result= mysql_query($query);
		mysql_close($connection);
		?>