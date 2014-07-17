<?php

class Application_Model_Country extends Zend_Db_Table_Abstract
{
	protected $_name = 'country';
	protected $_primary = 'country_id';

	protected $_dependentTables = array('Application_Model_Team');

	public function fetchCountries() {
		$select = $this->select();
		return $this->fetchAll($select);
	}

}

