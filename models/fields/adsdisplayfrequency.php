<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsDisplayFrequency extends JFormField {
 
        protected $type = 'AdsDisplayFrequency';
 
        public function getInput() {
                return '
              <div>
                <label style="display:inline;">Show &nbsp;</label>
                <select style="vertical-align:-webkit-baseline-middle; display:inline;" class="span4 config-delay-timing input-xlarge form-control" id="'.$this->id.'" name="'.$this->name.'">
                        <option value="0" '.($this->value == '0' ? 'selected' : '').'>always</option>
                        <option value="5" '.($this->value == '5' ? 'selected' : '').'>every 5 minutes</option>
                        <option value="10" '.($this->value == '10' ? 'selected' : '').'>every 10 minutes</option>
                        <option value="15" '.($this->value == '15' ? 'selected' : '').'>every 15 minutes</option>
                        <option value="30" '.($this->value == '30' ? 'selected' : '').'>every 30 minutes</option>
                        <option value="45" '.($this->value == '45' ? 'selected' : '').'>every 45 minutes</option>
                        <option value="60" '.(($this->value == '60' || empty($this->value)) ? 'selected' : '').'>hourly</option>
                        <option value="120" '.($this->value == '120' ? 'selected' : '').'>every 2 hours</option>
                        <option value="180" '.($this->value == '180' ? 'selected' : '').'>every 3 hours</option>
                        <option value="240" '.($this->value == '240' ? 'selected' : '').'>every 4 hours</option>
                        <option value="360" '.($this->value == '360' ? 'selected' : '').'>every 6 hours</option>
                        <option value="480" '.($this->value == '480' ? 'selected' : '').'>every 8 hours</option>
                        <option value="720" '.($this->value == '720' ? 'selected' : '').'>every 12 hours</option>
                        <option value="960" '.($this->value == '960' ? 'selected' : '').'>every 16 hours</option>
                        <option value="1200" '.($this->value == '1200' ? 'selected' : '').'>every 20 hours</option>
                        <option value="1440" '.($this->value == '1440' ? 'selected' : '').'>daily</option>
                        <option value="2880" '.($this->value == '2880' ? 'selected' : '').'>every 2 days</option>
                        <option value="4320" '.($this->value == '4320' ? 'selected' : '').'>every 3 days</option>
                        <option value="5760" '.($this->value == '5760' ? 'selected' : '').'>every 4 days</option>
                        <option value="8640" '.($this->value == '8640' ? 'selected' : '').'>every 6 days</option>
                        <option value="11520" '.($this->value == '11520' ? 'selected' : '').'>every 8 days</option>
                </select>
              </div>';
        }
}