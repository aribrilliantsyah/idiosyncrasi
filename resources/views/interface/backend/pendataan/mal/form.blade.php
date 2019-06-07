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
      <form class="form-horizontal" id="mal">
        {{ csrf_field() }} {{ method_field('POST') }}
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="bentuk" name="bentuk">
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
              <option value="Zakat Emas">Zakat Emas</option>
              <option value="Zakat Perak">Zakat Perak</option>
              <option value="Zakat Harta">Zakat Harta</option>
              <option value="Zakat Pertanian">Zakat Pertanian</option>
              <option value="Zakat Harta Temuan">Zakat Harta Temuan</option>
            </select>
            <span class="text-danger" ></span>
          </div>
          {{-- emas & perak --}}
          <div class="form-group" id="perhiasan" >
            <label id="l_perhiasan"></label>
            <div class="input-group">
                <input type="text" name="perhiasan" class="form-control number" id="f_perhiasan">
                <span class="input-group-addon">gr</span>
            </div>
          </div>

          <div class="form-group" id="berupa">
            <label>Berupa</label>
            <select name="berupa" id="p_berupa" class="select2 form-control">
              <option value="">-</option>
              <option value="benda" id="benda">Perhiasan (Emas/Perak)</option>
              <option value="uang">Uang</option>
            </select>
            <span class="text-danger" ></span>
          </div>
          {{-- end emas & perak --}}
          {{-- harta --}}
          <div class="form-group" id="nishab">
            <label>Nishab</label>
            <select name="nishab" id="f_nishab" class="select2 form-control">
              <option value="">-</option>
              <option value="emas">Emas</option>
              <option value="perak">Perak</option>
            </select>
            <span class="text-danger" ></span>
          </div>
          <div class="form-group" id="harta" >
            <label id="l_harta">Uang tunai & tabungan (Rp)</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" name="harta" class="form-control rupiah" id="f_harta">
            </div>
            <span class="text-danger"></span>
          </div>
          <div class="form-group" id="lain" >
            <label id="l_lain">Saham dan surat berharga lainnya (Rp)</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" name="lain" class="form-control rupiah" id="f_lain">
            </div>
            <span class="text-danger"></span>
          </div>
          <div class="form-group" id="piutang" >
            <label id="l_piutang">Piutang (Rp)</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" name="piutang" class="form-control rupiah" id="f_piutang">
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group" id="hutang" >
            <label id="l_hutang">Hutang (Rp)</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>     
              <input type="text" name="hutang" class="form-control rupiah" id="f_hutang">
            </div>
            <span class="text-danger"></span>
          </div>
          <div class="form-group" id="total" >
            <label id="l_total">Total Harta (Rp)</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" name="total" class="form-control rupiah" id="f_total">
            </div>      
            <span class="text-danger"></span>
          </div>
          {{-- end harta --}}
          {{-- start hasil panen --}}
           <div class="form-group" id="panen" >
            <label id="l_panen">Hasil Panen (Kg)</label>
            <div class="input-group">
              <input type="text" name="panen" class="form-control number" id="f_panen">
              <span class="input-group-addon">Kg</span>
            </div>
          </div>
          <div class="form-group" id="pengairan" >
            <label id="l_pengairan">Jenis Pengairan</label>
            <select name="pengairan" id="f_pengairan" class="select2 form-control">
              <option value="">-</option>
              <option value="biaya">Biaya</option>
              <option value="tanpa">Tanpa Biaya</option>
            </select>
          </div>
          {{-- end hasil panen --}}
          {{-- start hewan --}}
          <div class="form-group" id="hewan" >
            <label id="l_hewan">Hewan Ternak</label>
            <input type="number" name="hewan" class="form-control" id="f_hewan">
          </div>
          {{-- end hewan --}}
          {{-- start temuan --}}
          <div class="form-group" id="temuan" >
            <label id="l_temuan">Harta Temuan</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="text" name="total" class="form-control rupiah" id="f_temuan">
            </div>  
          </div>
          {{-- end temuan --}}
          <div class="form-group" id="confirm">
            <label>Wajib Zakat</label>
            <input type="float" name="confirm" class="form-control" id="f_confirm" disabled="">
            <span class="text-danger" ></span>
          </div>
          <div class="form-group" id="nominal">
            <label>Nominal</label>
            <div class="input-group">
              <input type="text" name="nominal" class="form-control textbox" id="f_nominal" disabled="">
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