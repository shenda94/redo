@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Modul</li>
          </ol>
@stop
@section('content')
<div class="row">
            <div class="col-md-6">
                <div class="box-body flash-message" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Tambah Modul </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <form id="formModulTambah" class="form-horizontal" role="form" method="POST" action="{{ url('modul/tambahmodul') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Kode</label>
                          <div class="col-md-6 @if ($errors->has('id_kelas_det')) has-error @endif">
                              <input type="text" class="form-control" name="id_kelas_det" value="{{Request::old('id_kelas_det')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Kelas </label>
                          <div class="col-md-6  @if ($errors->has('nm_kelas_det')) has-error @endif">
                              <input type="text" class="form-control" name="nm_kelas_det" value="{{Request::old('nm_kelas_det')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('nma_matpel')) <small class="help-block">{{ $errors->first('nma_matpel') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Deskrisi Materi </label>
                          <div class="col-md-6  @if ($errors->has('penjelasan_modul')) has-error @endif">
                              <input type="text" class="form-control" name="penjelasan_modul" value="{{Request::old('penjelasan_modul')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">File Materi </label>
                          <div class="col-md-6  @if ($errors->has('file_materi')) has-error @endif">
                              <input type="file" class="form-control" name="file_materi" value="{{Request::old('file_materi')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>
   
                      
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('ModulController@index') }}}" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      </form>   
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='nm_kelas_det']").val('');
    		alert('Upload file berhasil.');
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };

  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>

            
@endsection

