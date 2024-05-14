<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Data Penempatan Karyawan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Over 300 Position</span>
        </h3>
        <div class="card-toolbar">
			<!--begin::Menu-->
			<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
				<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
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
				<!--end::Svg Icon-->
			</button>
			<!--begin::Menu 3-->
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
				<!--begin::Heading-->
				<div class="menu-item px-3">
					<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
				</div>
				<!--end::Heading-->
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">Create Invoice</a>
				</div>
				<!--end::Menu item-->
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="#" class="menu-link flex-stack px-3">Create Payment
					<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target name for future usage and reference" aria-label="Specify a target name for future usage and reference"></i></a>
				</div>
				<!--end::Menu item-->
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">Generate Bill</a>
				</div>
				<!--end::Menu item-->
				<!--begin::Menu item-->
				<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
					<a href="#" class="menu-link px-3">
						<span class="menu-title">Subscription</span>
						<span class="menu-arrow"></span>
					</a>
					<!--begin::Menu sub-->
					<div class="menu-sub menu-sub-dropdown w-175px py-4">
						<!--begin::Menu item-->
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Plans</a>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu item-->
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Billing</a>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu item-->
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Statements</a>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu separator-->
						<div class="separator my-2"></div>
						<!--end::Menu separator-->
						<!--begin::Menu item-->
						<div class="menu-item px-3">
							<div class="menu-content px-3">
								<!--begin::Switch-->
								<label class="form-check form-switch form-check-custom form-check-solid">
									<!--begin::Input-->
									<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
									<!--end::Input-->
									<!--end::Label-->
									<span class="form-check-label text-muted fs-6">Recuring</span>
									<!--end::Label-->
								</label>
								<!--end::Switch-->
							</div>
						</div>
						<!--end::Menu item-->
					</div>
					<!--end::Menu sub-->
				</div>
				<!--end::Menu item-->
				<!--begin::Menu item-->
				<div class="menu-item px-3 my-1">
					<a href="#" class="menu-link px-3">Settings</a>
				</div>
				<!--end::Menu item-->
			</div>
			<!--end::Menu 3-->
			<!--end::Menu-->
		</div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-2" id="tablemasterkaryawan">
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 rounded-start">Position</th>
                        <th></th>
                        <th>Member</th>
                        <th class="pe-4 text-end rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold" id="resultmasterposition"></tbody>
            </table>
        </div>
    </div>
</div>

