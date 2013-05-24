<?php
namespace ackermannd\traitex\Traits;

trait Loggable 
{
	protected $_traitLogger = null;

	public function setLogger($logger) {
		$this->_traitLogger = $logger;
		return $this;
	}

	public function getLogger() {
		return $this->_traitLogger;
	}

	public function log($string = '', $loglevel = null) {
		if ($this->_traitLogger !== null) {
			return $this->_traitLogger->log($string, $loglevel);	
		}
		return null;
	}
	
}