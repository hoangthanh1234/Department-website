@extends('Admin.Master')
@section('title','Danh sách phòng báo cáo nghiên cứu')
@section('content')  

<div class="h3 padding20 text-center">Danh sách phòng báo cáo nghiên cứu</div>
    <div class="box">
      <div class="container" style="max-width:500px;margin-top:20px;">
          @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
             </div>
          @endif
      </div>

  <div class="box-body"> 
    <div class="row" style="margin-bottom:20px;">
      <div class="col-lg-6">
        <b class="ten2x">Chọn loại phòng</b><br>
        <select id="id_loaiphong" class="form-control select2" required>   
          <option value="0">Chọn</option>       
            @foreach($Loaiphong as $lp)
              <option value="{{$lp->id}}">{{$lp->ten_vi}}</option>
            @endforeach
          </select>
       </div>
   </div>
<form name="frm" method="post" action="" enctype="multipart/form-data">
  <div class="table-responsive">
  <table class="table table-bordered table-hover example2" style="width:100%">
    <thead>                 
      <tr class="bg-top">
        <th width="5%" class="text-center">#</th>
        <th class="text-center" width="10%">Hành động</th>
        <th width="10%" class="text-center">Sức chứa</th>
        <th class="text-center">Mã phòng</th>                
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>        
      </tr>
    </tfoot> 
    <tbody>   
      @php
        $i=1;
      @endphp
    @foreach($Phong as $p)                                  
    <tr>
      <td class="text-center">{{$i++}}</td>  
      <td class="text-center">                                                   
        <a title="Sửa bài viết" href="set_admin/nhom-nghien-cuu/phong/edit/{{$p->id}}" class="btn btn-warning"><i class="fa fa-edit white"></i></a>    
        <a href="set_admin/nhom-nghien-cuu/phong/one_delete/{{$p->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times text-dange white"></i></a>
      </td> 
      <td class="text-center">{{$p->soluong}}</td>                                                  
      <td>{{$p->ma}}</td>      
    </tr>  
  @endforeach                          
  </tbody> 
</table> 
</div> 
</form>  
</div>
<a href="set_admin/nhom-nghien-cuu/phong/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection
@section('script')
<script type="text/javascript">
  $(document).on('change','#id_loaiphong',function(){
     var id=$(this).val();
      window.location.href ="set_admin/nhom-nghien-cuu/phong/list/"+id;
  });
</script>
@endsection