<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initLocale() {
		$locale = null;
		$session = new Zend_Session_Namespace('square.l10n');
		if ($session->locale) {
			$locale = new Zend_Locale($session->locale);	
		}

		if ($locale === null) {
			// try to auto-detect locale
			// if fail, set locale manually to En
			try {
				// detect locale automatically from browser and then server
				$locale = new Zend_Locale('auto');
			} catch(Zend_Locale_Exception $e) {
				$locale = new Zend_Locale('en_US');
			}
		}

		//register locale
		$registry = Zend_Registry::getInstance();
		$registry->set('Zend_Locale',$locale);
		// To retrive this value in any controller or scripts
		//$value = Zend_Registry::get('Zend_Locale');
	}

	protected function _initTranslate() {
		// initialize and register translation object
		$translate = new Zend_Translate('array',
			APPLICATION_PATH . '/langs',
			null,
			array('scan'=>Zend_Translate::LOCALE_FILENAME)
			);
		$registry = Zend_Registry::getInstance();
		$registry->set('Zend_Translate',$translate);
		// This is assigned by the initLocale on the fly based on browser language
		//$translate->setlocale('en_US');
	}

	protected function _initNavigation() {

		// make sure the layout is loaded
		$this->bootstrap('view');
		$this->bootstrap('layout');	
		
		// get the view of the layout
		$layout = $this->getResource('layout');		
		$view = $layout->getView();
		
		//load the navigation xml
		$config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml','nav');
		
		// pass the navigation xml to the zend_navigation component
		$navigation = new Zend_Navigation($config);
		
		// pass the zend_navigation component to the view of the layout 
		$view->navigation($navigation);
	}

	// protected function _initSidebar() {

	// 	$this->bootstrap('view');
 //        $view = $this->getResource('view');
	// 	$view->placeholder('sidebar')
	// 			// "prefix" -> markup to emit once before all items in collection
	// 			->setPrefix("<div class=\"sidebar\">\n    <div class=\"three column\">\n")
	// 			// "separator" -> markup to emit between items in a collection
	// 			->setSeparator("</div>\n    <div class=\"sidebar\">\n")	
	// 			// "postfix" -> markup to emit once after all items in a collection
	// 			->setPostfix("</div>\n</div>");					
	// }
}


