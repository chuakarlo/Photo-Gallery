<div class="modal fade modal-dialog-center" id="uploadmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Upload Photo</h4>
			</div>
			<?php echo form_open_multipart('home/doUpload', array('id' => 'uploadphotoform')); ?>
				<div class="modal-body">
					<div class="alert alert-danger hidden" id="errmsg">
					</div>
					<div class="container-fluid">
						<div class="row form-group">
							<input type="file" id="photofile" name="photofile" class="form-control input-sm">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-primary btn-sm" onclick="Home.upload()" value="Upload">
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>js/home.js"></script>