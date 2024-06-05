dataupload();

// setInterval(() => {
//     dataupload();
// }, 10000);


function dataupload(){
    $.ajax({
        url     : url+"index.php/tilaka/repodocument/dataupload",
        method  : "POST",
        dataType: "JSON",
        cache   : false,
        beforeSend: function () {
            $("#resultrepodocument").html("");
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    tableresult +="<tr>";
                    if(result[i].STATUS_SIGN==="0"){
                        tableresult +="<td><span class='badge badge-light-info fs-7 fw-bold'>New</span></td>"; 
                    }else{
                        if(result[i].STATUS_SIGN==="1"){
                            tableresult +="<td><span class='badge badge-light-primary fs-7 fw-bold'>Files Uploaded</span></td>"; 
                        }else{
                            if(result[i].STATUS_SIGN==="2"){
                                tableresult +="<td><span class='badge badge-light-info fs-7 fw-bold'>Request Sign Success</span></td>"; 
                            }else{
                                if(result[i].STATUS_SIGN==="3"){
                                    tableresult +="<td><div><span class='badge badge-light-danger fs-7 fw-bold'>Request Sign Field</span></div>"+(result[i].NOTE ? result[i].NOTE : "-")+"<div></div></td>"; 
                                }else{
                                    tableresult +="<td><span class='badge badge-light-success fs-7 fw-bold'>Sign Success</span></td>"; 
                                }
                            }
                        }
                    }
                    tableresult +="<td><div>"+(result[i].NO_FILE ? result[i].NO_FILE : "-")+"</div><div>"+(result[i].FILENAME ? result[i].FILENAME : "-")+"</div></td>";
                    tableresult +="<td>"+(result[i].jenisdocumen ? result[i].jenisdocumen : "")+"</td>";
                    tableresult +="<td>"+(result[i].assignname ? result[i].assignname : "")+"</td>";
                    tableresult +="<td>"+(result[i].tgljam ? result[i].tgljam : "")+"</td>";
                    tableresult +="<td class='text-end'>"+(result[i].useridentifier ? result[i].useridentifier : "<i class='bi bi-x-octagon text-danger'></i>") +"</td>";
                    tableresult +="</tr>";
                }
            }

            $("#resultrepodocument").html(tableresult);
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