<?php  /// Moodle Configuration File

unset($CFG);

$CFG = new stdClass();
$CFG->dbtype    = 'mysqli';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'dephub_elearning';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->dbpersist =  false;
$CFG->prefix    = 'mdl_';

$CFG->wwwroot   = 'http://localhost/dephub/elearning';
$CFG->dirroot   = '/Applications/MAMP/htdocs/dephub/elearning';
$CFG->dataroot  = '/Applications/MAMP/htdocs/dephub/assets/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

$CFG->passwordsaltmain = 'GT +Gn<uar,r,#-KwbjC;#IIu5Q`%G';

require_once("$CFG->dirroot/lib/setup.php");
// MAKE SURE WHEN YOU EDIT THIS FILE THAT THERE ARE NO SPACES, BLANK LINES,
// RETURNS, OR ANYTHING ELSE AFTER THE TWO CHARACTERS ON THE NEXT LINE.
?>