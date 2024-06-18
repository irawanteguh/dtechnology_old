<div id="drawer_employee_position_registration" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="drawer_employee_position_registration" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#drawer_employee_position_registration_toggle" data-kt-drawer-close="#drawer_employee_position_registration_close">
	<div class="card shadow-none rounded-0 w-100">
		<div class="card-header" id="drawer_employee_position_registration_header">
			<h3 class="card-title fw-bolder text-gray-700">Positioning Employee</h3>
			<div class="card-toolbar">
				<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="drawer_employee_position_registration_close">
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
						</svg>
					</span>
				</button>
			</div>
		</div>
		<div class="card-body" id="drawer_employee_position_registration_body">
			<div id="drawer_employee_position_registration_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#drawer_employee_position_registration_body" data-kt-scroll-dependencies="#drawer_employee_position_registration_header" data-kt-scroll-offset="5px">
				<div class="mb-0">
					<div class="alert alert-dismissible bg-light-info border border-info border-3 border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10 fa-fade">
						<span class="svg-icon svg-icon-2hx svg-icon-info me-4 mb-5 mb-sm-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
								<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
							</svg>
						</span>
						<div class="d-flex flex-column pe-0 pe-sm-10">
							<h5 class="mb-1">For Your Information</h5>
							<span>1 staff hanya memilik 1 tugas pokok / utama (primary), tetapi untuk tugas tambahan (secondary) bisa lebih dari 1</span>
						</div>
					</div>

					<input type="hidden" id="data_position_userid_registration" name="data_position_userid_registration">
					<div class="col-md-12 mb-5">
						<label class="d-flex align-items-center fs-5 fw-bold mb-2">
							<span class="required">Staff Name</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nama staff yang dipilih"></i>
						</label>
						<input type="text" class="form-control form-control-solid" id="data_position_name_registration" name="data_position_name_registration" readonly>
					</div>
					<div class="col-md-12 mb-5">
						<label class="d-flex align-items-center fs-5 fw-bold mb-2">
							<span class="required">Position</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Posisi atau jabatan untuk karyawan tersebut"></i>
						</label>
						<select data-control="select2" data-dropdown-parent="#drawer_employee_position_registration" data-placeholder="Please Select Position" class="form-select form-select-solid" name="data_position_posisitionid_registration" id="data_position_posisitionid_registration" required>
							<?php echo $position;?>
						</select>
					</div>
					<div class="col-md-12 mb-5">
						<label class="d-flex align-items-center fs-5 fw-bold mb-2">
							<span class="required">Responsible To</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Atasan langsung / validator kinerja"></i>
						</label>
						<select data-control="select2" data-dropdown-parent="#drawer_employee_position_registration" data-placeholder="Please Select the Name of the Person in Charge" class="form-select form-select-solid" name="data_position_atasanid_registration" id="data_position_atasanid_registration" required>
							<?php echo $namaatasan;?>
						</select>
					</div>
					<div class="col-md-12 mb-5">
						<label class="d-flex align-items-center fs-5 fw-bold mb-2">
							<span class="required">Type</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jenis Pekerjaan, Tugas Utama / Tugas Tambahan"></i>
						</label>
						<select data-control="select2" data-dropdown-parent="#drawer_employee_position_registration" data-placeholder="Please Placement Type." class="form-select form-select-solid" name="data_position_type_registration" id="data_position_type_registration" required>
							<?php echo $type;?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>