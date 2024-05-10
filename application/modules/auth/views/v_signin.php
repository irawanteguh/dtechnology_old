<form class="form w-100" action="<?php echo base_url();?>index.php/auth/sign/signin" novalidate="novalidate" id="kt_sign_in_form" method="post">
	<div class="text-center mb-10">
		<h1 class="text-dark mb-3">Single Sign On</h1>
	</div>
	<div class="fv-row mb-10">
		<label class="form-label fs-6 fw-bolder text-dark">Username</label>
		<input class="form-control form-control-lg form-control-solid" type="text" name="username" id="username" autocomplete="off" placeholder="Enter Your Username"/>
	</div>
	<div class="fv-row mb-10">
		<div class="d-flex flex-stack mb-2">
			<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
		</div>
		<input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" autocomplete="off" placeholder="Enter Your Password"/>
	</div>
	<div class="text-center">
		<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
			<span class="indicator-label">Continue</span>
			<span class="indicator-progress">Please wait...
			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
		</button>
	</div>
</form>