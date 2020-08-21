<?php
namespace Vanderbilt\Fast_Records_Table;

class Fast_Records_Table extends \ExternalModules\AbstractExternalModule {
	
	function getColumns() {
		// create array holding columns like ["Display Name" => display_name]
		$pid = $this->getProjectId();
		$project = new \Project($pid);
		$eid = $proj->firstEventId;
		$settings = $this->getProjectSettings();
		
		$datacols = $settings['data-columns'];
		$formcols = $settings['form-columns'];
		
		// $cols gets returned
		$cols = new \stdClass();
		$cols->data_columns = [];
		$cols->form_columns = [];
		
		// prepend record ID field if needed
		$rid_field = \REDCap::getRecordIdField();
		if (array_search($rid_field, $datacols) == false) {
			array_unshift($datacols, $rid_field);
		}
		
		foreach($datacols as $i => $field) {
			$label = $project->metadata[$field]['element_label'];
			$cols->data_columns[$label] = $field;
		}
		
		if (count($formcols) == 1 and empty($formcols[0]))
			$formcols = null;
		
		foreach($formcols as $i => $form) {
			$label = $project->forms[$form]['menu'];
			$cols->form_columns[$label] = $form;
		}
		
		// default to all forms if none specified
		if (empty($formcols)) {
			foreach($project->forms as $form => $form_info) {
				$label = $form_info['menu'];
				if (!empty($form) && !empty($label))
					$cols->form_columns[$label] = $form;
			}
		}
		
		return $cols;
	}
	
	// function nlog() {
		// if (file_exists("C:/vumc/log.txt")) {
			// file_put_contents("C:/vumc/log.txt", "constructing Fast_Records_Table instance\n");
		// }
	// }
	
	// function llog($text) {
		// if (file_exists("C:/vumc/log.txt")) {
			// file_put_contents("C:/vumc/log.txt", "$text\n", FILE_APPEND);
		// }
	// }
	
}
