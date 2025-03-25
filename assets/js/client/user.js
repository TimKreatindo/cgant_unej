$("#client_profile").submit(function (e) {
	e.preventDefault();
	loading_animation();

	$.ajax({
		url: $(this).attr("action"),
		data: new FormData(this),
		type: "POST",
		dataType: "JSON",
		contentType: false,
		processData: false,

		error: function (xhr, status, error) {
			setTimeout(() => {
				Swal.close();
				error_alert(error);
			}, 200);
		},
		success: function (d) {
			setTimeout(() => {
				Swal.close();
				if (d.status == false) {
					error_alert(d.msg);
				} else {
					Swal.fire({
						icon: "success",
						title: "Success",
						text: d.msg,
					}).then((res) => {
						window.location.href = d.redirect;
					});
				}
			}, 200);
		},
	});
});
$("#client_pass").submit(function (e) {
	e.preventDefault();
	loading_animation();

	$.ajax({
		url: $(this).attr("action"),
		data: $(this).serialize(),
		type: "POST",
		dataType: "JSON",
		success: function (d) {
			regenerate_token(d.token);
			setTimeout(() => {
				Swal.close();
				if (d.type == "validation") {
					if (d.err_old_pass == "") {
						$("#err_old_pass").html("");
					} else {
						$("#err_old_pass").html(d.err_old_pass);
					}
					if (d.err_new_pass == "") {
						$("#err_new_pass").html("");
					} else {
						$("#err_new_pass").html(d.err_new_pass);
					}
					if (d.err_repeat_new_pass == "") {
						$("#err_repeat_new_pass").html("");
					} else {
						$("#err_repeat_new_pass").html(d.err_repeat_new_pass);
					}
				} else if (d.type == "result") {
					$("#err_old_pass").html("");
					$("#err_new_pass").html("");
					$("#err_repeat_new_pass").html("");
					if (d.status == false) {
						error_alert(d.msg);
					} else {
						success_alert_reloaded(d.msg);
					}
				}
			}, 200);
		},
		error: function (xhr, status, error) {
			setTimeout(() => {
				Swal.close();
				error_alert_reloaded(error);
			}, 200);
		},
	});
});

function error_alert(msg) {
	Swal.fire({
		title: "Error",
		text: msg,
		icon: "error",
	});
}
