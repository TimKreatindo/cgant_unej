$(document).ready(function () {
	$("#main-table").dataTable();
});

$("#form_modal").submit(function (e) {
	e.preventDefault();
	loading_animation();
	$("#modalLab").modal("hide");

	$.ajax({
		type: "POST",
		url: $(this).attr("action"),
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
		error: function (xhr, status, error) {
			setTimeout(() => {
				Swal.close();
				error_alert_reloaded(error);
			}, 200);
		},
		success: function (d) {
			regenerate_token(d.token);
			setTimeout(() => {
				Swal.close();
				if (d.status == false) {
					erorr_alert(d.msg);
					$("#modalLab").modal("show");
				} else {
					success_alert_reloaded(d.msg);
				}
			}, 200);
		},
	});
});

$(".act-detail").submit(function (e) {
	e.preventDefault();
	loading_animation();
	$.ajax({
		url: $(this).attr("action"),
		data: $(this).serialize(),
		type: "POST",
		dataType: "JSON",
		error: function (xhr, status, error) {
			setTimeout(() => {
				Swal.close();
				error_alert_reloaded(error);
			}, 200);
		},
		success: function (d) {
			regenerate_token(d.token);
			setTimeout(() => {
				Swal.close();

				if (d.status == false) {
					erorr_alert(d.msg);
				} else {
					let main_data = d.data;
					let html = `<table class="table table-bordered table-sm">
                                    <tr>
                                        <th>Nama Bahan/Alat</th>
                                        <td>${main_data.nama}</td>
                                    </tr>
                                    <tr>
                                        <th>Merk Bahan/Alat</th>
                                        <td>${main_data.merk}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Bahan/Alat</th>
                                        <td>${main_data.kategori}</td>
                                    </tr>
                                    <tr>
                                        <th>Spesifikasi Bahan/Alat</th>
                                        <td>${main_data.spesifikasi}</td>
                                    </tr>
                                    <tr>
                                        <th>Volume Bahan/Alat</th>
                                        <td>${main_data.volume}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Bahan/Alat</th>
                                        <td>${main_data.jumlah}</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan Bahan/Alat</th>
                                        <td>${main_data.satuan}</td>
                                    </tr>
                                    
                                </table>`;

					$("#modalDetail").modal("show");
					$("#modalDetail .modal-body").html(html);
				}
			}, 200);
		},
	});
});

$(".act-edit").submit(function (e) {
	e.preventDefault();
	loading_animation();
	$.ajax({
		url: $(this).attr("action"),
		data: $(this).serialize(),
		type: "POST",
		dataType: "JSON",
		error: function (xhr, status, error) {
			setTimeout(() => {
				Swal.close();
				error_alert_reloaded(error);
			}, 200);
		},
		success: function (d) {
			regenerate_token(d.token);
			setTimeout(() => {
				Swal.close();

				if (d.status == false) {
					erorr_alert(d.msg);
				} else {
					const main_data = d.data;
					$("#modalLab").modal("show");
					$("#modalLab .modal-title").html("Edit Data");
					$("#act_modal").val("edit");

					$("#id_modal").val(main_data.id);
					$("#nama").val(main_data.nama);
					$("#merk").val(main_data.merk);
					$("#spesifikasi").val(main_data.spesifikasi);
					$("#kategori").val(main_data.kategori);

					$("#volume").val(main_data.volume);
					$("#jumlah").val(main_data.jumlah);
					$("#satuan").val(main_data.satuan);
				}
			}, 200);
		},
	});
});

$(".act-delete").submit(function (e) {
	e.preventDefault();

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "untuk menghapus data ini",
		showCancelButton: true,
		confirmButtonText: "Yes",
		denyButtonText: `No`,
	}).then((res) => {
		if (res.isConfirmed) {
			loading_animation();
			$.ajax({
				url: $(this).attr("action"),
				data: $(this).serialize(),
				type: "POST",
				dataType: "JSON",
				error: function (xhr, status, error) {
					setTimeout(() => {
						Swal.close();
						error_alert_reloaded(error);
					}, 200);
				},
				success: function (d) {
					regenerate_token(d.token);
					setTimeout(() => {
						Swal.close();

						if (d.status == false) {
							erorr_alert(d.msg);
						} else {
							success_alert_reloaded(d.msg);
						}
					}, 200);
				},
			});
		}
	});
});

function add_data() {
	$("#modalLab").modal("show");
	$("#modalLab .modal-title").html("Tambah Bahan/Alat laboratorium");

	$("#act_modal").val("add");
	$("#id_modal").val("");

	$("#nama").val("");
	$("#merk").val("");
	$("#spesifikasi").val("");
	$("#kategori").val("");
	$("#volume").val("");
	$("#jumlah").val("");
	$("#satuan").val("");
}
