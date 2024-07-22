listclient();

function listclient(){
    $.ajax({
        url       : url+"index.php/masterroot/Masterclient/listclient",
        method    : "GET",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultmasterclient").html("");
        },
        success:function(data){
            var result      = "";
            var getvariabel = "";
            var tableresult = "";
            var action      = "";
            
            if(data.responCode == "00"){
                result        = data.responResult;

                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].ORG_ID+"</td>";
                    tableresult +="<td>"+result[i].CODE+"</td>";
                    tableresult +="<td>"+result[i].ORG_NAME+"</td>";
                    tableresult +="<td>"+result[i].WEBSITE+"</td>";

                    // tableresult +="<td class='text-center'>";
                    // if (result[i].TRIAL === "Y") {
                    //     tableresult += "<div class='form-check form-switch form-check-custom form-check-solid'><input class='form-check-input h-20px w-30px' type='checkbox' id='" + result[i].ORG_ID + "' checked='checked' /></div>";
                    // } else {
                    //     tableresult += "<div class='form-check form-switch form-check-custom form-check-solid'><input class='form-check-input h-20px w-30px' type='checkbox' id='" + result[i].ORG_ID + "' /></div>";
                    // }
                    // tableresult +="</td>";

                    tableresult +="<td class='pe-4'>";
                    if (result[i].ACTIVE === "1") {
                        tableresult += "<div class='form-check form-switch form-check-custom form-check-solid d-flex justify-content-end'><input class='form-check-input h-20px w-30px' type='checkbox' id='" + result[i].ORG_ID + "' checked='checked' /></div>";
                    } else {
                        tableresult += "<div class='form-check form-switch form-check-custom form-check-solid d-flex justify-content-end'><input class='form-check-input h-20px w-30px' type='checkbox' id='" + result[i].ORG_ID + "' /></div>";
                    }
                    tableresult +="</td>";

                    tableresult +="</tr>";
                }
            }

            $("#resultmasterclient").html(tableresult);
            toastr.clear();
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
                    customClass      : {confirmButton: "btn btn-danger"},
                    showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                    hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
                });
		}
    });
    return false;
};