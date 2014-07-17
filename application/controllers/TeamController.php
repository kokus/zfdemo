<?php

class TeamController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $uri = $this->_request->getPathInfo();
        $activeNav = $this->view->navigation()->findByUri($uri);
    	$activeNav->active = TRUE;
        
    }

    public function indexAction()
    {
        // action body
        $teamModel = new Application_Model_Team();
        
        //<!-- Query By Primary Key -->
        $result = $teamModel->find(2017)->current(); 

        // $query = $teamModel->select();
        // $query->where("country_id = ?",153);
        // $results = $teamModel->fetchAll($query);

        // foreach ($results as $result) {
            echo "{$result->team_id }  {$result->team_name}<br>";
        // }
        
        echo "<hr>";

        // SELECT JOIN TWO TABLES
        $team_id = 2017;
        $select = $teamModel->select()
                     ->setIntegrityCheck(false)
                     ->from('team')
                     ->joinUsing('country', 'country_id')
                     ->where('team_id = ?', $team_id);

        $rows = $teamModel->fetchAll($select);

         //Zend_Debug::dump($rows);
        //$country_team = $team->findDependentRowset('Application_Model_Country')->current();

    }



}

