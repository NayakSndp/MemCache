
<html>
<body>
<h3>Memcached <span>(Please keep open your console)</span></h3>
		<?php
			mysql_connect("localhost","root","") or die("Error Connecting to MySQL");
			mysql_select_db("memcached_demo") or die("Error choosing database memcached_demo");
			mysql_query("DELETE from emp_info") or die("Error clearing emp_info");
			for($i=0;$i<10000;$i++){
				$id = $i;
				$fname = "fname".$i;
				$lname = "lname".$i;
				$query = mysql_query("INSERT into emp_info(id,fname,lname) VALUES($id,'$fname','$lname')") or die("Error Inserting data into database!!");
				
			}
			echo "Set 10,000 Sample Records only in DB. Hence all Reads should be from DB.</br>"; 	
		?>
		<a href="readFromDB.php">Read Records</a>
</body>		
</html>		