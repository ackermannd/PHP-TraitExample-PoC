<?php

namespace ackermannd\traitex\Traits;

trait Cachable 
{
	protected $_traitCache = null;

	public function setCache($cache) {
		$this->_traitCache = $cache;
		return $this;
	}	

	public function getCache() {
		return $this->_traitCache;
	}

	public function load($id) {
		if ($this->_traitCache !== null) {
			return $this->_traitCache->load($id);	
		}
		return null;
	}

	public function save($id, $data) {
		if ($this->_traitCache !== null) {
			return $this->_traitCache->save($id, $data);
		}
		return null;
		
	}
}