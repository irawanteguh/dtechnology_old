calendar();

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
            
        },
        eventDrop: function(info) {
            
        },
        eventClick: function(info) {
            view(info);
        },
    });

    calendar.render();
};

const view = (info) => {
    const startDate = info.event.allDay ? moment(info.event.start).format("Do MMM, YYYY") : moment(info.event.start).format("Do MMM, YYYY - h:mm a");
    const endDate   = info.event.allDay ? moment(info.event.end-1).format("Do MMM, YYYY") : moment(info.event.end-1).format("Do MMM, YYYY - h:mm a");

    const content = `
        <div class="fw-bolder mb-2">${info.event.title}</div>
        <div class="fs-7"><span class="fw-bold">Start:</span> ${startDate}</div>
        <div class="fs-7 mb-4"><span class="fw-bold">End:</span> ${endDate}</div>
        <div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>
    `;

    const popover = new bootstrap.Popover(info.el, {
        container: 'body',
        trigger  : 'hover',
        boundary : 'window',
        placement: 'auto',
        html     : true,
        title    : 'Event Summary',
        content  : content
    });

    popover.show();
};



// var KTAppCalendar = function () {
//     var e, t, n, a, o, r, i, l, d, s, c, m, u, v, f, p, y, D, _, b, k, g, S, Y, h, T, M, w, E, L;
//     var x = { id: "", eventName: "", eventDescription: "", eventLocation: "", startDate: "", endDate: "", allDay: !1 };
//     var B = !1;

//     const q = (e) => {
//         C();
//         const n = x.allDay ? moment(x.startDate).format("Do MMM, YYYY") : moment(x.startDate).format("Do MMM, YYYY - h:mm a");
//         const a = x.allDay ? moment(x.endDate).format("Do MMM, YYYY") : moment(x.endDate).format("Do MMM, YYYY - h:mm a");
//         var o = {
//             container: "body",
//             trigger: "manual",
//             boundary: "window",
//             placement: "auto",
//             dismiss: !0,
//             html: !0,
//             title: "Event Summary",
//             content: `
//                 <div class="fw-bolder mb-2">${x.eventName}</div>
//                 <div class="fs-7"><span class="fw-bold">Start:</span> ${n}</div>
//                 <div class="fs-7 mb-4"><span class="fw-bold">End:</span> ${a}</div>
//                 <div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>
//             `
//         };
//         (t = KTApp.initBootstrapPopover(e, o)).show();
//         B = !0;
//         F();
//     };

//     const C = () => {
//         B && (t.dispose(), B = !1);
//     };

//     const N = () => {
//         f.innerText = "Add a New Event";
//         v.show();
//         const t = p.querySelectorAll('[data-kt-calendar="datepicker"]');
//         const r = p.querySelector("#kt_calendar_datepicker_allday");
//         r.addEventListener("click", (e) => {
//             e.target.checked ? t.forEach((e) => e.classList.add("d-none")) : (d.setDate(x.startDate, !0, "Y-m-d"), t.forEach((e) => e.classList.remove("d-none")));
//         });
//         O(x);
//         _.addEventListener("click", (function (t) {
//             t.preventDefault();
//             y && y.validate().then((function (t) {
//                 console.log("validated!");
//                 if ("Valid" == t) {
//                     _.setAttribute("data-kt-indicator", "on");
//                     _.disabled = !0;
//                     setTimeout((function () {
//                         _.removeAttribute("data-kt-indicator");
//                         Swal.fire({
//                             text: "New event added to calendar!",
//                             icon: "success",
//                             buttonsStyling: !1,
//                             confirmButtonText: "Ok, got it!",
//                             customClass: { confirmButton: "btn btn-primary" }
//                         }).then((function (t) {
//                             if (t.isConfirmed) {
//                                 v.hide();
//                                 _.disabled = !1;
//                                 let t = !1;
//                                 r.checked && (t = !0);
//                                 0 === c.selectedDates.length && (t = !0);
//                                 var l = moment(i.selectedDates[0]).format();
//                                 var s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
//                                 if (!t) {
//                                     const e = moment(i.selectedDates[0]).format("YYYY-MM-DD");
//                                     const t = e;
//                                     l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss");
//                                     s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss");
//                                 }
//                                 e.addEvent({
//                                     id: V(),
//                                     title: n.value,
//                                     description: a.value,
//                                     location: o.value,
//                                     start: l,
//                                     end: s,
//                                     allDay: t
//                                 });
//                                 e.render();
//                                 p.reset();
//                             }
//                         }));
//                     }), 2000);
//                 } else {
//                     Swal.fire({
//                         text: "Sorry, looks like there are some errors detected, please try again.",
//                         icon: "error",
//                         buttonsStyling: !1,
//                         confirmButtonText: "Ok, got it!",
//                         customClass: { confirmButton: "btn btn-primary" }
//                     });
//                 }
//             }));
//         }));
//     };

