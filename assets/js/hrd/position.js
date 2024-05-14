daftarjabatan();

function daftarjabatan(){
    var search     = $("input[name='search']").val();
    $.ajax({
        url       : url+"index.php/hrd/position/daftarjabatan",
        data      : {search:search},
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            $("#listposition").html("");
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    getvariabel =   "data-positionid='"+result[i].POSITION_ID+"'"+
                                    "data-position='"+result[i].POSITION+"'";

                    tableresult +="<tr>";
                    tableresult +="<td>"+result[i].POSITION+" "+(result[i].FUNCTIONAL ? result[i].FUNCTIONAL : "")+"</td>";
                    tableresult += "<td><div>"+(result[i].LEVEL ? result[i].LEVEL : "")+"</div><div>" + (result[i].RVU ? todesimal(result[i].RVU) : "") + "</div></td>";
                    tableresult +="<td>";
                    tableresult +="<div class='symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2'>";
                    tableresult +="<div class='symbol symbol-circle symbol-25px' data-bs-toggle='tooltip' title='Perry Matthew' data-bs-original-title='Perry Matthew'>";
                    tableresult +="<img src='"+url+"assets/images/avatars/7b3ef9e3-7845-438e-a254-661febb9c9a4.jpeg' alt='"+result[i].NAME+"'>";
                    tableresult +="</div>";
                    tableresult +="<div class='symbol symbol-circle symbol-25px'>";
                    tableresult +="<div class='symbol-label fs-8 fw-bold bg-primary text-inverse-primary'>A</div>";
                    tableresult +="</div>";
                    tableresult +="<div class='symbol symbol-circle symbol-25px'>";
                    tableresult +="<img src='"+url+"assets/images/avatars/7b3ef9e3-7845-438e-a254-661febb9c9a4.jpeg' alt='"+result[i].NAME+"'>";
                    tableresult +="</div>";
                    tableresult +="</div>";
                    tableresult +="</td>";
                    tableresult +="<td class='text-end'>";
                    tableresult +="<div class='btn-group' role='group'>";
                    tableresult +="<button id='btnGroupDrop1' type='button' class='btn btn-light-primary dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>Action</button>";
                    tableresult +="<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
                    tableresult                += "<a class='dropdown-item btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal-edituser' "+getvariabel+" onclick='getdataedit($(this));'><i class='bi bi-pencil'></i> Perbaharui Data</a>";
                    tableresult           += "<a class='dropdown-item btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal-registerusertilaka' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-person-add'></i> Pengajuan</a>";
                                     
                    tableresult +="</div>";
                    tableresult +="</div>";
                    tableresult +="</td>";
                    tableresult +="</tr>";
                }
            }

            $("#resultmasterposition").html(tableresult);
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