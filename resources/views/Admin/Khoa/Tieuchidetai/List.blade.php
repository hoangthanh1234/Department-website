@extends('Admin.Master')
@section('title','danh sách tiêu chí đề tài')
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
                if (hoi==true) document.location.href = "set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách tiêu chí đề tài</div>
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
        <th width="10%" class="text-center">Sửa</th>
        <th width="10%" class="text-center">Xóa</th>                                
        <th>Tên</th>  
        <th width="10%" class="text-center">Điểm</th>
        <th width="10%" class="text-center">Giờ</th>

        <th width="10%" class="text-center">ĐVT</th>
        <th width="10%" class="text-center">Cấp DT</th>
        <th width="15%" class="text-center">Trách nhiệm</th> 
        <th width="25%" class="text-center">> 6th</th>
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
          <input type="text" value="{{$TC->stt}}" data-val0="{{$TC->id}}" data-val1="ht96_tieuchi_nckh_detai"  data_val2="{{$TC->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
          <div id="ajaxloader">
            <img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" />
          </div>
        </td>  

        <td class="text-center">
          <?php $f=($TC->hienthi==1)?"diamondToggleOff":""; ?>
          <a data-val2="ht96_tieuchi_nckh_detai" rel="{$TC->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$TC->id}}"></a>   
        </td>
        <td class="text-center">                                                   
          <a title="Sửa bài viết" href="set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/edit/{{$TC->id}}"><i class="fa fa-2x fa-edit"></i></a>
        </td> 

        <td class="text-center" title="xóa bài viết">
          <a href="set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/one_delete/{{$TC->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;">
            <i class="fa fa-times text-dange fa-2x"></i>
          </a>
        </td> 
        <td title="{{$TC->ten}}"><?php echo substr($TC->ten,0,120);?></td> 
        <td class="text-center">{{$TC->diem}}</td>  
        <td class="text-center">{{$TC->gio}}</td>  
        <td class="text-center">{{$TC->donvitinh}}</td>
        <td class="text-center">{{$TC->capdetai->ten_vi}}</td>
        <td class="text-center">{{$TC->trachnhiem->ten_vi}}</td>  
        <td class="text-center">@if($TC->tren6thang == 1) Có @else Không @endif</td>
      </tr>  
      @endforeach                          
     </tbody> 
    </table>

    </div>      
</div>
<a href="set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
</div>

@endsection



