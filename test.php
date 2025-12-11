<div class="col-lg-12">
						<div class="form-group row">
<tr>
						<td class="border" colspan ="4">
							<div class="header"><?=FIELD_LABEL_TUTORING_INTERVAL?><span class="small"> (24 hour format)</span>
							<?
							$index = 0;
							$activityNames = "";
							if (!ValidationUtils::isEmpty($school->tutoringActivities)) {
								foreach ($school->tutoringActivities as $activities) {
									if ($index != 0) {
										$activityNames .= ", ";
									}
									$activityNames .= $activities->activityName;
									$index++;
								}
							}
							?>
							<?=VueUtils::getHTMLText($activityNames)?>
							
							
							</div>
							<table width="60%" class="border floatleft">
							<tr>
								<th class="border" align="center" width="20%">Days</th>
								<th class="border" align="center" width="20%">Interval I</th>
								<th class="border" align="center" width="20%">Interval II</th>
								<th class="border" align="center" width="20%">Interval III</th>
								<th class="border" align="center" width="20%">Interval IV</th>
							</tr>
								<?
								foreach ($dayNumbers as $day => $dayName) {
								?>
									<tr>
										<td class="border">
											<div class="header" align="right"><?=$dayName?></div> 
										</td>
											<?
											$colspan = "";
											$brake = false;
											for ($i=0; $i<4; $i++) {
												$startHour = "";
												$endHour = "";
												if (isset($school->usageInterval[$day])) {
													if (isset($school->usageInterval[$day][$i])) {
														$usageInterval = $school->usageInterval[$day][$i];
														$interval = $usageInterval->intervalStartHour." to ".$usageInterval->intervalEndHour;
													} else {
														$interval = "--";
													}
												} else {
													$interval = "Any Time";
													$colspan = 4;
												}	
											if ($colspan == "") {
											?>
												<td width="15%" class="border" align="center"><?=$interval?></td>
											<?
											} else if(!$brake){
												$brake = true;?>
												<td colspan ="4" class="border" align="center"><?=$interval?></td>
											<?}
											}
											?>
									</tr>
								<?	
								}
								?>
							</table>
							<?
							?>
						</td>
					</tr>	

</div>
</div>