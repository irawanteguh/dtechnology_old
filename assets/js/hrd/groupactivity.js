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
    var search     = $("input[name='search']").val();
    $.ajax({
        url       : url+"index.php/hrd/groupactivity/daftarjabatan",
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

                    tableresult +="<a class='btn font-weight-bold list-group-item list-group-item-action' role='button' "+getvariabel+" onclick='getdata(this)'>";
                    tableresult +=result[i].POSITION+" "+(result[i].FUNCTIONAL ? result[i].FUNCTIONAL : '')+"<div class='text-muted'>Level : "+result[i].LEVEL+"<br>RVU : "+todesimal(result[i].RVU)+"</div>";
                    tableresult +="</a>";
                }
            }

            $("#listposition").html(tableresult);
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

function daftarkegiatan(){
    var search     = $("input[name='search']").val();
    var positionid = $("input[name='positionid-mapping']").val();
    $.ajax({
        url     : url+"index.php/hrd/groupactivity/daftarkegiatan",
        data    : {search:search,positionid:positionid},
        method  : "POST",
        dataType: "JSON",
        cache   : false,
        beforeSend: function () {
            $("#listactivity").html("");
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
        },
        success:function(data){
            var result      = "";
            var tableresult = "";

            if(data.responCode==="00"){
                result        = data.responResult;
                for(var i in result){
                    tableresult +="<li class='list-group-item'>";
                    tableresult +="<div class='col-md-12 row'>";
                        tableresult +="<div class='col-md-9 row d-flex justify-content-start'>";
                        tableresult +="<div class='col-md-12'>"+result[i].ACTIVITY+"</div><br><div class='col-md-12 text-muted'>Duration : "+result[i].DURASI+" Menit</div>";
                        tableresult +="</div>";
                        tableresult +="<div class='col-md-3 d-flex justify-content-end'>";
                        if (result[i].transidmapping != null) {
                            tableresult += "<div class='form-group'><div class='custom-control custom-switch custom-switch-off-danger custom-switch-on-success'><input type='checkbox' class='custom-control-input' id='" + result[i].ACTIVITY_ID + "'checked><label class='custom-control-label' for='" + result[i].ACTIVITY_ID + "'>Active Activity</label></div></div>";
                        } else {
                            tableresult += "<div class='form-group'><div class='custom-control custom-switch custom-switch-off-danger custom-switch-on-success'><input type='checkbox' class='custom-control-input' id='" + result[i].ACTIVITY_ID + "'><label class='custom-control-label' for='" + result[i].ACTIVITY_ID + "'>Active Activity</label></div></div>";
                        }
                        tableresult +="</div>";
                    tableresult +="</div>"; 
                    tableresult +="</li>";
                }
            }

            $("#listactivity").html(tableresult);
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
