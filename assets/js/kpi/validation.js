liststaff();

function liststaff(){
    $.ajax({
        url        : url+"index.php/kpi/validation/liststaff",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultlistvalidation").html("");
        },
        success:function(data){
            toastr.clear();
            var result              = "";
            var tableresult         = "";
            var getvariabel         = "";
            var getvariabelsecodary = "";
            var color               = ['danger','warning','success','primary'];
            var jml                 = 0;

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){

                    var randomIndex = Math.floor(Math.random() * color.length);
                    var randomColor = color[randomIndex];


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
                                if(result[i].position_primary==="Y"){
                                    tableresult +="<a class='text-gray-800 text-hover-primary mb-1' href='#'>"+result[i].name+" <span class='svg-icon svg-icon-1 svg-icon-primary'></span><svg xmlns='http://www.w3.org/2000/svg' width='24px' height='24px' viewBox='0 0 24 24'><path d='M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z' fill='#00A3FF'></path><path class='permanent' d='M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z' fill='white'></path></svg></a>";
                                }else{
                                    tableresult +="<a class='text-gray-800 text-hover-primary mb-1' href='#'>"+result[i].name+"</a>";
                                }
                                tableresult +="<span>"+(result[i].email ? result[i].email : "-")+"</span>";
                            tableresult +="</div>";

                        tableresult +="</div>";
                    tableresult +="</td>";
                    
                    if(result[i].kategori_id==="65f1ccae-3ae6-4209-a66e-d7920b5824f5" || result[i].kategori_id==="b9710449-f5e4-4553-a962-f3b0f574dbc4"){
                        tableresult +="<td><div>"+(result[i].position ? result[i].position : "")+(result[i].fungsionalprimary ? " "+result[i].fungsionalprimary : "")+"</div><div>"+(result[i].klinis ? result[i].klinis : "")+"</div></td>";
                    }else{
                        tableresult +="<td>"+(result[i].position ? result[i].position : "")+(result[i].fungsionalprimary ? " "+result[i].fungsionalprimary : "")+"</td>";
                    }
                    tableresult +="<td><div>"+(result[i].hours_month ? todesimal(result[i].hours_month)  : "")+"</div><div>Minutes</div></td>";
                    tableresult +="<td><div>"+(result[i].hours_month ? todesimal(result[i].hours_month)  : "")+"</div><div>Minutes</div></td>";
                    tableresult +="<td><div>"+(result[i].hours_month ? todesimal(result[i].hours_month)  : "")+"</div><div>Minutes</div></td>";
                    tableresult +="<td class='text-center'>%</td>";
                    tableresult +="<td class='text-center'>%</td>";

                    tableresult += "<td class='text-end'>";
                        tableresult += "<div class='btn-group' role='group'>";
                            tableresult += "<button id='btnGroupDrop1' type='button' class='btn btn-light-primary dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>Action</button>";
                            tableresult += "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationkategoritenaga_add' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-pencil'></i> Validation Activites</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-person-add'></i> Assessment Personal</a>";
                            tableresult +="</div>";
                        tableresult +="</div>";
                    tableresult +="</td>";

                    tableresult +="</tr>";

                    jml ++;
                }
            }

            $("#resultlistvalidation").html(tableresult);
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
