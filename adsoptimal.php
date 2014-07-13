<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentAdsoptimal extends JPlugin
{
    public function onContentAfterDisplay($context, &$article, &$params, $limitstart){
    	$doc = JFactory::getDocument();
		$doc->addScriptDeclaration($this->getAdsOptimalCode());
	}

	protected function getAdsOptimalCode(){
		$code = $this->params->get('AdsOptimal_code');
		return $code;
	}
}

?>
