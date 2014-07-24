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
		$adsaccount = json_decode($this->params->get('adsaccount'), true);
		if ($adsaccount and $adsaccount['publisher_id']) {
				$adsformat = $this->params->get('adsformat');
				$adslabel = $this->params->get('adslabel');
				$adsclose = $this->params->get('adsclose');
				$adsdisplay = $this->params->get('adsdisplay');
				$adstiming = $this->params->get('adstiming');
				$adsscroll = $this->params->get('adsscroll');
				$adsfrequency = $this->params->get('adsfrequency');
				
				$options = null;
				switch ($adsdisplay) {
					case 'IMMEDIATE':
						$options = '';
						break;
					case 'DELAY':
						$options = ',delay:'.intval($adstiming)*1000;
						break;
					case 'SCROLL':
						$options = ',scrollFraction:'.(intval($adsscroll)/100.0);
						break;
				}
				if ($adsclose == 'OFF') { $options = $options.",close:'NO'"; }
				if ($adslabel == 'OFF') { $options = $options.",label:'NO'"; }
				$type = $adsformat;
				if ($adsformat == 'AUTOMATE') {
					$automate = 'YES';
					$type = '';
				} else {
					$automate = 'NO';
					$type = ",type:'".$type."'";
				}
				$code = "
(function(w) {
	w.MobileMonetizer={ID:'".$adsaccount['publisher_id']."'".$type.",automate:'".$automate."',category:'0',display:'".$adsdisplay."'".$options.",expiration:".$adsfrequency."};
	if(navigator.userAgent.match(/iPhone|iPod|iPad|Android/i)==null)return;
	var d=document,h=d.getElementsByTagName('head')[0],s=d.createElement('style'),j=d.createElement('script');
	s.setAttribute('rel','mw-page-block');s.innerHTML='body > * {display:none !important}';
	j.setAttribute('src','//www.adsoptimal.com/advertisement/dispatcher.js');j.onerror=function(){h.removeChild(s);
	h.removeChild(j);};h.appendChild(s);h.appendChild(j);
})(window);
";
				return $code;
		}
		else return "";
	}
}

?>
