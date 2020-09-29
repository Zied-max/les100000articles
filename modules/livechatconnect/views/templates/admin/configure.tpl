{*
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div id="livechat-connect"></div>

<script src="https://cdn.polyfill.io/v3/polyfill.min.js?features=default,es6,fetch,Array.prototype.includes,Object.keys,Symbol.iterator&flags=gated" type="text/javascript"></script>
<script src="{$moduleAssetsPath|escape:'html':'UTF-8'}js/connect.js" type="text/javascript"></script>
<script>
  var LC_TOKEN = '{$lcToken|escape:'html':'UTF-8'}';
  var STORE_TOKEN = '{$storeToken|escape:'html':'UTF-8'}';
  var STORE_URL = '{$storeUrl|escape:'html':'UTF-8'}';
  var USER_EMAIL = '{$userEmail|escape:'html':'UTF-8'}';
  var USER_NAME = '{$userName|escape:'html':'UTF-8'}';
  var PS_VER = '{$psVer|escape:'html':'UTF-8'}';
  var MODULE_VER = '{$moduleVer|escape:'html':'UTF-8'}';
  var SF_SUPPORT = '{$sfSupport|escape:'html':'UTF-8'}';

  (function () {
    var interval = setInterval(function () {
      if (window.AppBridge === undefined) {
        return;
      }
      clearInterval(interval);

      function userSignedInHandler(userToken, storeToken) {
        var url = '{$endpoints.connect|escape:'quotes':'UTF-8'}&store_token=' + storeToken + '&user_token=' + userToken;
        if (SF_SUPPORT === '1') {
          fetch(url);
        } else {
          window.location.assign(url);
        }
      }

      var eventsRegister = new AppBridge.EventsRegister();
      eventsRegister.register(AppBridge.UserSignedInEvent, data => userSignedInHandler(data.userToken, data.storeToken));

      AppBridge.AppBridgeParent.init('prestashop', eventsRegister, document.getElementById('livechat-connect'), '{$appUrl|escape:'html':'UTF-8'}').then(bridge => {
        if (LC_TOKEN) {
          return bridge.call(AppBridge.SignInCommand.fromObject({
            userToken: LC_TOKEN,
            platform: 'prestashop',
            platformVer: PS_VER,
            moduleVer: MODULE_VER
          }));
        }

        if(STORE_TOKEN) {
          return bridge.call(AppBridge.JoinCommand.fromObject({
            storeToken: STORE_TOKEN,
            userId: USER_EMAIL,
            userName: USER_NAME,
            platform: 'prestashop',
            platformVer: PS_VER,
            moduleVer: MODULE_VER
          }));
        }

        return bridge.call(AppBridge.ConnectCommand.fromObject({
          storeUrl: STORE_URL,
          userId: USER_EMAIL,
          userName: USER_NAME,
          platform: 'prestashop',
          platformVer: PS_VER,
          moduleVer: MODULE_VER
        }));
      });
    }, 100);
  })();
</script>
