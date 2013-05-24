<?php
require_once('autoload.php');

date_default_timezone_set('Europe/Berlin');

use ackermannd\traitex\Logger;
use ackermannd\traitex\Example;

$ex = new Example();
$ex->setLogger(new Logger());
$ex->log('test');
$ex->load('id');
$ex->save('id', array(1,2));