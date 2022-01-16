@extends('Admin.Master')
@section('title','Danh sách công việc giảng viên')
@section('content') 

<style type="text/css">
  .well-lg{padding:18px!important;}
</style>

<div class="h3 padding20 text-center">Danh sách công việc giảng viên {{$Giangvien->ten}}</div>
<div class="box">  

<div class="container" style="max-width:500px;margin-top:20px;">
   @if(session('thongbao'))
    <div class="alert alert-success">
      {{session('thongbao')}}
    </div>
  @endif
</div>

<div class="box-body">   
<a href="set_admin/congviec/add"><button class=" btn btn-success">Thêm công việc mới</button></a><br><br>

@foreach($Nhomcongviec as $ncv)
    <div class="panel panel-info">
      <div class="panel-heading">{{$ncv->ten}}</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">Chưa bắt đầu</div>
                  <div class="panel-body">                   
                    @foreach($ncv->congvieccbd as $cbd)
                      <div class="well well-lg">
                        <p><a href="set_admin/congviec/edit/{{$cbd->id}}">{{$cbd->ten}}</a></p>
                        <p>
                          <i class="fa fa-calendar" style="color:red;" aria-hidden="true"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($cbd->ngaybatdau)->format('d/m/Y')}}
                          &nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
                            {{ \Carbon\Carbon::parse($cbd->ngayketthuc)->format('d/m/Y')}}&nbsp;&nbsp;

                            <a  href="set_admin/congviec/{{$cbd->giangvien->tenkhongdau}}/{{$cbd->giangvien->id}}.html" style="color:green;">{{$cbd->giangvien->ten}}</a> &nbsp;&nbsp;

                            <a href="set_admin/congviec/one_delete/{{$cbd->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a>
                        </p>
                      </div>
                    @endforeach
                  </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-xs-12">
             <div class="panel panel-warning">
                <div class="panel-heading">Đang tiến hành</div>
                  <div class="panel-body">
                    @foreach($ncv->congviecdth as $dth)
                      <div class="well well-lg">
                        <p><a href="set_admin/congviec/edit/{{$dth->id}}">{{$dth->ten}}</a></p>
                        <p>
                          <i class="fa fa-calendar" style="color:red" aria-hidden="true"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($dth->ngaybatdau)->format('d/m/Y')}}
                          &nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
                            {{ \Carbon\Carbon::parse($dth->ngayketthuc)->format('d/m/Y')}}&nbsp;&nbsp;

                             <a href="set_admin/congviec/{{$dth->giangvien->tenkhongdau}}/{{$dth->giangvien->id}}.html" style="color:green;">{{$dth->giangvien->ten}}</a> &nbsp;&nbsp;

                          <a href="set_admin/congviec/one_delete/{{$dth->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a>
                        </p>
                      </div>
                    @endforeach
                  </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Hoàn thành</div>
                  <div class="panel-body">
                    @foreach($ncv->congviecht as $ht)
                      <div class="well well-lg">
                        <p><a href="set_admin/congviec/edit/{{$ht->id}}">{{$ht->ten}}</a></p>
                        <p>
                          <i class="fa fa-calendar" style="color:red" aria-hidden="true"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($ht->ngaybatdau)->format('d/m/Y')}}
                          &nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
                            {{ \Carbon\Carbon::parse($ht->ngayketthuc)->format('d/m/Y')}}&nbsp;&nbsp;

                             <a href="set_admin/congviec/{{$ht->giangvien->tenkhongdau}}/{{$ht->giangvien->id}}.html" style="color:green;">{{$ht->giangvien->ten}}</a> &nbsp;&nbsp;

                          <a href="set_admin/congviec/one_delete/{{$ht->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></a>
                        </p>
                      </div>
                    @endforeach
                  </div>
            </div>
          </div>
        </div>
      </div>
  </div>  
  @endforeach
</div> 
@endsection

  