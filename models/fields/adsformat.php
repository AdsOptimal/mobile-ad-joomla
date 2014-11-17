<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsFormat extends JFormField {
 
        protected $type = 'AdsFormat';
 
        public function getInput() {
                return '<input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.htmlspecialchars($this->value).'" class="adsoptimal_settings"><div style="width: auto; margin-left: -200px; position: relative; top: -20px;"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="145"></td><td width="800"><div class="authenticate" style="display: none; padding: 30px; text-align: center;">Please connect to AdsOptimal account.</div><div class="authenticating" style="display: none; padding: 30px; text-align: center;">Loading..</div><iframe class="adsoptimal-injection-format authenticated" style="display: none; width: 800px; height: 700px; max-width: none;" frameborder="0"></iframe></td><td></td></tr></table></div>';
        }
}