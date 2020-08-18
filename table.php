
<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';
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
            <th>Record ID</th>
			<th>First Name</th>
            <th>Last Name</th>
            <th>Form 1</th>
            <th>Form 2</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';