//     const A = () => {
//         var e, t, n;
//         w.show();
//         x.allDay ? (e = "All Day", t = moment(x.startDate).format("Do MMM, YYYY"), n = moment(x.endDate).format("Do MMM, YYYY")) : (e = "", t = moment(x.startDate).format("Do MMM, YYYY - h:mm a"), n = moment(x.endDate).format("Do MMM, YYYY - h:mm a"));
//         g.innerText = x.eventName;
//         S.innerText = e;
//         Y.innerText = x.eventDescription ? x.eventDescription : "--";
//         h.innerText = x.eventLocation ? x.eventLocation : "--";
//         T.innerText = t;
//         M.innerText = n;
//     };

//     const H = () => {
//         E.addEventListener("click", (t) => {
//             t.preventDefault();
//             w.hide();
//             (() => {
//                 f.innerText = "Edit an Event";
//                 v.show();
//                 const t = p.querySelectorAll('[data-kt-calendar="datepicker"]');
//                 const r = p.querySelector("#kt_calendar_datepicker_allday");
//                 r.addEventListener("click", (e) => {
//                     e.target.checked ? t.forEach((e) => e.classList.add("d-none")) : (d.setDate(x.startDate, !0, "Y-m-d"), t.forEach((e) => e.classList.remove("d-none")));
//                 });
//                 O(x);
//                 _.addEventListener("click", (function (t) {
//                     t.preventDefault();
//                     y && y.validate().then((function (t) {
//                         console.log("validated!");
//                         if ("Valid" == t) {
//                             _.setAttribute("data-kt-indicator", "on");
//                             _.disabled = !0;
//                             setTimeout((function () {
//                                 _.removeAttribute("data-kt-indicator");
//                                 Swal.fire({
//                                     text: "New event added to calendar!",
//                                     icon: "success",
//                                     buttonsStyling: !1,
//                                     confirmButtonText: "Ok, got it!",
//                                     customClass: { confirmButton: "btn btn-primary" }
//                                 }).then((function (t) {
//                                     if (t.isConfirmed) {
//                                         v.hide();
//                                         _.disabled = !1;
//                                         e.getEventById(x.id).remove();
//                                         let t = !1;
//                                         r.checked && (t = !0);
//                                         0 === c.selectedDates.length && (t = !0);
//                                         var l = moment(i.selectedDates[0]).format();
//                                         var s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
//                                         if (!t) {
//                                             const e = moment(i.selectedDates[0]).format("YYYY-MM-DD");
//                                             const t = e;
//                                             l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss");
//                                             s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss");
//                                         }
//                                         e.addEvent({
//                                             id: V(),
//                                             title: n.value,
//                                             description: a.value,
//                                             location: o.value,
//                                             start: l,
//                                             end: s,
//                                             allDay: t
//                                         });
//                                         e.render();
//                                         p.reset();
//                                     }
//                                 }));
//                             }), 2000);
//                         } else {
//                             Swal.fire({
//                                 text: "Sorry, looks like there are some errors detected, please try again.",
//                                 icon: "error",
//                                 buttonsStyling: !1,
//                                 confirmButtonText: "Ok, got it!",
//                                 customClass: { confirmButton: "btn btn-primary" }
//                             });
//                         }
//                     }));
//                 }));
//             })();
//         });
//     };

//     const F = () => {
//         document.querySelector("#kt_calendar_event_view_button").addEventListener("click", (e) => {
//             e.preventDefault();
//             C();
//             A();
//         });
//     };

