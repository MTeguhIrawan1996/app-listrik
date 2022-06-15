//sweetalert
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire({
		title: "Congretulation!",
		text: flashData,
		type: "success",
	});
}

const flashDataGagal = $(".flash-data-gagal").data("flashdatagagal");

if (flashDataGagal) {
	Swal.fire({
		title: "Oops!",
		text: flashDataGagal,
		type: "error",
	});
}

const validationErrors = $(".validation-errors").data("validationerrors");
if (validationErrors) {
	$("#formModal").modal("show");
}

const validationErrorsPk = $(".validation-errors-pk").data(
	"validationerrorspk"
);

if (validationErrorsPk) {
	$("#formModal").modal("show");
}

$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	Swal.fire({
		title: "Apakah anda yakin",
		text: "",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

// autofill/complete
function autofill() {
	var ajukan_id = $("#ajukan_id").val();

	$.ajax({
		url: "getuserajax",
		data: {
			ajukan_id: ajukan_id,
		},
		method: "post",
		dataType: "json",
		cache: false,
		success: function (data) {
			$("#nik").val(data.nik);
			$("#no_hp").val(data.no_hp);
			$("#alamat").val(data.alamat);
			$("#kelurahan").val(data.kelurahan);
			$("#kecamatan").val(data.kecamatan);
			$("#provinsi").val(data.provinsi);
			$("#produk_layanan").val(data.produk_layanan);
			$("#daya").val(data.daya);
		},
	});

	return false;
}
