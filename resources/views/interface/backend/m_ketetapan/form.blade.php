<div class="modal fade" id="modal-form" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog animated bounceInDown" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="f_ketetapan">
        {{ csrf_field() }} {{ method_field('POST') }}
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label>Jenis</label>
            <input type="text" name="jenis" id="jenis" class="form-control textbox" readonly="">
            <span class="text-danger" ></span>
          </div>
          <div class="form-group">
            <label>Ketetapan</label>
            <input type="float" name="ketetapan" id="ketetapan" class="form-control textbox">
            <span class="text-danger" ></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-accent m-btn m-btn--air btn-sm"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>