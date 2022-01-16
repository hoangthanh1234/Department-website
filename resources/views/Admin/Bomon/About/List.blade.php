@extends('Admin.Master')
@section('title','danh sách giới thiệu')
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
                listid=listid.substr(1);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true) document.location = "set_bomon/about/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách giới thiệu</div>
    <div class="box">   

             <div class="container" style="max-width:500px;margin-top:20px;">
                   @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                  @endif
             </div>

            <div class="box-body">              
                      <form name="frm" method="post" action="" enctype="multipart/form-data">
                          <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                          <th width="5%" class="text-center">STT</th>                      
                                          <th width="10%" class="text-center">Ẩn / Hiện</th>                                  
                                          <th width="10%" class="text-center">Hành động</th>
                                           <th>Tên</th>  
                                      </tr>
                                  </thead>  
                                  <tfoot>   
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>                                   
                                  </tfoot> 
                                  <tbody>   
                                  @foreach($About as $Abo)                                  
                                      <tr>
                                              <td  class="text-center">
                                                <input type="checkbox" name="chon" id="chon" value="{{$Abo->id}}" class="chon" />
                                              </td>

                                               <td align="center">
                                                     <input type="text" value="{{$Abo->stt}}" data-val0="{{$Abo->id}}" data-val1="ht96_about"  data_val2="{{$Abo->stt}}"  name="ordering[]" class="tipS smallText thanhtt" title="Nhập số thứ tự bài viết"  />
                                                     <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                                               </td>   

                                               
                                                <td class="text-center">
                                                  <?php $f=($Abo->hienthi==1)?"diamondToggleOffbomon":""; ?>
                                                       <a data-val2="ht96_about" rel="{$Abo->hienthi}" data-val3="hienthi" class="checktt diamondTogglebomon <?=$f;?>"  data-val0="{{$Abo->id}}" ></a>   
                                                </td>

                                                <td class="text-center">                                                   
                                                  <a title="Sửa bài viết"href="set_bomon/about/edit/{{$Abo->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                
                                                  <a href="set_bomon/about/one_delete/{{$Abo->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class=" btn btn-danger"><i class="fa fa-times text-dange"></i></a>
                                                </td> 

                                                <td>{{$Abo->ten_vi}}</td>                                                
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          </div>
                        </form>  
            </div>
          
                      <div class="paging text-center">{!! $About->links() !!}</div>
            <a href="set_bomon/about/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



@section('script')

<script type="text/javascript">
  $(document).on('change','.thanhtt',function(){     
       $.get('set_bomon/ajax/stt/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val1")+'/'+$(this).val());
  });
</script>

@endsection