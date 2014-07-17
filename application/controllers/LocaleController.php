<?php

class LocaleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

	// action to manually override locale
    // action to manually override locale
  public function indexAction()
  {
	    // if supported locale, add to session
	    if (Zend_Validate::is(
	      $this->getRequest()->getParam('locale'), 'InArray',
	        array('haystack' => array('en_US', 'es_ES', 'pt_BR'))
	    )) {
	      $session = new Zend_Session_Namespace('square.l10n');
	      $session->locale = $this->getRequest()->getParam('locale');
	    }
	    // redirect to requesting URL
	    $url = $this->getRequest()->getServer('HTTP_REFERER');
	    $this->_redirect($url);
	}


}

