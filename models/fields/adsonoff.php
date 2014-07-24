<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsOnOff extends JFormField {
 
        protected $type = 'AdsOnOff';
 
        public function getInput() {
                return '
              <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn '.$this->id.' btn-on" value="ON" prefer="btn-success">On</button>
                <button type="button" class="btn '.$this->id.' btn-off" value="OFF" prefer="btn-warning">Off</button>
              </div>
              <input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.$this->value.'">
              <script type="text/javascript">
                jQuery(".'.$this->id.'").click(function() {
                   jQuery(".'.$this->id.'").removeClass("btn-success btn-warning");
                   jQuery(this).addClass(jQuery(this).attr("prefer"));
                   jQuery("#'.$this->id.'").val(jQuery(this).attr("value"));
                });
                if (jQuery("#'.$this->id.'").val() == "OFF") jQuery(".'.$this->id.'.btn-off").click();
                else jQuery(".'.$this->id.'.btn-on").click();
              </script>';
        }
}