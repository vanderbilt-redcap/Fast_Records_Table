
<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';
$cols = $module->getColumns();
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $module->getUrl('css/FRTable.css'); ?>">
<script type="text/javascript" charset="utf8">
	FRTable = {
		ajax_url: <?php echo '"' . $module->getUrl("table_ajax.php") . '"'; ?>
	}
</script>
<script type="text/javascript" charset="utf8" src="<?php echo $module->getUrl('js/FRTable.js'); ?>"></script>

<table id="records" class="display compact nowrap">
    <thead>
        <tr>
			<?php
			foreach($cols->data_columns as $display => $actual) {
				echo "<th>$display</th>\n";
			}
			foreach($cols->form_columns as $display => $actual) {
				echo "<th>$display</th>\n";
			}
			?>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';