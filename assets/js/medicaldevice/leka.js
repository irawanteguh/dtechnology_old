listexamination();

function getdata(btn){
    toastr.clear();

    var transaksiid = btn.attr("data_transaksiid");
    var name        = btn.attr("data_name");
    var gender      = btn.attr("data_gender");
    var bod         = btn.attr("data_bod");
    var address     = btn.attr("data_address");
    var examination = btn.attr("data_examination");

    var data_ecg12_data_value = btn.attr("data_ecg12_data_value");
    

    $(":hidden[name='data_leka_transid_edit']").val(transaksiid);

    $("input[name='data_leka_name_edit']").val(name);
    $("input[name='data_leka_gender_edit']").val(gender);
    $("input[name='data_leka_bod_edit']").val(bod);
    $("input[name='data_leka_address_edit']").val(address);
    $("input[name='data_leka_examination_edit']").val(examination);

    alert(decryptPhoto(data_ecg12_data_value));
    $("#ecg12_image").attr("src", "data:image/jpeg;base64," + decryptPhoto(data_ecg12_data_value));
};

function decryptPhoto(encodedPhoto) {
    // Misalkan Anda memiliki fungsi atau proses dekripsi di sini
    // Contoh: Menggunakan atob untuk base64 decoding
    var decryptedPhoto = atob(encodedPhoto); // Anda perlu mengganti ini sesuai dengan proses dekripsi yang sesuai

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
                    var randomIndex    = Math.floor(Math.random() * color.length);
                    var randomColor    = color[randomIndex];


                    var getvariabel = "data_transaksiid='"+result[i].transaksi_id+"'"+
                                      "data_name='"+result[i].name+"'"+
                                      "data_gender='"+result[i].gender+"'"+
                                      "data_bod='"+result[i].bod+"'"+
                                      "data_address='"+result[i].address+"'"+
                                      "data_examination='"+result[i].physical_examination_number+"'"+
                                      "data_ecg12_data_value='"+result[i].ecg12_data_value+"'";

                    tableresult +="<tr>";
                    tableresult +="<td>";
                        tableresult +="<div class=' align-middle d-flex align-items-center ps-4'>";
                            tableresult +="<div class='symbol symbol-circle symbol-50px overflow-hidden me-3'>";
                                tableresult +="<a href='#'>";
                                    // if(result[i].image_profile==="N"){
                                        // tableresult +="<div class='symbol-label fs-3 bg-light-"+randomColor+" text-"+randomColor+"'>"+result[i].initial+"</div>";
                                    // }else{
                                        // tableresult +="<div class='symbol-label'>";
                                        // tableresult +="<img src='"+url+"assets/images/avatars/"+result[i].user_id+".jpeg' alt='"+result[i].name+"' class='w-100'>";
                                        // tableresult +="</div>";

                                        tableresult +="<div class='symbol-label'>";
                                        tableresult += "<img src='data:image/jpeg;base64," + decryptedPhoto + "' alt='" + result[i].name + "' class='w-100'>";
                                        tableresult +="</div>";
                                    // }
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
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='fa-solid fa-file-code'></i> Download FHIR .json</a>";
                                tableresult += "<a class='dropdown-item btn btn-sm' data-kt-drawer-show='true' data-kt-drawer-target='#drawer_employee_registrationposition_add' "+getvariabel+" onclick='getdata($(this));'><i class='fa-solid fa-file-code'></i> Download FHIR .txt</a>";
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