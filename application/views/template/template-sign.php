<!DOCTYPE html>
<html lang="en">
	<head>
		<?php          
			include_once(APPPATH."views/template/head.php");
		?>
	</head>
	<body id="kt_body" class="bg-body">        
        <div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="" class="mb-12">
						<img alt="Logo" src="<?php echo base_url();?>assets/images/logo/dtechnology.png" class="h-70px" />
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<?php echo $contents ?>
					</div>
				</div>
				<div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="#" class="text-muted text-hover-primary px-2">About</a>
						<a href="#" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
		<?php    
			include_once(APPPATH."views/template/script.php");
		?>
	</body>
</html>