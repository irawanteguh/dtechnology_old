<div class="modal fade" id="modal_validation_perilaku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <form action="<?php echo base_url();?>index.php/kpi/validation/insertassessment" id="forminsertassessment">
                <input type="hidden" id="modal_validation_perilaku_userid_add" name="modal_validation_perilaku_userid_add">
                <input type="hidden" id="modal_validation_perilaku_periodeid_add" name="modal_validation_perilaku_periodeid_add">
                <div class="modal-body">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Personal Assessment</h1>
                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                        <a href="" class="fw-bolder link-primary" data-bs-toggle="modal" data-bs-target="#modal_activity_userguides">User Guidelines</a>.</div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="accordion" id="personalassessment"></div>
                    </div>
                </div> 
                <div class="modal-footer p-1">	
                    <input class="btn btn-light-primary" id="btn_personalassessement_add" type="submit" value="SIMPAN DATA" name="simpan" >			
                </div>  
            </form>  
        </div>
    </div>
</div>