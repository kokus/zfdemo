<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    	$uri = $this->_request->getPathInfo();
    	$activeNav = $this->view->navigation()->findByUri($uri);
    	$activeNav->active = TRUE;
    	//$activeNav->setClass("active");

        /* Initialize action controller here */
        $this->view->headTitle('Home Page');
    }

    public function indexAction()
    {
        // action body

    }


}

