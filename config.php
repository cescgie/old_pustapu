<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

//site address
define('DIR','http://localhost/pustapu/');
define('DOCROOT', dirname(__FILE__));

// Credentials for the local server
define('DB_TYPE','mysql');
define('DB_HOST','localhost:3306');
define('DB_NAME','testDB');
define('DB_USER','root');
define('DB_PASS','password');

// Credentials for the HTW server
/*define('DB_TYPE','mysql');
define('DB_HOST','db.f4.htw-berlin.de');
define('DB_NAME','_s0540045__products');
define('DB_USER','s0540045');
define('DB_PASS','password');*/

//set prefix for sessions
define('SESSION_PREFIX','pustapu_');

//optionall create a constant for the name of the site
define('SITETITLE','Pustapu');