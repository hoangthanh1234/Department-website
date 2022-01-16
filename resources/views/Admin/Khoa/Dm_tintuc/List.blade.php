@extends('Admin.Master')
@section('title','danh sách danh mục tin tức')
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

      listid=listid.substr(1);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location.href = "set_admin/dmtintuc/multi_delete/" + listid;
    });
  });
</script>

<div class="h3 padding20 text-center">Danh Mục Tin Tức</div>
    <div class="box">   

             <div class="container" style="max-width:500px;margin-top:20px;">
                   @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                  @endif
             </div>

            <div class="box-body">              
                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover example2" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="5%" class="text-center">STT</th>    
                                          <th width="8%" class="text-center">Ẩn / Hiện</th>
                                          <th width="10%" class="text-center">Hành động</th>                                              
                                          <th>Tên</th>   
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                  @foreach($Dm_tintuc as $Ca)                                  
                                      <tr>
                                              <td  class="text-center">
                                            	       <input type="checkbox" name="chon" id="chon" value="{{$Ca->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$Ca->stt}}" data-val0="{{$Ca->id}}" data-val1="ht96_dm_tintuc"  data_val2="{{$Ca->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>  
                                               <td class="text-center">
                                                  <?php $f=($Ca->hienthi==1)?"diamondToggleOff":""; ?>
                                                       <a data-val2="ht96_dm_tintuc" rel="{$Ca->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$Ca->id}}" ></a>   
                                                </td>

                                                <td class="text-center">                                                   
                                                      <a title="Cập nhật bài viết" href="set_admin/dmtintuc/edit/{{$Ca->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                
                                                        <a title="Xóa bài viết" href="set_admin/dmtintuc/one_delete/{{$Ca->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                  </td>
                                               <td>{{$Ca->ten_vi}}</td>                                                
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          </div>
                        </form>  
            </div>
          
                    
            <div class="text-left">
               <a href="set_admin/dmtintuc/add"><button class=" btn btn-success btn2">Thêm</button></a>
              <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
            </div>
           
         
    @endsection



