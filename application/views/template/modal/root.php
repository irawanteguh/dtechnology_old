
<div class="modal fade" id="modal-logout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <h1 class="mb-3">Confirmation</h1>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-muted fw-bold fs-5">Hey <b><?php echo $_SESSION['name']?></b>, Anda Yakin Ingin Keluar Dari Sistem ?</div>
            </div>
            <div class="modal-footer p-1">				
                <a href="<?php echo base_url();?>index.php/auth/sign/logoutsystem">
                    <button type="button" class="btn btn-light-danger">LOGOUT</button>
                </a>
            </div>
        </div>
    </div>
</div>