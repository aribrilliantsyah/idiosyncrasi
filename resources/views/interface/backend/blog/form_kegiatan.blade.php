<div class="modal fade" id="modal_agenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<form class="m-form" id="agenda" role="form">
					<input type="hidden" name="id" id="id">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">
								Nama Kegiatan
							</label>
							<input type="text" name="kegiatan" class="form-control m-input m-input--circle textbox" id="kegiatan">
							<span class="text-danger" id="error-kegiatan"></span>
						</div>
						<div class="form-group m-form__group">
							<label for="">
								Tanggal Kegiatan
							</label>
							<input type="date" name="tgl_kegiatan" class="form-control m-input m-input--circle textbox" id="tgl_kegiatan">
							<span class="text-danger" id="error-tgl_kegiatan"></span>
						</div>
						<div class="form-group m-form__group">
							<label for="">
								Keterangan
							</label>
							<textarea name="keterangan" class="form-control m-input m-input--circle textbox" style="height: 100px" id="keterangan"></textarea>
							<span class="text-danger" id="error-keterangan"></span>
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