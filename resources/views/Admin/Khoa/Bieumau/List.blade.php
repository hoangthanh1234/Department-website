@extends('Admin.Master')
@section('title','danh sách biểu mẫu')
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
                if (hoi==true) document.location = "set_admin/bieumau/multi_delete/" + listid;
            });
      });
</script>


<div class="h3 padding20 text-center">Danh sách biểu mẫu</div>
    <div class="box">
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
          <table id="example2" class="table table-bordered table-hover" style="min-width:1200px;width: 100%">
            <thead>                 
              <tr class="bg-top">
                <th width="3%" class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                <th width="3%" class="text-center">STT</th>
                <th width="10%" class="text-center">Xóa</th>
                <th>Tên</th>
                <th width="10%" class="text-center">Tập tin</th> 
              </tr>
            </thead>
            <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>   
            <tbody>   
            @foreach($Bieumau as $bm)                                  
              <tr>
                <td  class="text-center">
                  <input type="checkbox" name="chon" id="chon" value="{{$bm->id}}" class="chon" />
                </td>  
                <td align="center">
                  <input type="text" value="{{$bm->stt}}" data-val0="{{$bm->id}}" data-val1="ht96_bieumau"  data_val2="{{$bm->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự biểu mẫu"/>
                  <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                </td>
                <td class="text-center" title="xóa bài viết">
                    <a href="set_admin/bieumau/one_delete/{{$bm->id}}"><i class="fa fa-times text-dange fa-2x red"></i></a>
                </td> 
                <td>{{$bm->ten}}</td> 
                <td class="text-center"><a href="ht96_bieumau/{{$bm->file}}" target="_blank">Xem</a></td>
              </tr> 
            @endforeach                          
            </tbody> 
          </table>  
        </div>
      </form>  
    </div>          
  <a href="set_admin/bieumau/add"><button class=" btn btn-success btn2">Thêm</button></a>
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
    window.location.href ='set_admin/ketquathi/list/'+id;             
});
</script>
@endsection
