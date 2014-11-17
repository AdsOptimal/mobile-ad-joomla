<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Adding custom controls path
JForm::addFieldPath(JPATH_PLUGINS . '/content/adsoptimal/models/fields');
JForm::addFormPath(JPATH_PLUGINS . '/content/adsoptimal/models/forms');

class plgContentAdsoptimal extends JPlugin
{
  public function onContentAfterDisplay($context, &$article, &$params, $limitstart){
		if (defined('_ADOINSERTED')) return;
		
    $doc = JFactory::getDocument();
		$doc->addScriptDeclaration($this->getAdsOptimalCode());
		
		define('_ADOINSERTED', 1);
	}

	protected function getAdsOptimalCode(){
		$adsaccount = json_decode(rawurldecode($this->params->get('adsformat')), true);
		if ($adsaccount['code-textarea']) {
			$code = $adsaccount['code-textarea'];
			
			$code = str_replace("<script type='text/javascript'>","",$code);
			$code = str_replace("</script>","",$code);
			
			return $code;
		}
		else return "";
	}
}

?>
