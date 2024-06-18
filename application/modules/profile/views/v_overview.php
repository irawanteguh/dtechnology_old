<!-- <div class="col-lg-6">
    <div class="card card-flush h-lg-100">
        <div class="card-header pt-6">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Your Performance</h3>
                <div class="fs-6 fw-bold text-gray-400">24 Activity Active</div>
            </div>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body p-9 pt-5">
            <div class="d-flex flex-wrap">
                <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                    <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                        <span class="fs-2qx fw-bolder">237</span>
                        <span class="fs-6 fw-bold text-gray-400">Activity</span>
                    </div>
                    <canvas id="project_overview_chart" width="262" height="262" style="display: block; box-sizing: border-box; height: 174.667px; width: 174.667px;"></canvas>
                </div>
                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-primary me-3"></div>
                        <div class="text-gray-400">Active</div>
                        <div class="ms-auto fw-bolder text-gray-700">30</div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-success me-3"></div>
                        <div class="text-gray-400">Approve</div>
                        <div class="ms-auto fw-bolder text-gray-700">45</div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-danger me-3"></div>
                        <div class="text-gray-400">Pending</div>
                        <div class="ms-auto fw-bolder text-gray-700">0</div>
                    </div>
                    <div class="d-flex fs-6 fw-bold align-items-center">
                        <div class="bullet bg-gray-300 me-3"></div>
                        <div class="text-gray-400">Denied</div>
                        <div class="ms-auto fw-bolder text-gray-700">25</div>
                    </div>
                </div>
            </div>
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                <div class="d-flex flex-stack flex-grow-1">
                    <div class="fw-bold">
                        <div class="fs-6 text-gray-700">
                            <a href="#" class="fw-bolder me-1">Invite New .NET Collaborators</a>to create great outstanding business to business .jsp modutr class scripts
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="col-lg-12">

    <div class="card card-flush h-lg-100">
        <!--  <div class="card-header">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Personal Information</h3>
            </div>
        </div> -->

        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#emergency_contact">Emergency Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Address</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Office Information</a>
                    </li> -->
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    <form id="formoverview" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row mb-5">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Photo Profile</div>
                            </div>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url() ?>assets/images/avatars/blank.png)">
                                    <?php
                                    if ($_SESSION['imgprofile'] === "Y") {
                                        $imageUrl = base_url() . "assets/images/avatars/" . $_SESSION['userid'] . ".jpeg";
                                    } else {
                                        $imageUrl = base_url() . "assets/images/avatars/blank.png";
                                    }
                                    echo "<div class='image-input-wrapper w-125px h-125px bgi-position-center' style='image-input-wrapper w-125px h-125px bgi-position-center; background-image: url(" . $imageUrl . ")'></div>";
                                    ?>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Identity Number</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="number" class="form-control form-control-solid" id="identity_no" name="identity_no">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Name</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid" id="name" name="name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Name Identity</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid" name="name_identity">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Place of Birth</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid" name="pob">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Date of Birth</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid kt_inputmask_1" name="dob" onchange="calculateAge()">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Ages</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid" readonly name="ages" readonly>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Gender</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="L" name="gender" id="gender1" />
                                        <label class="form-check-label" for="gender1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="P" name="gender" id="gender2" />
                                        <label class="form-check-label" for="gender2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Marital Status</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" id="marital_status" name="marital_status">
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Religion</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" id="religion" name="religion">
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Blood Type</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" id="blood_type" name="blood_type">
                                    <option></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Rhesus</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container d-flex">
                                <div class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input" type="radio" name="rhesus" value="+" id="rhesus1" />
                                    <label class="form-check-label" for="rhesus1">
                                        <i class="fa-solid fa-plus"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input" type="radio" name="rhesus" value="-" id="rhesus2" />
                                    <label class="form-check-label" for="rhesus2">
                                        <i class="fa-solid fa-minus"></i>
                                    </label>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Ethnic</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" id="ethnic" name="ethnic">
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Clothes Size</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" id="clothes_size" name="clothes_size">
                                    <option></option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="2XL">2XL</option>
                                    <option value="3XL">3XL</option>
                                    <option value="4XL">4XL</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Phone Number</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="number" class="form-control form-control-solid" name="phone">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-xl-2">
                                <div class="fs-6 fw-bold mt-2 mb-3">Email</div>
                            </div>
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="email" class="form-control form-control-solid" name="email">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="separator mb-6"></div>
                        <div>
                            <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                            <button type="submit" id="kt_overview_submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="emergency_contact" role="tabpanel">
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary" onclick="newcontact()"><i class="fa-solid fa-plus"></i> Add Contact</button>
                    </div>
                    <div class="row g-3" id="listcontact"></div>
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary" onclick="newaddress()"><i class="fa-solid fa-plus"></i> Add Address</button>
                    </div>
                    <div class="row g-3" id="listaddress">
                        <!--  <div class="col-lg-6">
                                <div class="card card-dashed border-danger border-3 h-xl-100 flex-row flex-stack flex-wrap p-4">
                                    <div class="d-flex flex-column py-2">
                                        <div class="d-flex align-items-center fs-5 fw-bolder mb-5">Address 1
                                            <span class="badge badge-light-success fs-7 ms-2">Primary</span>
                                        </div>
                                        <div class="fs-6 fw-bold text-gray-600">Ap #285-7193 Ullamcorper Avenue
                                            <br>Amesbury HI 93373
                                            <br>US
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center py-2">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-3">Delete</button>
                                        <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_contact">Edit</button>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>