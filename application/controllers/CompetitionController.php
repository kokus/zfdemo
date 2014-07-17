<?php

class CompetitionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $uri = $this->_request->getPathInfo();
        $activeNav = $this->view->navigation()->findByUri($uri);
    	$activeNav->active = TRUE;
        //Zend_Debug::dump($activeNav);
    }

    public function indexAction()
    {
        $countries = new Application_Model_Country();
        //find a single row using a PK
        $countryRow = $countries->find(153)
                                ->current();

        //find ALL rows using WHERE condition
        $select1 = $countries->select()
                             ->where('region_id = ?',2);
        $rows1 = $countries->fetchAll($select1);
        //count rows
        $row1Count = count($rows1);

        // result is Zend_Db_Table_Rowset
        //$rowset = $countries->fetchAll('country_name = "peru"');
        //result is Zend_Db_Table_Row
        //$row    = $rowset->current();

        Zend_Debug::dump($rows1);


    }


}

