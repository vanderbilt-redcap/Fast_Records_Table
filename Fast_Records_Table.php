<?php
namespace Vanderbilt\Fast_Records_Table;

class Fast_Records_Table extends \ExternalModules\AbstractExternalModule {
	
	public function __construct() {
		parent::__construct();
		// $this->nlog();
		// $psettings = $this->getProjectSettings();
		// $this->llog("getProjectSettings: " . print_r($psettings, true));
		
		// $pid = $this->getProjectId();
		// $proj = new \Project($pid);
		// $eid = $proj->firstEventId;
		// $this->llog("project: " . print_r($proj, true));
	}
	
	// other helper functions
	function nlog() {
		if (file_exists("C:/vumc/log.txt")) {
			file_put_contents("C:/vumc/log.txt", "constructing Fast_Records_Table instance\n");
		}
	}
	
	function llog($text) {
		if (file_exists("C:/vumc/log.txt")) {
			file_put_contents("C:/vumc/log.txt", "$text\n", FILE_APPEND);
		}
	}
	
	function rlog($msg, $changes = "") {
		\REDCap::logEvent("Fast Records Table", $msg, $changes);
	}
	
	function get_value_label($field, $value) {
		if ($value == "")
			return false;
		$enum = $this->project->metadata[$field]["element_enum"];
		preg_match_all("/$value, ([^\\\]+)/", $enum, $matches);
		if (isset($matches[1][0])) {
			return $matches[1][0];
		}
		return false;
	}
	
}
