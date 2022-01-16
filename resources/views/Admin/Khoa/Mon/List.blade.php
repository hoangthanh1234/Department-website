@extends('Admin.Master')
@section('title','danh sách môn học')
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
        });
        listid=listid.substr(1);   //alert(listid);
          if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
             hoi= confirm("Bạn có chắc chắn muốn xóa?");
          if (hoi==true) document.location.href = "set_admin/mon/multi_delete/" + listid;
        });
    });
</script>

<div class="h3 padding20 text-center">Danh sách môn học</div>
  <div class="box">  
    <div class="container" style="max-width:500px;margin-top:20px;">
      @if(session('thongbao'))
        <div class="alert alert-success">
          {{session('thongbao')}}
        </div>
       @endif
    </div>

  <div class="box-body"> 
    <div class="row padding20" style="padding-bottom:0;margin-bottom:20px;">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <b class="ten2x">Bậc đào tạo</b><br>
        <select id="bacdaotao" class="form-control select2">
          <option value="0">Chọn bậc đào tạo</option>
          @foreach ($Bacdaotao as $bac)
          <option value="{{$bac->id}}">{{$bac->ten_vi}}</option>
          @endforeach
        </select>
      </div>

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



<form name="frm" method="post" action="" enctype="multipart/form-data">
  <div class="table-responsive">
    <table class="table table-bordered table-hover example2" style="width: 100%">
      <thead>                 
        <tr class="bg-top">
          <th width="5%" class="text-center"><input type="checkbox"  name="chonhet" id="chonhet" /></th>
          <th width="5%" class="text-center">STT</th>      
          <th width="8%" class="text-center">Ẩn/Hiện</th>
          <th width="10%" class="text-center">Hành động</th>                  
          <th width="30%" class="text-center">Tên</th> 
          <th  class="text-center">File đề cương</th>
          <th width="5%" class="text-center">STC</th>
          <th width="20%" class="text-center">TQ</th>
          <th width="20%" class="text-center">SH</th>
          <th class="text-center">Nhóm</th>
          <th>Tự chọn</th>
          <th>Chuyên ngành</th>
          <th width="15%" class="text-center">Bậc ĐT</th>
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
          <th></th>
          <th></th>
        </tr>          
     </tfoot>
     <tbody>   
    @foreach($Mon as $Mo)                                  
      <tr>
        <td class="text-center">
          <input type="checkbox"  name="chon" id="chon" value="{{$Mo->id}}" class="chon" />
        </td>
        <td class="text-center">
          <input type="text" value="{{$Mo->stt}}" data-val0="{{$Mo->id}}" data-val1="ht96_mon"  data_val2="{{$Mo->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
          <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="{{ asset('ht96_admin/media/images/loader.gif') }}" alt="loader" /></div>
        </td>
        <td class="text-center">
          <?php $f=($Mo->hienthi==1)?"diamondToggleOff":""; ?>
          <a data-val2="ht96_mon" rel="{$Mo->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$Mo->id}}" ></a>   
        </td>
        <td class="text-center" style="display:inline-flex;"> 
          <a class="btn btn-link btn-warning" href="{{ asset('set_admin/mon/edit/'.$Mo->id) }}" title="Cập nhật" style="margin-right:10px;">
              <i class="fa fa-edit" style="color:white;"></i>
          </a>
           <a  class="btn btn-link btn-danger" href="{{ asset('set_admin/mon/one_delete/'.$Mo->id) }}" onClick="if(!confirm('Xác nhận xóa:')) return false;" title="Xóa">
              <i class="fa fa-times" style="color:white;" aria-hidden="true"></i>
           </a>
        </td> 

      
        <td>{{$Mo->ten_vi}}</td>
        <td>
          @if ($Mo->file)
            <a href="{{ $Mo->file }}">file</a>
          @else
              Chưa upload
          @endif
        </td>
        <td class="text-center"> {{$Mo->stc}}</td>  
        <td>
          <?php $tienquyet=explode(",",$Mo->tienquyet);?>
          @for ($i = 0; $i < count($tienquyet); $i++)
            @for ($j=0; $j < count($Mon); $j++)                                                        
              @if ($Mon[$j]->id==$tienquyet[$i])
                {{$Mon[$j]->ten_vi}} @if ($i < count($tienquyet)-1) -- @endif
              @endif
            @endfor
          @endfor
        </td>
        <td>
          <?php $songhanh=explode(",",$Mo->songhanh);?>
          @for ($i = 0; $i < count($songhanh); $i++)
            @for ($j=0; $j < count($Mon); $j++)                                                        
              @if ($Mon[$j]->id==$songhanh[$i])
                {{$Mon[$j]->ten_vi}} @if ($i < count($songhanh)-1) -- @endif
              @endif
            @endfor
          @endfor
        </td>
        <td>{{$Mo->nhommon->ten}}</td>  
        <td class="text-center">@if($Mo->tuchon == 0) Không @else Có @endif</td>   
        <td>{{$Mo->chuyennganh->ten_vi}}</td>  
        <td>{{$Mo->bacdaotao->ten_vi}}</td>
      </tr>  
    @endforeach                          
    </tbody> 
  </table>  
</div>
</form>  
</div>               
<a href="{{ asset('set_admin/mon/add') }}"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection
@section('script')
<script type="text/javascript">  
$(document).on('change','#bomon',function(){
  var bac=$('#bacdaotao').val();
  var bomon=$('#bomon').val();
  if(bac==0){alert('Vui lòng chọn bậc đào tạo');return false;}
  if(bomon==0){alert('Vui lòng chọn bộ môn hợp lệ');return false;}
  window.location.href ="set_admin/mon/list/"+bomon+"/"+bac;
});
</script>
@endsection