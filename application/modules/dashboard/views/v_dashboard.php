
<div class="col-lg-6">
    <div class="card card-flush h-lg-100">
        <div class="card-header pt-6">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Task Summary</h3>
                <div class="fs-6 fw-bold text-gray-400" id="countoverduelabel"></div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                    <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                        <span class="fs-2qx fw-bolder" id="allcount"></span>
                        <span class="fs-6 fw-bold text-gray-400">Total Tasks</span>
                    </div>
                    <canvas id="todolist-chart" width="262" height="262" style="display: block; box-sizing: border-box; height: 174.667px; width: 174.667px;"></canvas>
                </div>
                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-primary me-3"></div>
                        <div class="text-gray-400">Active</div>
                        <div class="ms-auto fw-bolder text-gray-700" id="counttodolist"></div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-success me-3"></div>
                        <div class="text-gray-400">Completed</div>
                        <div class="ms-auto fw-bolder text-gray-700" id="countdone"></div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-danger me-3"></div>
                        <div class="text-gray-400">Overdue</div>
                        <div class="ms-auto fw-bolder text-gray-700" id="countoverdue"></div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center">
                        <div class="bullet bg-gray-300 me-3"></div>
                        <div class="text-gray-400">Yet to start</div>
                        <div class="ms-auto fw-bolder text-gray-700" id="countwaiting"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                <div class="d-flex flex-stack flex-grow-1">
                    <div class="fw-bold">
                        <div class="fs-6 text-gray-700">
                        <a href="#" class="fw-bolder me-1">Invite New .NET Collaborators</a>to create great outstanding business to business .jsp modutr class scripts</div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="col-lg-6"></div>

<div class="col-lg-6">
    <div class="card card-flush h-lg-100">
        <div class="card-header">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Todo</h3>
            </div>
            <div class="card-toolbar">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab"></div>
                <div id="kt_activity_week" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_week_tab"></div>
                <div id="kt_activity_month" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_month_tab"></div>
                <div id="kt_activity_year" class="card-body p-0 tab-pane" role="tabpanel" aria-labelledby="kt_activity_year_tab"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card card-flush h-lg-100">
        <div class="card-header">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Performance Staff</h3>
            </div>
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
                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Report</div>
                    </div>
                    <div class="menu-item px-3">
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal-todolist" class="menu-link px-3">Download Excel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-row-dashed align-middle fs-6 gy-2">
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