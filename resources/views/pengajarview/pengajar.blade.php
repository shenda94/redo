@extends('component.masterpengajar')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard Pengajar</li>
          </ol>
@stop
@section('content')
								
			<div class="callout callout-info">
            <h4>Selamat Datang Pengajar!</h4>
            <p>Untuk menggunakan Redo harap diperhatikan bagian-bagian data inti yang perlu dipersiapkan sebelumnya sebelum siap digunakan. </p>
          </div>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Penting !!</h3>
              <div class="box-tools pull-right">
                <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div style="display: block;" class="box-body">

              Data penting yang perlu disiapkan antara lain :
                <ul>
                <li>
                1. Input Kelas dan Monitoring Kelas</li>
                <li>
                2. Input Modul</li>
                <li>
                3. Input Kuis</li>
                                
                </ul>
            </div><!-- /.box-body -->
            <div style="display: block;" class="box-footer">
              nb : Dalam proses ini sangat tergantung pada urutan proses.
            </div><!-- /.box-footer-->
          </div>
								@endsection


		