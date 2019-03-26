@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Modul</li>
          </ol>
@stop
@section('content')
          <div class="row">
            <div class="col-xs-10">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Modul <a href="{{{ action('ModulController@tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 100px; text-align: center;">Kode Kelas </th>
                        <th>Nama Kelas</th>
                        <th>Materi</th>
                        <th>Pejelasan Materi</th>
                        <th>Aksi</th>
                      </tr>
                      <?php foreach ($modul as $datamodul):  ?>
                      <tr>
                          <td style="text-align: center;">{{ $datamodul->id_kelas_det}}</td>
                          <td>{{ $datamodul->nm_kelas_det}}</td>
                          <td>{{ $datamodul->file_materi}}</td>
                          <td>{{ $datamodul->penjelasan_modul}}</td>
                          <td><a href="{{{ action('ModulController@hapus',[$datamodul->id_kelas_det]) }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus Materi {{{$datamodul->id_kelas_det .' - '.$datamodul->nm_kelas_det }}}?')">
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


