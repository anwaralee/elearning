<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php 
$config['paypal_email'] = "training_seller@gmail.com"; //your paypal email
$config['paypal_currency_code'] = 'USD'; //currency: nok, usd, gbp... https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes
$config['paypal_live'] = FALSE;     //bool: paypal live? or sandbox
$config['ipn_log'] = TRUE;      //bool: log active? requires database
?>