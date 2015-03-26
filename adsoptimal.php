<?php
/**
 * @package Plugin AdsOptimal for Joomla! 2.5 and 3.0
 * @version 1.1: mod_adsoptimal.php 599 2015-03-24 23:48:33Z 
 * @author Social Nation Inc.
 * @copyright Copyright (C) 2014 Social Nation Inc. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

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
		if ($adsaccount['jscode']) {
			$code = $adsaccount['jscode'];
			
			$code = str_replace("<script type='text/javascript'>","",$code);
			$code = str_replace("</script>","",$code);
			
			return $code;
		}
		else return "";
	}
}

?>
