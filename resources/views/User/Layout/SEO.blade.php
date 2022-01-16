<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@if(isset($Infor))
<link rel="shortcut icon" href="ht96_image/logo.png" type="image/x-icon" />
<meta name="author" content="<?php $ten='ten_'.$lang;echo $Infor->$ten; ?>" />
<meta name="copyright" content="<?php $ten='ten_'.$lang;echo $Infor->$ten; ?> - {!! $Infor->email !!}" />
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<!--Meta Geo-->
<meta name="geo.region" content="VN-TV" />
<meta name="geo.position" content="<?=str_replace(',',':',$Infor->toado)?>" />
<meta name="ICBM" content="<?=$Infor->toado?>" />
@endif
<!--Meta Geo-->
<!--Meta Ngôn ngữ-->
<meta name="language" content="Việt Nam">
<meta http-equiv="content-language" content="{{Session::get('language')}}" />
<meta content="Vietnamese" name="geo.region" />
<meta name="DC.language" scheme="utf-8" content="vi" />
<!--Meta Ngôn ngữ-->
<!--Meta seo web-->



