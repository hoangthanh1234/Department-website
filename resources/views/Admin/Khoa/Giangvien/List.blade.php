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
                if (hoi==true) document.location.href = "set_admin/giangvien/multi_delete/" + listid;
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

              <div class="row" style="margin-bottom:20px;">
                <div class="col-lg-6">
                     <b class="ten2x">Chọn bộ môn</b><br>
                  <select id="bomon" class="form-control select2">
                    <option value="0">Chọn bộ môn</option>
                      @foreach($Bomon as $BM)
                        <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
                      @endforeach
                  </select>
                </div>
              </div>


                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center"><input type="checkbox"  name="chonhet" id="chonhet" /></th>
                                          <th width="5%">STT</th>  
                                          <th width="15%" class="text-center">Hành động</th>            
                                          <th >Tên giảng viên</th>        
                                          <th width="10%">Trạng thái</th>                                  
                                          <th width="10%" class="text-center">Giới tính</th>
                                          <th width="10%" class="text-center">Ngày sinh</th>
                                          <th width="10%" class="text-center">Trình độ</th> 
                                          <th width="10%" class="text-center">Chức vụ</th>                                         
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
                                    <th></th>
                                    <th></th>
                                  </tfoot> 

                                  <tbody>   
                                  @foreach($Giangvien as $GV)                                  
                                      <tr>
                                              <td  class="text-center">
                                            	   <input type="checkbox"  name="chon" id="chon" value="{{$GV->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$GV->stt}}" data-val0="{{$GV->id}}" data-val1="ht96_giangvien"  data_val2="{{$GV->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>
                                                
                                              <td class="text-center">                                                
                                                <a class="btn btn-link btn-warning" href="set_admin/giangvien/edit/{{$GV->id}}" title="Cập nhật thông tin">
                                                    <i class="fa fa-edit" style="color:white;"></i>
                                                </a>
                                                <a  class="btn btn-link btn-danger" href="set_admin/giangvien/one_delete/{{$GV->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" title="Xóa mục này">
                                                    <i class="fa fa-times" style="color:white;" aria-hidden="true"></i>
                                                </a>

                                                 <a  class="btn btn-link btn-success" href="set_admin/giangvien/mon-so-truong/{{$GV->id}}" title="Môn sở trường">
                                                    <i class="fa fa-anchor" style="color:white;" aria-hidden="true"></i>
                                                </a>

                                              </td> 

                                              <td> 
                                              <a href="set_admin/{{$GV->tenkhongdau}}/thong-tin-chung/1/{{$GV->id}}">{{$GV->ten}}</a></td>

                                              <td class="text-center">
                                                @if($GV->trangthai == 0 )
                                                  Đã nghĩ việc
                                                @endif
                                                @if($GV->trangthai == 1 )
                                                  Đang làm việc
                                                @endif
                                                @if($GV->trangthai == 2 )
                                                  Đang du học
                                                @endif
                                              </td>
                                              
                                               <td class="text-center">@if ($GV->gioitinh==1) Nam @else Nữ @endif</td>  
    
                                               <td class="text-center">{{ \Carbon\Carbon::parse($GV->ngaysinh)->format('d/m/Y')}}</td>
                                              
                                               <td class="text-center">
                                                 @if ($GV->trinhdo)
                                                 {{$GV->trinhdo->ten_vi}}
                                                 @endif
                                                 </td>

                                               <td class="text-center">
                                                @if ($GV->chucvu)
                                                {{$GV->chucvu->ten_vi}}
                                                @endif 
                                               
                                                </td>
                                                
                                        </tr>  
                                  @endforeach                          
                                  </tbody> 
                            </table> 
                        </div> 
                        </form>  
            </div>
          
                      
            <a href="set_admin/giangvien/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



@section('script')
<script type="text/javascript">
  $(document).on('change','#bomon',function(){
     var id=$(this).val();
      window.location.href ="set_admin/giangvien/list/"+id;
  });
</script>
@endsection