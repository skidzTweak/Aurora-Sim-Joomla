<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php echo JText::_('CURRENCY PURCHASE'); ?>
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
						<td><?=$_SESSION[paypalPurchaseItem]?></td>
					</tr>
					<tr class="even">
						<td><?php echo JText::_('YOU ARE PAYING'); ?></td>
						<td>$<?=$_SESSION[paypalAmount]?> <?php echo JText::_('PAYMENT TYPE'); ?></td>
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
							<a href="/send_to_paypal.php?PAYPAL_URL=<?=$PAYPAL_URL;?>&NOTIFY_URL=<?=$NOTIFY_URL;?>&PAYPAL_ACCOUNT=<?=$PAYPAL_ACCOUNT;?>&RETURN_URL=<?=$RETURN_URL;?>&paypalAmount=<?=$paypalAmount;?>&purchase_type=<?=$purchase_type;?>&paypalPurchaseItem=<?=$paypalPurchaseItem;?>&purchase_id=<?=$_SESSION['purchase_id'];?>"><img align="right" style="float:right" src="/modules/mod_stardust_purchase/images/paypal-purchase-button.png" /></a>
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