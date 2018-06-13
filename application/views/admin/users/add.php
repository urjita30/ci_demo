<div class="row">
	<div class="col-md-12">

		<!-- Basic layout-->
		<form action="#" class="form-horizontal">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"><?php echo $title; ?></h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<!-- <li><a data-action="close"></a></li> -->
	                	</ul>
                	</div>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-3 control-label">First Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" placeholder="First Name" name="txt_fname" id="txt_fname">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Last Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" placeholder="Last Name" name="txt_lname" id="txt_lname">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Email:</label>
						<div class="col-lg-9">
							<input type="email" class="form-control" placeholder="Email ID" name="txt_email" id="txt_email">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Username:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" placeholder="Username" name="txt_username" id="txt_username">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Password:</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" placeholder="Your strong password" name="txt_password" id="txt_password">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Confirm Password:</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" placeholder="Your strong password" name="txt_confpassword" id="txt_confpassword">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Gender:</label>
						<div class="col-lg-9">
							<label class="radio-inline">
								<input type="radio" class="styled" name="gender" checked="checked">
								Male
							</label>

							<label class="radio-inline">
								<input type="radio" class="styled" name="gender">
								Female
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Avatar:</label>
						<div class="col-lg-9">
							<div class="uploader">
								<input type="file" class="file-styled">
								<span class="filename" style="user-select: none;">No file selected</span>
								<span class="action btn bg-blue-400" style="user-select: none;">Choose File</span>
							</div>
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</div>
		</form>
		<!-- /basic layout -->

	</div>
</div>