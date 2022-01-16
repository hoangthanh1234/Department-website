@extends('Admin.Master')
@section('title','Danh sách phân công giảng dạy')
@section('content')

<style type="text/css">
  .listgroupone:hover{background:#3c763d;color:#fff;}
  .listgrouptwo:hover{background:red;color:#fff;}
  .listgrouplopone:hover{background:#3c763d;color:#fff;}
  .listgrouploptwo:hover{background:red;color:#fff;}
</style>

<div class="h3 padding20 text-center">Danh Phân công giảng dạy bộ môn @if($name!= null){{$name->ten_vi}} @endif</div>
  <div class="box">
      <div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('errors'))
        <div class="alert alert-warning">
          <strong>Cảnh báo ! ! !</strong>  <br>
           @foreach($errors->all() as $err)
              {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
            @endforeach
        </div>
        @endif

        @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
        @endif

         @if(session('canhbao'))
          <div class="alert alert-warning">
            {{session('canhbao')}}
          </div>
        @endif
      </div>



 <div class="box-body">
 <form  method="post" action="set_admin/phan-cong-thinh-giang/phan-cong.html" enctype="multipart/form-data">

      <div class="row" style="margin-bottom:20px;">
        <div class="col-lg-4">
         <b class="ten2x">Chọn bộ môn</b><br>
          <select id="bomon" class="form-control select2" name="id_bomon" id="id_bomon">
            <option value="0">Chọn bộ môn</option>
              @foreach($Bomon as $BM)
                <option value="{{$BM->id}}" @if($id_bomon == $BM->id) selected @endif>{{$BM->ten_vi}}</option>
              @endforeach
            </select>
         </div>

         <div class="col-lg-2">
         <b class="ten2x">Nhập năm học</b><br>
         <input type="text" class="form-control text-center" name="namhoc" id="namhoc" @if(isset($namhoc)) value="{{$namhoc}}" @endif>
         </div>
     </div>
  @if($id_bomon != 0 && $namhoc != 0)
   <a href="set_admin/phan-cong-giang-day-giang-vien/excel/phan-cong-giang-day/{{$id_bomon}}/{{$namhoc}}">
    <input type="button" value="Xuất DS PCGD" title="Xuất danh sách phân công giảng dạy" class="btn btn-success">
  </a>
    <a href="set_admin/phan-cong-giang-day-giang-vien/excel/phan-cong-thinh-giang/{{$id_bomon}}/{{$namhoc}}">
      <input type="button" value="Xuất DS PCTG" title="Xuất danh sách phân công thỉnh giảng" class="btn btn-success">
    </a>
     <a href="set_admin/phan-cong-giang-day-giang-vien/xoa-phan-cong/{{$id_bomon}}/{{$namhoc}}">
      <input type="button" value="Xóa DS PCTG" title="Xuất danh sách phân công giảng dạy theo năm học và bộ môn hiên tại" class="btn btn-danger xoaphancong">
    </a>
  @endif
  <br><br>
      <div class="table-responsive">
        <table id="example2" class="table table-bordered table-hover" style="width:100%">
                <thead>
                  <tr class="bg-top">
                   	<td class="text-center" width="3%">STT</td>
                   	<td class="text-center" width="10%">Hành động</td>
                   	<td class="text-center" width="15%">Giảng viên</td>
                   	<td class="text-center" width="9%">Giờ chuẩn</td>
                    <td class="text-center" width="9%">Số giờ PC</td>
                   	<td class="text-center">Môn PC</td>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   	<td class="text-center"></td>
                   	<td class="text-center"></td>
                   	<td class="text-center"></td>
                   	<td class="text-center"></td>
                   	<td class="text-center"></td>
                   	<td class="text-center"></td>
                  </tr>
                </tfoot>
                <tbody>
                	<?php $i=1;?>
                    @if(count($Phanconggiangday)>0)
                      @foreach($Giangvien as $gv)
                        <tr>
                          	<td class="text-center">{{$i++}}</td>
                          	<td class="text-center">
                             <a class="btn btn-success xemdanhsach" data-id="{{$gv->id}}" title="Chuyển môn được phân công cho giảng viên khác">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                             </a>
                            </td>
                          	<td>{{$gv->ten}}</td>
                          	<td class="text-center">
                              <?php $gc=0;?>
                          		@foreach($Chedogiochuan as $cdgc)
                          			@if($gv->id_chucvu == $cdgc->id_chucvu && $gv->id_trinhdo == $cdgc->id_trinhdo)
                          				 @if($cdgc->giochuan !=0)<?php $gc=$cdgc->giochuan-176;?>{{$cdgc->giochuan-176}} @else 0 @endif
                          			@endif
                          		@endforeach
                          	</td>

                            <?php $giopc = 0; ?>
                              @foreach($Phanconggiangday as $pcgd)
                                @if($gv->id == $pcgd->id_giangvien && $pcgd->namhoc == $namhoc && $pcgd->trangthai == 1)
                                  <?php $giopc+=(($pcgd->mon->lt*15) + ($pcgd->mon->th*30));?>
                                @endif
                              @endforeach

                          	<td class="text-center"
                                @if($giopc<$gc) style="background:red;color:white;"@endif
                                @if($giopc>$gc && $giopc>270) style="background:blue;color:white;"@endif
                                 @if($giopc>=$gc && $giopc<= 270 && $giopc!=0) style="background:#f3b61c;color:white;"@endif
                             >
                          		{{$giopc}}
                          	</td>

                            <td class="text-center">
                              <?php $chuoi = ''; ?>
                              @foreach($Phanconggiangday as $pcgd)
                                @if($gv->id == $pcgd->id_giangvien && $pcgd->namhoc == $namhoc)
                                  <?php $chuoi.=$pcgd->mon->ten_vi.'('.$pcgd->lop->malop.')'.', ';?>
                                @endif
                              @endforeach
                                <a title="{{$chuoi}}">Đặt chuột lên để xem</a>
                            </td>
                        </tr>
                      @endforeach
                    @endif
            </tbody>
        </table>
      </div>
      <br>

      @if(count($Montachthinhgiang)>0)
          <div class="panel panel-success">
            <div class="panel-heading ten2x">
              DANH SÁCH MÔN HỌC TÁCH TỪ PHÂN CÔNG CHÍNH THỨC ĐỂ PHÂN CÔNG THỈNH GIẢNG
            </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover example2" style="width:100%">
                      <thead>
                          <tr>
                            <td class="text-center">STT</td>
                            <td class="text-center">Môn</td>
                            <td class="text-center">Lớp</td>
                            <td class="text-center">Giảng viên</td>
                            <td class="text-center">Hủy</td>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                        @foreach($Montachthinhgiang as $mctg)
                        <tr>
                          <td class="text-center">{{$i++}}</td>
                          <td>{{$mctg->mon->ten_vi}}</td>
                          <td>{{$mctg->lop->tenlop}}</td>
                          <td>{{$mctg->giangvien->ten}}</td>
                          <td class="text-center">
                            <input type="button" class="btn btn-danger" id="btn-huy" data-id="{{$mctg->id}}" value="Hủy" >
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      @endif
  <div class="panel panel-warning">
    <div class="panel-heading ten2x">CẤU HÌNH TRƯỚC KHÍ PHÂN CÔNG THỈNH GIẢNG</div>
    <div class="panel-body">
      <div class="row">
      <div class="col-lg-2 col-md-4">
        <label class="ten2x">Số lượng cá thể</label>
        <input type="text" name="soluong" value="{{old('soluong')}}" class="form-control text-center" style="width:80px;" placeholder="VD: 100">
      </div>

      <div class="col-lg-2 col-md-4">
        <label class="ten2x">Giờ tối đa</label>
        <input type="text" name="diemtoida" id="diemtoida" value="{{old('diemtoida')}}" class="form-control text-center" style="width:80px;" placeholder="VD: 450">
      </div>
       </div>
       <br><br>
       <input type="submit" value="Phân công thỉnh giảng" class="btn btn-success">
      </div>
  </div>

  <div class="panel panel-success">
        <div class="panel-heading ten2x">CHỌN GIẢNG VIÊN CẦN PHÂN CÔNG THỈNH GIẢNG</div>
        <div class="panel-body">
            <div class="row">
            <div class="col-lg-4">
              <label class="ten2x">Chọn Bộ Môn</label>
              <select class="form-control" id="chonbomonthree">
                <option value="0">Chọn Bộ môn</option>
                @foreach($Bomon as $bm)
                  <option value="{{$bm->id}}"> {{$bm->ten_vi}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <ul class="listone" id="danhsachgiangvienone" style="padding-left:0;"></ul>
            </div>

            <div class="col-lg-6 col-md-6">
              <ul class="listtwo" id="danhsachgiangvientwo"></ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div id="loadmonphancong"></div>
            </div>
          </div>
        </div>
  </div>

  <div class="panel panel-success">
      <div class="panel-heading ten2x">CHỌN LỚP CẦN PHÂN CÔNG THỈNH GIẢNG</div>
        <div class="panel-body">
          <div class="row">
          <div class="col-lg-4">
            <label class="ten2x">Chọn Bộ Môn</label>
            <select class="form-control" id="chonbomontwo">
              <option value="0">Chọn Bộ môn</option>
              @foreach($Bomon as $bm)
                <option value="{{$bm->id}}"> {{$bm->ten_vi}} </option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-2 col-md-2">
            <input type="button" class="btn btn-danger xoadanhsachlop"  value="Xóa Session lớp" style="padding:7px;margin-top:28px;" />
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-lg-12 col-md-12">
            <ul class="listone" id="danhsachlopone" style="padding-left:0;"></ul>
          </div>
        </div>
          <br>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <ul class="listtwo" id="danhsachloptwo" style="padding-left:0;"></ul>
          </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Phân công thỉnh giảng" class="btn btn-success">
        </div>
  </div>

</form>

<br>
 <div class="panel panel-danger">
      <div class="panel-heading ten2x">DANH SÁCH PHÂN CÔNG THỈNH GIẢNG</div>
        <div class="panel-body">
            <div class="table-responsive">
                  <table class="table table-bordered table-hover example2" style="width:100%">
                        <thead>
                          <tr class="bg-top">
                            <td class="text-center" width="3%">STT</td>
                            <td class="text-center" width="10%">Hành động</td>
                            <td class="text-center" width="15%">Giảng viên</td>
                            <td class="text-center">Chức vụ</td>
                            <td class="text-center">Trình độ</td>
                            <td>Môn giảng dạy</td>
                            <td class="text-center">Giờ</td>
                            <td>Lớp</td>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php $j=1;?>
                            @if(count($Phancongthinhgiang)>0)
                              @foreach($Phancongthinhgiang as $pctg)
                                <tr>
                                    <td class="text-center">{{$j++}}</td>
                                    <td class="text-center">
                                     <a class="btn btn-success chuyenthinhgiang" data-id="{{$pctg->id}}" title="Chuyển môn được phân công cho giảng viên khác">
                                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                                     </a>
                                    </td>
                                    <td>{{$pctg->giangvien->ten}}</td>
                                    <td>{{$pctg->giangvien->chucvu->ten_vi}}</td>
                                    <td>{{$pctg->giangvien->trinhdo->ten_vi}}</td>
                                    <td>{{$pctg->mon->ten_vi}}</td>
                                    <td class="text-center">{{($pctg->mon->lt*15) + ($pctg->mon->th*30)}}</td>
                                    <td>{{$pctg->lop->tenlop}}</td>
                                </tr>
                              @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
            <input type="button" id="xoathinhgiang" value="Xóa DS PCTG" title="Xóa danh sách phân công thỉnh giảng theo năm học và bộ môn hiện tại" class="btn btn-danger">
        </div>
 </div>

</div>


<div class="modal fade" id="danhsachmonphancong" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title ten2x" style="font-size:20px;">Danh sách môn được phân công</h4>
           <h5 style="color:red">Bạn có thể chuyển môn trong danh sách đến giảng viên phủ hợp để tăng chất lượng của danh sách phân công</h5>
        </div>
        <div class="modal-body">
        <table width="100%" class="table table-hover table-bordered">
          <thead>
            <tr class="bg-top">
              <td width="5%" class="text-center">STT</td>
              <td class="text-center">Môn</td>
              <td width="10%" class="text-center">Lớp</td>
              <td width="10%" class="text-center">HK</td>
              <td class="text-center">Danh sách giợi ý</td>
              <td class="text-center">Chuyển</td>
              <td class="text-center">Xóa</td>
            </tr>
          </thead>
          <tbody id="loaddanhsach">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="closemodal">Thoát</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalchuyenthinhgiang" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title ten2x" style="font-size:20px;">CHUYỂN PHÂN CÔNG THỈNH GIẢNG</h4>
        </div>
        <div class="modal-body">
        <table width="100%" class="table table-hover table-bordered">
          <thead>
            <tr class="bg-top">
              <td width="5%" class="text-center">STT</td>
              <td class="text-center">Môn</td>
              <td width="10%" class="text-center">Lớp</td>
              <td class="text-center">Danh sách giợi ý</td>
              <td class="text-center">Chuyển</td>
            </tr>
          </thead>
          <tbody id="loaddanhsachthinhgiang">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
      </div>
    </div>
  </div>
</div>

</div>
@endsection

@section('script')
	<script type="text/javascript">

	  $(document).on('change','#bomon',function(){
	     var id=$(this).val();
	     var namhoc = $('#namhoc').val();
	     if(namhoc == ''){
	     	alert('Vui lòng chọn năm học');
	     	return false;
	     }
	      window.location.href ="set_admin/phan-cong-giang-day-giang-vien/list/"+id+"/"+namhoc+".html";
	  });

    $(document).on('click','.xemdanhsach',function(){
        var nam = $('#namhoc').val();
        var giangvien = $(this).data('id');

        $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachphancong/"+nam+"/"+giangvien,function(data){
            $('#loaddanhsach').html(data);
        });

        $('#danhsachmonphancong').modal();
    });

    $(document).on('click','.btn-doi',function(){
      var id = $(this).data('id');
      var id_giangvien = $('#chongiangvien'+id).val();
      var giangvienold = $(this).data('gv');
      var nam = $(this).data('nam');
      if(id_giangvien == 0){
        alert('Vui lòng chọn giảng viên');return false;
      }
       $.get("set_admin/phan-cong-giang-day-giang-vien/chuyengiangvien/"+id+"/"+id_giangvien,function(data){
             $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachphancong/"+nam+"/"+giangvienold,function(datatwo){
                $('#loaddanhsach').html(datatwo);
                alert('Chuyển đổi thành công');
                location.reload();
            });
        });
    });

    $(document).on('click','#xoahet',function(){
      var nam = $('#namhoc').val();
      var bomon = $('#bomon').val();
      var tenbomon = $('#bomon option:selected').text();
      if(nam == 0 || bomon == 0){alert("Vui lòng chọn bộ môn và năm");return false;}

      var hoi= confirm("Bạn có chắc chắn muốn xóa hết phân công giảng dạy năm: "+nam+" bộ môn: "+tenbomon+" ?");
        if (hoi==true){
             $.get("set_admin/phan-cong-giang-day-giang-vien/xoahet/"+nam+"/"+bomon,function(data){
                location.reload();
            });
        }
    });

    $(document).on('click','.btn-xoa',function(){
      var id = $(this).data('id');
      var id_giangvien = $(this).data('giangvien');
      var nam = $('#namhoc').val();
          hoi= confirm("Sau khi xóa môn này sẽ được lưu vào Session và yêu cầu bạn phân công thỉnh giảng. Bạn có chắc chắn muốn xóa?");
          if (hoi==true){
            $.get("set_admin/phan-cong-thinh-giang/checkxoaphancong/"+id,function(data){
                if(data == 1){
                  $.get("set_admin/phan-cong-giang-day-giang-vien/xoa-phan-cong/"+id,function(data){
                      alert("Môn học này đã được chuyển sang chế độ có thể phân công thỉnh giảng");
                       $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachphancong/"+nam+"/"+id_giangvien,function(data){
                              $('#loaddanhsach').html(data);
                         });
                  });
                }

                if(data == 0){
                  hoitwo = confirm("Sau khi xóa môn này giờ giảng của giảng viên này sẽ thấp hơn số giờ quy định bạn có muốn xóa ?");
                  if(hoitwo == true){
                    $.get("set_admin/phan-cong-giang-day-giang-vien/xoa-phan-cong/"+id,function(data){
                        alert("Môn học này đã được chuyển sang chế độ có thể phân công thỉnh giảng");
                         $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachphancong/"+nam+"/"+id_giangvien,function(data){
                                $('#loaddanhsach').html(data);
                           });
                    });
                  }
                }
            });



          }
    });

    $(document).on('click','#btn-huy',function(){
      var id = $(this).data('id');
      hoi= confirm("Sau khi hủy môn học này sẽ quay về danh sách phân công giảng dạy của giảng viên tương ứng?");

          if (hoi==true){

              $.get("set_admin/phan-cong-giang-day-giang-vien/huy-xoa-phan-cong/"+id,function(data){
                  if(data == "1" ){
                    alert(" Hủy thành công");
                    location.reload();
                  }
                  else{
                  alert("Không thể hủy mục này vì đã được phân công thỉnh giảng, Bạn có thể xem danh sách phân công thỉnh giảng bên dưới.");return false;
                  }
              });
          }
    });

    $(document).on('click','#closemodal',function(){
        $('#danhsachmonphancong').modal("hide");
          location.reload();
    });

  //phân công thỉnh giảng giảng viên

    $(document).on('change','#chonbomonthree',function(){
        var id = $(this).val();
        $.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvien/"+id,function(data){
          $('#danhsachgiangvienone').html(data);
        });
    });

    $(document).on('click','.listgroupone',function(){
      var id = $(this).data('id');
      $.get("set_admin/phan-cong-giang-day-giang-vien/addsessiongiangvien/"+id,function(data){
          $.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvienbac2/"+data,function(databac2){
            $('#danhsachgiangvientwo').html(databac2);
          });
        });
    });

    $(document).on('click','.listgrouptwo',function(){
      var id = $(this).data('id');
      $.get("set_admin/phan-cong-giang-day-giang-vien/deletesessiongiangvien/"+id,function(data){
        if(data == ''){
           $('#danhsachgiangvientwo').html('')
           return false;
        }
              $.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvienbac2/"+data,function(databac2){
                 $('#danhsachgiangvientwo').html(databac2)

            });
          });
    });

  //phân công lớp

    $(document).on('click','.xoadanhsachlop',function(){
      $.get("set_admin/phan-cong-giang-day-giang-vien/xoadanhsachlop",function(data){
          window.location.reload();
      });
    });

    $(document).on('change','#chonbomontwo',function(){
        var id = $(this).val();
        $.get("set_admin/phan-cong-giang-day-giang-vien/loadloptwo/"+id,function(data){
                $('#danhsachlopone').html(data);
            });
    });

    $(document).on('click','.listgrouplopone',function(){
      var id = $(this).data('id');
      $.get("set_admin/phan-cong-giang-day-giang-vien/addsessionlop/"+id,function(data){
              $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachchitiet/"+data,function(datachitiet){
                $('#danhsachloptwo').html(datachitiet);
            });
          });
    });


    $(document).on('click','#xoathinhgiang',function(){
        var id_bomon = $('#bomon').val();
        var nam = $('#namhoc').val();
        var hoi= confirm("Hành động này sẽ xóa đi danh sách phân công thỉnh giảng tương ứng với năm học và bộ môn hiện tại. Bạn có chắc chắn muốn xóa ?");
        $(this).val('Đang thực hiện');
        if (hoi==true){
             $.get("set_admin/phan-cong-thinh-giang/xoa-het/"+nam+"/"+id_bomon,function(data){
                alert("Xóa thành công bạn có thể thực hiện lại quá trình phân công thỉnh giảng");
                location.reload();
            });
        }
    });

    $(document).on('click','.chuyenthinhgiang',function(){
        var id = $(this).data('id');
        var nam = $('#namhoc').val();

        $.get("set_admin/phan-cong-thinh-giang/loaddanhsachthinhgiang/"+id+"/"+nam,function(data){
            $('#loaddanhsachthinhgiang').html(data);
        });
        $('#modalchuyenthinhgiang').modal();
    });

    $(document).on('click','.btn-doithinhgiang',function(){

       var id = $(this).data('id');
       var id_giangvien = $('#chongiangvienthinhgiang'+id).val();
       var nam = $(this).data('nam');
       if(id_giangvien == 0){
         alert('Vui lòng chọn giảng viên');return false;
       }
       $.get("set_admin/phan-cong-giang-day-giang-vien/chuyengiangvien/"+id+"/"+id_giangvien,function(data){
            alert('Chuyển đổi thành công');
            location.reload();
        });
    });

    $(document).on('click','.xoaphancong',function(){
        var id_bomon = $('#bomon').val();
        var namhoc = $('#namhoc').val();
        var hoi = confirm("Hành động này sẽ xóa đi danh sách phân công giảng dạy hiện tại. Bạn có chắc chắn không ?");
        if(hoi == true){
          $.get("set_admin/phan-cong-giang-day-giang-vien/xoa-danh-sach-phan-cong/"+namhoc+"/"+id_bomon,function(data){
             alert("Đã xóa thành công danh sách phân công giảng dạy");
          });
        }
    });

	</script>
@endsection
