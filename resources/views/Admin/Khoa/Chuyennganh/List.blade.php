@extends('Admin.Master')
@section('title','danh sách chuyên ngành')
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
                if (hoi==true) document.location.href = "set_admin/chuyen-nganh/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách chuyên ngành</div>
    <div class="box">   

             <div class="container" style="max-width:500px;margin-top:20px;">
                   @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                  @endif
             </div>

            <div class="box-body">  

            <div class="row">
              <div class="col-lg-6">
                <label class="ten2x">Chọn bộ môn</label>
                <select class="form-control" id="chonbomon">
                    <option value="0">Chọn bộ môn</option>
                  @foreach($Bomon as $bm)
                    <option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <br>
              

                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                          <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center">
                                            <input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="10%" class="text-center">Hành động</th>            
                                          <th class="text-center">Tên</th>         
                                          <th class="text-center">Bộ môn</th>                                 
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                  @foreach($Chuyennganh as $cn)                                  
                                    <tr>
                                        <td class="text-center">
                                            	<input type="checkbox" name="chon" id="chon" value="{{$cn->id}}" class="chon" />
                                        </td>                                          
                                        <td class="text-center">                                                   
                                          <a title="Cập nhật" class="btn btn-warning" href="set_admin/chuyen-nganh/edit/{{$cn->id}}">
                                            <i class="fa fa-edit"></i>
                                          </a>   
                                            <a href="set_admin/chuyen-nganh/one_delete/{{$cn->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                                              <i class="fa fa-times text-dange"></i>
                                             </a>
                                        </td>
                                        <td>{{$cn->ten_vi}}</td> 
                                        <td>{{$cn->bomon->ten_vi}}</td>
                                      </tr>  
                                    @endforeach                          
                                    </tbody> 
                            </table> 
                          </div> 
                        </form>  
            </div>                     
      <a href="set_admin/chuyen-nganh/add"><button class=" btn btn-success btn2">Thêm</button></a>
      <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>         
    @endsection


    @section('script')

      <script type="text/javascript">
        $(document).on('change','#chonbomon',function(){
          var id = $(this).val();

          window.location.href = "set_admin/chuyen-nganh/list/"+id;

        });
      </script>
    @endsection



