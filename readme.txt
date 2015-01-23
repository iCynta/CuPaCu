

1: Create Db: copacu_db
2: Export Db file :copacu_db.sql


3:Configure "variables.php"  in /f/php/variables.php

"$do" is the domain starting of all links

$do="http://localhost/";     //   http://www.copacu.com/"   

4:This website may be showing some errors when running in local host because it is accessing one external link

Configure "session.php"  in /f/php/session.php

copy and paste the below code on line 17 of session.php

$user_ip ="127.0.0.1";   // getenv('REMOTE_ADDR');