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
		confirmButtonText: "Lanjut!",
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
			$("#pelanggan_id").val(data.user_id);
			$("#nik").val(data.nik);
			$("#no_hp").val(data.no_hp);
			$("#alamat").val(data.alamat);
			$("#kelurahan").val(data.kelurahan);
			$("#kecamatan").val(data.kecamatan);
			$("#provinsi").val(data.provinsi);
			$("#produk_layanan").val(data.produk_layanan);
			$("#daya").val(data.daya);
			$("#biaya").val(data.harga);
		},
	});

	return false;
}

$(function () {
	//menu
	$(".tombol-laporan").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "laporan/getpengajuantgl",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
			columnDefs: [
				{
					targets: [7],
					render: function (data, type, row, meta) {
						if (meta.col == 7) {
							if (data == 5) {
								return '<span class="badge badge-success mb-2">Pemasangan Selesai</span>';
							} else if (data == 4) {
								return '<span class="badge badge-success mb-2">Proses Pemasangan</span>';
							} else if (data == 3) {
								return '<span class="badge badge-success mb-2">Proses Survey</span>';
							} else if (data == 2) {
								return '<span class="badge badge-success mb-2">Diverifikasi</span>';
							} else if (data == 1) {
								return '<span class="badge badge-success mb-2">Ditolak</span>';
							} else if (data == 0) {
								return '<span class="badge badge-success mb-2">Menunggu Verifikasi</span>';
							}
						}
					},
				},
			],
		});
	});

	$(".tombol-laporan-surat-tugas").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getsurattugasajax",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
		});
	});

	$(".tombol-laporan-pelanggan").on("click", function () {
		var status = $("#status").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getpelangganajax",
				data: {
					status: status,
				},
				method: "post",
				dataType: "json",
			},
			columnDefs: [
				{
					targets: [8],
					render: function (data, type, row, meta) {
						if (meta.col == 8) {
							if (data == 5) {
								return '<span class="badge badge-success mb-2">Pemasangan Selesai</span>';
							} else if (data == 4) {
								return '<span class="badge badge-success mb-2">Proses Pemasangan</span>';
							} else if (data == 3) {
								return '<span class="badge badge-success mb-2">Proses Survey</span>';
							} else if (data == 2) {
								return '<span class="badge badge-success mb-2">Diverifikasi</span>';
							} else if (data == 1) {
								return '<span class="badge badge-success mb-2">Ditolak</span>';
							} else if (data == 0) {
								return '<span class="badge badge-success mb-2">Menunggu Verifikasi</span>';
							}
						}
					},
				},
			],
		});
	});

	$(".tombol-laporan-survey").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getsurveyajax",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
		});
	});

	$(".tombol-laporan-tracking").on("click", function () {
		var ajukan_id = $("#ajukan_id").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "gettrackingajax",
				data: {
					ajukan_id: ajukan_id,
				},
				method: "post",
				dataType: "json",
			},
		});
	});

	$(".tombol-laporan-pembayaran").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getpembayaranajax",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
			columnDefs: [
				{
					targets: [6],
					render: function (data, type, row, meta) {
						if (meta.col == 6) {
							if (data == 1) {
								return '<span class="badge badge-success mb-2">Lunas</span>';
							} else if (data == 0) {
								return '<span class="badge badge-danger mb-2">Belum Lunas</span>';
							}
						}
					},
				},
			],
		});
	});

	$(".tombol-laporan-pembayaranstatus").on("click", function () {
		var status = $("#status").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getpembayaranstatusajax",
				data: {
					status: status,
				},
				method: "post",
				dataType: "json",
			},
			columnDefs: [
				{
					targets: [6],
					render: function (data, type, row, meta) {
						if (meta.col == 6) {
							if (data == 1) {
								return '<span class="badge badge-success mb-2">Lunas</span>';
							} else if (data == 0) {
								return '<span class="badge badge-danger mb-2">Belum Lunas</span>';
							}
						}
					},
				},
			],
		});
	});
});
