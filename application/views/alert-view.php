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