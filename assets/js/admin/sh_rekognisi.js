$(document).ready(function () {
	load_table();
});

function load_table() {
	$("#main-table").DataTable().destroy();
	$("#main-table").dataTable({
		processing: true,
		serverSide: true,
		order: [],
		ajax: {
			url: base_url + "admin/datatable-rekognisi",
			type: "POST",
		},
		columnDefs: [
			{
				target: [0, 1, 2, 3, 4, 5],
				classname: "text-center text-nowrap",
			},
		],
		ordering: false,
		iDisplayLength: 10,
		autoWidth: false,
	});
}

$(document).on("submit", ".action", function (e) {
	e.preventDefault();
	$("#staticBackdrop .modal-title").html("Detail Data");
	// $("#staticBackdrop").modal("show");

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
					error_alert(d.msg);
				} else {
					if (d.status == false) {
						error_alert(d.msg);
					} else {
						let main_data = d.data;
						let bukti = d.data.bukti;
						let html_bukti = "";
						const base_file = base_url + "assets/upload/rekognisi/";

						if (bukti.type == "file") {
							let main_bukti = bukti.data;
							let li = "";
							for (let i = 0; i < main_bukti.length; i++) {
								li +=
									'<li> <a href="' +
									base_file +
									main_bukti[i].file_name +
									'" target="_blank"> ' +
									main_bukti[i].ori_name +
									" </a> </li>";
							}
							html_bukti = "<ul>" + li + "</ul>";
						} else {
							html_bukti =
								'<a target="_blank" href="' +
								bukti.url +
								'">' +
								bukti.url +
								"</a>";
						}

						let html = `<table class="table table-bordered table-sm">
                                        <tr>
                                            <th>Tahun</th>
                                            <td>${main_data.tahun}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Rekognisi</th>
                                            <td>${main_data.jenis_rekognisi}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kegiatan</th>
                                            <td>${main_data.jenis_kegiatan}</td>
                                        </tr>
                                        <tr>
                                            <th>Tingkat Rekognisi</th>
                                            <td>${main_data.level}</td>
                                        </tr>
                                        <tr>
                                            <th>Penyelenggara</th>
                                            <td>${main_data.penyelenggara}</td>
                                        </tr>
                                        <tr>
                                            <th>Dibuat pada</th>
                                            <td>${main_data.create_at}</td>
                                        </tr>
                                        <tr>
                                            <th>Terakhir di update</th>
                                            <td>${main_data.last_update}</td>
                                        </tr>
                                        <tr>
                                            <th>Bukti</th>
                                            <td>${html_bukti}</td>
                                        </tr>
                                    </table>`;

						$("#staticBackdrop").modal("show");
						$("#staticBackdrop .modal-body").html(html);
					}
				}
			}, 200);
		},
	});
});
