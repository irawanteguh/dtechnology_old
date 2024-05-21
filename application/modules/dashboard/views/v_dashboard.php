
<div class="row g-6 g-xl-9 mb-5">
    <div class="col-lg-6 col-xxl-3">
        <div class="card h-100">
            <div class="card-body p-9">
                <div class="fs-2hx fw-bolder" id="counttodolist">N/A</div>
                <div class="fs-4 fw-bold text-gray-400 mb-7">Current Todo List</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                        <canvas id="todolist-chart" width="150" height="150" style="display: block; box-sizing: border-box; height: 100px; width: 100px;"></canvas>
                    </div>
                    <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                            <div class="bullet bg-primary me-3"></div>
                            <div class="text-gray-400">Waiting</div>
                            <div class="ms-auto fw-bolder text-gray-700" id="countwaiting">N/A</div>
                        </div>
                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                            <div class="bullet bg-success me-3"></div>
                            <div class="text-gray-400">Done</div>
                            <div class="ms-auto fw-bolder text-gray-700" id="countdone">N/A</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gy-5 g-xl-8">
	<div class="col-lg-4">
        <div class="card">
            <div class="card-header border-0">
				<h3 class="card-title fw-bolder text-dark">Todo</h3>
				<div class="card-toolbar m-0">
                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bolder m-5" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week" aria-selected="false">Week</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month" aria-selected="false">Month</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year" aria-selected="false">Year</a>
                        </li>
                    </ul>
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
							<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Todo List</div>
						</div>
						<div class="menu-item px-3">
							<a href="" data-bs-toggle="modal" data-bs-target="#modal-todolist" class="menu-link px-3">Create Todo List</a>
                            <!-- <a href="#" class="menu-link px-3">Asign Todo List</a> -->
						</div>
					</div>
				</div>
			</div>
            <div class="card-body">
                <div class="tab-content">
                    <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab"></div>
                    <div id="kt_activity_week" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_week_tab"></div>
                    <div id="kt_activity_month" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_month_tab"></div>
                    <div id="kt_activity_year" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_year_tab"></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-xl-8">
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Performance Staff</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th>Name</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody id="datastaff"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>