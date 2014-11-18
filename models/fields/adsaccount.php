<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsAccount extends JFormField {
 
        protected $type = 'AdsAccount';
 
        public function getInput() {
                return '
              <input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.htmlspecialchars($this->value).'">
              <input type="text" name="adsoptimal_email" readonly>
              <input type="hidden" name="adsoptimal_access_token">
              <input type="hidden" name="adsoptimal_publisher_id">
              <button type="button" id="'.$this->id.'_connect" class="authenticate btn btn-success connect" style="display: none;">Connect</button>
              <button type="button" class="authenticating btn btn-success connect" style="display: none;" disabled>Connecting..</button>
              <button type="button" id="'.$this->id.'_changeaccount" class="authenticated btn btn-success change-account" style="display: none;">Change Account</button>
              <div class="btn-group authenticated" style="">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="">
                  <span class="earning" style="text-shadow: none;">...</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="http://www.adsoptimal.com/customer/insights" target="_blank">Insights</a></li>
                  <li><a href="http://www.adsoptimal.com/customer/payout" target="_blank">Payout</a></li>
                </ul>
              </div>
              <style type="text/css">
.ado-container { width: auto; padding: 5px 20px; }
.ado-col4 { float: left; margin: 0 20px 10px 0; }
.adsoptimal-injection-format h3 { clear: both; }
.adsoptimal-injection-timing .setting-pane-2 { display: block !important; }
              </style>
              <script type="text/javascript">
window.$ = jQuery; jQuery.noConflict = function() { return window.$; };
var settings = {
	"host":     "//www.adsoptimal.com"
, "clientId": "8d1ccad0433322bed59691fb0d6367a1f4846da1b70ce114cacc7202478e6cd9"
};
var VIEW = { AUTHENTICATE:0, AUTHENTICATING:1, AUTHENTICATED:2 };

var AdsOptimal = {
	openOAuth: (function() {
		var popupWindow=null;
		return function(redirect_uri, logout) {
			url = settings.host + "/oauth/authorize?client_id=" + settings.clientId + "&redirect_uri=" + encodeURIComponent(redirect_uri) + "&response_type=token";
			if (logout) url = settings.host + "/oauth/logout?redirect=" + encodeURIComponent(url);
			
			if(popupWindow && !popupWindow.closed) popupWindow.focus();
			else popupWindow = window.open(url,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=515, height=330,top=" + (screen.height - 330)/2 + ",left=" + (screen.width - 515)/2);
			
			function parent_disable() {
				if(popupWindow && !popupWindow.closed) popupWindow.focus();
			}
			
			$(document.body).bind("focus", parent_disable);
			$(document.body).bind("click", parent_disable);
		}
	})(),
	
	extractQuery: function(hash, regex) {
		var match = hash.match(regex);
		return !!match && match[1];
	},
	switchView: function(view) {
		$(".authenticate").hide();
		$(".authenticating").hide();
		$(".authenticated").hide();
		
		switch(view) {
			case VIEW.AUTHENTICATE:
				$(".authenticate").show();
				break;
			case VIEW.AUTHENTICATING:
				$(".authenticating").show();
				break;
			case VIEW.AUTHENTICATED:
				$(".authenticated").show();
				break;
		}
	},
	
	updateSettings: function() {
		if (window.disabledUpdateSettings) return;
		AdsOptimal.saveSettings(false);
	},
	saveSettings: function(save) {
		console.log("NOT IMPLEMENTED");
	},
	restoreSettings: function() {
		console.log("NOT IMPLEMENTED");
	},
	
	oAuthCallback: function(token) {
    AdsOptimal.switchView(VIEW.AUTHENTICATING);
    
		$.ajax({
				url: settings.host + "/api/v1/publisher_info"
			, beforeSend: function (xhr) {
					xhr.setRequestHeader("Authorization", "Bearer " + token);
					xhr.setRequestHeader("Accept",        "application/json");
				}
			, success: function (response) {
					if (response.data) {
						AdsOptimal.switchView(VIEW.AUTHENTICATED);
						$("[name=\"adsoptimal_access_token\"]").val(token);
						$("[name=\"adsoptimal_email\"]").val(response.data.email);
						$("[name=\"adsoptimal_publisher_id\"]").val(response.data.publisher_id);
						AdsOptimal.updateSettings();
					} else {
						AdsOptimal.switchView(VIEW.AUTHENTICATE);
					}
				}
		});
	},
	initialize: function() {
    AdsOptimal.restorePreSettings();
  
		$(".connect").click(function() {
			AdsOptimal.openOAuth(location.href.replace("#" + location.hash,""), false);
		});
		$(".change-account").click(function() {
			AdsOptimal.openOAuth(location.href.replace("#" + location.hash,""), true);
		});
		
		var token = AdsOptimal.extractQuery(window.location.hash, /access_token=(\w+)/);
		var error = AdsOptimal.extractQuery(window.location.hash, /error=(\w+)/);
		if (error == "access_denied") {
			window.close();
		}
		else if(token) {
			try { window.opener.AdsOptimal.oAuthCallback(token); }
			catch(ex) { }
			window.close();
		}
		else {
			AdsOptimal.switchView(VIEW.AUTHENTICATE);
			
			$(".email-address").text($("[name=\"adsoptimal_email\"]").val());
			
			if ($("[name=\"adsoptimal_access_token\"]").val()) {
				AdsOptimal.switchView(VIEW.AUTHENTICATED);
        
				$(".earning").text("...");
				if ($("[name=\"adsoptimal_access_token\"]").val()) {
					$.ajax({
							url: settings.host + "/api/v1/insight_info"
						, beforeSend: function (xhr) {
								xhr.setRequestHeader("Authorization", "Bearer " + $("[name=\"adsoptimal_access_token\"]").val());
								xhr.setRequestHeader("Accept",        "application/json");
							}
						, success: function (response) {
								if (response.data) {
									$(".earning").text("Pending Payout: $" + response.data.pending_payout.toFixed(2));
								} else {
									$(".earning").text("Insight");
								}
							}
					});
				
				  $.ajax({
					  	url: settings.host + "/api/v1/settings_injection.html"
					  , beforeSend: function (xhr) {
					  		xhr.setRequestHeader("Authorization", "Bearer " + $("[name=\"adsoptimal_access_token\"]").val());
					  		xhr.setRequestHeader("Accept",        "text/html");
					  	}
					  , success: function (response) {
                var $iframe = $(".adsoptimal-injection-format");
                var ifrm = $iframe[0];
                ifrm = (ifrm.contentWindow) ? ifrm.contentWindow : (ifrm.contentDocument.document) ? ifrm.contentDocument.document : ifrm.contentDocument;
                
                AdsOptimal.fixContent = function() {
                   $(ifrm.document).find(".preview-screen").parent().parent().detach();
                   $(ifrm.document).find("[src]").each(function() {
                        if ($(this).attr("src").indexOf("//") == -1) {
                           $(this).attr("src", settings.host + $(this).attr("src"));
                        }
                   });
                   $(ifrm.document).find("body>div").css("width", "800px");
                   AdsOptimal.settingsInput = $(ifrm.document).find("[name=\"adsoptimal_settings\"]");
                }
                
                ifrm.document.open();
                ifrm.document.write(
                    "<html><head><script src=\"//code.jquery.com/jquery-1.11.0.min.js\"></" + "script>" +
                    "<link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css\">" +
                    "<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js\"></" + "script>" +
                    "<script type=\"text/javascript\">window.AdsOptimal = window.parent.AdsOptimal;" +
                    "</" + "script></head>" +
                    "<body style=\"margin:0; background:none transparent;\" class=\"adsoptimal-injection-container\">" +
                    "<form class=\"adsoptimal_form\" onsubmit=\"return AdsOptimal.savePostSettings(true);\">" +
                    "<input type=\"hidden\" name=\"adsoptimal_settings\" value=\"" + $(".adsoptimal_settings").val() + "\"></form>" +
                    response + "<" + "script>" +
                    "AdsOptimal.fixContent();" +
                    "AdsOptimal.restoreSettings();" +
                    "</" + "script></body></html>"
                );
                ifrm.document.close();
					  	}
				  });
        }
			}
		}
	}
};

AdsOptimal.savePostSettings = function(submit) {
  if (submit) {
    Joomla.submitbutton("plugin.apply");
  }
  else {
    var data = {};
    data.access_token = $("[name=\"adsoptimal_access_token\"]").val();
    data.email = $("[name=\"adsoptimal_email\"]").val();
    data.publisher_id = $("[name=\"adsoptimal_publisher_id\"]").val();
    $("#'.$this->id.'").val(JSON.stringify(data));
    $(".adsoptimal_settings").val(AdsOptimal.settingsInput.val());
  }
  return false;
}
AdsOptimal.restorePreSettings = function(save) {
  var data = JSON.parse($("#'.$this->id.'").val());
  $("[name=\"adsoptimal_access_token\"]").val(data.access_token);
  $("[name=\"adsoptimal_email\"]").val(data.email);
  $("[name=\"adsoptimal_publisher_id\"]").val(data.publisher_id);
}

$(document).ready(function() {
  var oldFn = Joomla.submitbutton;
  Joomla.submitbutton = function() {
     if (arguments[0] != "plugin.cancel") {
        AdsOptimal.saveSettings(false);
     }
     var args = arguments;
     window.setTimeout(function() {
        AdsOptimal.savePostSettings(false);
        oldFn.apply(this, args);
     }, 110);
  };

  AdsOptimal.initialize();
});
</script>';
        }
}