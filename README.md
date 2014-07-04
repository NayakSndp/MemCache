MemCache
========

### Objective
 
 - MemCache is an Object Storage system that resides between the Application Server and the Database Server.
 - The ides is, for queries that require large amount of computation involving iterating through millions of records, we add the content as a key/value pair in MemCache (Stores in RAM. Default Size: 64MB).
 - Next time around the same data is required, instead of querying the database again, we look for changes in the data. If no changes are found we fetch directly from MemCache.
 - All writes are written to both MemCache and DB. But reads are done only from MemCache with DB as a fallback incase MemCache dosen't have the data.
 - By doing this, most time consuming queries can be made to not query the database directly, thereby reducing the load on the database server.



### Performance Evaluation with MemCache

 - Used PHP & MySQL Database Server.
 - Added 10,000 records in the database (Scenario 1: Set the same on MemCache;Scenario 2: Did not use the MemCache and set directly on the database.)
 - Considered average time for 10 Reads from the database with each read, reading 10,000 records.
 - Ran the above tests with and without MemCache.


### Results Observed

 - Average time taken to read (10 * 10,000 = 1,00,000) Records from MemCache is half as that reading the same sets from the database directly.
 - Load on the database was reduced by half.


### Other Features of MemCache

 - MemCache size by default is 64MB, but can be increased.
 - Data can be cached on MemCache only for a particular time, after which data is wiped out.





