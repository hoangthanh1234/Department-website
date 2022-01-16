@extends('Admin.Master')
@section('title','danh sách thông báo')
@section('content')  

<script type="text/javascript">
$(document).ready(function(){
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
    if (hoi==true) document.location.href = "set_admin/thongbao/multi_delete/" + listid;
            });
  });
</script>

<div class="h3 padding20 text-center">Danh sách Thông báo</div>
    <div class="box">   
      <div class="container" style="max-width:500px;margin-top:20px;">
          @if(session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
          @endif
      </div>

           <div class="row padding20">
                <div class="col-lg-4 col-md-6 col-xs-12">
                   <b class="ten2x">Bộ môn</b><br>
                    <select class="form-control select2" id="chonbm">
                      <option value="0"> Chọn Bộ môn</option>
                      @foreach($Bomon as $bm)
                        <option value="{{$bm->id}}" @if($bm->id==$bmm) selected @endif>{{$bm->ten_vi}}</option>
                      @endforeach
                    </select>
                   <br/> 
                </div>
            </div>

            <div class="box-body">              
                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                          
                            <table class="table table-bordered table-hover example2" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="5%" class="text-center">STT</th>  
                                          <th width="10%" class="text-center">Ẩn / Hiện</th>
                                          <th width="10%" class="text-center">Hành động</th>      
                                          <th width="30%">Tên</th>  
                                          <th width="10%" class="text-center">Danh mục</th>
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
                                    </tr>
                                  </tfoot>
                                  <tbody>   
                                  @foreach($Thongbao as $TB)                                  
                                      <tr>
                                              <td class="text-center">
                                                     <input type="checkbox" name="chon" id="chon" value="{{$TB->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$TB->stt}}" data-val0="{{$TB->id}}" data-val1="ht96_thongbao"  data_val2="{{$TB->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>

                                                <td class="text-center">
                                                  <?php $f=($TB->hienthi==1)?"diamondToggleOff":""; ?>
                                                       <a data-val2="ht96_thongbao" rel="{$TB->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$TB->id}}" ></a>   
                                                </td>

                                                <td class="text-center">                                                   
                                                      <a title="Sửa bài viết" href="set_admin/thongbao/edit/{{$TB->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                
                                                      <a title="Xóa bài viết" href="set_admin/thongbao/one_delete/{{$TB->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times"></i>
                                                        </a>
                                                  </td>   

                                               <td>{{$TB->ten_vi}}</td>  
                                               <td class="text-center">{{$TB->danhmuc->ten_vi}}</td>
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          
                        </form>  
            </div>
          
                    
            <a href="set_admin/thongbao/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection


  @section('script')
    <script type="text/javascript">
        $(document).on('change','#chonbm',function(){
          var id =$(this).val();
          if(id!=0)
            window.location.href ="set_admin/thongbao/list/"+id;
        });
    </script>
  @endsection

