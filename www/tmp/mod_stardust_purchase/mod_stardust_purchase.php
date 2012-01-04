<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
$user =& JFactory::getUser();

$tx_token = $_GET['tx'];
if ($tx_token != "")
{
	$tx = $_GET[tx];
	$st = $_GET[st];
	$amt = $_GET[amt];
	$cc = $_GET[cc];
	$cm = $_GET[cm];
	$item_number = $_GET[item_number];
	$req = 'cmd=_notify-synch';
	$DO_NOTIFICATION = $params->get('DO_NOTIFICATION')
	$NOTIFICATION_EMAIL = $params->get('NOTIFICATION_EMAIL')
	$results = ModStarDust_PurchaseHelper::checkItems($STARDUST_SERVICE_URL, $tx, $st, $amt, $cc, $cm, $item_number, $req, $NOTIFICATION_EMAIL, $DO_NOTIFICATION);
	$waserror = $results[0];
	$recieved = $results[1];
	require(JModuleHelper::getLayoutPath('mod_stardust_purchase'));
}
else
{
	if ($user->guest) {
		$loginURL = '/index.php?option=com_user&view=login';
		$myurl = $_SERVER['REQUEST_URI'];
		$myurl = base64_encode($myurl);
		$myurl = '&return='.$myurl;
		header("Location: ".$loginURL.$myurl);
	} else { 
		$AmountAdditionPerfectage = $params->get('AmountAdditionPerfectage');
		$STARDUST_SERVICE_URL = $params->get('STARDUST_SERVICE_URL');
		if ($_GET['purchase_id'] != "")
		{
			$_SESSION['purchase_id'] = $_GET['purchase_id'];
		}
		
		if ($_SESSION['purchase_id'] != '')
		{
			$PAYPAL_URL = $params->get('PAYPAL_URL');
			$NOTIFY_URL = $params->get('NOTIFY_URL');
			$PAYPAL_ACCOUNT = $params->get('PAYPAL_ACCOUNT');
			$RETURN_URL = $params->get('RETURN_URL');
			// get the items to display from the helper
			$results = ModStarDust_PurchaseHelper::getItems($user, $STARDUST_SERVICE_URL);
			$waserror = $results[0];
			if ($waserror == "0")
			{
				$paypalPurchaseItem = $results[2];
				$purchase_type = $results[3];
				$recieved = $results[4];
				require(JModuleHelper::getLayoutPath('mod_stardust_purchase'));
			}
		}
		else
		{
			header("Location: /");
		}
	}	
}
?>