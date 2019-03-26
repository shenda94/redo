@extends('component.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Mata Pelajaran</li>
          </ol>
@stop
@section('content')
          <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Mata Pelajaran <a href="{{{ action('MatpelController@tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 50px; text-align: center;">No </th>
                        <th>Kode</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Deskripsi Mata Pelajaran</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                      <?php foreach ($matpel as $datamatpel):  ?>
                      <tr>
                          <td style="text-align: center;">{{ $datamatpel->id_matpel}}</td>
                          <td>{{ $datamatpel->kode_matpel}}</td>
                          <td>{{ $datamatpel->nma_matpel}}</td>
                          <td>{{ $datamatpel->deskripsi}}</td>
                          <td>{{ $datamatpel->file_gambar}}
                          <td><a href="{{{ action('MatpelController@hapus',[$datamatpel->id_matpel]) }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus Mata Pelajaran {{{$datamatpel->id_matpel .' - '.$datamatpel->nma_matpel }}}?')">
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


