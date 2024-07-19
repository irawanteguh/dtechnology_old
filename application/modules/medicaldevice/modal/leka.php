<div class="modal fade" id="modal_leka_edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <form action="<?php echo base_url();?>index.php/hrd/activity/addactivity" id="formaddactivity">
                <input type="hidden" id="data_leka_transid_edit" name="data_leka_transid_edit">
                <div class="modal-body">
                    <div class="text-center mb-5">
                        <h1 class="mb-3">Input Encounter</h1>
                        <div class="text-muted fw-bold fs-5">Silakan Masukan Encounter Id SATUSEHAT</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">Name Patient</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_name_edit" name="data_leka_name_edit" readonly>
                        </div>
                        <div class="col-md-2 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">Gender</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_gender_edit" name="data_leka_gender_edit" readonly>
                        </div>
                        <div class="col-md-4 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">BOD</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_bod_edit" name="data_leka_bod_edit" readonly>
                        </div>
                        <div class="col-md-8 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">Address</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_address_edit" name="data_leka_address_edit" readonly>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">Examination Number</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_examination_edit" name="data_leka_examination_edit" readonly>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">Encounter ID</label>
                            <input type="text" class="form-control form-control-solid" id="data_leka_encounter_edit" name="data_leka_encounter_edit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-1">				
                    <input class="btn btn-light-primary" id="btn_activity_add" type="submit" value="SIMPAN DATA" name="simpan" >
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_leka_result" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center mb-5">
                    <h1 class="mb-3">Result Examination</h1>
                    <div class="text-muted fw-bold fs-5">Result Examination Leka</div>
                </div>
                <div class="row">
                    <div class="table-responsive mh-550px scroll-y me-n5 pe-5">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="ps-4 rounded-start">Examination</th>
                                    <th>Unit measure</th>
                                    <th>Result</th>
                                    <th>Normal Result</th>
                                    <th class="pe-4 text-end rounded-end">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>asda</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <img src="" alt="ECG 12 Image" id="ecg12_image">
                </div>
            </div>
            <div class="modal-footer p-1">				
                <input class="btn btn-light-success" id="btn_activity_add" type="submit" value="PRINT" name="simpan" >
                <input class="btn btn-light-primary" id="btn_activity_add" type="submit" value="DOWNLOAD PDF" name="simpan" >
            </div>
        </div>
    </div>
</div>