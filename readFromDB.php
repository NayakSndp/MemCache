
<html>
<body>
	<h3>Reads Without Memcache</h3>
	<?php
		set_time_limit(100);
		mysql_connect("localhost","root","");
		mysql_select_db("memcached_demo");
		
		$total_time = 0;
		for($j=0;$j<10;$j++){
			$time_start = microtime(true);
			for($i=0;$i<10000;$i++){
				
				$id = $i;
				$query = mysql_query("SELECT * from emp_info WHERE id = $id") or die("Error fetching data from emp_info");
					while($row = mysql_fetch_assoc($query)){
						//echo "From DB ".$row['id']." ".$row['fname']." ".$row['lname']."<br/>";
					}	
			}

			$time_end = microtime(true);
			$time = $time_end - $time_start;
			
			$total_time+= $time;
		}	
	
		echo "</br> Without Memcache: Average Time Taken for 10 Sample Reads with each reading 10,000 records (Total Reads : 10,000 * 10 = 1,00,000) = ".($total_time/10)." seconds</br>";


		
	?>
<a href="index.php"> Go Home </a>	
</body>
</html>