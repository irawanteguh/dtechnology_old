datalog();

function datalog(){
    $.ajax({
        url     : url+"index.php/operation/logservice/datalog",
        method  : "POST",
        dataType: "JSON",
        cache   : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultlogservice").html("");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                   tableresult +="<tr>";
                   tableresult +="<td class='text-center'>"+result[i].REQUEST_ID+"</td>";
                   tableresult +="<td class='text-center'>"+result[i].REMOTE_ADDRESS+"</td>";
                   tableresult +="<td class='text-center'>"+result[i].REQUEST_METHOD+"</td>";
                   tableresult +="<td>"+result[i].REQUEST_URL+"</td>";
                   if(result[i].RESPONSE_STATUS==="200"){
                        tableresult +="<td class='text-center'><span class='badge badge-success'>"+result[i].RESPONSE_STATUS+"</span></td>";
                   }else{
                    tableresult +="<td class='text-center'><span class='badge badge-danger'>"+result[i].RESPONSE_STATUS+"</span></td>";
                   }
                   
                   tableresult +="<td class='text-center'>"+result[i].TOTAL_TIME_US+"</td>";
                   tableresult +="<td class='text-center'>"+result[i].CREATEDDATE+"</td>";
                   tableresult +="</tr>";
                }
            }

            $("#resultlogservice").html(tableresult);
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