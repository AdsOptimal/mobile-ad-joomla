<?php
/**
 * @package Plugin AdsOptimal for Joomla! 2.5 and 3.0
 * @version 1.1: mod_adsoptimal.php 599 2015-03-24 23:48:33Z 
 * @author Social Nation Inc.
 * @copyright Copyright (C) 2014 Social Nation Inc. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsFormat extends JFormField {
 
        protected $type = 'AdsFormat';
 
        public function getInput() {
                return '<input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.htmlspecialchars($this->value).'" class="adsoptimal_settings"><div style="width: auto; margin-left: -200px; position: relative; top: 0px;"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="145"></td><td width="940"><div class="authenticate" style="display: none; padding: 30px; text-align: center;">Please connect to AdsOptimal account.</div><div class="authenticating" style="display: none; padding: 30px; text-align: center;">Loading..</div><iframe class="adsoptimal-injection-format authenticated" style="display: none; width: 940px; height: 1400px; max-width: none; background: #ffffff;" frameborder="0"></iframe></td><td></td></tr></table></div>';
        }
}