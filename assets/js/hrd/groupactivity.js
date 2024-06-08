daftarjabatan();

function getdata(btn){
    var $btn       = $(btn);
    var positionid = $btn.attr("data-positionid");
    var position   = $btn.attr("data-position");


    $(":hidden[name='positionid-mapping']").val(positionid);
    $("#headerlistactivity").html("List Activity : "+position);
    daftarkegiatan();
};

function daftarjabatan(){
    $.ajax({
        url       : url+"index.php/hrd/groupactivity/daftarjabatan",
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
            $("#listposition").html("");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";
            var getvariabel = "";

            if(data.responCode==="00"){
                var result = data.responResult;
                for(var i in result){
                    getvariabel =   "data-positionid='"+result[i].POSITION_ID+"'"+
                                    "data-position='"+result[i].POSITION+"'";

                    tableresult +="<div class='d-flex align-items-center p-3 rounded-3 border-2 border-hover border border-dashed border-gray-300 cursor-pointer mb-1' data-kt-search-element='customer' title='Klik Untuk Memilih' "+getvariabel+">";
                    if(result[i].jml > 0){
                        tableresult +="<div class='fw-bold'><span class='fs-6 text-gray-800 me-2'>"+result[i].POSITION+" "+(result[i].FUNCTIONAL ? result[i].FUNCTIONAL : '')+"</span><span class='badge badge-light-info'>"+(result[i].jml ? result[i].jml : '')+" Staff</span></div>";
                    }else{
                        tableresult +="<div class='fw-bold'><span class='fs-6 text-gray-800 me-2'>"+result[i].POSITION+" "+(result[i].FUNCTIONAL ? result[i].FUNCTIONAL : '')+"</span></div>";
                    }
                    tableresult +="</div>";
                }
            }

            $("#listposition").html(tableresult);

            $("#listposition div").on('click', function() {
                getdata(this);
            });

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

function daftarkegiatan(){
    var positionid = $("input[name='positionid-mapping']").val();
    $.ajax({
        url     : url+"index.php/hrd/groupactivity/daftarkegiatan",
        data    : {positionid:positionid},
        method  : "POST",
        dataType: "JSON",
        cache   : false,
        beforeSend: function () {
            $("#listactivity").html("");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){

                    tableresult +="<div class='d-flex align-items-center p-3 rounded-3 border-2 border-dashed border-gray-300 mb-1 d-flex justify-content-between' data-kt-search-element='customer'>";
                        tableresult +="<div class='fw-bold'>";
                            tableresult +="<span class='fs-6 text-gray-800 me-2'>"+result[i].ACTIVITY+"</span><br>";
                            tableresult +="<span class='fs-6 text-muted me-2'>Durasi : "+result[i].DURASI+" Menit </span>";
                        tableresult +="</div>";
                        tableresult +="<div class='fw-bold d-flex justify-content-end'>";
                            if (result[i].transidmapping != null) {
                                tableresult +="<div class='form-check form-switch form-check-custom form-check-solid'><input class='form-check-input h-20px w-30px' type='checkbox' id='"+result[i].ACTIVITY_ID+"' checked='checked' /></div>";
                            }else{
                                tableresult +="<div class='form-check form-switch form-check-custom form-check-solid'><input class='form-check-input h-20px w-30px' type='checkbox' id='"+result[i].ACTIVITY_ID+"' /></div>";    
                            }
                        tableresult +="</div>";
                    tableresult +="</div>";
                }
            }

            $("#listactivity").html(tableresult);
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

$(document).on("change",".form-check-input",function(e){
	e.preventDefault();
    var switchId    = $(this).attr('id');                           
    var switchValue = $(this).prop('checked');                      
    var positionid  = $("input[name='positionid-mapping']").val()
	$.ajax({
        url       : url+"index.php/hrd/groupactivity/mappingactivity",
        data      : {switchId:switchId,switchValue:switchValue,positionid:positionid},
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function(){
            //
        },
		success: function(data){
			if(data.responCode==="00"){
                daftarkegiatan();
            }
		},
		complete: function(){
            //
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
});