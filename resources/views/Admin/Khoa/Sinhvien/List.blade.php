@extends('Admin.Master')
@section('title','danh sách sinh viên')
@section('content')  

 <script type="text/javascript">
       $(document).ready(function() {

            $("#chonhet").click(function(){
                var status=this.checked;
                $("input[name='chon']").each(function(){this.checked=status;})
            });

            $("#xoahet").click(function(){
                var listid="";
                $("input[name='chon']").each(function(){
                  if (this.checked) listid = listid+","+this.value;
                  })
                listid=listid.substr(1);   //alert(listid);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true) document.location.href = "set_admin/sinhvien/multi_delete/" + listid;
            });
      });
</script>


<div class="h3 padding20 text-center">Danh sách Sinh viên</div>
    <div class="box">       
      <div class="row padding20" style="padding-bottom:0;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <b class="ten2x">Bộ môn</b><br>
          <select id="bomon" class="form-control select2">
            <option value="0">Chọn bộ môn</option>
            @foreach ($Bomon as $BM)
            <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
            @endforeach
          </select>
        </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <b class="ten2x">Lớp</b><br>
        <select id="lop" class="form-control select2">
          <option value="0">Chọn lớp</option>
          @foreach ($Lop as $L)
          <option value="{{$L->id}}">{{$L->malop}} - {{$L->tenlop}}</option>
          @endforeach
        </select>
      </div>
      </div>  

      <div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
        @endif
       </div>

      <div class="box-body">              
        <form name="frm" method="post" action="" enctype="multipart/form-data">
          <div class="table-responsive">
          <table class="table table-bordered table-hover example2" style="min-width:1200px;width: 100%">
            <thead>                 
              <tr class="bg-top">
                <th width="5%"  class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                <th width="10%" class="text-center">MSSV</th>
                <th width="10%" class="text-center">Tốt nghiệp</th>                                        
                <th width="15%" class="text-center">Họ và tên</th> 
                <th width="8%"  class="text-center">Giới tính</th>
                <th width="10%"  class="text-center">Ngày sinh</th>
                <th width="15%" class="text-center">Email</th>
                <th width="10%" class="text-center">Điện thoại</th>                                             
                <th width="10%" class="text-center">Sửa</th>
                <th width="10%" class="text-center">Xóa</th>                                      
              </tr>
            </thead>
            <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            </tfoot>   
            <tbody>   
            @foreach($Sinhvien as $SV)                                  
            <tr>
              <td class="text-center">
                <input type="checkbox" name="chon" id="chon" value="{{$SV->id}}" class="chon" />
              </td>  
              <td>{{$SV->masinhvien}}</td>  
              <td class="text-center">
                <?php $f=($SV->totnghiep==1)?"diamondToggleOff":""; ?>
                <a data-val2="ht96_sinhvien" rel="{{$SV->totnghiep}}" data-val3="totnghiep" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$SV->id}}" ></a>   
              </td>
              <td>{{$SV->tensinhvien}}</td>
              <td>@if($SV->gioitinh==1) Nam @else Nữ @endif</td>
              <td>{{ \Carbon\Carbon::parse($SV->ngaysinh)->format('d/m/Y')}}</td>
              <td>{{$SV->email}}</td>
              <td>{{$SV->dienthoai}}</td>
              <td class="text-center">                                                   
                <a title="Sửa bài viết" href="set_admin/sinhvien/edit/{{$SV->id}}"><i class="fa fa-2x fa-edit"></i>
              </td> 
              <td class="text-center" title="xóa bài viết">
                  <a href="set_admin/sinhvien/one_delete/{{$SV->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-times text-dange fa-2x"></i></a>
              </td>                                               
            </tr>
          @endforeach                          
          </tbody> 
        </table>  
      </div>
    </form>  
  </div>
<a href="set_admin/sinhvien/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection
@section('script')  
<script type="text/javascript">
$(document).on('change', '#bomon', function(){               
  var id_bomon=$(this).val();              
  $.get("set_admin/ajax/loadlop/"+id_bomon,function(data){
    $('#lop').html(data);
  });      
});

$(document).on('change', '#lop', function(){
  var id=$(this).val();
  window.location.href ='set_admin/sinhvien/list/'+id;             
});
</script>

@endsection
