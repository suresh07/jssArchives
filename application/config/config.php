<?php

define('BASE_URL', 'http://localhost/jss-nosql/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('DATA_URL', PUBLIC_URL . 'metaData/');
define('METADATA_URL', PUBLIC_URL . 'data/');
define('JSON_PRECAST_URL', BASE_URL . 'json-precast/');
define('FLAT_URL', BASE_URL . 'application/views/flat/');
define('STOCK_IMAGE_URL', PUBLIC_URL . 'images/stock/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/jss-nosql/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_DATA_URL', PHY_PUBLIC_URL . 'metaData/');
define('PHY_METADATA_URL', PHY_PUBLIC_URL . 'data/');
define('PHY_JSON_PRECAST_URL', PHY_BASE_URL . 'json-precast/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_STOCK_IMAGE_URL', PHY_PUBLIC_URL . 'images/stock/');

define('DB_HOST', '127.0.0.1');
define('DB_PORT', '27017');
define('DB_NAME', 'jssArchives');
define('DB_USER', 'jssUSER');
define('DB_PASSWORD', 'jss123');

// Git config
define('GIT_USER_NAME', 'shruthisdst');
define('GIT_PASSWORD', 'shruthitr14');
define('GIT_REPO', 'github.com/SrirangaDigital/jss-nosql.git');
define('GIT_REMOTE', 'https://' . GIT_USER_NAME . ':' . GIT_PASSWORD . '@' . GIT_REPO);
define('GIT_EMAIL', 'shruthitr.nayak@gmail.com');

?>
