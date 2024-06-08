masteractivity();
function getdata(btn){
    var $btn = $(btn);

    var data_activity_id     = $btn.attr("data_activity_id");
    var data_activity_name   = $btn.attr("data_activity_name");
    var data_activity_durasi = $btn.attr("data_activity_durasi");


    $(":hidden[name='data_activity_id_hapus']").val(data_activity_id);
    $(":hidden[name='data_activity_id_aktif']").val(data_activity_id);

    $(":text[name='data_activity_name_hapus']").val(data_activity_name);
    $(":text[name='data_activity_durasi_hapus']").val(data_activity_durasi);

    $(":text[name='data_activity_name_aktif']").val(data_activity_name);
    $(":text[name='data_activity_durasi_aktif']").val(data_activity_durasi);

};

function masteractivity(){
    $.ajax({
        url       : url+"index.php/hrd/activity/masteractivity",
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resutlmasteractivity").html("");
        },
        success:function(data){
            var result = "";
            var jml    = 0;

            var tableresult = "";
            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    var action      = "";
                    var getvariabel = "data_activity_id='"+result[i].activity_id+"'"+
                                      "data_activity_name='"+result[i].activity+"'"+
                                      "data_activity_durasi='"+result[i].durasi+" Menit'";

                    action  ="<a class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#unhidemodules' "+getvariabel+" onclick='getdata(this)'><i class='bi bi-pencil-fill text-primary'></i></a>";
                    if(result[i].active==="1"){
                        action +="<a class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#modal_activity_hapus' "+getvariabel+" onclick='getdata(this)'><i class='bi bi-trash-fill text-danger'></i></a>";
                    }else{
                        action +="<a class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#modal_activity_active' "+getvariabel+" onclick='getdata(this)'><i class='bi bi-eye-fill text-success'></i></a>";
                    }
                    

                    tableresult +="<tr>";
                    if(result[i].active==="1"){
                        tableresult +="<td class='ps-4'>"+result[i].activity+"</td>";
                    }else{
                        tableresult +="<td class='ps-4'>"+result[i].activity+" <span class='badge badge-light-danger'>Non Active</span></td>";
                    }
                    
                    tableresult +="<td class='text-end'>"+result[i].durasi+" Menit</td>";
                    tableresult +="<td class='text-end row'>"+action+"</td>";
                    tableresult +="</tr>";

                    jml ++;
                }
            }


            $("#resutlmasteractivity").html(tableresult);
            $("#info_list_activity").html(todesimal(jml)+" Activity");
            toastr[data.responHead](data.responDesc, "INFORMATION");
        },
        complete: function () {
			//
		},
        error: function(xhr, status, error) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                html             : "<b>"+error+"</b>",
                icon             : "error",
                confirmButtonText: "Please Try Again",
                buttonsStyling   : false,
                timerProgressBar : true,
                timer            : 5000,
                customClass      : {confirmButton: "btn btn-danger"},
                showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
            });
		}		
    });
    return false;
};

$(document).on("submit", "#formhapusactivity", function (e) {
	e.preventDefault();
    e.stopPropagation();

	var form = $(this);
    var url  = $(this).attr("action");

	$.ajax({
        url       : url,
        data      : form.serialize(),
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
			$("#btn_modules_hapus").addClass("disabled");
        },
		success: function (data) {
            if (data.responCode == "00") {
                masteractivity();
			}

            toastr.clear();
			toastr[data.responHead](data.responDesc, "INFORMATION");
		},
        complete: function () {
            toastr.clear();
            $("#modal_activity_hapus").modal("hide");
            $("#btn_modules_hapus").removeClass("disabled");
		},
        error: function(xhr, status, error) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                html             : "<b>"+error+"</b>",
                icon             : "error",
                confirmButtonText: "Please Try Again",
                buttonsStyling   : false,
                timerProgressBar : true,
                timer            : 5000,
                customClass      : {confirmButton: "btn btn-danger"},
                showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
            });
		}
	});
    return false;
});

$(document).on("submit", "#formaktifaktifactivity", function (e) {
	e.preventDefault();
    e.stopPropagation();

	var form = $(this);
    var url  = $(this).attr("action");

	$.ajax({
        url       : url,
        data      : form.serialize(),
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
			$("#btn_modules_aktif").addClass("disabled");
        },
		success: function (data) {
            if (data.responCode == "00") {
                masteractivity();
			}

            toastr.clear();
			toastr[data.responHead](data.responDesc, "INFORMATION");
		},
        complete: function () {
            toastr.clear();
            $("#modal_activity_active").modal("hide");
            $("#btn_modules_aktif").removeClass("disabled");
		},
        error: function(xhr, status, error) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                html             : "<b>"+error+"</b>",
                icon             : "error",
                confirmButtonText: "Please Try Again",
                buttonsStyling   : false,
                timerProgressBar : true,
                timer            : 5000,
                customClass      : {confirmButton: "btn btn-danger"},
                showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
            });
		}
	});
    return false;
});