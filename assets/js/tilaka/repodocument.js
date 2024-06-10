dataupload();

// setInterval(() => {
//     dataupload();
// }, 10000);

function viewdoc(btn){
    var filename     = $(btn).attr("data-dirfile");
    var responsefile = jQuery.ajax({url: filename, type: 'HEAD', async: false}).status;

    if(responsefile === 200){
        viewfile = "<embed src='"+filename+"#toolbar=0&navpanes=0' width='100%' height='100%' type='application/pdf' id='view'>";
    }else{
        viewfile = `
                    <div class='alert alert-dismissible bg-light-info border border-info border-3 border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10 fa-fade'>
                        <span class='svg-icon svg-icon-2hx svg-icon-info me-4 mb-5 mb-sm-0'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'>
                                <path opacity='0.3' d='M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z' fill='black'></path>
                                <path d='M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z' fill='black'></path>
                            </svg>
                        </span>
                        <div class='d-flex flex-column pe-0 pe-sm-10'>
                            <h5 class='mb-1'>For Your Information</h5>
                            <span>File Tidak Di Temukan, Silakan Periksa Kembali</span>
                        </div>
                    </div>
                    `;

    }

    $("#viewdoc").html(viewfile);
};


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
                result = data.responResult;

                for(var i in result){
                    tableresult +="<tr>";
                    if(result[i].STATUS_SIGN==="0"){
                        tableresult +="<td class='ps-4'><span class='badge badge-light-info fs-7 fw-bold'>New</span></td>"; 
                    }else{
                        if(result[i].STATUS_SIGN==="1"){
                            tableresult +="<td class='ps-4'><span class='badge badge-light-primary fs-7 fw-bold'>Files Uploaded</span></td>"; 
                        }else{
                            if(result[i].STATUS_SIGN==="2"){
                                tableresult +="<td class='ps-4'><span class='badge badge-light-info fs-7 fw-bold'>Request Sign Success</span></td>"; 
                            }else{
                                if(result[i].STATUS_SIGN==="3"){
                                    tableresult +="<td class='ps-4'><span class='adge badge-light-danger fs-7 fw-bold'>Request Sign Field</span></td>";
                                }else{
                                    tableresult +="<td class='ps-4'><span class='badge badge-light-success fs-7 fw-bold'>Sign Success</span></td>"; 
                                }
                            }
                        }
                    }
                    tableresult +="<td><div><a href='#' data-bs-toggle='modal' data-bs-target='#modal_view_pdf' data-dirfile='"+pathposttilaka+"/"+(result[i].NO_FILE ? result[i].NO_FILE : "")+".pdf' onclick='viewdoc(this)'>"+(result[i].NO_FILE ? result[i].NO_FILE : "-")+"</a></div><div>"+(result[i].FILENAME ? result[i].FILENAME : "-")+"</div></td>";
                    tableresult +="<td>"+(result[i].jenisdocumen ? result[i].jenisdocumen : "")+"</td>";
                    tableresult +="<td>"+(result[i].assignname ? result[i].assignname : "")+"</td>";
                    tableresult +="<td>"+(result[i].tgljam ? result[i].tgljam : "")+"</td>";
                    tableresult +="<td>"+(result[i].useridentifier ? result[i].useridentifier : "<i class='bi bi-x-octagon text-danger'></i>") +"</td>";
                    tableresult += "<td class='text-end'>";
                    tableresult += "<button type='button' class='btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px' data-kt-table-widget-4='expand_row'>";
                    tableresult += "<i class='bi bi-plus fs-4 m-0 toggle-off'></i>";
                    tableresult += "<i class='bi bi-dash fs-4 m-0 toggle-on'></i>";
                    tableresult += "</button>";
                    tableresult +="</tr>";

                    tableresult += "<tr class='d-none'>";
                    tableresult += "<td colspan='7'>";
                    tableresult += "<div class='row col-md-12'>";
                    tableresult += "<h6>Response</h6>";
                    tableresult += "<textarea data-kt-autosize='true' class='form-control form-control-solid' readonly>" + (result[i].NOTE ? result[i].NOTE : "") + "</textarea>";
                    tableresult += "</div>";
                    tableresult += "</td>";
                    tableresult += "</tr>";
                }
            }

            $("#resultrepodocument").html(tableresult);

            document.querySelectorAll("[data-kt-table-widget-4='expand_row']").forEach(button => {
                button.addEventListener('click', function() {
                    const tr = this.closest('tr');
                    const nextTr = tr.nextElementSibling;
            
                    // Check if the next row is expanded
                    const isExpanded = !nextTr.classList.contains('d-none');
            
                    // Close any previously expanded rows if it's not the same row that is clicked
                    if (!isExpanded) {
                        document.querySelectorAll("[data-kt-table-widget-4='subtable_template']").forEach(openRow => {
                            openRow.classList.add('d-none');
                            openRow.removeAttribute('data-kt-table-widget-4');
            
                            const openButton = openRow.previousElementSibling.querySelector("[data-kt-table-widget-4='expand_row']");
                            if (openButton) {
                                openButton.classList.remove('active');
                                openButton.closest('tr').setAttribute('aria-expanded', 'false');
                            }
                        });
                    }
            
                    // Toggle the clicked row
                    if (!isExpanded || (isExpanded && tr.getAttribute('aria-expanded') === 'true')) {
                        if (isExpanded) {
                            nextTr.classList.add('d-none');
                            tr.setAttribute('aria-expanded', 'false');
                            nextTr.removeAttribute('data-kt-table-widget-4');
                            this.classList.remove('active'); // Remove the active class from the button
                        } else {
                            nextTr.classList.remove('d-none');
                            tr.setAttribute('aria-expanded', 'true');
                            nextTr.setAttribute('data-kt-table-widget-4', 'subtable_template');
                            this.classList.add('active'); // Add the active class to the button
                        }
                    }
                });
            });

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