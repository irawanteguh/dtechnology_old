<div class="toolbar" id="kt_toolbar">
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<!-- <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted">
					<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
				</li>
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<li class="breadcrumb-item text-dark">Light Aside</li>
			</ul> -->
		</div>

		<!-- <div class="d-flex align-items-center overflow-auto">
			<div class="position-relative my-1">
				<span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ps-10">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
						<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
					</svg>
				</span>
				<input type="text" class="form-control form-control-sm form-control-solid w-500px ps-10" name="Search Team" value="" placeholder="Please enter what you want to search for">
			</div>
		</div> -->

		<div class="d-flex align-items-center py-1">
			<div class="me-4">
				<?php
					$file = APPPATH.'modules/'.$this->uri->segment(1).'/filter/'.$this->uri->segment(2).".php";
					if(file_exists($file)){
						include_once($file);
					}
				?>
			</div>

			<?php
				$file = APPPATH.'modules/'.$this->uri->segment(1).'/toolbar/'.$this->uri->segment(2).".php";
				if(file_exists($file)){
					include_once($file);
				}
			?>
		</div>
	</div>
</div>