//     const O = () => {
//         n.value = x.eventName ? x.eventName : "";
//         a.value = x.eventDescription ? x.eventDescription : "";
//         o.value = x.eventLocation ? x.eventLocation : "";
//         i.setDate(x.startDate, !0, "Y-m-d");
//         const e = x.endDate ? x.endDate : moment(x.startDate).add(1, 'days').format("YYYY-MM-DD");
//         d.setDate(e, !0, "Y-m-d");
//         const t = p.querySelector("#kt_calendar_datepicker_allday");
//         const r = p.querySelectorAll('[data-kt-calendar="datepicker"]');
//         x.allDay ? (t.checked = !0, r.forEach((e) => e.classList.add("d-none"))) : (t.checked = !1, c.setDate(x.startDate, !0, "Y-m-d H:i"), u.setDate(x.endDate, !0, "Y-m-d H:i"), r.forEach((e) => e.classList.remove("d-none")));
//     };

//     const P = (event) => {
//         x.id = event.id;
//         x.eventName = event.title;
//         x.eventDescription = event.description;
//         x.eventLocation = event.location;
//         x.startDate = event.start;
//         x.endDate = event.end ? event.end : moment(event.start).add(1, 'days').format("YYYY-MM-DD");
//         x.allDay = event.allDay;
//     };

