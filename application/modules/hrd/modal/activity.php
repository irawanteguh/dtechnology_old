<div class="modal fade" id="modal_activity_hapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <form action="<?php echo base_url();?>index.php/hrd/activity/hapusactivity" id="formhapusactivity">
                <input type="hidden" id="data_activity_id_hapus" name="data_activity_id_hapus">
                <div class="modal-body">
                    <div class="text-center mb-5">
                        <h1 class="mb-3">Hapus Master Activity</h1>
                        <div class="text-muted fw-bold fs-5">Apakah anda yakin ingin menghapus aktivitas ini ?</div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">Activity Name</label>
                            <input type="text" class="form-control form-control-solid" id="data_activity_name_hapus" name="data_activity_name_hapus" readonly>
                        </div>
                        <div class="col-md-3 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">Durasi</label>
                            <input type="text" class="form-control form-control-solid" id="data_activity_durasi_hapus" name="data_activity_durasi_hapus" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-1">				
                    <input class="btn btn-light-danger" id="btn_modules_hapus" type="submit" value="HAPUS DATA" name="simpan" >
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_activity_active" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <form action="<?php echo base_url();?>index.php/hrd/activity/aktifactivity" id="formaktifaktifactivity">
                <input type="hidden" id="data_activity_id_aktif" name="data_activity_id_aktif">
                <div class="modal-body">
                    <div class="text-center mb-5">
                        <h1 class="mb-3">Aktivasi Master Activity</h1>
                        <div class="text-muted fw-bold fs-5">Apakah anda yakin ingin mengaktifkan aktivitas ini ?</div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">Activity Name</label>
                            <input type="text" class="form-control form-control-solid" id="data_activity_name_aktif" name="data_activity_name_aktif" readonly>
                        </div>
                        <div class="col-md-3 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">Durasi</label>
                            <input type="text" class="form-control form-control-solid" id="data_activity_durasi_aktif" name="data_activity_durasi_aktif" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-1">				
                    <input class="btn btn-light-success" id="btn_modules_aktif" type="submit" value="AKTIFKAN DATA" name="simpan" >
                </div>
            </form>
        </div>
    </div>
</div>