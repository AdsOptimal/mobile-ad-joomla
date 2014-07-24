<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldAdsAccount extends JFormField {
 
        protected $type = 'AdsAccount';
 
        public function getInput() {
                return '
              <input type="text" id="'.$this->id.'_name" name="'.$this->name.'_name" value="" readonly>
              <input type="hidden" id="'.$this->id.'" name="'.$this->name.'" value="'.htmlspecialchars($this->value).'">
              <button type="button" id="'.$this->id.'_connect" class="btn btn-success">Connect</button>
              <button type="button" id="'.$this->id.'_changeaccount" class="btn btn-success" style="display: none;">Change Account</button>
              <script type="text/javascript">
var settings =
  {
    "host":     "www.adsoptimal.com"
  , "clientId": "8d1ccad0433322bed59691fb0d6367a1f4846da1b70ce114cacc7202478e6cd9"
  };

var authHost     = "https://" + settings.host;
var resourceHost = "https://" + settings.host;
    
// OAuth 2.0 Popup
//
var popupWindow=null;
function openPopup(url)
{
  if(popupWindow && !popupWindow.closed) popupWindow.focus();
  else popupWindow = window.open(url,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=515, height=330,top=" + (screen.height - 330)/2 + ",left=" + (screen.width - 515)/2);
}
function parent_disable() {
  if(popupWindow && !popupWindow.closed) popupWindow.focus();
}

jQuery("#'.$this->id.'_connect").click(function() {
  var url = authHost + "/oauth/authorize?client_id=" + settings.clientId + "&redirect_uri=" + encodeURIComponent(location.href.replace("#" + location.hash,"")) + "&response_type=token";
  openPopup(url);
  jQuery(document.body).bind("focus", parent_disable);
  jQuery(document.body).bind("click", parent_disable);
});
jQuery("#'.$this->id.'_changeaccount").click(function() {
  var url = authHost + "/oauth/authorize?client_id=" + settings.clientId + "&redirect_uri=" + encodeURIComponent(location.href.replace("#" + location.hash,"")) + "&response_type=token";
  var logout = authHost + "/oauth/logout?redirect=" + encodeURIComponent(url);
  openPopup(logout);
  jQuery(document.body).bind("focus", parent_disable);
  jQuery(document.body).bind("click", parent_disable);
});

// Manage OAuth 2.0 Redirect
//
var extractToken = function(hash) {
  var match = hash.match(/access_token=(\w+)/);
  return !!match && match[1];
};
var extractError = function(hash) {
  var match = hash.match(/error=(\w+)/);
  return !!match && match[1];
};

var token = extractToken(window.location.hash);
if (extractError(window.location.hash) == "access_denied") {
  window.close();
}
else if(token) {
  try { window.opener.setAccessToken(token); }
  catch(ex) { }
  window.close();
}
else {
  // SIGNED IN
  if (jQuery("#'.$this->id.'").val()) {
    var data = JSON.parse(jQuery("#'.$this->id.'").val());
    jQuery("#'.$this->id.'_name").val(data.email);
    jQuery("#'.$this->id.'_connect").hide();
    jQuery("#'.$this->id.'_changeaccount").show();
  }
}

// Manage OAuth 2.0 Results
//
window.setAccessToken = function(token) {
  jQuery("#'.$this->id.'_name").val("Loading..");
  jQuery.ajax({
      url: resourceHost + "/api/v1/publisher_info"
    , beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token);
        xhr.setRequestHeader("Accept",        "application/json");
      }
    , success: function (response) {
        if (response.data) {
          // HAVE SIGNED IN
          jQuery("#'.$this->id.'").val(JSON.stringify(response.data));
          jQuery("#'.$this->id.'_name").val(response.data.email);
          jQuery("#'.$this->id.'_connect").hide();
          jQuery("#'.$this->id.'_changeaccount").show();
        } else {
          jQuery("#'.$this->id.'_name").val("");
        }
      }
  });
}
              </script>';
        }
}