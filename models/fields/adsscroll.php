<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsScroll extends JFormField {
 
        protected $type = 'AdsScroll';
 
        public function getInput() {
                return '
              <div class="adsscroll">
                <label style="display:inline;">Show ad after scrolling &nbsp;</label>
                <select style="vertical-align:-webkit-baseline-middle; display:inline;" class="span4 config-delay-timing input-xlarge form-control" id="'.$this->id.'" name="'.$this->name.'">
                    <option value="10" '.($this->value == '10' ? 'selected' : '').'>10%</option>
                    <option value="20" '.($this->value == '20' ? 'selected' : '').'>20%</option>
                    <option value="30" '.($this->value == '30' ? 'selected' : '').'>30%</option>
                    <option value="40" '.($this->value == '40' ? 'selected' : '').'>40%</option>
                    <option value="50" '.($this->value == '50' ? 'selected' : '').'>50%</option>
                    <option value="60" '.(($this->value == '60' || empty($this->value)) ? 'selected' : '').'>60%</option>
                    <option value="70" '.($this->value == '70' ? 'selected' : '').'>70%</option>
                    <option value="80" '.($this->value == '80' ? 'selected' : '').'>80%</option>
                    <option value="90" '.($this->value == '90' ? 'selected' : '').'>90%</option>
                </select>
              </div>';
        }
}