dataexecutesign();

setInterval(() => {
    dataexecutesign();
}, 10000);

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
            var getvariabel = "";
            
            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    getvariabel =   "data-urlid='"+result[i].URL_ID+"'"+
                                    "data-requestid='"+result[i].REQUEST_ID+"'"+
                                    "data-useridentifier='"+result[i].USER_IDENTIFIER+"'";

                    tableresult +="<tr>";
                    if(result[i].STATUS!="0"){
                        tableresult +="<td></td>";
                    }else{
                        tableresult +="<td><div class='badge badge-light-success fw-bolder'>The signing process is ongoing</div></td>";
                    }
                    tableresult +="<td>"+(result[i].USER_IDENTIFIER ? result[i].USER_IDENTIFIER : "")+"</td>";
                    tableresult +="<td>"+(result[i].nik ? result[i].nik : "")+"</td>";
                    tableresult +="<td>"+(result[i].name ? result[i].name : "")+"</td>";
                    tableresult +="<td>"+(result[i].noktp ? result[i].noktp : "")+"</td>";
                    tableresult +="<td>"+(result[i].email ? result[i].email : "")+"</td>";
                    tableresult +="<td>"+(result[i].tgljam ? result[i].tgljam : "")+"</td>";
                    if(result[i].STATUS==="0"){
                        tableresult +="<td class='text-end'><a class='btn btn-sm btn-light-primary' href='"+result[i].URL+"&redirect_url="+url+"index.php/tilaka/signdocument'>Sign</a></td>";
                    }
                    tableresult +="</tr>";
                }
            }

            $("#resultsigndocument").html(tableresult);
            toastr[data.responHead](data.responDesc, "INFORMATION");

        },
        error: function(xhr, status, error) {
            toastr["error"]("Terjadi kesalahan : "+error, "Opps !");
		},
		complete: function () {
			toastr.clear();
		}
    });
    return false;
};