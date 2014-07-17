<?php

class Application_Model_Team extends Zend_Db_Table_Abstract
{
	protected $_name = 'team';
	protected $_primary = 'team_id';

	// Identify Foreign Keys found in Team , Tbl_Country and FK_country_id
	protected $_refereceMap = array (
		'Country' => array (
			'columns' => 'country_id',
			'refTableClass' => 'Application_Model_Country',
			'refColumns' => 'country_id'
		)
	);

}

