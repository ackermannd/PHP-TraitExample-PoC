<?php

namespace ackermannd\traitex;

class Logger 
{
	protected $_logfile= null;
	public function __construct() {
		$this->_logfile = fopen('log.txt', 'a+');
	}

	public function log($string, $loglevel = null) {
		fwrite($this->_logfile, date('Y.m.d H:i:s') . ' - ' . $string . "\r\n");
	}
}