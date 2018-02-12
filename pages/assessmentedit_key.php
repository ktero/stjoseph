
		<?php

		$edit_key= $_GET['assessmentedit_key'];
		$connection= mysql_connection('localhost','root','');
		mysqli_select_db($connection,'sjhs');

		$query= "SELECT * FROM fees where Fee_code=" .$row[0];

		$result= mysqli_query($query);
		mysqli_close($connection);
		?>