<?php
$pid = $module->getProjectId();
$proj = new \Project($pid);
$eid = $proj->firstEventId;

$link_url = APP_PATH_WEBROOT_FULL;
$link_url0 = str_replace("/redcap/", APP_PATH_WEBROOT, $link_url) . "DataEntry/record_home.php?pid=$pid&arm=1&id=";
$link_url1 = str_replace("/redcap/", APP_PATH_WEBROOT, $link_url) . "DataEntry/index.php?pid=$pid&page=new_employee_upload&id=";
$link_url2 = str_replace("/redcap/", APP_PATH_WEBROOT, $link_url) . "DataEntry/index.php?pid=$pid&page=processing_form&id=";

$data = \REDCap::getData($pid, 'array');

$json = new \stdClass();
$table_data = [];
foreach($data as $rid => $record) {
	$link0 = "<a href='" . $link_url0 . $rid . "'>$rid</a>";
	$link1 = "<a href='" . $link_url1 . $rid . "'>New Employee Upload</a>";
	$link2 = "<a href='" . $link_url2 . $rid . "'>Processing Form</a>";
	$table_data[] = [
		$link0,
		$record[$eid]['first_name'],
		$record[$eid]['last_name'],
		$link1,
		$link2
	];
}

$json->data = $table_data;
exit(json_encode($json));