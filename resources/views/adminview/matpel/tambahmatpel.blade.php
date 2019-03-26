@extends('component.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Mata Pelajaran</li>
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
                    <h3 class="box-title">Tambah Mata pelajaran </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <form id="formMatpelTambah" class="form-horizontal" role="form" method="POST" action="{{ url('matpel/tambahmatpel') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                        <div class="form-group">
                          <label class="col-md-4 control-label">No</label>
                          <div class="col-md-6 @if ($errors->has('id_matpel')) has-error @endif">
                              <input type="text" class="form-control" name="id_matpel" value="{{Request::old('id_matpel')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Kode</label>
                          <div class="col-md-6 @if ($errors->has('kode_matpel')) has-error @endif">
                              <input type="text" class="form-control" name="kode_matpel" value="{{Request::old('kode_matpel')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Mata Pelajaran </label>
                          <div class="col-md-6  @if ($errors->has('nma_matpel')) has-error @endif">
                              <input type="text" class="form-control" name="nma_matpel" value="{{Request::old('nma_matpel')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('nma_matpel')) <small class="help-block">{{ $errors->first('nma_matpel') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Deskrisi </label>
                          <div class="col-md-6  @if ($errors->has('deskripsi')) has-error @endif">
                              <input type="text" class="form-control" name="deskripsi" value="{{Request::old('deskripsi')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Gambar </label>
                          <div class="col-md-6  @if ($errors->has('file_gambar')) has-error @endif">
                              <input type="file" class="form-control" name="file_gambar" value="{{Request::old('file_gambar')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('file_gambar')) <small class="help-block">{{ $errors->first('file_gambar') }}</small> @endif -->
                          </div>
                      </div>
   
                      
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('MatpelController@index') }}}" title="Cancel">
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
    		$("input[name='nma_matpel']").val('');
    		alert('Upload gambar berhasil.');
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

