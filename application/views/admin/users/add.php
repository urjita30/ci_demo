<div class="row">
	<div class="col-md-12">

		<!-- Basic layout-->
		<?php $this->load->view('alert-view'); ?>
		<form action="<?php echo base_url().'admin/users/add' ?>" class="form-horizontal" id="create_user_form" method="post">
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
							<input type="text" class="form-control" placeholder="First Name" name="txt_fname" id="txt_fname" value="<?php echo set_value('txt_fname'); ?>" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_fname') . '</label>'; ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Last Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" placeholder="Last Name" name="txt_lname" id="txt_lname" value="<?php echo set_value('txt_lname'); ?>" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_lname">' . form_error('txt_lname') . '</label>'; ?>
						</div>						
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Email:</label>
						<div class="col-lg-9">
							<input type="email" class="form-control" placeholder="Email ID" name="txt_email" id="txt_email" value="<?php echo set_value('txt_email'); ?>" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_email">' . form_error('txt_email') . '</label>'; ?>
						</div>					
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Username:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" placeholder="Username" name="txt_username" id="txt_username" value="<?php echo set_value('txt_username'); ?>" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_username">' . form_error('txt_username') . '</label>'; ?>
						</div>						
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Password:</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" placeholder="Your strong password" name="txt_password" id="txt_password" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_password">' . form_error('txt_password') . '</label>'; ?>
						</div>						
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Confirm Password:</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" placeholder="Your strong password" name="txt_conf_password" id="txt_conf_password" required>
							<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_conf_password">' . form_error('txt_conf_password') . '</label>'; ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Gender:</label>
						<div class="col-lg-9">
							<label class="radio-inline">
								<input type="radio" class="styled" name="radio_gender" checked="checked" <?php echo set_radio('radio_gender', '0', TRUE); ?>>
								Male
							</label>

							<label class="radio-inline">
								<input type="radio" class="styled" name="radio_gender" <?php echo set_radio('radio_gender', '1', TRUE); ?>>
								Female
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Role:</label>
						<div class="col-lg-9">
							<select class="select" name="select_role">
							<?php foreach($role as $user_role) { ?>
								<option value="<?php echo $user_role['id']; ?>"><?php echo $user_role['name']; ?></option>
							<?php } ?>
							</select>
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</div>
		</form>
		<!-- /basic layout -->

		<!-- Form Validation -->
		<script>
			$(document).ready(function(){
				$("#create_user_form").validate({
			        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
			        errorClass: 'validation-error-label',
			        successClass: 'validation-valid-label',
			        highlight: function(element, errorClass) {
			            $(element).removeClass(errorClass);
			        },
			        unhighlight: function(element, errorClass) {
			            $(element).removeClass(errorClass);
			        },

			        // Different components require proper error label placement
			        errorPlacement: function(error, element) {

			            // Styled checkboxes, radios, bootstrap switch
			            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
			                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
			                    error.appendTo( element.parent().parent().parent().parent() );
			                }
			                 else {
			                    error.appendTo( element.parent().parent().parent().parent().parent() );
			                }
			            }

			            // Unstyled checkboxes, radios
			            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
			                error.appendTo( element.parent().parent().parent() );
			            }

			            // Input with icons and Select2
			            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
			                error.appendTo( element.parent() );
			            }

			            // Inline checkboxes, radios
			            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
			                error.appendTo( element.parent().parent() );
			            }

			            // Input group, styled file input
			            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
			                error.appendTo( element.parent().parent() );
			            }

			            else {
			                error.insertAfter(element);
			            }
			        },
			        validClass: "validation-valid-label",
			        success: function(label) {
			            label.addClass("validation-valid-label").text("Successfully")
			        },
			        rules: {
						txt_fname: "required",
						txt_lname: "required",
						txt_username: {
							required: true,
							minlength: 2
						},
						txt_password: {
							required: true,
							minlength: 5
						},
						txt_conf_password: {
							required: true,
							minlength: 5,
							equalTo: "#txt_password"
						},
						txt_email: {
							required: true,
							email: true
						},
						radio_gender: {
							required: true
						}
					},
					messages: {
						txt_fname: "Please enter your firstname",
						txt_lname: "Please enter your lastname",
						txt_username: {
							required: "Please enter a username",
							minlength: "Your username must consist of at least 2 characters"
						},
						txt_password: {
							required: "Please provide a password",
							minlength: "Your password must be 5 character long"
						},
						txt_conf_password: {
							required: "Please provide a Confirm password",
							minlength: "Your password must be 5 character long",
							equalTo: "Please enter the same password as above"
						},
						txt_email: "Please enter valid email address",
						radio_gender: "Please select your gender"
					}
			    });
			});
		</script>
		<!-- End Form Validation -->
	</div>
</div>