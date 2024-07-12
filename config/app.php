<?php
define('DB_HOST','localhost');
define('DB_NAME', 'arafat_crm');
define('DB_USER','root');
define('DB_PASS','123456');


# Default Site Title ...
define("SITE_TITLE","CRM");

# Set Default TimeZone
define("APP_TIME_ZONE", "Asia/Dhaka");

# encryption keys
define("ENCRYPTION_METHOD", "AES-256-CBC");
define("SECRET_KEY", "This is my secret key");
define("SECRET_IV", "This is my secret iv");

# end encryption keys


# What Type of Mail use ....
# Set PHP_MAILER or PHP_SMTP
# define('MAIL_TYPE', 'PHP_MAILER');
define('MAIL_TYPE', 'PHP_SMTP');


# set the Gmail mail name and password to send the mail
# set the Gmail mail name and password to send the mail

define('SMTP_MAIL', "247clippingpath@gmail.com");
define('SMTP_PASS', "shapon12345");
define("SMTP_REPLY_TO", "247clippingpath@gmail.com");

#Mail form and Name that show on the sender inbox
define("SMTP_FORM", "247clippingpath@gmail.com");
define("SMTP_NAME", "Mydomain Business Systems");


# Per page data show in the Admin Panel
define("PER_PAGE", 25);
# Base Url
define('BASEURL', APP_URL);
# admin folder name define here
define("ADMIN_FOLDER_NAME", "admin");


# do not change anything Below this is autogenerate url
define('ADMIN_URL', BASEURL.'/'.ADMIN_FOLDER_NAME);

# By deafault Admin image if no Imge uplpoad

define('DEFAULT_ADMIN_IMG', ADMIN_URL."/assests/images/picture.jpg");
# define the basepath


define("DASHBOARD_HOME", "/dashboard/dashboard.php");
define("LOGIN_FORM", ADMIN_FOLDER_NAME."/index.php");


/*=================================================
=            CRM CONSTANTS DEFINE HERE            =
=================================================*/

define("VIEW_NAME_PATH", VIEW_PATH."/crm");
define("VIEW_NAME_URL", VIEW_URL."/crm");

/*=====  End of CRM CONSTANTS DEFINE HERE  ======*/