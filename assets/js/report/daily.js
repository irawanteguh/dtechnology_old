billing();
billing_ranap();
billing_bpjs();
rozi();

function billing(){
    $.ajax({
        url        : url+"index.php/report/daily/billing",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultbillingrawatjalan").html("");
        },
        success:function(data){
            toastr.clear();
            var tableresult ="";

            if(data.responCode==="00"){
                var result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].tgl_registrasi+" "+result[i].jam_reg+"</td>";
                    tableresult +="<td><div>"+result[i].no_rkm_medis+"</div><div>"+result[i].namapasien+"</div></td>";
                    tableresult +="<td>"+result[i].politujuan+"</td>";
                    tableresult +="<td>"+result[i].provider+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayareg ? todesimal(result[i].biayareg) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayaobat ? todesimal(result[i].biayaobat) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayalab ? todesimal(result[i].biayalab) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayarad ? todesimal(result[i].biayarad) : "0")+"</td>";

                    tableresult +="<td class='text-end'>"+(result[i].RJtindakanparamedic ? todesimal(result[i].RJtindakanparamedic) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].RJtindakandokter ? todesimal(result[i].RJtindakandokter) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].grandtotal + (result[i].grandtotal))+"</td>";

                    tableresult +="</tr>";
                }
            }

            $("#resultbillingrawatjalan").html(tableresult);
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

function billing_ranap(){
    $.ajax({
        url        : url+"index.php/report/daily/billing_ranap",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultbillingrawatinap").html("");
        },
        success:function(data){
            toastr.clear();
            var tableresult ="";

            if(data.responCode==="00"){
                var result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].tgl_registrasi+" "+result[i].jam_reg+"</td>";
                    // tableresult +="<td><div>"+result[i].no_rkm_medis+"</div><div>"+result[i].namapasien+"</div></td>";
                    // tableresult +="<td>"+result[i].politujuan+"</td>";
                    tableresult +="<td>"+result[i].provider+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayareg ? todesimal(result[i].biayareg) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayaobat ? todesimal(result[i].biayaobat) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayalab ? todesimal(result[i].biayalab) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayarad ? todesimal(result[i].biayarad) : "0")+"</td>";

                    tableresult +="<td class='text-end'>"+(result[i].RJtindakanparamedic ? todesimal(result[i].RJtindakanparamedic) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].RJtindakandokter ? todesimal(result[i].RJtindakandokter) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+"</td>";  
                    tableresult +="</tr>";

                    // tableresult +="<tr>";
                    // tableresult +="<td class='text-end'>"+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+"</td>";
                    // tableresult +="<td>"+result[i].namapasien+"</td>";
                    // tableresult +="<tr>";
                }
            }

            $("#resultbillingrawatinap").html(tableresult);
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

function billing_bpjs(){
    $.ajax({
        url        : url+"index.php/report/daily/billing_bpjs",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultbillingbpjs").html("");
        },
        success:function(data){
            toastr.clear();
            var tableresult ="";

            if(data.responCode==="00"){
                var result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].tgl_registrasi+" "+result[i].jam_reg+"</td>";
                    tableresult +="<td><div>"+result[i].no_rkm_medis+"</div><div>"+result[i].namapasien+"</div></td>";
                    tableresult +="<td>"+result[i].politujuan+"</td>";
                    tableresult +="<td>"+result[i].provider+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayareg ? todesimal(result[i].biayareg) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayaobat ? todesimal(result[i].biayaobat) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayalab ? todesimal(result[i].biayalab) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayarad ? todesimal(result[i].biayarad) : "0")+"</td>";

                    tableresult +="<td class='text-end'>"+(result[i].RJtindakanparamedic ? todesimal(result[i].RJtindakanparamedic) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].RJtindakandokter ? todesimal(result[i].RJtindakandokter) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+"</td>";

                    tableresult +="</tr>";
                }
            }

            $("#resultbillingbpjs").html(tableresult);
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

function rozi(){
    $.ajax({
        url        : url+"index.php/report/daily/rozi",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#rstrozi").html("");
        },
        success:function(data){
            toastr.clear();
            var tableresult ="";

            if(data.responCode==="00"){
                var result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    tableresult +="<td class='ps-4'>"+result[i].tgl_registrasi+" "+result[i].jam_reg+"</td>";
                    tableresult +="<td><div>"+result[i].no_rkm_medis+"</div><div>"+result[i].namapasien+"</div></td>";
                    tableresult +="<td>"+result[i].politujuan+"</td>";
                    tableresult +="<td>"+result[i].provider+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayareg ? todesimal(result[i].biayareg) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayaobat ? todesimal(result[i].biayaobat) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayalab ? todesimal(result[i].biayalab) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].biayarad ? todesimal(result[i].biayarad) : "0")+"</td>";

                    tableresult +="<td class='text-end'>"+(result[i].RJtindakanparamedic ? todesimal(result[i].RJtindakanparamedic) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].RJtindakandokter ? todesimal(result[i].RJtindakandokter) : "0")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].grandtotal ? todesimal(result[i].grandtotal) : "0")+"</td>";

                    tableresult +="</tr>";
                }
            }

            $("#rstrozi").html(tableresult);
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