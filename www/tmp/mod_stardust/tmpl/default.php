<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php echo JText::_('CURRENCY HISTORY'); ?>
	<table width="100%">
		<tr>
			<td>
				<font><b><?=$count?> <?php echo JText::_('CURRENCY RECORDS'); ?></b></font>
			</td>
			<td>
			<div id="region_navigation">
				<table>
					<tr>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=0&amp;ALimit=<?=$ALimit?>" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/icon_back_more_<? if(0 > ($AStart - $ALimit)) echo off; else echo on ?>.gif WIDTH=15 HEIGHT=15 border="0" />
							</a>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=<? if(0 > ($AStart - $ALimit)) echo 0; else echo $AStart - $ALimit; ?>&amp;ALimit=<?=$ALimit?>" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/icon_back_one_<? if(0 > ($AStart - $ALimit)) echo off; else echo on ?>.gif WIDTH=15 HEIGHT=15 border="0" />
							</a>
						</td>
						<td>
						  	<? echo $webui_navigation_page; ?> <?=$sitestart ?> <?php echo JText::_('Of'); ?> <?=$sitemax ?>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=<? if($count <= ($AStart + $ALimit)) echo 0; else echo $AStart + $ALimit; ?>&amp;ALimit=<?=$ALimit?>" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/icon_forward_one_<? if($count <= ($AStart + $ALimit)) echo off; else echo on ?>.gif WIDTH=15 HEIGHT=15 border="0" />
							</a>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=<? if(0 > ($count <= ($AStart + $ALimit))) echo 0; else echo ($sitemax - 1) * $ALimit; ?>&amp;ALimit=<?=$ALimit?>" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/icon_forward_more_<? if($count <= ($AStart + $ALimit)) echo "off"; else echo "on" ?>.gif WIDTH=15 HEIGHT=15 border="0" />
							</a>
						</td>
						<td></td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=0&amp;ALimit=10&amp;" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/<? if($ALimit != 10) echo icon_limit_10_on; else echo icon_limit_off; ?>.gif WIDTH=15 HEIGHT=15 border="0" ALT="Limit 10" />
							</a>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=0&amp;ALimit=25&amp;" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/<? if($ALimit != 25) echo icon_limit_25_on; else echo icon_limit_off; ?>.gif WIDTH=15 HEIGHT=15 border="0" ALT="Limit 25" />
							</a>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=0&amp;ALimit=50&amp;" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/<? if($ALimit != 50) echo icon_limit_50_on; else echo icon_limit_off; ?>.gif WIDTH=15 HEIGHT=15 border="0" ALT="Limit 50" />
							</a>
						</td>
						<td>
							<a href="<?=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);?>&AStart=0&amp;ALimit=100&amp;" target="_self">
								<img SRC=/modules/mod_aurora_list_regions/icons/<? if($ALimit != 100) echo icon_limit_100_on; else echo icon_limit_off; ?>.gif WIDTH=15 HEIGHT=15 border="0" ALT="Limit 100" />
							</a>
						</td>
					</tr>
				</table>
				</div>
			</td>
		</tr>
	</table>
	<table width="100%">
		<thead>
			<tr>
				<td width="15%">
					From
				</td>
				<td width="15%">
					To
				</td>
				<td width="25%">
					Region
				</td>
				<td width="15%">
					Amount
				</td>
				<td width="15%">
					Date
				</td>
				<td width="15%">
					Balance
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="6">
					<table width="100%">
						<tbody>
						<?
							$w=0;
							foreach ($items as $item) 
							{
								$w++;
								?>
									<tr class="even" >
										<td width="15%">
											<div><?=$item['FromName']?></div>
										</td>
										<td width="15%">
											<div><?=$item['ToName']?></div>
										</td>
										<td width="25%">
											<div><?=$item['RegionName']?></div>
										</td>
										<td width="15%">
											<div><?=$item['Amount']?></div>
										</td>
										<td width="15%">
											<div><?=$time_output=date("m-d-y H:i",$item['Created'])?></div>
										</td>
										<td width="15%" align="right">
											<div><?
												if ($item['ToPrincipalID'] == $UUID){?>
													<span style="color:green">+<?=$item['ToBalance']?></span>
												<?}else if ($item['FromPrincipalID'] == $UUID){?>
													<span style="color:red">-<?=$item['FromBalance']?></span>
												<?}?></div>
										</td>
									</tr>
									<tr class="odd">
										<td colspan="6" width="100%">
											<? if (($item['ToObjectName'] != "") || ($item['FromObjectName'] != "")){ ?>
												<?=$item['ToObjectName']?><?=$item['FromObjectName']?>:
											<?}?>
											<?=$item['Description']?>
										</td>
									</tr>
								<?}?>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>