<div class="panel-group accordion" id="accordion3">
	<div class="panel">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-parent="#accordion3" data-toggle="collapse"
					href="javascript:void(0)" data-href="#loginScheSettingsDiv"
					class="form-panel-title collapsed" aria-expanded="false">Login
					Access/Schedule</a>
			</h4>
		</div>
		<div class="panel-collapse collapse" id="loginScheSettingsDiv" aria-expanded="false">
			<div class="pad-all clrBoth"></div>

			<!-- 24/7 Access -->
			<div class="col-lg-12">
				<div class="form-group row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
						<span class="text-bold">24/7 Access</span>
						<span class="popover-info" data-toggle="popover"
							data-container="#studentAccordion" data-placement="right"
							data-trigger="hover"
							data-content="Select if the student needs 24/7 access to the course materials.">
							<i class="fa fa-info-circle" aria-hidden="true"></i>
						</span>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="checkbox col-lg-12 pad-no">
							<?=Widgets::createCheckBox(array(
								"name" => FIELD_NAME_ANY_TIME_FLAG,
								"id" => FIELD_NAME_ANY_TIME_FLAG,
								"class" => "magic-checkbox",
								"value" => 1,
								"checked" => isset($user->student->anyTimeFlag) ? $user->student->anyTimeFlag : "",
								"event" => "onclick=scheduleLogin(1);"
							));?>
							<label for="<?=FIELD_NAME_ANY_TIME_FLAG?>"></label>
						</div>
						<span class="text-danger errorMessage" id="<?=FIELD_NAME_ANY_TIME_FLAG?>Error"></span>
					</div>
				</div>
			</div>

			<!-- Tutoring Interval Activities Checkboxes -->
			<div class="col-lg-12">
				<div class="form-group row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
						<span class="text-bold extraInfo"><?=FIELD_LABEL_TUTORING_INTERVAL?> 
							<span class="small extraText">(24 hour format)</span>
						</span>
						<span class="popover-info" data-toggle="popover"
							data-container="#studentAccordion" data-placement="right"
							data-trigger="hover"
							data-content="Select the activities to be accessed as per the schedule below.">
							<i class="fa fa-info-circle" aria-hidden="true"></i>
						</span>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<?php
						$tutoringActivityVars = [
							$tutoringIntervalPretest => "Course Pretest",
							$tutoringIntervalPosttest => "Course Posttest",
							$tutoringIntervalLesson => "Lesson",
							$tutoringIntervalLessonPostest => "Lesson Posttest",
							$tutoringIntervalUnitTest => "Unit Test",
							$tutoringIntervalSession => "Session"
						];

						foreach ($tutoringActivityVars as $var => $labelText) {
							$checked = isset($studentDO->tutoringActivities[$var]);
						?>
							<div class="checkbox col-lg-12 pad-no">
								<?=Widgets::createCheckBox(array(
									"name" => FIELD_NAME_TUTORING_INTERVAL_ACTIVITY."[]",
									"id" => "checkbox_tutoring_activity_".$var,
									"title" => $var,
									"class" => "magic-checkbox",
									"value" => $var,
									"checked" => $checked
								));?>
								<label for="checkbox_tutoring_activity_<?=$var?>"><?=$labelText?></label>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- User Intervals (Editable) -->
			<div class="col-lg-12">
				<div class="row">
					<table id="intervalTable" width="100%" class="table">
						<tr>
							<th class="border text-right" width="20%">Days</th>
							<th class="border text-center" width="20%">Interval I</th>
							<th class="border text-center" width="20%">Interval II</th>
							<th class="border text-center" width="20%">Interval III</th>
							<th class="border text-center" width="20%">Interval IV</th>
						</tr>
						<?php foreach ($dayNumbers as $day => $dayName) { ?>
							<tr id="tr_day_<?=$day?>">
								<td class="border">
									<div class="header" align="right"><?=$dayName?></div>
								</td>
								<?php for ($i = 0; $i < 4; $i++) {
									$startHour = "";
									$endHour = "";
									if (isset($studentDO->usageInterval[$day][$i])) {
										$usageInterval = $studentDO->usageInterval[$day][$i];
										$startHour = $usageInterval->intervalStartHour;
										$endHour = $usageInterval->intervalEndHour;
									}
								?>
									<td width="15%" class="border">
										<?=Widgets::createFieldError(FIELD_NAME_INTERVAL_START_TIME."[$day][$i]", false)?>
										<?=Widgets::createFieldError(FIELD_NAME_INTERVAL_END_TIME."[$day][$i]", false)?>
										<?=Widgets::createTextBox(array(
											"name" => FIELD_NAME_INTERVAL_START_TIME."[$day][$i]",
											"defaultValue" => $startHour,
											"class" => "form-control sm-input",
											"event" => "onkeypress='return isNumberKey(event)'",
											"maxLength" => FIELD_VALUE_TUTORING_START_INTERVAL_MAXIMUM_LENGTH,
											"size" => 3
										));?> to
										<?=Widgets::createTextBox(array(
											"name" => FIELD_NAME_INTERVAL_END_TIME."[$day][$i]",
											"defaultValue" => $endHour,
											"class" => "form-control sm-input",
											"event" => "onkeypress='return isNumberKey(event)'",
											"maxLength" => FIELD_VALUE_TUTORING_END_INTERVAL_MAXIMUM_LENGTH,
											"size" => 3
										));?>
									</td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>

			<!-- School Intervals (Read-Only) -->
			<?php if ($entityName == ENTITY_USER && $action == "Edit Accommodations" && isset($school->tutoringActivities)) { ?>
				<div class="col-lg-12">
					<div class="row">
						<h1><b class="scooltest">School</b></h1>
						<div class="header test"><?=FIELD_LABEL_TUTORING_INTERVAL?><span class="small"> (24 hour format)</span>
							<?php
							$activityNames = "";
							if (!ValidationUtils::isEmpty($school->tutoringActivities)) {
								$names = array_map(function($act) { return $act->activityName; }, $school->tutoringActivities);
								$activityNames = implode(", ", $names);
							}
							echo VueUtils::getHTMLText($activityNames);
							?>
						</div>
						<table width="80%" class="border floatcenter">
							<tr>
								<th class="border" align="center" width="20%">Days</th>
								<th class="border" align="center" width="20%">Interval I</th>
								<th class="border" align="center" width="20%">Interval II</th>
								<th class="border" align="center" width="20%">Interval III</th>
								<th class="border" align="center" width="20%">Interval IV</th>
							</tr>
							<?php foreach ($dayNumbers as $day => $dayName) { ?>
								<tr>
									<td class="border"><div class="header" align="right"><?=$dayName?></div></td>
									<?php
									$colspan = "";
									$brake = false;
									for ($i = 0; $i < 4; $i++) {
										if (isset($school->usageInterval[$day])) {
											if (isset($school->usageInterval[$day][$i])) {
												$usageInterval = $school->usageInterval[$day][$i];
												$interval = $usageInterval->intervalStartHour . " to " . $usageInterval->intervalEndHour;
											} else {
												$interval = "--";
											}
										} else {
											$interval = "Any Time";
											$colspan = 4;
										}
										if ($colspan == "") {
											echo "<td class='border' align='center'>$interval</td>";
										} elseif (!$brake) {
											$brake = true;
											echo "<td class='border' colspan='4' align='center'>$interval</td>";
										}
									}
									?>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<!-- ✅ Final Submit Buttons OUTSIDE accordion -->
<table align="center" width="100%" style="margin-bottom: 25px;">
	<tr>
		<td align="center" colspan="3">
			<?php if (isset($classID)) { ?>
				<input id="classID" name="classID" value="<?=$classID?>" type="hidden">
				<input id="courseID" name="courseID" value="<?=$courseID?>" type="hidden">
			<?php } else { ?>
				<input id="id" name="id" value="<?=$id?>" type="hidden">
			<?php } ?>
			<?=Widgets::createAjaxActionButton("Edit Accommodations")?>
			<?=Widgets::createAjaxCancelButton()?>
		</td>
	</tr>
</table>
