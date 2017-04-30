$(document).ready(function(){	  
 
	$('#datatables').dataTable({
		"oLanguage": {
		   "sLengthMenu": "Tampilkan _MENU_ data per halaman",
		   "sSearch": "Pencarian: ", 
		   "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
		   "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
		   "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
		   "sInfoFiltered": "(di filter dari _MAX_ total data)",
		   "oPaginate": {
			  "sFirst": "<<",
			  "sLast": ">>", 
			  "sPrevious": "<", 
			  "sNext": ">"
		   }
		},
	"sPaginationType":"full_numbers"
	});

});