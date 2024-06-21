calendar();



$('#modal_activity_userguides').on('hidden.bs.modal', function (e) {
    $('#modal_activity_add').modal('show');
});

$('#modal_activity_add').on('show.bs.modal', function (e) {
    $("input[name='data_activity_time_start_add']").val(new Date().getHours() + ":" + ('0' + new Date().getMinutes()).slice(-2));
    $("input[name='data_activity_time_end_add']").val(new Date().getHours() + ":" + ('0' + new Date().getMinutes()).slice(-2));
    $('#data_activity_description_add').val("");
    volume();
});

flatpickr('[name="data_activity_date_add"]', {
    enableTime: false,
    dateFormat: "d.m.Y",
    maxDate   : "today",
    onChange  : function(selectedDates, dateStr, instance) {
        instance.close();
    }
});

flatpickr('[name="data_activity_time_start_add"]', {
    enableTime   : true,
    time_24hr    : true,
    noCalendar   : true,
    dateFormat   : "H:i",
    defaultHour  : new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    onChange: function(selectedDates, dateStr, instance) {
        checkTime();
    }
});

flatpickr('[name="data_activity_time_end_add"]', {
    enableTime: true,
    time_24hr : true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultHour  : new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    onChange: function(selectedDates, dateStr, instance) {
        checkTime();
    }
});

function calendar() {
    var e = document.getElementById("kt_calendar_app");
    var calendar = new FullCalendar.Calendar(e, {
        headerToolbar: {
            start : "prev,next today",
            center: "title",
            end   : "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
        },
        initialView: 'dayGridMonth',
        eventSources: [{
            url   : url + "index.php/kpi/activity/calender",
            method: 'POST'
        }],
        selectable : true,
        editable   : true,
        firstDay   : 1,
        dayMaxEvents: 5,
        fixedWeekCount: true,
        timeZone: 'Asia/Jakarta',
        themeSystem: "bootstrap5",
        select: function (e) {
            
        },
        dateClick: function(info) {
            var today = new Date();
            var clickedDate = new Date(info.dateStr);

            if (clickedDate > today) {
                Swal.fire({
                    title            : "<h1 class='font-weight-bold' style='color:#234974;'>I'm Sorry</h1>",
                    html             : "<b>You cannot select a date beyond today.</b>",
                    icon             : "error",
                    confirmButtonText: "Please Try Again",
                    buttonsStyling   : false,
                    timerProgressBar : true,
                    timer            : 5000,
                    customClass      : {confirmButton: "btn btn-danger"},
                    showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                    hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
                });
            } else {
                var pilihtgl = info.dateStr;
                pilihtgl = String(pilihtgl);
                pilihtgl = pilihtgl.substr(8,2)+'.'+pilihtgl.substr(5,2)+'.'+pilihtgl.substr(0,4);

                $(":input[name='data_activity_date_add']").val(pilihtgl);
                $('#modal_activity_add').modal('show');
            }
        },
        eventDrop: function(info) {
            
        },
        eventClick: function(info) {
            Swal.fire({
                title            : "<h1 class='font-weight-bold' style='color:#234974;'>For Your Information</h1>",
                html             : "<b>Sorry, the function is still in the developer development stage</b>",
                icon             : "error",
                confirmButtonText: "Please Try Again",
                buttonsStyling   : false,
                timerProgressBar : true,
                timer            : 5000,
                customClass      : {confirmButton: "btn btn-danger"},
                showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
            });
        },
        aspectRatio: 2.4
    });

    calendar.render();
};

function checkTime() {
    var startTime = document.getElementById("data_activity_time_start_add").value;
    var endTime   = document.getElementById("data_activity_time_end_add").value;
    var startDate = new Date("2000-01-01T" + startTime + ":00");
    var endDate   = new Date("2000-01-01T" + endTime + ":00");

    if (startDate > endDate) {
        Swal.fire({
            icon : 'error',
            title: 'Oops...',
            text : 'Waktu mulai tidak boleh melebihi atau sama dengan waktu selesai!',
        });
    }else{
        volume();
    }
}

function volume(){
	var kegiatan        = $("select[name='data_activity_primaryactivity_add']").val();
	var mulaikegiatan   = $("input[name='data_activity_time_start_add']").val();
	var selesaikegiatan = $("input[name='data_activity_time_end_add']").val();
	$.ajax({
		url     : url+"index.php/kpi/activity/volume",
		data    : {'kegiatan': kegiatan, 'mulaikegiatan': mulaikegiatan, 'selesaikegiatan': selesaikegiatan},
		method  : "POST",
		dataType: "html",
		cache   : false,
		success : function (data) {
			$("select[name='data_activity_volume_add']").html(data);
		}
	});
	return false;
};

$(document).on("change", "select[name='data_activity_primaryactivity_add']", function (e) {
    e.preventDefault();
    volume();
});

$(document).on("submit", "#forminsertactivity", function (e) {
	e.preventDefault();
    e.stopPropagation();
	var form = $(this);
    var url  = $(this).attr("action");
	$.ajax({
        url       : url,
        data      : form.serialize(),
        method    : "POST",
        dataType  : "JSON",
        cache     : false,
        beforeSend: function () {
            toastr.clear();
            toastr["info"]("Sending request...", "Please wait");
			$("#btn_activity_add").addClass("disabled");
        },
		success: function (data) {
            toastr.clear();

            if (data.responCode == "00") {
                toastr[data.responHead](data.responDesc, "INFORMATION");
                $("#modal_activity_add").modal("hide");
                calendar();
			}else{
                $("#btn_activity_add").removeClass("disabled");
                Swal.fire({
                    title            : "<h1 class='font-weight-bold' style='color:#234974;'>For Your Information</h1>",
                    html             : "<b>"+data.responDesc+"</b>",
                    icon             : data.responHead,
                    confirmButtonText: "Please Try Again",
                    buttonsStyling   : false,
                    timerProgressBar : true,
                    timer            : 5000,
                    customClass      : {confirmButton: "btn btn-danger"},
                    showClass        : {popup: "animate__animated animate__fadeInUp animate__faster"},
                    hideClass        : {popup: "animate__animated animate__fadeOutDown animate__faster"}
                });
            };
			
		},
        complete: function () {
            toastr.clear();
            $("#btn_activity_add").removeClass("disabled");
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
});