dataexecutesign();

// setInterval(() => {
//     dataexecutesign();
// }, 10000);

function dataexecutesign(){
    $.ajax({
        url     : url+"index.php/tilaka/signdocument/dataexecutesign",
        method  : "POST",
        dataType: "JSON",
        cache   : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultsigndocument").html("");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";
            
            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){

                    tableresult +="<tr>";
                    if(result[i].STATUS_SIGN==="2"){
                        tableresult +="<td class='ps-4'><div class='badge badge-light-warning fw-bolder'>Request Sign</div></td>";
                    }else{
                        tableresult +="<td class='ps-4'><div class='badge badge-light-info fw-bolder'>Request Execute File</div></td>";  
                    }
                    tableresult +="<td>"+(result[i].USER_IDENTIFIER ? result[i].USER_IDENTIFIER : "")+"</td>";
                    tableresult +="<td>"+(result[i].name ? result[i].name : "")+"</td>";
                    tableresult +="<td><div>"+(result[i].nik ? result[i].nik : "")+"</div><div>"+(result[i].noktp ? result[i].noktp : "")+"</div></td>";
                    tableresult +="<td>"+(result[i].email ? result[i].email : "")+"</td>";
                    if(result[i].STATUS_SIGN==="2"){
                        tableresult +="<td class='pe-4 text-end'><a class='btn btn-sm btn-light-primary' href='"+result[i].URL+"&redirect_url="+url+"index.php/tilaka/signdocument'>Sign</a></td>";
                    }else{
                        tableresult +="<td></td>";
                    }
                    tableresult +="</tr>";
                }
            }

            $("#resultsigndocument").html(tableresult);
            toastr[data.responHead](data.responDesc, "INFORMATION");

        },
		complete: function () {
			toastr.clear();
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