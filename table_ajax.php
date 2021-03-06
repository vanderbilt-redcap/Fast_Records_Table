<?php
$pid = $module->getProjectId();
$project = new \Project($pid);
$eid = $project->firstEventId;
$cols = $module->getColumns();

// determine record home page link address
if (strpos(APP_PATH_WEBROOT_FULL, "/redcap/") !== false) {	// dev
	$link_base = str_replace("/redcap/", APP_PATH_WEBROOT, APP_PATH_WEBROOT_FULL);
} else {	// test/prod
	$link_base = substr(APP_PATH_WEBROOT_FULL, 0, -1) . APP_PATH_WEBROOT;
}

$record_link = $link_base . "DataEntry/record_home.php?pid=$pid&arm=1&id=";
$form_links = [];
foreach($cols->form_columns as $display => $form) {
	$form_links[$form] = $link_base . "DataEntry/index.php?pid=$pid&page=$form&id=";
}


$field_array = $module->getFieldArray();
$module->llog('field array: ' . print_r($field_array, true));
$data = \REDCap::getData($pid, 'array', null, $field_array);

$json = new \stdClass();
$table_data = [];
$record_id_field = \REDCap::getRecordIdField();
foreach($data as $rid => $record) {
	$row = [];
	
	// append data column values
	foreach($cols->data_columns as $display => $field) {
		if ($field == $record_id_field) {
			$row[] = "<a href='" . $record_link . $rid . "'>$rid</a>";
		} else {
			$row[] = $record[$eid][$field];
		}
	}
	
	// append form links
	foreach($cols->form_columns as $display => $form) {
		$row[] = "<a href='" . $form_links[$form] . $rid . "'>$display</a>";
	}
	
	$table_data[] = $row;
}

$json->data = $table_data;
exit(json_encode($json));