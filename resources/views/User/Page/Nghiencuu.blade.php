@extends('User.Index')
@section('title','Nghiêm cứu khoa học thuộc khoa')
@section('description','Các nghiên cứu khoa học thuộc khoa kỹ thuật và công nghệ trường đại học trà vinh')
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>



<div class="bomon">
 <section class="box2" style="margin-top:50px;">            
        <div class="container">
                <div class="row">
                    <div class="clear-fix"></div>
			@foreach($Capdetai as $CDT)           
                <?php 
                    $check = 0;
                    foreach ($Nghiencuu as $NCcc){
                        if($NCcc->id_capdetai==$CDT->id)
                            $check = 1;
                    }
                ?>
                
                @if($check == 1)      
                    <p class="section-title wow fadeInUp text-center upper bold text-center" style="margin-top:20px;"> 
                        <span style="color:#E95A13;font-size:25px;"><?php $ten='ten_'.$lang;echo $CDT->$ten;?></span>
                    </p>                    
                    @foreach($Nghiencuu as $NC)                    
                    	@if($NC->id_capdetai==$CDT->id)
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    	                        <div class="content new-small">
    	                            <article style="height: 100px">
    	                                <figure class="date">
    	                                    <i class="fa fa-file-o" style="color:#999"></i>&nbsp; &nbsp;{{ Carbon\Carbon::parse($NC->ngaynghiemthu)->toDayDateTimeString()}}
    	                                </figure> 
    	                                 <header>
    	                                   <a href="{{ trans('Link.chitietdetai') }}/{{$NC->id}}.html" target="_blank">

                                            <p class="maubaibao bold">
                                            <span class="mauten"><?php $ten='ten_'.$lang;echo $NC->$ten; ?></span> - 
                                            <span class="mautacgia">
                                                <?php $chunhiem='';?>
                                                @foreach($CT_detai as $ctdt)
                                                    @if($NC->id==$ctdt->id_detai && $ctdt->trachnhiem->id==2)
                                                        @if ($ctdt->giangvien)
                                                            <?php $chunhiem.=$ctdt->giangvien->ten.',';?>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            <?php $chunhiem=rtrim($chunhiem,',');?>
                                            {{$chunhiem}}                                            
                                            </span> - 
                                                {{trans('Nhansu.nam')}}:
                                                <span class="maunxb">{{date('Y', strtotime($NC->ngaynghiemthu))}}</span>
                                            </p>

                                           </a>
    	                                </header>                              
    	                            </article>  
    	                        </div>
                             </div>
                        @endif    
                    @endforeach 
                    <div style="clear:both;"></div>
                @endif
             @endforeach
            </div>
        </div>
        
 </section>
</div>




@endsection