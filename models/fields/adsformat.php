<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsFormat extends JFormField {
 
        protected $type = 'AdsFormat';
 
        public function getInput() {
                return '
              <div style="height: 500px; overflow: auto; border: solid 1px #cccccc;">
                <h3 style="text-align: center; padding-bottom: 10px; border-bottom: solid 1px #cccccc;">Recommended</h3>
                <div class="container-fluid" style="padding-bottom: 10px;">
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn format-choice pre-selected active btn-success" onclick="refreshPreview(this);" format="AUTOMATE" data-id="48" data-type="AUTOMATE" data-category="0" style="padding: 0;">
                      <div style="padding: 6px; height: 100px; text-align: center; width: 122px;"><h4>Search for<br>the best<br>format</h4></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: auto</div>
                        <div>Friendliness: auto</div>
                      </div>
                    </button>
                  </div>
                </div>
                <h3 style="text-align: center; padding-bottom: 10px; border-bottom: solid 1px #cccccc;">Standard</h3>
                <div class="container-fluid">
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn format-choice btn-default" onclick="refreshPreview(this);" format="ALERT" data-id="48" data-type="ALERT" data-category="0" category="" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-alert.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$$$</div>
                        <div>Friendliness: ★★</div>
                      </div>
                    </button>
                  </div>
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="BASIC" data-id="48" data-type="BASIC" data-category="0" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-simple.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$$</div>
                        <div>Friendliness: ★★★★</div>
                      </div>
                    </button>
                  </div>
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="APPWALL" data-id="48" data-type="APPWALL" data-category="0" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-appwall.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$$</div>
                        <div>Friendliness: ★★</div>
                      </div>
                    </button>
                  </div>
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="BOTTOMBAR" data-id="48" data-type="BOTTOMBAR" data-category="0" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-banner.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $</div>
                        <div>Friendliness: ★★★★★</div>
                      </div>
                    </button>
                  </div>
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="POSTER" data-id="48" data-type="POSTER" data-category="0" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-poster.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$</div>
                        <div>Friendliness: ★★★</div>
                      </div>
                    </button>
                  </div>
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="DETAIL" data-id="48" data-type="DETAIL" data-category="0" style="padding: 0;">
                      <div style="padding: 6px"><img src="//www.adsoptimal.com/assets/theme-v2/screenshot/template-detailed.jpg" style="width: 122px; height: 143px;"></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$</div>
                        <div>Friendliness: ★★★</div>
                      </div>
                    </button>
                  </div>
                </div>
                <h3 style="text-align: center; padding-bottom: 10px; border-bottom: solid 1px #cccccc;">Advanced</h3>
                <div class="container-fluid" style="padding-bottom: 10px;">
                  <div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="REDIRECT" data-id="48" data-type="REDIRECT" data-category="0" style="padding: 0;">
                      <div style="padding: 6px; height: 100px; text-align: center; width: 122px;"><h4>Redirect<br>all users<br>to offer</h4></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$$$$</div>
                        <div>Friendliness: ★</div>
                      </div>
                    </button>
                  </div>
                  <!--<div style="width: 140px; margin: 10px; float: left;">
                    <button type="button" class="btn btn-default format-choice" onclick="refreshPreview(this);" format="EXIT" data-id="48" data-type="EXIT" data-category="0" style="padding: 0;">
                      <div style="padding: 6px; height: 100px; text-align: center; width: 122px;"><div style="display:none"><img src="/assets/theme-v2/screenshot/template-alert.jpg" style="width: 122px; height: 143px"></div><h4>Exit<br/>Prompt</h4></div>
                      <div style="padding: 6px; border-top: solid 1px #dddddd; font-size: 11px; line-height: 13px;">
                        <div>Payout: $$$$</div>
                        <div>Friendliness: &#9733;</div>
                      </div>
                    </button>
                  </div>-->
                </div>
              </div>
              <input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.$this->value.'">
              <script type="text/javascript">
                function refreshPreview(element) {
                        jQuery(".format-choice").removeClass("active btn-success").addClass("btn-default");
                        jQuery(element).removeClass("btn-default").addClass("active btn-success");
                        jQuery("#'.$this->id.'").val(jQuery(element).data("type"));
                }
                refreshPreview(jQuery(".format-choice[format=\\"" + (jQuery("#'.$this->id.'").val() || "AUTOMATE") + "\\"]"));
              </script>';
        }
}