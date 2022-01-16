@extends('Admin.Master')
@section('title','danh sách chương trình')
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
                if (hoi==true) document.location.href = "set_admin/chuong-trinh/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách Chương trình đào tạo</div>
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
                            <table class="table table-hover example2" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center"><input type="checkbox"  name="chonhet" id="chonhet" /></th>
                                          <th width="5%" class="text-center">STT</th> 
                                          <th width="10%" class="text-center">Hiển thị</th>
                                          <th width="10%" class="text-center">Hành động</th>     
                                          <th>Tên chương trình</th> 
                                          <th width="10%" class="text-center">Hệ đào tạo</th>
                                          <th width="10%" class="text-center">Bậc đào tạo</th>
                                          <th width="15%" class="text-center">Bộ môn</th>
                                          <th width="10%" class="text-center">Hình ảnh</th> 

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
                                      </tr>
                                  </tfoot> 
                                  <tbody>   
                                  @foreach($Chuongtrinh as $CT)                                  
                                      <tr>
                                              <td class="text-center">
                                            	   <input type="checkbox"  name="chon" id="chon" value="{{$CT->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                  <input type="text" value="{{$CT->stt}}" data-val0="{{$CT->id}}" data-val1="ht96_chuongtrinh"  data_val2="{{$CT->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                                                  <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>  
                                               <td class="text-center">
                                                  <?php $f=($CT->hienthi==1)?"diamondToggleOff":""; ?>
                                                       <a data-val2="ht96_chuongtrinh" rel="{$CT->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$CT->id}}" ></a>   
                                                </td>                                                

                                              <td>
                                                  
                                                <a class="btn btn-link btn-warning" href="set_admin/chuong-trinh/cap-nhat-chuong-trinh/thong-tin-chung/{{$CT->id}}/1.html">
                                                     <i class="fa fa-edit" style="color:white;" title="Cập nhật danh sách tác giả"></i>
                                                </a>
                                                <a  class="btn btn-link btn-danger" href="set_admin/chuong-trinh/one_delete/{{$CT->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;">
                                                    <i class="fa fa-times" style="color:white;" aria-hidden="true"  title="Xóa đề tài này" data-toggle="tooltip"></i>
                                                </a>
                                              </td>                                                

                                                <td>{{$CT->ten_vi}}</td> 
                                                <td>{{$CT->hedaotao->ten_vi}}</td> 
                                                <td>{{$CT->bacdaotao->ten_vi}}</td>         
                                                <td>{{$CT->bomon->ten_vi}}</td>    
                                                <td class="text-center"><img src="ht96_image/chuongtrinh/{{$CT->hinhanh}}" style="width:80px; height:50px;"></td>           
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          </div>

                        </form>  
            </div>
          
           
            <a href="set_admin/chuong-trinh/them-chuong-trinh/thong-tin-chung/1.html"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



