<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<table cellpadding="8" cellspacing="8">
	<tr>
		<td>
			<? 
			if (empty($submitted))
			{
				foreach ($items as $item) {?>
					<form action="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>" >
						<div style=" width:85%; border-top-left-radius: 10px 10px; border-top-right-radius: 10px 10px; border-bottom-left-radius: 10px 10px; border-bottom-right-radius: 10px 10px; background-color: rgb(0, 0, 0);padding:10px 10px 10px 10px; ">
							<h3>Name: <?=$item['name'] ?></h3> 
							<p><img align="right" src="/modules/mod_stardust_land/images/SimImageStub.jpg" /><?=$item['description']?></p>
							<input type="hidden" name="idx" value="<?=$item['id']?>" />
							<input type="hidden" name="button_id" value="<?=$item['button_id']?>" />
							<input type="Submit" name="submit" value="Get It for only <?=$item['price'] / 100.0 ?>" />
						</div>
					</form>
					<br/>
				<?}
			}else{?>
				<form action="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>" name="thisform" id="thisform">
					<table width="100%">
						<tr>
							<td colspan="2" style="color:red;"><?=$error;?></td>
						</tr>
						<tr>
							<td align="right"><?php echo JText::_('REGION NAME'); ?></td>
							<td><input name="name" type="text" maxlength="36" value="<?=$_GET[name]?>"  /></td>
						</tr>
						<tr>
							<td colspan="2">
								<?if ($_GET[error] != ''){?>
									<div><?=$_GET[error]?></div>
								<?}?>
							</td>
						</tr>						
						<tr>
							<td align="right" valign="top"><?php echo JText::_('ADDITIONAL NOTES'); ?></td>
							<td><textarea name="notes" cols=50 rows=5 maxlength="1024"><?=$_GET[notes]?></textarea></td>
						</tr>
						<tr>
							<td valign="bottom" colspan="2">
								<?php echo JText::_('TERMS OF SERVICE'); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div style="width:100%;height:100px;overflow:auto;"><?=$tos?></div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="checkbox" name="agree" id="agree" value="1" /><label for="agree"><?php echo JText::_('I AGREE'); ?></label>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit2" value="<?php echo JText::_('GET IT'); ?>" />
								<input type="hidden" name="idx" value="<?=$_GET["idx"]?>" />
							</td>
						</tr>
					</table>
				</form>
			<?}?>
		</td>
	</tr>
</table>