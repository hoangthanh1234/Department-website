@extends('Admin.Master')
@section('title','danh sách thành viên ban tư vấn chương trình')
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
                if (hoi==true) document.location = "set_bomon/bantuvan/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách thành viên ban tư vấn chương trình</div>
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
                            <table id="example2" class="table table-bordered table-hover" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center"><input type="checkbox"  name="chonhet" id="chonhet" /></th>
                                          <th width="5%" class="text-center">STT</th>  
                                          <th width="10%" class="text-center">Hành động</th>               
                                          <th width="20%" class="text-center">Tên</th>                                          
                                          <th width="10%" class="text-center">Email</th>
                                          <th width="10%" class="text-center">Điện thoại</th>
                                          <th width="15%" class="text-center">Đơn vị công tác</th> 
                                      </tr>
                                  </thead>  

                                  <tfoot>
                                    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>  
                                    <th></th>
                                    <th></th>
                                    <th></th>                                   
                                  </tfoot> 

                                  <tbody>   
                                  @foreach($Bantuvan as $btv)                                  
                                      <tr>
                                              <td  class="text-center">
                                            	       <input type="checkbox"  name="chon" id="chon" value="{{$btv->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$btv->stt}}" data-val0="{{$btv->id}}" data-val1="ht96_bantuvan"  data_val2="{{$btv->stt}}"  name="ordering[]" class="tipS smallText update_sttbm" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>  

                                               <td class="text-center">                                                   
                                                  <a title="Sửa bài viết" href="set_bomon/bantuvan/edit/{{$btv->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                
                                                  <a href="set_bomon/bantuvan/one_delete/{{$btv->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class=" btn btn-danger"><i class="fa fa-times text-dange"></i></a>
                                               </td> 

                                               <td>{{$btv->ten}}</td>
                                              
                                               <td>{{$btv->email}}</td>  
    
                                               <td>{{$btv->dienthoai}}</td>
                                              
                                               <td>{{$btv->donvicongtac}}</td>                                             
                                                
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table> 
                        </div> 
                        </form>  
            </div>
          
                      <div class="paging text-center">{!! $Bantuvan->links() !!}</div>
            <a href="set_bomon/bantuvan/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



@section('script')
<script type="text/javascript">
  $(document).on('change','#bomon',function(){
     var id=$(this).val();
      window.location="set_bomon/bantuvan/list/"+id;
  });
</script>
@endsection