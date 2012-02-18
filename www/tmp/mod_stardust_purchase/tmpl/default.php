<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php 

//get live_site
if(defined('_JEXEC')){
   //joomla 1.5               
   $live_site = JURI::root();               
}else{
   //joomla 1.0.x
   $live_site = $mosConfig_live_site;
}

?>
<? if ($waserror == "2") { ?>
	<table width="100%">
		<tr>
			<td><?php echo JText::_('PURCHASE COMPLETE'); ?></td>
		</tr>
	</table>
<? } else if ($waserror == "1") { ?>
	<table width="100%">
		<tr>
			<td><?php echo JText::_('PURCHASE ISSUE'); ?></td>
		</tr>
	</table>
<?} else if ($waserror == "0") { ?>
	<table width="100%">
		<tr>
			<td>
				<font><b><?php echo JText::_('PURCHASE WITH PAYPAL'); ?></b></font>
			</td>
			<td>
				<table>
					<tr>
						<td colspan="2"><?php echo JText::_('PLEASE REVIEW'); ?></td>
					</tr>
					<tr class="odd">
						<td><?php echo JText::_('YOU ARE BUYING'); ?></td>
						<td><?=$paypalPurchaseItem?></td>
					</tr>
					<tr class="even">
						<td><?php echo JText::_('YOU ARE PAYING'); ?></td>
						<td>$<?=$paypalAmount?> <?php echo JText::_('PAYMENT TYPE'); ?></td>
					</tr>
					<tr class="odd">
						<?if ($recieved->{'PurchaseType'} == 1){?>
							<td colspan="2">* <?php echo JText::_('ADDITIONAL FEE'); ?> <?=$AmountAdditionPerfectage?><?php echo JText::_('ADDITIONAL FEE2'); ?></td>
						<?}else{?>
							<td colspan="2">* <?php echo JText::_('MONTHLY FEE'); ?></td>
						<?}?>
					</tr>
					<tr>
						<td colspan="2">
							<a href="<?=$live_site?>send_to_paypal.php"><img align="right" style="float:right" src="<?=$live_site?>modules/mod_stardust_purchase/images/paypal-purchase-button.png" /></a>
						</td>
					</tr>
					<tr>
						<td colspan="2"><h2><?php echo JText::_('FAQ'); ?></h2></td>
					</tr>
					<tr class="odd">
						<td colspan="2"><?php echo JText::_('FAQ-Q1'); ?></td>
					</tr>
					<tr class="even">
						<td colspan="2"><?php echo JText::_('FAQ-A1'); ?></td>
					</tr>
					<tr class="odd">
						<td colspan="2"><?php echo JText::_('FAQ-Q2'); ?> <?=($AmountAdditionPerfectage * 100)?>?</td>
					</tr>
					<tr class="even">
						<td colspan="2"><?php echo JText::_('FAQ-A2'); ?></td>
					</tr>
				</table>				
			</td>
		</tr>
	</table>
<? } ?>