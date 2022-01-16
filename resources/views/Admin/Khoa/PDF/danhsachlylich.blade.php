@extends('Admin.Master')
@section('title','danh sách giảng viên')
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
                hoi= confirm("Bạn có chắc chắn muốn xuất PDF theo check chọn không?");
                if (hoi==true) window.open("set_admin/PDF/lylichkhoahoc/chitietlylich/" + listid);
            });

            $("#xoahet2").click(function(){
                var listid="";
                $("input[name='chon']").each(function(){
                  if (this.checked) listid = listid+","+this.value;
                  })
                listid=listid.substr(1);   //alert(listid);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xuất PDF tiếng Anh theo check chọn không?");
                if (hoi==true) window.open("set_admin/PDF/lylichkhoahoc/chitietlylichen/" + listid);
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách giảng viên</div>
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
                            <table id="example2" class="table table-bordered table-hover">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="5%">STT</th>
                                          <th>Tên</th>
                                          <th>Bộ môn</th>
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                  	<?php $h=1; ?>
                                  @foreach($Giangvien as $gv)                                  
                                      <tr>
                                          <td  style="text-align:center;">
                                          <input type="checkbox" name="chon" id="chon" value="{{$gv->id}}" class="chon" />
                                          </td>
											                     <td class="text-center"><?php echo $h++; ?></td>
                                               <td>{{$gv->ten}}</td> 
                                               <td>{{$gv->bomon->ten_vi}}</td>
                                       </tr>  
                                  @endforeach                          
                                    </tbody> 
                            </table> 
                          </div> 
                        </form>  
            </div>           
            <button class=" btn btn-success  btn2" id="xoahet">Xuất PDF</button>
             <button class=" btn btn-success  btn2" id="xoahet2">Xuất PDF (EN)</button>
         
    @endsection



