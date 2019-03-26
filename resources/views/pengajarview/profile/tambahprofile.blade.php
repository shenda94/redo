@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Profile</li>
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
                    <h3 class="box-title">Tambah Profile </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                
                      <form id="formProfileTambah" class="form-horizontal" role="form" method="POST" action="{{ url('profile/tambahprofile') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">No</label>
                          <div class="col-md-6 @if ($errors->has('id_user')) has-error @endif">
                              <input type="text" class="form-control" name="id_user" value="{{Request::old('id_user')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Lengkap</label>
                          <div class="col-md-6 @if ($errors->has('nama_lengkap')) has-error @endif">
                              <input type="text" class="form-control" name="nama_lengkap" value="{{Request::old('nama_lengkap')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Tanggal Lahir </label>
                          <div class="col-md-6  @if ($errors->has('tgl_lahir')) has-error @endif">
                              <input type="text" class="form-control" name="tgl_lahir" value="{{Request::old('tgl_lahir')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('nma_matpel')) <small class="help-block">{{ $errors->first('nma_matpel') }}</small> @endif -->
                          </div>
                      </div>


                       <div class="form-group">
                          <label class="col-md-4 control-label">Gambar </label>
                          <div class="col-md-6  @if ($errors->has('file_foto')) has-error @endif">
                              <input type="file" class="form-control" name="file_foto" value="{{Request::old('file_foto')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label"> Alamat </label>
                          <div class="col-md-6  @if ($errors->has('alamat')) has-error @endif">
                              <input type="text" class="form-control" name="alamat" value="{{Request::old('alamat')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('gambar')) <small class="help-block">{{ $errors->first('gambar') }}</small> @endif -->
                          </div>
                      </div

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nickname </label>
                          <div class="col-md-6  @if ($errors->has('nickname')) has-error @endif">
                              <input type="text" class="form-control" name="nickname" value="{{Request::old('nickname')}}">
                              <small class="help-block"></small>
                              <!-- @if ($errors->has('deskripsi')) <small class="help-block">{{ $errors->first('deskripsi') }}</small> @endif -->
                          </div>
                      </div>
                      

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('ProfileController@index') }}}" title="Cancel">
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
    		$("input[name='nama_lengkap']").val('');
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

<script src="js/jquery.min.2.0.2.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_lahir').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
@endsection

