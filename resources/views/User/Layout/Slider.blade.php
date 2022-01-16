



    <div class="fluid_container nonedesktop" style="height:320px;">        
         <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4" >
           @foreach ($Slider as $Sli) 
                     <div data-thumb="ht96_image/slider/{{$Sli->hinhanh}}" data-src="ht96_image/slider/{{$Sli->hinhanh}}" data-link="{{$Sli->link}}">
                        <div class="camera_caption fadeFromBottom"><?php $ten='ten_'.$lang; echo $Sli->$ten; ?></div>
                    </div>                
            @endforeach  
        </div>
    </div>


<div class="fluid_container nonepad nonephone" style="background:#E95A13;height:520px;">  
    <div class="container">         
        <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_5" style="margin-bottom:0!important;">
           @foreach ($Slider as $Sli) 
                     <div data-thumb="ht96_image/slider/{{$Sli->hinhanh}}" data-src="ht96_image/slider/{{$Sli->hinhanh}}" data-link="{{$Sli->link}}">
                        <div class="camera_caption fadeFromBottom"><?php $ten='ten_'.$lang; echo $Sli->$ten; ?><em><!-- {{$Sli->mota}} --></em></div>
                    </div>                
            @endforeach  
        </div>
    </div>     
</div>

    <style type="text/css">
        #camera_wrap_5{margin-bottom:0 !important;}
    </style>
