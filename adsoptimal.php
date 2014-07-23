<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Adding custom controls path
JForm::addFieldPath(JPATH_PLUGINS . '/content/adsoptimal/models/fields');
JForm::addFormPath(JPATH_PLUGINS . '/content/adssoptimal/models/forms');

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
