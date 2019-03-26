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
            <div class="col-xs-12">
                <div class="uk-alert uk-alert-success" data-uk-alert>
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
                    <h3 class="box-title">Profile Pengajar <a href="{{{ action('ProfileController@tambah') }}}"class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <td>No</td>
                        <td>Nama Lengkap</td>
                        <td>Tanggal Lahir</td>
                        <td>Foto</td>
                        <td>Alamat</td>
                        <td>Nickname</td>
                        <td>Aksi</td>
                      </tr>
                      <?php foreach ($profile as $dataprofile):  ?>
                      <tr>
                      <td style="text-align: center;">{{ $dataprofile->id_user}}</td>
                          <td>{{ $dataprofile->nama_lengkap}}</td>
                          <td>{{$dataprofile-> tgl_lahir}}</td>
                          <td>{{$dataprofile-> file_foto}}</td>
                          <td>{{$dataprofile-> alamat}}</td>
                          <td>{{$dataprofile-> nickname}}</td>
                          <td><a href="{{{ action('ProfileController@hapus',[$dataprofile->id_user]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Kelas {{{($dataprofile->id_user).' - '.$dataprofile->nama_lengkap }}}?')">
                              <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                              </a>                          
                          </td>                         
                      </tr>
                      <?php endforeach  ?>  
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->

@endsection
