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
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true) document.location = "set_bomon/giangvien/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách giảng viên thuộc bộ môn <?php if(isset($Giangvien)) echo $Giangvien[0]->bomon->ten_vi; ?></div>
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
                            <table id="example2" class="table table-bordered table-hover" width="100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="5%">STT</th>                 
                                          <th width="20%">Tên giảng viên</th>                                          
                                          <th width="10%">Giới tính</th>
                                          <th width="10%">Ngày sinh</th>
                                          <th width="15%">Trình độ</th> 
                                          <th width="15%">Chức vụ</th>          
                                          <th width="10%" style="text-align:center;">Chi tiết</th>
                                          <!-- <th width="10%" style="text-align:center;">Xóa</th> --> 
                                      </tr>
                                  </thead>  

                                  <tfoot>
                                   <!--  <th></th> -->
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>  
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tfoot> 

                                  <tbody>   
                                  @foreach($Giangvien as $GV)                                  
                                      <tr>
                                              <td  style="text-align:center;">
                                            	       <input type="checkbox"  name="chon" id="chon" value="{{$GV->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$GV->stt}}" data-val0="{{$GV->id}}" data-val1="ht96_giangvien"  data_val2="{{$GV->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>   

                                            <td> {{$GV->ten}}</td>
                                              
                                               <td>@if ($GV->gioitinh==1) Nam @else Nữ @endif</td>  
    
                                               <td>{{ \Carbon\Carbon::parse($GV->ngaysinh)->format('d/m/Y')}}</td>
                                              
                                               <td>{{$GV->trinhdo->ten_vi}}</td>

                                               <td>{{$GV->chucvu->ten_vi}}</td>
                                                 <td class="text-center">                                                   
                                                      <a title="Sửa bài viết" href="set_bomon/giangvien/edit/{{$GV->id}}"><img src="ht96_admin/media/images/edit1.png"  border="0"/>
                                                 </td> 

                                          		  <!--  <td class="text-center" title="xóa bài viết">
                                                  			<a href="set_bomon/giangvien/one_delete/{{$GV->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><img src="ht96_admin/media/images/delete1.gif" />
                                                  			</a>
                                                  </td> -->
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          </div>
                        </form>  
            </div>
          
                    <!--  -->
          <!--   <a href="set_bomon/giangvien/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button> -->
         
    @endsection



