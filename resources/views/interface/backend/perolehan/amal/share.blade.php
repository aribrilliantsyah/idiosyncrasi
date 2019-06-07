@extends('layouts.admin')
@section('title')
PEMBAGIAN
@endsection
@section('bread')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home">
            <a href="{{ url('/welcome') }}" class="m-nav__link m-nav__link--icon">
                <i class="m-nav__link-icon la la-home"></i>
            </a>
        </li>
        <li class="m-nav__separator">
            -
        </li>
        <li class="m-nav__item">
            <a class="m-nav__link">
                <span class="m-nav__link-text">
                    Pembagian
                </span>
            </a>
        </li>
        <li class="m-nav__separator">
            -
        </li>
        <li class="m-nav__item">
            <a class="m-nav__link">
                <span class="m-nav__link-text">
                    Infaq Dan Sodaqoh
                </span>
            </a>
        </li>
    </ul>
@endsection
@push('plugin-styles')
<link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
  .table thead tr th{
    vertical-align: middle;
    text-align: center;
  }
  .table tbody tr td{
    vertical-align: middle;
    text-align: center;
  }

  #m-datatable th, #m-datatable td {
    font-size: 13px;
  }
  .table-hover td {
	cursor: pointer;
  }
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							PEMBAGIAN
								<small></small>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button class="btn btn-primary btn-sm m-btn--air" onclick="add_row('personal')"><i class="fa fa fa-plus"></i> Personal</button>
                    <button class="btn btn-primary btn-sm m-btn--air" onclick="add_row('lembaga')"><i class="fa fa fa-plus"></i> Lembaga</button>
				</div>
			</div>
			<div class="m-portlet__body">
				Daftar Mustahik :
				<form class="form" role="form" id="form">
					{{ csrf_field() }}
                    <input type="hidden" name="total" id="tot">
					<input type="hidden" name="id_count" value="{{ $mal->id }}">
					<table class="table table-bordered table-striped table-hover" id="personal">
						<thead>
							<tr>
								<th>Mustahik</th>
								<th>Jumlah(Orang)</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
								
							
						</tbody>
					</table>
                    <table class="table table-bordered table-striped table-hover" id="lembaga">
                        <thead>
                            <tr>
                                <th>Lembaga</th>
                                <th>Jumlah(Orang)</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                            
                        </tbody>
                    </table>
					<button type="submit" class="btn btn-success btn-sm m-btn--air" id="submit"><i class="fa fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
{{-- chage password --}}
<script type="text/javascript">

function add_row(table) {
        $('.text-danger').hide();  
        var total_row = $('#'+table+' tr').length;
        var row = "<tr id='"+table+"_"+total_row+"'>"+
                    "<td>"+
                        "<div class='form-group'>"+
	                        "<input type='text' class='form-control textbox' name='"+table+"[]'></textarea>"+
	                        "<span class='text-danger'></span>"+
	                    "</div>"+
                    "</td>"+
                    "<td>"+
                    	"<div class='form-group'>"+
	                        "<input type='text' class='form-control textbox jumlah' name='jumlah_"+table+"[]'></textarea>"+
	                        "<span class='text-danger'></span>"+
                        "</div>"+
                    "</td>"+
                    "<td>"+
                        "<center><button type='button' class='btn btn-danger btn-sm m-btn--air' onclick='remove_row(\""+table+"\","+total_row+")'>Hapus</button></center>"+
                    "</td>"+
                "</tr>";

        $('#'+table+' tr:last').after(row);
        $('.jumlah').keypress(function (e) {
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $("#submit").click(function() {
            var add = 0;
            $(".jumlah").each(function() {
                add += Number($(this).val());
            });
            $('#tot').val(add);
            
        });
        $('.text-danger').hide();
        $('#form input').each(function(){ 
            $(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
                if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
                    return get_error_text(this); //function get_error_text ada di bawah
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-danger').hide();//cari element dengan class has-danger dari element induk text yang sedang focus
                    $(this).closest('div').removeClass('has-danger');
                    $(this).closest('div').addClass('has-success');
                }
            });
        });
    }
    function remove_row(table,index) {
        $("#"+table+"_"+index).remove();

    }
    $(document).ready(function(){
        $('#form').submit(function(e){
            e.preventDefault();
            var valid=true;
            var total_row = $('#share tr').length;    
            if (total_row == 1){
                valid = false;
                alert('Tidak ada data untuk di Simpan');
            }else{
                valid = true;
            } 
            $(this).find('.textbox').each(function(){
                if (! $(this).val()){
                    get_error_text(this);
                    valid = false;
                }else{
                	get_success_text(this);
                	valid = true;
                }

                if ($(this).hasClass('no-valid')){
                    valid = false;
                }else{
                	valid = true;
                }
            });



            if (valid){
                        $.ajax({
                            url: '/admin/pembagian/amal',
                            type: "POST",
                            data: $('#form').serialize(), 
                            dataType: "html",
                            success: function(){                
                            window.location = "{{ url('/admin/redirect/alokasi/amal') }}";
                            },	
                            
                            error: function (xhr, ajaxOptions, thrownError) {
                            	toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								};

							toastr.error("Please Contact Developer","Failed");
	                        
                            }
                });
            }
        });
    });
    function apply_feedback_error(textbox){
        $(textbox).addClass('no-valid');
        $(textbox).parent().find('.text-danger').show();
        $(textbox).closest('div').removeClass('has-success');
        $(textbox).closest('div').addClass('has-danger');
    }

    function get_error_text(textbox){
        $(textbox).parent().find('.text-danger').text("Kolom tidak boleh kosong.");
        return apply_feedback_error(textbox);
    }
    function get_success_text(textbox){
        $(textbox).removeClass('no-valid');
        $(textbox).parent().find('.text-danger').hide();
        $(textbox).closest('div').addClass('has-success');
        $(textbox).closest('div').removeClass('has-danger');
    }
</script>

@endpush
