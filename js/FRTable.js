$(document).ready(
	function() {
		FRTable.datatable = $('#records').DataTable({
			ajax: FRTable.ajax_url,
			pageLength: 25,
			columnDefs: [
				{className: 'dt-center', targets: '_all'}
			]
		});
	}
);