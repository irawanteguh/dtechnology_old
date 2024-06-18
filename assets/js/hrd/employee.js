masteremployee();

function getdata(btn){
    toastr.clear();

	var userid = btn.attr("data-userid");
	var name   = btn.attr("data-name");

	$(":hidden[name='data_position_userid_registration']").val(userid);
	$("input[name='data_position_name_registration']").val(name);
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
                    tableresult +="<td class='d-flex align-items-center ps-4'>";
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
                    tableresult +="</td>";
                    tableresult +="<td><div>"+(result[i].nik ? result[i].nik : "")+"</div><div>" + (result[i].identity_no ? result[i].identity_no : "") + "</div></td>";
                    tableresult +="<td>"+(result[i].positionprimary ? result[i].positionprimary : "")+" "+(result[i].funsgionalprimary ? result[i].funsgionalprimary : "")+"</td>"
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