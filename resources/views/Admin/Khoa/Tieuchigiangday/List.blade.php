@extends('Admin.Master')
@section('title','danh sách tiêu chí giảng dạy')
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
                if (hoi==true) document.location.href = "set_admin/tieu-chi/giang-day/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách Tiêu chí</div>
<div class="box">   

<div class="container" style="max-width:500px;margin-top:20px;">
@if(session('thongbao'))
  <div class="alert alert-success">
    {{session('thongbao')}}
  </div>
@endif
</div>

<div class="box-body"> 
   <div class="table-responsive">
  <table id="example2" class="table table-bordered table-hover" style="width:100%;">
    <thead>                 
      <tr class="bg-top">
        <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th width="5%">STT</th>        
        <th>Hiện</th>              
        <th width="15%" class="text-center">Hành động</th>                  
        <th>Tên</th>  
        <th width="10%" class="text-center">Điểm</th>
        <th width="10%" class="text-center">ĐVT</th>
        <th width="8%" class="text-center">Loại minh chứng</th>
      </tr>
    </thead> 
    <tfoot>
      <tr>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
      </tr>
    </tfoot>  
    <tbody>   
    @foreach($Tieuchi as $TC)                                  
      <tr>
        <td  class="text-center">
          <input type="checkbox" name="chon" id="chon" value="{{$TC->id}}" class="chon"/>
        </td>   

        <td align="center">
          <input type="text" value="{{$TC->stt}}" data-val0="{{$TC->id}}" data-val1="ht96_tieuchi_giangday"  data_val2="{{$TC->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
          <div id="ajaxloader">
            <img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" />
          </div>
        </td>  

        <td class="text-center">
          <?php $f=($TC->hienthi==1)?"diamondToggleOff":""; ?>
          <a data-val2="ht96_tieuchi_giangday" rel="{$TC->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$TC->id}}"></a>   
        </td>
         <td class="text-center">                                                   
            <a data-toggle="tooltip" title="Cập nhật tiêu chí" href="set_admin/tieu-chi/giang-day/edit/{{$TC->id}}" class="btn btn-warning">
              <i class="fa fa-edit"></i>
            </a>
                  
            <a href="set_admin/tieu-chi/giang-day/one_delete/{{$TC->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">   <i class="fa fa-times"></i>
            </a>
         </td>         
        <td title="{{$TC->ten}}"><?php echo substr($TC->ten,0,120);?></td> 
        <td class="text-center">{{$TC->diem}}</td>  
        <td class="text-center">{{$TC->donvitinh}}</td>
        <td class="text-center">{{$TC->loaiminhchung}}</td>
      </tr>  
      @endforeach                          
     </tbody> 
    </table>  
    </div>    
</div>
<a href="set_admin/tieu-chi/giang-day/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
</div>

@endsection



