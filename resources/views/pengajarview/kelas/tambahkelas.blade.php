@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kelas</li>
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
                    <h3 class="box-title">Tambah Kelas </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                
                      <form id="formKelasTambah" class="form-horizontal" role="form" method="POST" action="{{ url('inputkelas/tambahkelas') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">No</label>
                          <div class="col-md-6 @if ($errors->has('id_kelas')) has-error @endif">
                              <input type="text" class="form-control" name="id_kelas" value="{{Request::old('id_kelas')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Kode</label>
                          <div class="col-md-6 @if ($errors->has('kode_kelas')) has-error @endif">
                              <input type="text" class="form-control" name="kode_kelas" value="{{Request::old('kode_kelas')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Kelas </label>
                          <div class="col-md-6  @if ($errors->has('nama_kelas')) has-error @endif">
                              <input type="text" class="form-control" name="nama_kelas" value="{{Request::old('nama_kelas')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('nma_matpel')) <small class="help-block">{{ $errors->first('nma_matpel') }}</small> @endif -->
                          </div>
                      </div>

                    <div class="form-group">
                          <label class="col-md-4 control-label">Deskripsi Kelas </label>
                          <div class="col-md-6  @if ($errors->has('kelas_deskripsi')) has-error @endif">
                              <input type="combobox" class="form-control" name="kelas_deskripsi" value="{{Request::old('kelas_deskripsi')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>


                       <div class="form-group">
                          <label class="col-md-4 control-label">Gambar </label>
                          <div class="col-md-6  @if ($errors->has('file_gambar')) has-error @endif">
                              <input type="file" class="form-control" name="file_gambar" value="{{Request::old('file_gambar')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Tentang kelas </label>
                          <div class="col-md-6  @if ($errors->has('tentang_kelas')) has-error @endif">
                              <input type="text" class="form-control" name="tentang_kelas" value="{{Request::old('tentang_kelas')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Level Kelas </label>
                          <div class="col-md-7  @if ($errors->has('nm_level_kelas')) has-error @endif">
                              <input type="radio" class="form-radio" name="nm_level_kelas" id="id_level_kelas"> <label for="id_level_kelas">Beginner</label>
                              <input type="radio" class="form-radio" name="nm_level_kelas" id="id_level_kelas"> <label for="id_level_kelas">Intermediate</label>
                              <input type="radio" class="form-radio" name="nm_level_kelas" id="id_level_kelas"> <label for="id_level_kelas">Advanced</label>
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>
                      

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('InputKelasController@index') }}}" title="Cancel">
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
        </div>
          </div><!-- /.row (main row) -->


@endsection
@section('script')

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
    		$("input[name='nama_kelas']").val('');
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

