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
                    <h3 class="box-title">Daftar Kelas <a href="{{{ action('InputKelasController@tambah') }}}"class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th>No</th>
                        <th>Kode Kelas </th>
                        <th>Nama Kelas</th>
                        <th>Deskripsi Kelas</th>
                        <th>Gambar</th>
                        <th>Tentang Kelas</th>
                        <th>Level Kelas</th>
                        <th>Jumlah Peserta Didik</th>
                        <th>Aksi</th>
                      </tr>
                      <?php foreach ($kelas as $datakelas):  ?>
                      <tr id="kelas-list" name="kelas-list">
                          <td style="text-align: center;">{{ $datakelas->id_kelas}}</td>
                          <td>{{ $datakelas->kode_kelas}}</td>
                          <td>{{ $datakelas->nama_kelas}}</td>
                          <td>{{$datakelas-> kelas_deskripsi}}</td>
                          <td>{{$datakelas-> file_gambar}}</td>
                          <td>{{$datakelas-> tentang_kelas}}</td>
                          <td>{{$datakelas-> nm_level_kelas}}</td>
                          <td>{{$datakelas-> jumlah_peserta_didik}}</td>
                          <td><a href="{{{ action('InputKelasController@hapus',[$datakelas->id_kelas]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Kelas {{{($datakelas->id_kelas).' - '.$datakelas->nama_kelas }}}?')">
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

