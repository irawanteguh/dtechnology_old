listexamination();

function getdata(btn){
    toastr.clear();

    var transaksiid = btn.attr("data_transaksiid");
    var name        = btn.attr("data_name");
    var gender      = btn.attr("data_gender");
    var bod         = btn.attr("data_bod");
    var address     = btn.attr("data_address");
    var examination = btn.attr("data_examination");
    

    $(":hidden[name='data_leka_transid_edit']").val(transaksiid);

    $("input[name='data_leka_name_edit']").val(name);
    $("input[name='data_leka_gender_edit']").val(gender);
    $("input[name='data_leka_bod_edit']").val(bod);
    $("input[name='data_leka_address_edit']").val(address);
    $("input[name='data_leka_examination_edit']").val(examination);

    result(transaksiid);
};

function decryptPhoto(encodedPhoto) {
    var decryptedPhoto = atob(encodedPhoto);
    return decryptedPhoto;
}

function listexamination(){
    $.ajax({
        url        : url+"index.php/medicaldevice/leka/listexamination",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultexamination").html("");
        },
        success:function(data){
            toastr.clear();
            var result              = "";
            var tableresult         = "";
            var getvariabel         = "";
            var color               = ['danger','warning','success','primary'];
            var jml                 = 0;

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){

                    var decryptedPhoto = decryptPhoto(result[i].photo);


                    var getvariabel = "data_transaksiid='"+result[i].transaksi_id+"'"+
                                      "data_name='"+result[i].name+"'"+
                                      "data_gender='"+result[i].sex+"'"+
                                      "data_bod='"+result[i].bod+"'"+
                                      "data_address='"+result[i].address+"'"+
                                      "data_examination='"+result[i].exam_id+"'";

                    tableresult +="<tr>";
                    tableresult +="<td>";
                        tableresult +="<div class=' align-middle d-flex align-items-center ps-4'>";
                            tableresult +="<div class='symbol symbol-circle symbol-50px overflow-hidden me-3'>";
                                tableresult +="<a href='#'>";
                                    tableresult +="<div class='symbol-label'>";
                                    tableresult += "<img src='data:image/jpeg;base64," + decryptedPhoto + "' alt='" + result[i].name + "' class='w-100'>";
                                    tableresult +="</div>";
                                tableresult +="</a>";
                            tableresult +="</div>";

                            tableresult +="<div class='d-flex flex-column'>";
                                tableresult +="<a class='text-gray-800 text-hover-primary mb-1' href='#'>"+result[i].name+"</a>";
                                tableresult +="<span>"+(result[i].id_number ? result[i].id_number : "-")+"</span>";
                            tableresult +="</div>";

                        tableresult +="</div>";
                    tableresult +="</td>";

                    tableresult +="<td>"+(result[i].exam_id ? result[i].exam_id : "")+"</td>";
                    tableresult +="<td>"+(result[i].bod ? result[i].bod : "")+"</td>";
                    tableresult +="<td>"+(result[i].sex ? result[i].sex : "")+"</td>";
                    tableresult +="<td>"+(result[i].nation ? result[i].nation : "")+"</td>";
                    tableresult +="<td>"+(result[i].address ? result[i].address : "")+"</td>";
                    tableresult +="<td>"+(result[i].encounter_id ? result[i].encounter_id : "")+"</td>";
                    
                    tableresult += "<td class='text-end'>";
                        tableresult += "<div class='btn-group' role='group'>";
                            tableresult += "<button id='btnGroupDrop1' type='button' class='btn btn-light-primary dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>Action</button>";
                            tableresult += "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal_leka_result' "+getvariabel+" onclick='getdata($(this));'><i class='fa-regular fa-file-pdf'></i> Result</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal_leka_edit' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-pencil'></i> Encounter</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='bi bi-person-add'></i> Send SATUSEHAT</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' onclick='getJSON($(this));'><i class='fa-solid fa-file-code'></i> Download File NON FHIR</a>";
                                // tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='fa-solid fa-file-code'></i> Download FHIR .json</a>";
                                // tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='fa-solid fa-file-code'></i> Download FHIR .txt</a>";
                            tableresult +="</div>";
                        tableresult +="</div>";
                    tableresult +="</td>";

                    tableresult +="</tr>";

                    jml ++;
                }
            }

            $("#resultexamination").html(tableresult);
            $("#info_list_examination").html(todesimal(jml)+" Staff");
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

function result(transid){
    $.ajax({
        url        : url+"index.php/medicaldevice/leka/result",
        data       : {transid:transid},
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultleka").html("");
        },
        success:function(data){
            toastr.clear();
            var tableresult = "";

            if(data.responCode === "00"){
                var result = data.responResult;

                function generateChildElements(parentId) {
                    var childElements = "";
                    for (var j in result) {
                        if (result[j].header_id === parentId) {
                            
                            var resultvalue = result[j].resultdata.split(';');

                            childElements += "<tr>";
                            childElements += "<td class='ps-10'>- "+result[j].examination+"</td>";
                            childElements += "<td class='text-center'>"+result[j].unit+"</td>";
                            if(result[j].header_id==="007"){
                                if(result[j].id==="001"){
                                    childElements += "<td colspan='3'><img src='data:image/jpeg;base64," + resultvalue[0] + "' style='height:100%; width:90%;'></td>";
                                }else{
                                    if(result[j].id==="002"){
                                        childElements += "<td class='text-start'>"+resultvalue[0]+"</td>";
                                    }else{
                                        childElements += "<td class='text-center'>"+resultvalue[0]+"</td>";
                                    }
                                }
                            }else{
                                if(result[j].header_id==="016"){
                                    if(result[j].id==="001"){
                                        childElements += "<td colspan='3'><img src='data:image/jpeg;base64," + decryptPhoto(resultvalue[0]) + "' style='height:100%; width:90%;'></td>";
                                    }else{
                                        childElements += "<td class='text-center'>"+resultvalue[0]+"</td>";
                                    }
                                }else{
                                    childElements += "<td class='text-center'>"+resultvalue[0]+"</td>";
                                }
                            }
                            
                            if (
                                (result[j].id === "001" && result[j].header_id === "007") ||
                                (result[j].id === "002" && result[j].header_id === "007") ||
                                (result[j].id === "001" && result[j].header_id === "016")
                            ) {

                            } else {
                                childElements += "<td class='text-center'>" + resultvalue[1] + "</td>";
                                childElements += "<td class='pe-4 text-end'>" + resultvalue[2] + "</td>";
                            }
                                                    
                            
                            childElements += "</tr>";
                        }
                    }
                    return childElements;
                }

                for (var i in result) {
                    if (result[i].jenis === 'H') {
                        tableresult += "<tr>";
                        tableresult += "<td class='ps-4'><strong>"+result[i].examination+"</strong></td>";
                        tableresult += "</tr>";
                        tableresult += generateChildElements(result[i].id);
                    }
                }
            }

            $("#resultleka").html(tableresult);
            toastr[data.responHead](data.responDesc, "INFORMATION");
        },
        complete: function () {

        },
        error: function(xhr, status, error) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                html             : "<b>" + error + "</b>",
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
}

function getJSON(){
    $.ajax({
        url        : url+"index.php/medicaldevice/leka/JSON",
        method     : "POST",
        dataType   : "JSON",
        cache      : false,
        processData: true,
        beforeSend : function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#resultleka").html("");
        },
        success:function(data){
            toastr[data.responHead](data.responDesc, "INFORMATION");
        },
        complete: function () {

        },
        error: function(xhr, status, error) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                html             : "<b>" + error + "</b>",
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
}
