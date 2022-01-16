@extends('Admin.Master')
@section('title','danh sách phân công chủ nhiệm')
@section('content')  


<div class="h3 padding20 text-center">Danh sách phân công chủ nhiệm</div>
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
  </div>  
<div class="container" style="max-width:500px;margin-top:20px;">
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
  <form name="frm" method="post" action="" enctype="multipart/form-data">
  <div class="table-responsive">                          
    <table id="example2" class="table table-bordered table-hover" style="min-width:1200px;width: 100%">
      <thead>                 
        <tr class="bg-top">
          <th class="text-center" width="10%">Hành động</th>
          <th class="text-center">Tên lớp</th>
          <th class="text-center">Chủ nhiệm</th>                                               
        </tr>
      </thead>
      <tfoot>
        <tr>          
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>   
      <tbody>   
      @foreach($Phancongchunhiem as $pccn)                                  
        <tr>
          <td class="text-center">
            <a href="set_admin/phan-cong-chu-nhiem/edit/{{$pccn->id}}" class="btn btn-warning"><i class="fa fa-edit white"></i></a>

            <a href="set_admin/phan-cong-chu-nhiem/one_delete/{{$pccn->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times white"></i></a>
          </td> 
          <td>{{$pccn->lop->tenlop}}</td> 
         <td class="text-center">{{$pccn->giangvien->ten}}</td>
        </tr> 
      @endforeach                          
      </tbody> 
    </table>  
  </div>
</form>  
</div>
<a href="set_admin/phan-cong-chu-nhiem/add"><button class=" btn btn-success btn2">Thêm</button></a>

<a href="set_admin/phan-cong-chu-nhiem/export/{{$id_bomon}}"><button class=" btn btn-warning btn2">Xuất PDF</button></a>
@endsection
@section('script')  
<script type="text/javascript">

  $(document).on('change', '#bomon', function(){
    var id=$(this).val();             
     window.location.href ='set_admin/phan-cong-chu-nhiem/list/'+id;             
  });

</script>
@endsection
