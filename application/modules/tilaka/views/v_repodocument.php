<div class="alert alert-dismissible bg-light-info border border-info border-3 border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10 fa-fade">
    <span class="svg-icon svg-icon-2hx svg-icon-info me-4 mb-5 mb-sm-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
            <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
        </svg>
    </span>
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h5 class="mb-1">For Your Information</h5>
        <span>Data Akan Di Perbaharui Setiap 10 Detik.</span>
    </div>
</div>

<div class="card card-flush h-lg-100">
    <div class="card-header pt-5">
		<h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Repository Document</span>
            <span class="text-muted mt-1 fw-bold fs-7" id="">n/a</span>
        </h3>
		<div class="card-toolbar">
			<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
							<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
							<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
							<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
						</g>
					</svg>
				</span>
			</button>
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
				<div class="menu-item px-3">
					<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#modal_activity_add" class="menu-link flex-stack px-3">Add Activity -->
					<!-- <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Add Activity" aria-label="Specify a target name for future usage and reference"></i></a> -->
				</div>
			</div>
		</div>
	</div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-2" id="tablemasterkaryawan">
                <thead>
                    <tr class="fw-bolder text-muted bg-light align-middle">
                        <th class="ps-4 rounded-start">Status</th>
                        <th>Filename</th>
                        <th>Category Document</th>
                        <th>Assign By</th>
                        <th>Created Date</th>
                        <th>Tilaka Name</th>
                        <th class="pe-4 text-end rounded-end">Note</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold" id="resultrepodocument"></tbody>
            </table>
        </div>
    </div>
</div>