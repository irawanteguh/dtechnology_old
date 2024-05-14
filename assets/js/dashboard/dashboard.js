todolist();

function todolist() {
    $.ajax({
        url: url + "index.php/dashboard/dashboard/todolist",
        method: "POST",
        dataType: "JSON",
        cache: false,
        beforeSend: function() {
            $("#kt_activity_today").html("");
            $("#kt_activity_week").html("");
            $("#kt_activity_month").html("");
            $("#kt_activity_year").html("");

            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
        },
        success: function(data) {
            var result           = "";
            var tableresultToday = "";
            var tableresultWeek  = "";
            var tableresultMonth = "";
            var tableresultYear  = "";

            if (data.responCode === "00") {
                result = data.responResult;
                for (var i in result) {
                    var tableresult = "<div class='d-flex align-items-center mb-8'>";

                    if (result[i].PRIORITY === "1") {
                        tableresult += "<span class='bullet bullet-vertical h-40px bg-success'></span>";
                    } else if (result[i].PRIORITY === "2") {
                        tableresult += "<span class='bullet bullet-vertical h-40px bg-primary'></span>";
                    } else if (result[i].PRIORITY === "3") {
                        tableresult += "<span class='bullet bullet-vertical h-40px bg-warning'></span>";
                    } else {
                        tableresult += "<span class='bullet bullet-vertical h-40px bg-danger'></span>";
                    }

                    tableresult += "<div class='form-check form-check-custom form-check-solid mx-5'>";
                    if(result[i].STATUS === "0" ){
                        tableresult += "<input class='form-check-input' type='checkbox' value='' onclick='toggleStrikeThrough(this)'>";
                    }else{
                        tableresult += "<input class='form-check-input' type='checkbox' value='' onclick='toggleStrikeThrough(this)' checked>";
                    }
                    
                    tableresult += "</div>";
                    tableresult += "<div class='flex-grow-1'>";

                    if(result[i].STATUS === "0" ){
                        tableresult += "<a href='#' class='text-gray-800 text-hover-primary fw-bolder fs-6 todo-item'>" + result[i].TODO + "</a>";
                    }else{
                        tableresult += "<a href='#' class='text-gray-800 text-hover-primary fw-bolder fs-6 todo-item text-decoration-line-through'>" + result[i].TODO + "</a>";
                    }
                    
                    tableresult += "<span class='text-muted fw-bold d-block'>Due in 3 Days</span>";
                    tableresult += "</div>";

                    if (result[i].PRIORITY === "1") {
                        tableresult += "<span class='badge badge-light-success fs-8 fw-bolder'>Low</span>";
                    } else if (result[i].PRIORITY === "2") {
                        tableresult += "<span class='badge badge-light-primary fs-8 fw-bolder'>Medium Low</span>";
                    } else if (result[i].PRIORITY === "3") {
                        tableresult += "<span class='badge badge-light-warning fs-8 fw-bolder'>Medium High</span>";
                    } else {
                        tableresult += "<span class='badge badge-light-danger fs-8 fw-bolder'>High</span>";
                    }

                    tableresult += "</div>";

                    if (result[i].DUEDATE === "1") {
                        tableresultToday += tableresult;
                    } else if (result[i].DUEDATE === "2") {
                        tableresultWeek += tableresult;
                    } else if (result[i].DUEDATE === "3") {
                        tableresultMonth += tableresult;
                    } else if (result[i].DUEDATE === "4") {
                        tableresultYear += tableresult;
                    }
                }
            }

            $("#kt_activity_today").html(tableresultToday);
            $("#kt_activity_week").html(tableresultWeek);
            $("#kt_activity_month").html(tableresultMonth);
            $("#kt_activity_year").html(tableresultYear);
            
            toastr[data.responHead](data.responDesc, "INFORMATION");
        },
        error: function(xhr, status, error) {
            toastr["error"]("Terjadi kesalahan : " + error, "Opps !");
        },
        complete: function() {
            toastr.clear();
        }
    });
    return false;
}


function toggleStrikeThrough(checkbox) {
    if (checkbox.checked) {
        $(checkbox).closest('.d-flex').find('.todo-item').addClass('text-decoration-line-through');
    } else {
        $(checkbox).closest('.d-flex').find('.todo-item').removeClass('text-decoration-line-through');
    }
}