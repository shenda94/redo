@extends('component.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Pengajar</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengajar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataKursus" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NIGN</th>
                        <th>NIP</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>                        
                        <th>Mata Pelajaran</th> 
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($pengajar as $itemPengajar):  ?>
                      <tr>
                        <td>{{$itemPengajar->nign }}</td>
                        <td>{{$itemPengajar->nip}}</td>
                        <td>{{$itemPengajar->nama}}</td>
                        <td>{{$itemPengajar->nama_kelas}}</td> 
                        <td>{{$itemPengajar->nma_matpel}}</td> 
                        <td><a href="{{{ URL::to('pengajar/'.$itemPengajar->nign.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                        </td>
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NIGN</th>
                        <th>NIP</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>                        
                        <th>Mata Pelajaran</th> 
                        <th>Aksi</th>     
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->

@endsection
@section('script')

    <script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {

        $('#dataKursus').DataTable({"pageLength": 10});

      });

    </script>

@endsection

