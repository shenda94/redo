@extends('muridview.header')
@section('content')


    <!-- ##### Top Teacher Area Start #####  -->
    <section class="top-teacher-area section-padding-0-100">
 
        <hr>
         
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Profile</h1></div>
        
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        @foreach($dataprofile as $listkelas)
        <img src="{{$listkelas->file_foto}}" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6 style="display:none;">Upload Photo</h6>
        <form class="form" id="registrationForm" onsubmit="return false;">
                    {{csrf_field()}}
        <input type="file" class="text-center center-block file-upload" style="display:none;">
      </div></hr><br>

          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Jumlah Kelas</strong></span> {{$jumlahkelas}}</li>
          </ul> 
          
        </div><!--/col-3-->
        <div class="col-sm-9">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nama Lengkap</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="{{$listkelas->nama_lengkap}}" title="enter your first name if any.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="{{$listkelas->alamat_email}}" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Alamat</h4></label>
                              <input type="text" class="form-control" id="location" name="location" placeholder="somewhere" value="{{$listkelas->alamat}}" title="enter a location">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" style="display:none;"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               
                            </div>
                      </div>
                </form>
              @endforeach
              <hr>
                </div>
            </div>
              
              <div class="row">
                <h1>List Kelas</h1>
                <div class="col-md-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Deskripsi Kelas</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datakelas as $listkelas1)
                            <tr>
                                <td>{{$listkelas1->nama_kelas}}</td>
                                 <td>{{$listkelas1->kelas_deskripsi}}</td>
                                  <td>{{$listkelas1->nma_matpel}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          


          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
     
    </section>

    <!-- ##### Best Tutors End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite -->
                        <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a>REDO</a>. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- All Plugins js -->
    <script src="/muridtemp/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/muridtemp/js/active.js"></script>
    <script src="/toastr/js/toastr.min.js"></script>

    <script type="text/javascript">

$(function () {


  
    $('#registrationForm')
        .bootstrapValidator({
     excluded: ':disabled',
            feedbackIcons: {
                valid: 'fa fa-ok',
                invalid: 'fa fa-remove',
                validating: 'fa fa-refresh'
            },
            fields: {
                trigger: 'change keyup',
                  'option[]': {
                      validators: {
                          notEmpty: {
                              message: 'Text Harus Diisi'
                          }
                      }
                  },
                  email: {
                      validators: {
                          notEmpty: {
                              message: 'Email Harus Diisi'
                          },
                          emailAddress: {
                              message: 'Email Tidak Valid'
                          }
                      }
                  }
            }
        })
        .on('status.field.bv', function(e, data) {
    //alert(data.field);
            data.bv.disableSubmitButtons(false);
        }).on('success.form.bv', function(e,data){
  //   alert("ok");
  
          simpanData();
    
    
    
     e.preventDefault();
    });

    function simpanData(){
        document.getElementById("btnveri").disabled=true;
        var fd = new FormData(document.getElementById("registrationForm"));
        $.ajax({
          type: "POST",
          url: "/updatebiodata",
          data        : fd,
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(result) {
            //var hasil = result.replace('')

          try {
            obj = JSON.parse(result);
             
            var pesan=obj['pesan'];

            //alert(pesan); 
            var status=obj['status'];
              Command: toastr[status](pesan);
              document.getElementById("btnveri").disabled=false;
            } catch (e) {
          }
          
          }
        });
        return false;
    }

});

</script>

    @endsection