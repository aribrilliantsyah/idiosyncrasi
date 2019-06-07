<div class="modal fade" id="modal_slide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
									
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="m-form" id="slide" role="form">
					{{ csrf_field() }}
					<input type="hidden" name="id" id="slide_unique">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">
								Slide
							</label>
								<div class="input-group image-preview">
					                <input type="file" class="form-control" accept="image/png, image/jpeg, image/gif, image/svg, image/bmp, image/jpg" name="image" id="pic"> 
					            </div>
						</div>
						<div class="form-group m-form__group">
							<label for="">
								Keterangan
							</label>
							<textarea name="ket_slide" class="form-control m-input m-input--circle textbox" style="height: 100px" id="ketslide"></textarea>
							<span class="text-danger" id="error-ket_slide"></span>
						</div>
					</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-accent m-btn m-btn--air btn-sm">
						<i class="fa fa-save"></i>  Simpan
					</button>
					<button type="reset" id="reset" class="btn btn-secondary m-btn m-btn--air btn-sm">
						<i class="fa fa-refresh"></i>  Reset
					</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>