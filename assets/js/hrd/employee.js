masteremployee();

flatpickr('[name="data_position_tanggal_registration"]', {
    enableTime: false,
    dateFormat: "d.m.Y",
    maxDate: "today",
    onChange: function(selectedDates, dateStr, instance) {
        instance.close();
    }
});

function getdata(btn){
    toastr.clear();

	var userid = btn.attr("data-userid");
	var name   = btn.attr("data-name");

	$(":hidden[name='data_position_userid_registration']").val(userid);
	$("input[name='data_position_name_registration']").val(name);

    namaatasan(userid);
};

function masteremployee(){
    $.ajax({
        url        : url+"index.php/hrd/employee/masteremployee",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultmasteremployee").html("");
        },
        success:function(data){
            toastr.clear();
            var result      = "";
            var tableresult = "";
            var getvariabel = "";
            var color       = ['danger','warning','success','primary'];
            var jml         = 0;

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){

                    var randomIndex = Math.floor(Math.random() * color.length);
                    var randomColor = color[randomIndex];

                    getvariabel =   "data-userid='"+result[i].user_id+"'"+
                                    "data-name='"+result[i].name+"'";

                    tableresult +="<tr>";
                    tableresult +="<td>";
                        tableresult +="<div class=' align-middle d-flex align-items-center ps-4'>";
                            tableresult +="<div class='symbol symbol-circle symbol-50px overflow-hidden me-3'>";
                                tableresult +="<a href='#'>";
                                    if(result[i].image_profile==="N"){
                                        tableresult +="<div class='symbol-label fs-3 bg-light-"+randomColor+" text-"+randomColor+"'>"+result[i].initial+"</div>";
                                    }else{
                                        tableresult +="<div class='symbol-label'>";
                                        tableresult +="<img src='"+url+"assets/images/avatars/"+result[i].user_id+".jpeg' alt='"+result[i].name+"' class='w-100'>";
                                        tableresult +="</div>";
                                    }
                                tableresult +="</a>";
                            tableresult +="</div>";

                            tableresult +="<div class='d-flex flex-column'>";
                                tableresult +="<a class='text-gray-800 text-hover-primary mb-1' href='#'>"+result[i].name+"</a>";
                                tableresult +="<span>"+(result[i].email ? result[i].email : "-")+"</span>";
                            tableresult +="</div>";

                        tableresult +="</div>";
                    tableresult +="</td>";

                    tableresult +="<td><div>"+(result[i].nik ? result[i].nik : "")+"</div><div>" + (result[i].identity_no ? result[i].identity_no : "") + "</div></td>";
                    tableresult +="<td><div>"+(result[i].positionprimary ? result[i].positionprimary : "")+" "+(result[i].funsgionalprimary ? result[i].funsgionalprimary : "")+"</div><div>"+(result[i].atasanprimary ? result[i].atasanprimary : "")+"</div></td>"

                    var userIdsprimary = result[i].membersecondry ? result[i].membersecondry.split(';') : [];
                    tableresult += "<td>";
                    for (var j = 0; j < userIdsprimary.length; j++) {
                        var userProfile = userIdsprimary[j].trim().split(':');
                        if (userProfile.length === 4) {
                            var positionid = userProfile[0];
                            var position = userProfile[1];
                            var level = userProfile[2];
                            var atasan = userProfile[3];

                            tableresult += "<div>" + position + " " + level + "</div><div>" + atasan + "</div>";
                        } else if (userProfile.length === 3) { 
                            var positionid = userProfile[0];
                            var position = userProfile[1];
                            var atasan = userProfile[2];

                            tableresult += "<div>" + position + "</div><div>" + atasan + "</div>";
                        }
                        
                        if (j < userIdsprimary.length - 1) {
                            tableresult += "<div class='separator my-2'></div>";
                        }
                    }
                    tableresult += "</td>";


                    tableresult += "<td class='text-end'>";
                        tableresult += "<div class='btn-group' role='group'>";
                            tableresult += "<button id='btnGroupDrop1' type='button' class='btn btn-light-primary dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>Action</button>";
                            tableresult += "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
                                // tableresult += "<a class='dropdown-item btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal-edituser' "+getvariabel+" onclick='getdataedit($(this));'><i class='bi bi-pencil'></i> Perbaharui Data</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_position_registration' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-person-add'></i> Positioning</a>";
                            tableresult +="</div>";
                        tableresult +="</div>";
                    tableresult +="</td>";
                    tableresult +="</tr>";

                    jml ++;
                }
            }

            $("#resultmasteremployee").html(tableresult);
            $("#info_list_employee").html(todesimal(jml)+" Staff");
            toastr[data.responHead](data.responDesc, "INFORMATION");
        },
        complete: function () {

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
                customClass      : {
                    confirmButton: "btn btn-danger"
                },
                showClass: {popup: "animate__animated animate__fadeInUp animate__faster"},
                hideClass: {popup: "animate__animated animate__fadeOutDown animate__faster"}
            });
		}
    });
    return false;
};

function namaatasan(userid){
	$.ajax({
		url     : url+"index.php/hrd/employee/namaatasan",
		data    : {userid:userid},
		method  : "POST",
		dataType: "html",
		cache   : false,
		success : function (data) {
			$("select[name='data_position_atasanid_registration']").html(data);
		}
	});
	return false;
};

$(document).on("submit", "#forminsertpenempatan", function (e) {
	e.preventDefault();
	var data = new  FormData(this);
	$.ajax({
        url        : url+'index.php/hrd/employee/insertpenempatan',
        data       : data,
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: false,
        contentType: false,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
			$("#btn_position_registrasi").addClass("disabled");
        },
		success: function (data) {
            toastr.clear();
            
			if(data.responCode === "00"){
                toastr[data.responHead](data.responDesc, "INFORMATION");
                $('#drawer_employee_position_registration_close').trigger('click');
				masteremployee();
			}else{
                Swal.fire({
                    title            : "<h1 class='font-weight-bold' style='color:#234974;'>For Your Information</h1>",
                    html             : "<b>"+data.responDesc+"</b>",
                    icon             : data.responHead,
                    confirmButtonText: "Please Try Again",
                    buttonsStyling   : false,
                    timerProgressBar : true,
                    timer            : 5000,
                    customClass      : {confirmButton: "btn btn-danger"},
                    showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                    hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
                });
                $("#btn_position_registrasi").removeClass("disabled");
            }
		},
        complete: function () {
            toastr.clear();
            $("#btn_position_registrasi").removeClass("disabled");
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