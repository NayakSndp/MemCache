<?php
	$memcache = new Memcache;
	$cacheAvailable = $memcache->connect('127.0.0.1', '11211'); // only one Memcache Server.
?>
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
				if($query){
					$key = 'empId'.$id;
					$info = array('id'=>$id, 'fname'=>$fname, 'lname'=>$lname);
					$memcache->set($key,$info);
					
				    
				}    
			}
			echo "Set 10,000 Sample Records on Memcache as well as DB. Hence Reads are expected to be from Memcache, with DB as a fallback in case Memcache does not hold record.</br>";	
		?>
		<a href="readDB.php">Read Records</a>
</body>		
</html>		