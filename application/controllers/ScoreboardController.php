<?php

class ScoreboardController extends Zend_Controller_Action
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
    }


}

