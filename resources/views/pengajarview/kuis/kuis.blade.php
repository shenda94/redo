@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kuis</li>
          </ol>
@stop
@section('content')
          <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Kuis </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 100px; text-align: center;">Kode Kelas </th>
                        <th>Nama Kelas</th>
                        <th>Jenis Kelas</th>
                        <th>Pertanyaan Kuis</th>
                        <th>Pembahasan Kuis</th>
                        <th>Jawaban</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Aksi</th>
                      </tr>
                      <?php foreach ($kuis as $datakuis):  ?>
                      <tr>
                          <td style="text-align: center;">{{ $datakuis->id_kelas_det}}</td>
                          <td>{{ $datakuis->nm_kelas_det}}</td>
                          <td>{{ $datakuis->jenis_kelas}}</td>
                          <td>{{ $datakuis->pertanyaan_kuis}}</td>
                          <td>{{ $datakuis->pembahasan_kuis}}</td>
                          <td>{{ $datakuis->  jawaban}}</td>
                          <td>{{ $datakuis->A}}</td>
                          <td>{{ $datakuis->B}}</td>
                          <td>{{ $datakuis->C}}</td>
                          <td>{{ $datakuis->D}}</td>
                          <td><a href="{{{ URL::to('kuis/'.$datakuis->id_kelas_det.'/edit') }}}">
                              <span class="label label-warning"><i class="fa fa-edit"> Edit </i></span>
                              </a> </td>
                          <td><a href="{{{ action('KuisController@hapus',[$datakuis->id_kelas_det]) }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus Kuis {{{$datakuis->id_kelas_det .' - '.$datakuis->nm_kelas_det }}}?')">
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


