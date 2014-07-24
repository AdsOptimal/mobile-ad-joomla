<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsDisplayTiming extends JFormField {
 
        protected $type = 'AdsDisplayTiming';
 
        public function getInput() {
                return '
              <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn btn-immediate '.$this->id.' btn-on" value="IMMEDIATE" prefer="btn-success">Immediately<br>after page loaded</button>
                <button type="button" class="btn btn-delay '.$this->id.' btn-off" value="DELAY" prefer="btn-success">Wait for seconds<br>after page loaded</button>
                <button type="button" class="btn btn-scroll '.$this->id.' btn-off" value="SCROLL" prefer="btn-success">After scroll to<br>the bottom of the page</button>
              </div>
              <input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.$this->value.'">
              <script type="text/javascript">
                jQuery(".'.$this->id.'").click(function() {
                   jQuery(".'.$this->id.'").removeClass("btn-success btn-warning");
                   jQuery(this).addClass(jQuery(this).attr("prefer"));
                   jQuery("#'.$this->id.'").val(jQuery(this).attr("value"));
                   
                   var current = jQuery(this).val();
                   jQuery(document).ready(function() {
                        jQuery(".adstiming").css("opacity", current != "DELAY" ? 0.3:1.0);
                        jQuery(".adsscroll").css("opacity", current != "SCROLL" ? 0.3:1.0);
                   });
                });
                var current = jQuery("#'.$this->id.'").val();
                if (current == "DELAY") jQuery(".'.$this->id.'.btn-delay").click();
                else if (current == "SCROLL") jQuery(".'.$this->id.'.btn-scroll").click();
                else jQuery(".'.$this->id.'.btn-immediate").click();
              </script>';
        }
}