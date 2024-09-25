

$(document).on("click",".btn-apply", function(e){            
    e.preventDefault();
    var periode    = $("select[name='toolbar_report_kpi']").val();

    liststaff(periode);
});

function liststaff(periode){
    $.ajax({
        url        : url+"index.php/hrd/reportkpi/reportkpi",
        data :{periode:periode},
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultkpi").html("");
        },
        success:function(data){
            toastr.clear();
            var result              = "";
            var tableresult         = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].name+"</td>";
                    tableresult +="<td class='text-left'>"+(result[i].position ? result[i].position : "")+"</td>";
                    tableresult +="<td class='text-center'>"+result[i].presentasiperilaku+"%</td>";
                    tableresult +="<td class='text-center'>"+result[i].presentasiactivity+"%</td>";
                    tableresult +="<td class='text-center'>"+result[i].resultkpi+"%</td>";
                    tableresult +="<td class='pe-4 text-end'><a class='btn btn-primary btn-sm'>Detail</a></td>";
                    tableresult +="</tr>";
                }
            }

            $("#resultkpi").html(tableresult);
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