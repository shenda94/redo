@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kuis</li>
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
                    <h3 class="box-title">Edit Kuis </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <form id="formKuisTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/kuis/'.$id_kelas_det.'/simpanedit') }}">
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
                          <label class="col-md-4 control-label">Jenis Kelas </label>
                          <div class="col-md-6  @if ($errors->has('jenis_kelas')) has-error @endif">
                          <input type="radio" class="form-radio" name="jenis_kelas" > <label for="jenis_kelas">materi</label>
                          <input type="radio" class="form-radio" name="jenis_kelas" > <label for="jenis_kelas">kuis</label>
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-md-4 control-label">Pertanyaan Kuis </label>
                          <div class="col-md-6  @if ($errors->has('pertanyaan_kuis')) has-error @endif">
                              <input type="text" class="form-control" name="pertanyaa_kuis" value="{{Request::old('pertanyaan_kuis')}}">
                              <small class="help-block"></small>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Pembahasan Kuis </label>
                          <div class="col-md-6  @if ($errors->has('pembahasan_kuis')) has-error @endif">
                              <input type="file" class="form-control" name="pembahasan_kuis" value="{{Request::old('pembahasan_kuis')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>
                      
                     <div class="form-group">
                          <label class="col-md-4 control-label">Jawaban </label>
                          <div class="col-md-6  @if ($errors->has('jawaban')) has-error @endif">
                              <input type="text" class="form-control" name="jawaban" value="{{Request::old('jawaban')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                    <div class="form-group">
                          <label class="col-md-4 control-label">A </label>
                          <div class="col-md-6  @if ($errors->has('A')) has-error @endif">
                              <input type="text" class="form-control" name="A" value="{{Request::old('A')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">B </label>
                          <div class="col-md-6  @if ($errors->has('B')) has-error @endif">
                              <input type="text" class="form-control" name="B" value="{{Request::old('B')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">C </label>
                          <div class="col-md-6  @if ($errors->has('C')) has-error @endif">
                              <input type="text" class="form-control" name="C" value="{{Request::old('C')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">D </label>
                          <div class="col-md-6  @if ($errors->has('D')) has-error @endif">
                              <input type="text" class="form-control" name="D" value="{{Request::old('D')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('KuisController@index') }}}" title="Cancel">
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

