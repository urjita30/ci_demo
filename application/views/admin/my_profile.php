<?php //pr($resp); 
if(!empty($error)) echo  $error; ?>
<?php 
	$expload_name = explode(' ', $resp['name']);
	$fname = $expload_name[0];
	$lname = $expload_name[1];
?>
<?php $this->load->view('alert-view'); ?>
<form action="<?php echo base_url().'admin/my_profile' ?>" class="form-horizontal" id="my_profile_form" method="post" enctype="multipart/form-data">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"><?php echo $title; ?></h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<div class="form-group">
				<label class="col-lg-3 control-label">First Name:</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" id="txt_fname" name="txt_fname" placeholder="First Name" value="<?php echo $fname; ?>">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_fname') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Last Name:</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" id="txt_lname" name="txt_lname" placeholder="Last Name" value="<?php echo $lname; ?>">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_lname') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Username :</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="Username" value="<?php echo $resp['username']; ?>">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_username') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Email:</label>
				<div class="col-lg-9">
					<input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Email" value="<?php echo $resp['email']; ?>">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_email') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Password:</label>
				<div class="col-lg-9">
					<input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Your strong password">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_password') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Confirm Password:</label>
				<div class="col-lg-9">
					<input type="password" class="form-control" id="txt_conf_password" name="txt_conf_password" placeholder="Your strong password">
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="txt_fname">' . form_error('txt_conf_password') . '</label>'; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Role :</label>
				<div class="col-lg-9">
					<?php echo $resp['role']; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Gender:</label>
				<div class="col-lg-9">
					<label class="radio-inline">
						<?php //echo 'Gen: '.$resp['gender']; ?>
						<input type="radio" class="styled" name="radio_gender" <?php echo ($resp['gender'] == 'male') ? 'checked' : '' ?>>
						Male
					</label>

					<label class="radio-inline">
						<input type="radio" class="styled" name="radio_gender" <?php echo($resp['gender'] == 'female') ? 'checked' : ''; ?>>
						Female
					</label>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label">Your avatar:</label>
				<div class="col-lg-9">
					<input type="file" class="file-styled" id="file_avatar" name="file_avatar">
					<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
					<?php echo '<label id="txt_name_error2" class="validation-error-label" for="file_avatar">' . form_error('file_avatar') . '</label>'; ?>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</div>
	</div>
</form>

<!-- Form Validation -->
<script>
	$(document).ready(function(){
		$("#my_profile_form").validate({
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
				},
				file_avatar: {
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
				file_avatar: "Please Upload Your Avatar"
			}
	    });
	});
</script>
<!-- End Form Validation -->