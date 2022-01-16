@extends('Admin.Master')
@section('title','Danh sách lớp')
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
        if (hoi==true) document.location.href = "set_admin/lop/multi_delete/" + listid;
      });
});
</script>

<div class="h3 padding20 text-center">Danh sách lớp</div>
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
        <b class="ten2x">Chọn bộ môn</b><br>
        <select id="bomon" class="form-control select2">
          <option value="0">Chọn bộ môn</option>
            @foreach($Bomon as $BM)
              <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
            @endforeach
          </select>
       </div>
   </div>
<form name="frm" method="post" action="" enctype="multipart/form-data">
  <div class="table-responsive">
  <table class="table table-bordered table-hover example2" style="width:100%">
    <thead>                 
      <tr class="bg-top">
        <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th width="10%" class="text-center">Mã lớp</th>
        <th width="10%" class="text-center">Hành động</th>       
        <th class="text-center">Tên lớp</th> 
        <th class="text-center">Năm bắt đầu</th>
        <th class="text-center">Tốt nghiệp</th>
        <th class="text-center" width="20%">Bộ môn</th>
        <th class="text-center" width="10%">Bậc đào tạo</th>
        <th class="text-center" width="8%">Ngoài khoa</th>
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
        <td class="text-center"></td>
      </tr>
    </tfoot> 
    <tbody>   
    @foreach($Lop as $L)                                  
    <tr>
      <td class="text-center">
        <input type="checkbox" name="chon" id="chon" value="{{$L->id}}" class="chon" />
      </td>  
      <td class="text-center">{{$L->malop}}</td>  
      <td class="text-center">                                                   
        <a title="Sửa bài viết" href="set_admin/lop/edit/{{$L->id}}" class="btn btn-warning"><i class="fa fa-edit white"></i></a>    
        <a href="set_admin/lop/one_delete/{{$L->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times text-dange white"></i></a>
      </td>                                           
      <td>{{$L->tenlop}}</td>
      <td class="text-center">{{$L->nambatdau}}</td>
      <td class="text-center">
        <?php $f=($L->totnghiep==1)?"diamondToggleOff":""; ?>
        <a data-val2="ht96_lop" rel="{{$L->totnghiep}}" data-val3="totnghiep" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$L->id}}" ></a>        
      </td>
      <td class="text-center">{{$L->bomon->ten_vi}}</td>
      <td class="text-center">{{$L->bacdaotao->ten_vi}}</td> 
      <td class="text-center">@if($L->ngoaikhoa == 1) Có @else Không @endif</td>
    </tr>  
  @endforeach                          
  </tbody> 
</table> 
</div> 
</form>  
</div>
<a href="set_admin/lop/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection
@section('script')
<script type="text/javascript">
  $(document).on('change','#bomon',function(){
     var id=$(this).val();
      window.location.href ="set_admin/lop/list/"+id;
  });
</script>
@endsection