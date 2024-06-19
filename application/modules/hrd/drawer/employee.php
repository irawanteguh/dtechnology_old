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
		<form action="<?php echo base_url();?>index.php/hrd/employee/insertpenempatan" id="forminsertpenempatan">
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
								<span>1 staff hanya memilik 1 tugas pokok / utama <b>primary</b>, tetapi untuk tugas tambahan <b>secondary</b> bisa lebih dari 1</span>
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
						<div class="col-md-12 mb-5">
							<label class="required fs-6 fw-bold mb-2">Start Date</label>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Please Select a Joining Start Date"></i>
							<div class="position-relative d-flex align-items-center">
								<span class="svg-icon svg-icon-2 position-absolute mx-4">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
										<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
										<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
									</svg>
								</span>
								<input class="form-control form-control-solid ps-12" placeholder="Select a date" name="data_position_tanggal_registration" id="data_position_tanggal_registration" value="<?php $d=strtotime("now"); echo date('d.m.Y', $d);?>" required/>
							</div> 
						</div>
						<input class="btn btn-light-primary" id="btn_position_registrasi" type="submit" value="SIMPAN" name="simpan" >
					</div>
				</div>
			</div>
		</form> 
	</div>
</div>