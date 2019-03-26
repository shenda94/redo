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
            <li class="active">Detail Pengajar</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pengajar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($pengajar as $itemPengajar);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3">
                      <p align="center">
                        <img src="{{ URL::asset('admin/dist/img/user-160-nobody.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">{{$itemPengajar->nama}}</a>
                        <span class="users-list-date">Pengajar Tetap</span>
                      </p>
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataKursus" class="table table-bordered table-hover">                    
                      <tbody>
                      
                        <tr>
                          <td>NIGN</td>
                          <td>{{$itemPengajar->nign }}</td>
                        </tr>
                        <tr>
                          <td>NIP</td>  
                          <td>{{$itemPengajar->nip}}</td>
                        </tr>
                        <tr>
                          <td>Nama</td> 
                          <td>{{$itemPengajar->nama}}</td>
                        </tr>
                        <tr>
                          <td>Kelas</td> 
                          <td>{{$itemPengajar->nama_kelas}}</td> 
                        </tr>
                        <tr>
                          <td>Mata Pelajaran</td> 
                          <td>{{$itemPengajar->nma_matpel}}</td>                        
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                 
              </div>
            </div>
                       
          </div><!-- /.row -->

@endsection
@section('script')

  

@endsection

