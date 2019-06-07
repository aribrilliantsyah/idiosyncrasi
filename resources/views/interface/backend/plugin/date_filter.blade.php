<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="text" class="form-control form-control-xs" placeholder="dd/mm/yyyy" id="min">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Tanggal Akhir</label>
				<input type="text" class="form-control form-control-xs" placeholder="dd/mm/yyyy" id="max">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>Export</label>
				<br>
				<button type="submit" class="btn btn-sm btn-success m-btn--air" onclick="event.preventDefault();$('#excel').submit();"><i class="fa fa-download"></i></button>
				<button type="submit" class="btn btn-sm btn-danger m-btn--air" onclick="event.preventDefault();$('#pdf').submit();"><i class="fa fa-download"></i></button>
			</div>
		</div>
	</div>
</div>