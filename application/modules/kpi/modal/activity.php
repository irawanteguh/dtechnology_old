<div class="modal fade" id="modal-addactivity" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <form action="<?php echo base_url();?>index.php/tilaka/registrasi/edituser" id="formedituser">
                <input type="hidden" id="userid-edit" name="userid-edit">
                <div class="modal-body">
                    <div class="mb-5 text-center">
                        <h1 class="mb-3">Create Your Activity</h1>
                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                        <a href="../support/faq" class="fw-bolder link-primary">User Guidelines</a>.</div>
                    </div>
                    <div class="text-start mb-2">
                        <div class="alert alert-dismissible bg-light-warning border border-warning border-3 border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10 fa-fade">
                            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4 mb-5 mb-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                                    <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
                                </svg>
                            </span>
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h5 class="mb-1">For Your Information</h5>
                                <ul>
                                    <strong class="text-danger">Cara Pengisian / Pembuatan Kegiatan E-Kinerja</strong>
                                    <li>Silakan Masukan Jam Mulai dan Jam Selesai Kegiatan Anda</li>
                                    <li>Silakan Pilih Kegiatan Utama Anda</li>
                                    <li>
                                        Silakan Pilih Volume Kegiatan Anda<br>
                                        <strong class="font-italic text-danger small">Jika Pilihan Volume Tidak Muncul Silakan Periksa Kembali Jam Mulai, Jam Selesai dan Pilihan Kegiatan Utama</strong>
                                    </li>
                                    <li>Silakan Tuliskan Secara Rinci Kegiatan Anda</li>
                                    <li>Silakan Klik Tombol Simpan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-9">
                            <div class="fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Activity Date</label>
                                <input class="form-control form-control-solid flatpickr-input" name="calendar_event_start_date" placeholder="Pick a start date" id="calendar_event_start_date" type="text" readonly="readonly">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        </div>
                        <div class="col-md-4 mb-9" data-kt-calendar="datepicker">
                            <div class="fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Activity Start Time</label>
                                <input class="form-control form-control-solid flatpickr-input" name="calendar_event_start_time" placeholder="Pick a start time" id="calendar_event_start_time" type="text" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-4 mb-9" data-kt-calendar="datepicker">
                            <div class="fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Activity End Time</label>
                                <input class="form-control form-control-solid flatpickr-input" name="calendar_event_end_time" placeholder="Pick a End time" id="calendar_event_end_time" type="text" readonly="readonly">
                            </div>
                        </div>
                        <div class="fv-row mb-9">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Primary Activity</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silakan Pilih Primary Activity"></i>
                            </label>
                            <select data-control="select2" data-dropdown-parent="#modal-addactivity" data-placeholder="Select a Primary Activity..." class="form-select form-select-solid" name="primaryactivity-add" id="primaryactivity-add">
                                <?php echo $activity;?>
                            </select>
                        </div>
                        <div class="fv-row">
                            <label class="fs-6 fw-bold mb-2">Activity Description</label>
                            <textarea class="form-control form-control-solid" name="" id="" placeholder="Silakan masukan kegiatan anda secara detail" rows="5"></textarea>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer p-1">	
                    <input class="btn btn-light-primary" id="btnproses" type="submit" value="SIMPAN DATA" name="simpan" >			
                </div>  
            </form>  
        </div>
    </div>
</div>