<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Demo Site</title>

	<!-- Global stylesheets -->
	<base href="<?php echo base_url(); ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

	<style>
		.radio input[type="radio"], .radio-inline input[type="radio"] {margin-left: -15px;}
	</style>
</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Registration form -->
					<form action="admin/register" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<?php if($this->session->flashdata('success')) : ?>
										<div class="content-group-lg">
											<div class="alert alert-success alert-styled-left">
												<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
												<?php echo $this->session->flashdata('success'); ?>
										    </div>
									    </div>
										<?php endif; ?>
										<?php if($this->session->flashdata('error')) : ?>
										<div class="content-group-lg">
											<div class="alert alert-danger alert-styled-left">
												<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
												<?php echo $this->session->flashdata('error'); ?>
										    </div>
									    </div>
										<?php endif; ?>
										<div class="text-center">
											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
											<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
										</div>

										<div class="form-group has-feedback">
											<input type="text" class="form-control" name="txt_username" value="<?php echo set_value('txt_username'); ?>" placeholder="Username" required>
											<div class="form-control-feedback">
												<i class="icon-user-plus text-muted"></i>
											</div>
											<?php if(form_error('txt_username')) : ?>
												<span class="cust_form_error"><?php echo form_error('txt_username'); ?></span>
											<?php endif; ?>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="txt_fname" value="<?php echo set_value('txt_fname'); ?>" placeholder="First name" required>
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<?php if(form_error('txt_fname')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_fname'); ?></span>
													<?php endif; ?>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="txt_lname" value="<?php echo set_value('txt_lname'); ?>" placeholder="Second name" required>
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<?php if(form_error('txt_lname')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_lname'); ?></span>
													<?php endif; ?>
												</div>												
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" name="txt_password" placeholder="Create password" required>
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<?php if(form_error('txt_password')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_password'); ?></span>
													<?php endif; ?>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" name="txt_conf_password" placeholder="Repeat password" required>
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<?php if(form_error('txt_conf_password')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_conf_password'); ?></span>
													<?php endif; ?>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" name="txt_email" value="<?php echo set_value('txt_email'); ?>" placeholder="Your email" required>
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<?php if(form_error('txt_email')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_email'); ?></span>
													<?php endif; ?>
												</div>												
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" name="txt_conf_email" value="<?php echo set_value('txt_conf_email'); ?>" placeholder="Repeat email" required>
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<?php if(form_error('txt_conf_email')) : ?>
														<span class="cust_form_error"><?php echo form_error('txt_conf_email'); ?></span>
													<?php endif; ?>
												</div>												
											</div>
										</div>

										<div class="row">
											<div class="form-group has-feedback">
												<label class="radio-inline">
													<input type="radio" name="radio_gender" class="styled" value="0" checked="checked" <?php echo set_radio('radio_gender', '0', TRUE); ?>>Male
												</label>

												<label class="radio-inline">
													<input type="radio" name="radio_gender" class="styled" value="1" <?php echo set_radio('radio_gender', '1', TRUE); ?>>Female
												</label>
											</div>
										</div>

										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" checked="checked">
													Send me <a href="#">test account settings</a>
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" checked="checked">
													Subscribe to monthly newsletter
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled">
													Accept <a href="#">terms of service</a>
												</label>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button>
											<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>