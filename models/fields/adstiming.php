<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsTiming extends JFormField {
 
        protected $type = 'AdsTiming';
 
        public function getInput() {
                return '
              <div class="adstiming">
                <label style="display:inline;">Delay ad for &nbsp;</label>
                <select style="vertical-align:-webkit-baseline-middle; display:inline;" class="span4 config-delay-timing input-xlarge form-control" id="'.$this->id.'" name="'.$this->name.'">
                    <option value="1" '.($this->value == '1' ? 'selected' : '').'>1 second</option>
                    <option value="2" '.($this->value == '2' ? 'selected' : '').'>2 seconds</option>
                    <option value="3" '.($this->value == '3' ? 'selected' : '').'>3 seconds</option>
                    <option value="4" '.($this->value == '4' ? 'selected' : '').'>4 seconds</option>
                    <option value="5" '.($this->value == '5' ? 'selected' : '').'>5 seconds</option>
                    <option value="6" '.($this->value == '6' ? 'selected' : '').'>6 seconds</option>
                    <option value="7" '.($this->value == '7' ? 'selected' : '').'>7 seconds</option>
                    <option value="8" '.($this->value == '8' ? 'selected' : '').'>8 seconds</option>
                    <option value="9" '.($this->value == '9' ? 'selected' : '').'>9 seconds</option>
                    <option value="10" '.(($this->value == '10' || empty($this->value)) ? 'selected' : '').'>10 seconds</option>
                    <option value="11" '.($this->value == '11' ? 'selected' : '').'>11 seconds</option>
                    <option value="12" '.($this->value == '12' ? 'selected' : '').'>12 seconds</option>
                    <option value="13" '.($this->value == '13' ? 'selected' : '').'>13 seconds</option>
                    <option value="14" '.($this->value == '14' ? 'selected' : '').'>14 seconds</option>
                    <option value="15" '.($this->value == '15' ? 'selected' : '').'>15 seconds</option>
                    <option value="16" '.($this->value == '16' ? 'selected' : '').'>16 seconds</option>
                    <option value="17" '.($this->value == '17' ? 'selected' : '').'>17 seconds</option>
                    <option value="18" '.($this->value == '18' ? 'selected' : '').'>18 seconds</option>
                    <option value="19" '.($this->value == '19' ? 'selected' : '').'>19 seconds</option>
                    <option value="20" '.($this->value == '20' ? 'selected' : '').'>20 seconds</option>
                </select>
              </div>';
        }
}