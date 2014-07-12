<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentAdsoptimal extends JPlugin
{
    public function onContentPrepare($context, &$article, &$params, $limitstart)
    {
    	$doc = JFactory::getDocument();
		$js = "
				alert('I am an alert box!, Injected complete !');
				";
		$doc->addScriptDeclaration($js);
	}

}

?>
