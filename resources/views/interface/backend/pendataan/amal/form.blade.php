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
        <form class="form-horizontal" id="amal">
          {{ csrf_field() }} {{ method_field('POST') }}
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" id="nama" class="form-control textbox">
              <span class="text-danger" ></span>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jk" id="jk" class="select2 form-control textbox">
                <option value="">-</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <span class="text-danger" ></span>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control textbox" id="alamat" name="alamat"></textarea>
              <span class="text-danger" ></span>
            </div>
            <div class="form-group">
              <label>Jenis</label>
              <select name="jenis" id="jenis" class="select2 form-control textbox">
                <option value="">-</option>
                <option value="Infaq">Infaq</option>
                <option value="Sodaqoh">Sodaqoh</option>
              </select>
              <span class="text-danger" ></span>
            </div>
            <div class="form-group" id="f_nominal">
              <label>Nominal</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" name="nominal" class="form-control textbox rupiah" id="nominal">
              </div>         
              <span class="text-danger" ></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-accent m-btn m-btn--air btn-sm"><i class="fa fa-save"></i> Save</button>
            <button type="reset" class="btn btn-secondary m-btn m-btn--air btn-sm"  id="reset"><i class="fa fa-refresh"></i> Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>