//     return {
//         init: function () {
//             (e = document.getElementById("kt_calendar_app")),
//             (t = document.getElementById("kt_modal_add_event")),
//             (n = document.getElementById("kt_calendar_event_name")),
//             (a = document.getElementById("kt_calendar_event_description")),
//             (o = document.getElementById("kt_calendar_event_location")),
//             (r = document.getElementById("kt_calendar_add_event_submit")),
//             (i = flatpickr("#kt_calendar_datepicker_start_date", { enableTime: !1, dateFormat: "Y-m-d" })),
//             (d = flatpickr("#kt_calendar_datepicker_end_date", { enableTime: !1, dateFormat: "Y-m-d" })),
//             (c = flatpickr("#kt_calendar_datepicker_start_time", { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
//             (u = flatpickr("#kt_calendar_datepicker_end_time", { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
//             (v = new bootstrap.Modal(t)),
//             (l = document.querySelector('[data-kt-calendar="add"]')),
//             (f = t.querySelector(".modal-title")),
//             (p = t.querySelector("#kt_modal_add_event_form")),
//             (y = FormValidation.formValidation(p, {
//                 fields: { calendar_event_name: { validators: { notEmpty: { message: "Event name is required" } } } },
//                 plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) }
//             })),
//             (E = document.querySelector("#kt_calendar_event_view")),
//             (w = new bootstrap.Modal(E)),
//             (g = E.querySelector("#kt_calendar_event_view_name")),
//             (S = E.querySelector("#kt_calendar_event_view_all_day")),
//             (Y = E.querySelector("#kt_calendar_event_view_description")),
//             (h = E.querySelector("#kt_calendar_event_view_location")),
//             (T = E.querySelector("#kt_calendar_event_view_start_date")),
//             (M = E.querySelector("#kt_calendar_event_view_end_date")),
//             l.addEventListener("click", (function (e) {
//                 e.preventDefault();
//                 const n = new Date();
//                 (x = { id: "", eventName: "", eventDescription: "", eventLocation: "", startDate: n, endDate: moment(n).add(1, 'days').format("YYYY-MM-DD"), allDay: !1 });
//                 N();
//             }));
//             document.querySelectorAll('[data-kt-calendar="view"]').forEach((function (e) {
//                 e.addEventListener("click", (function (e) {
//                     e.preventDefault();
//                     A();
//                 }));
//             }));
//             document.querySelector('[data-kt-calendar="delete"]').addEventListener("click", (function (t) {
//                 t.preventDefault();
//                 Swal.fire({
//                     text: "Are you sure you want to delete this event?",
//                     icon: "warning",
//                     showCancelButton: !0,
//                     buttonsStyling: !1,
//                     confirmButtonText: "Yes, delete it!",
//                     cancelButtonText: "No, return",
//                     customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" }
//                 }).then((function (t) {
//                     t.value ? (e.getEventById(x.id).remove(), w.hide()) : "cancel" === t.dismiss && Swal.fire({ text: "Your event was not deleted!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn fw-bold btn-primary" } });
//                 }));
//             }));
//             (m = document.getElementById("kt_calendar_external_events")), new FullCalendarInteraction.Draggable(m, {
//                 itemSelector: ".fc-draggable-handle", eventData: function (e) {
//                     return { title: e.getAttribute("title"), location: e.getAttribute("data-calendar-location"), description: e.getAttribute("data-calendar-description"), id: V() };
//                 }
//             });
//             document.querySelectorAll("#kt_calendar_external_events .fc-draggable-handle").forEach((e) => { e.draggable = !0; });
//             document.getElementById("kt_calendar_external_events_remove").addEventListener("click", (function () {
//                 document.querySelectorAll("#kt_calendar_external_events .fc-draggable-handle").forEach((e) => { e.parentNode.removeChild(e); });
//             }));
//             var n = moment().startOf("day");
//             var a = n.format("YYYY-MM");
//             var o = n.clone().subtract(1, "day").format("YYYY-MM-DD");
//             var r = n.format("YYYY-MM-DD");
//             var l = n.clone().add(1, "day").format("YYYY-MM-DD");
//             (e = new FullCalendar.Calendar(e, {
//                 headerToolbar: { left: "prev,next today", center: "title", right: "dayGridMonth,timeGridWeek,timeGridDay" },
//                 height: 800,
//                 contentHeight: 780,
//                 aspectRatio: 3,
//                 nowIndicator: !0,
//                 now: r + "T09:25:00",
//                 views: { dayGridMonth: { buttonText: "month" }, timeGridWeek: { buttonText: "week" }, timeGridDay: { buttonText: "day" } },
//                 initialView: "dayGridMonth",
//                 initialDate: r,
//                 editable: !0,
//                 dayMaxEvents: !0,
//                 navLinks: !0,
//                 events: [
//                     { id: V(), title: "Conference", start: a + "-17", end: a + "-19", description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-danger", location: "USA" },
//                     { id: V(), title: "Meeting", start: r + "T13:00:00", description: "Lorem ipsum dolor eius mod tempor labore", end: r + "T14:00:00", className: "fc-event-success", location: "USA" },
//                     { id: V(), title: "Dinner", start: r + "T19:00:00", description: "Lorem ipsum dolor eius mod tempor labore", end: r + "T21:00:00", location: "USA" },
//                     { id: V(), title: "All Day Event", start: o, end: r, description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-danger", location: "USA" },
//                     { id: V(), title: "Reporting", start: r + "T12:00:00", description: "Lorem ipsum dolor eius mod tempor labore", end: r + "T14:00:00", className: "fc-event-success", location: "USA" },
//                     { id: V(), title: "Company Trip", start: l, end: l, description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-primary", location: "USA" },
//                     { id: V(), title: "Staff Meeting", start: r + "T11:00:00", description: "Lorem ipsum dolor eius mod tempor labore", end: r + "T14:00:00", className: "fc-event-info", location: "USA" },
//                     { id: V(), title: "Lunch", start: l + "T14:00:00", description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-warning", location: "USA" },
//                     { id: V(), title: "Meeting", start: l + "T07:30:00", description: "Lorem ipsum dolor eius mod tempor labore", end: l + "T09:30:00", className: "fc-event-info", location: "USA" },
//                     { id: V(), title: "Happy Hour", start: l + "T17:30:00", description: "Lorem ipsum dolor eius mod tempor labore", end: l + "T21:00:00", className: "fc-event-danger", location: "USA" },
//                     { id: V(), title: "Dinner", start: l + "T18:00:00", description: "Lorem ipsum dolor eius mod tempor labore", end: l + "T21:00:00", className: "fc-event-success", location: "USA" },
//                     { id: V(), title: "Birthday Party", start: l, end: l, description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-primary", location: "USA" },
//                     { id: V(), title: "Site visit", start: l, end: l, description: "Lorem ipsum dolor eius mod tempor labore", className: "fc-event-info", location: "USA" }
//                 ],
//                 select: function (e) {
//                     (x = { id: "", eventName: "", eventDescription: "", eventLocation: "", startDate: e.start, endDate: e.end, allDay: e.allDay }),
//                     N();
//                 },
//                 eventClick: function (event) {
//                     P(event.event);
//                     A();
//                 }
//             })).render();
//         }
//     }
// }();
// KTUtil.onDOMContentLoaded((function () {
//     KTCalendarApp.init();
// }));
