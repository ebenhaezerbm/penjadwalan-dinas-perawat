( function ($) {

	$('#date-of-birth').datepicker({ onSelect: function(dateStr) {
		var max = $(this).datepicker('getDate'); // Get selected date
		if (max) {
			// max.setDate(max.getDate() - 1);
			max.setDate(max.getDate());
		}
	}, dateFormat : 'yy-mm-dd', yearRange: "-40:+0", changeMonth: true, changeYear: true});

	$(document).on( 'click', '.btn-delete', function(e) {
		e.preventDefault();

		var id = $(this).data('id');

		swal({
				title: "Peringatan!", 
				text: "Apakah Anda yakin ingin menghapus data ?", 
				type: "warning", 
				showConfirmButton: true, 
				confirmButtonText: "OK", 
				confirmButtonColor: "#DD6B55", 
				closeOnConfirm: true, 
				showCancelButton: true, 
				cancelButtonText: "Cancel", 
				cancelButtonColor: "#D81921", 
				closeOnCancel: true 
			}, function(isConfirm){
				var dataForm = {
					id: id
				};

				if(isConfirm){
					var dataPost = {
						'dataForm': dataForm
					};

					$.ajax({
						url: base_url + 'c_Perawat/delete_perawat/' + id,
						data: dataPost,
						dataType: 'json',
						type: 'POST',
						success: function(response){
							console.log(response);

							location.reload(true);
						}
					});
					return false;
				}
			}
		);
	});

}(jQuery))