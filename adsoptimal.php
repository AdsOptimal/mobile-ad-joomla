<?php

// no direct access
// defined( '_JEXEC' ) or die( 'Restricted access' );
defined('_JEXEC') or die;

class plgContentAdsoptimal extends JPlugin
{
    public function onContentAfterTitle($context, &$article, &$params, $limitstart)
        {
                return "<p>We injected adsoptimal javascript here</p>";
        }

}

?>
