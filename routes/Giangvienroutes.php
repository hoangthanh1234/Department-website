<?php

Route::group(['middleware' => 'Isgiangvien'], function (){

Route::group(['prefix'=>'set_giangvien','namespace'=>'Admin\Giangvien'],function(){

Route::get('trang-chu.html',function(){
	return view('Admin.Trangchu');
});

Route::group(['prefix' => 'yeu-cau-thanh-vien'],function(){
	Route::get('list/{id}','YeucauthanhvienController@getList');
	Route::get('add/{id}','YeucauthanhvienController@getAdd');
	Route::post('add/{id}','YeucauthanhvienController@postAdd');
	Route::get('edit/{id}','YeucauthanhvienController@getEdit');
	Route::post('edit/{id}','YeucauthanhvienController@postEdit');
	Route::get('xoa/{id}','YeucauthanhvienController@getxoa');
});
  

Route::get('test','DanhgiaController@test');


Route::get('PDF/{id_phieu}','PDFController@export');
Route::get('PDF/lylichvi/{id}','PDFController@exportlylichvi');
Route::get('PDF/lylichen/{id}','PDFController@exportlylichen');

Route::get('/',function(){
	return view('Admin.Trangchu');
});

Route::group(['prefix'=>'testdrive'],function(){
	Route::get('list','TestdriveController@getList');
});

Route::group(['prefix' => 'dinh-huong-tu-chon'],function(){
	Route::get('danh-sach-lop','CTtuchonController@getDanhsachlop');
	Route::get('danh-sach-chi-tiet/{id}','CTtuchonController@getdanhsachchitiet');
	Route::get('them-chi-tiet/{id}','CTtuchonController@getAdd');
	Route::post('them-chi-tiet/{id}','CTtuchonController@postAdd');
	Route::get('cap-nhat-chi-tiet/{id}','CTtuchonController@getEdit');
	Route::post('cap-nhat-chi-tiet/{id}','CTtuchonController@postEdit');
	Route::get('xoa-chi-tiet/{id}','CTtuchonController@getXoa');

});




Route::group(['prefix'=>'ajax'],function(){

	Route::get('get-bac-by-hang-chuc-danh/{maHang}','AjaxController@get_bac_by_ma_hang');
	Route::get('get-he-so-luong-by-ma-bac/{maBac}', 'AjaxController@get_he_so_luong_by_ma_bac');
	Route::post('loadphong','AjaxController@loadphong');
	Route::get('luumonsotruong/{id_mon}','AjaxController@luumonsotruong');
	Route::get('xoamonsotruong/{id_mon}','AjaxController@xoamonsotruong');
	Route::get('loadmon/{id_bomon}','AjaxController@loadmon');

	Route::get('stt/{id}/{bang}/{value}','AjaxController@stt');
	Route::post('uploadminhchung','AjaxController@uploadminhchung');

	Route::post('uploadminhchunggiangdaylink','AjaxController@uploadminhchunggiangdaylink');
	Route::post('uploadminhchungbaibaolink','AjaxController@uploadminhchungbaibaolink');
	Route::post('uploadminhchungdetailink','AjaxController@uploadminhchungdetailink');
	Route::post('uploadminhchungkhaclink','AjaxController@uploadminhchungkhaclink');

	Route::post('uploadminhchunggiangdayfile','AjaxController@uploadminhchunggiangdayfile');
	Route::post('uploadminhchungbaibaofile','AjaxController@uploadminhchungbaibaofile');
	Route::post('uploadminhchungdetaifile','AjaxController@uploadminhchungdetaifile');
	Route::post('uploadminhchungkhacfile','AjaxController@uploadminhchungkhacfile');

	Route::post('phanhoibomon','AjaxController@phanhoibomon');
	Route::post('phanhoikhoa','AjaxController@phanhoikhoa');

	Route::post('phanhoibomonkhac','AjaxController@phanhoibomonkhac');
	Route::post('phanhoikhoakhac','AjaxController@phanhoikhoakhac');

	Route::get('get/{filename}','AjaxController@getfiledrive');

// phieu bai bao khoa hoc

	Route::post('themphieubaibao','AjaxController@themphieubaibao');
	Route::post('xoaphieubaibao','AjaxController@xoaphieubaibao');
	Route::post('themphieudetai','AjaxController@themphieudetai');
	Route::post('xoaphieudetai','AjaxController@xoaphieudetai');

// de tai nghien cuu
	Route::get('loadtacgiadetai/{id_detai}','HosoAjaxController@loadtacgiadetai');
	Route::post('themdetai','HosoAjaxController@themdetai');
	Route::get('xoadetai/{id}','HosoAjaxController@xoadetainghiencuu');
	Route::post('capnhatdetainghiencuu','HosoAjaxController@capnhatdetainghiencuu');
	Route::get('loadtextfiledetai/{id}','HosoAjaxController@loadtextfiledetai');
	Route::get('search/tendetai', 'HosoAjaxController@searchdetaiByName');
	Route::post('themtacgiadetai','HosoAjaxController@themtacgiadetai');
	Route::post('xoatacgiadetai','HosoAjaxController@xoatacgiadetai');
	Route::post('themtacgiadetaitest','HosoAjaxController@themtacgiadetaitest');

// bai bao khoa hoc
	Route::get('loadtacgia/{id_baibao}','HosoAjaxController@loadtacgia');
	Route::get('load_loaitacgia/{id_baibao}/{id_giangvien}','HosoAjaxController@load_loaitacgia');
	Route::post('thembaibao','HosoAjaxController@thembaibao');
	Route::post('capnhatbaibao','HosoAjaxController@capnhatbaibao');
	Route::get('xoabaibao/{id}','HosoAjaxController@xoabaibao');
	Route::post('themtacgiabaibao','HosoAjaxController@themtacgiabaibao');
	Route::post('xoatacgiabaibao','HosoAjaxController@xoatacgiabaibao');
	Route::post('themtacgiabaibaotest','HosoAjaxController@themtacgiabaibaotest');
	Route::get('loadtextfile/{id}','HosoAjaxController@loadtextfile');
	Route::get('search/name', 'HosoAjaxController@searchByName');
	Route::get('search/tenbaibao', 'HosoAjaxController@searchbaibaoByName');

//huong dan sau dai hoc
	Route::post('themhuongdansaudaihoc','HosoAjaxController@themhuongdansaudaihoc');
	Route::post('capnhathuongdansaudaihoc','HosoAjaxController@capnhathuongdansaudaihoc');
	Route::get('xoahuongdansaudaihoc/{id}','HosoAjaxController@xoahuongdansaudaihoc');
	Route::get('xoahuongdansaudaihochet/{id}','HosoAjaxController@xoahuongdansaudaihochet');

//Mon giang day
	Route::post('themmongiangday','HosoAjaxController@themmongiangday');
	Route::post('capnhatmongiangday','HosoAjaxController@capnhatmongiangday');
	Route::get('xoamongiangday/{id}','HosoAjaxController@xoamongiangday');
	Route::get('xoamongiangdayhet/{id}','HosoAjaxController@xoamongiangdayhet');

//Ngoại ngữ
	Route::post('themngoaingu','HosoAjaxController@themngoaingu');
	Route::post('capnhatngoaingu','HosoAjaxController@capnhatngoaingu');
	Route::get('xoangoaingu/{id}','HosoAjaxController@xoangoaingu');
	Route::get('xoangoainguhet/{id}','HosoAjaxController@xoangoainguhet');

//quá trình công tác
	Route::post('themcongtac','HosoAjaxController@themcongtac');
	Route::post('capnhatcongtac','HosoAjaxController@capnhatcongtac');
	Route::get('xoacongtac/{id}','HosoAjaxController@xoacongtac');
	Route::get('xoacongtachet/{id}','HosoAjaxController@xoacongtachet');

	// qua trinh dao tao
	Route::post('themdaotao','HosoAjaxController@themdaotao');
	Route::post('capnhatdaotao','HosoAjaxController@capnhatdaotao');
	Route::get('xoadaotao/{id}','HosoAjaxController@xoadaotao');
	Route::get('xoadaotaohet/{id}','HosoAjaxController@xoadaotaohet');
});

Route::group(['prefix'=>'giangvien'],function(){
	Route::get('edit/{id}','GiangvienController@getEdit');
	Route::post('edit/{id}','GiangvienController@postEdit');
	Route::get('mon-so-truong.html','GiangvienController@getmonsotruong');
});



Route::group(['prefix'=>'hoidap'],function(){
	Route::get('list','HoidapController@getList');
	Route::get('traloi/{id}','HoidapController@traloi');
	Route::post('traloi/{id}','HoidapController@posttraloi');
});

Route::group(['prefix'=>'phancongviec'],function(){

	Route::get('list','PhancongviecController@getList');
	Route::post('themkehoach','PhancongviecController@themkehoach');
	Route::get('loadkehoach/{id}','PhancongviecController@loadkehoach');

	Route::get('loadphancong/{id}','PhancongviecController@loadphancong');
	Route::post('uploadbaocao','PhancongviecController@uploadbaocao');
	Route::post('baocaobc1','PhancongviecController@baocaobc1');

	Route::get('loadchitietphancong/{id}','PhancongviecController@loadchitietphancong');

	Route::post('baocaoc2','PhancongviecController@baocaoc2');

	Route::post('goimail','PhancongviecController@Goimail');
	Route::get('duyetcap2/{id}','PhancongviecController@duyetcap2');
	Route::get('huyduyetcap2/{id}','PhancongviecController@huyduyetcap2');

	Route::get('loadlich','PhancongviecController@loadlich');
	Route::get('test',function(){
		return view('Admin.Giangvien.Phancongviec.test');
	});

	Route::get('{ten}/{id}.html','PhancongviecController@getChitietgiangvien');

	Route::get('chi-tiet-cong-viec/{id}','PhancongviecController@getchitietcongviec');

	Route::get('xoacongviec/{id}','PhancongviecController@xoacongviec');

	Route::get('testtin','PhancongviecController@gettesttin');

});

Route::group(['prefix' => 'danh-gia-vien-chuc'],function(){

	Route::group(['prefix' => 'giang-day'],function(){
		Route::get('{idtab}','DanhgiaController@getGiangday');
		Route::post('{idTab}','DanhgiaController@postGiangday');
	});

	Route::group(['prefix' => 'nghien-cuu-khoa-hoc'],function(){
		Route::get('{idtab}','DanhgiaController@getNghiencuukhoahoc');
	});

	Route::group(['prefix' => 'tieu-chi-khac'],function(){
		Route::get('{idtab}','DanhgiaController@getTieuchikhac');
		Route::post('{idTab}','DanhgiaController@postTieuchikhac');
	});
	Route::group(['prefix' => 'tu-danh-gia'],function(){
		Route::get('{idtab}','DanhgiaController@getTuDanhGia');
		Route::post('{idTab}','DanhgiaController@postTuDanhGia');
	});

	Route::get('quy-dinh/{id_tab}','DanhgiaController@getquydinh');
	Route::get('quy-dinh-khac/{id_tab}','DanhgiaController@getquydinhkhac');

});


Route::group(['prefix'=>'{ten}'],function(){
	Route::group(['prefix'=>'thong-tin-chung'],function(){
	Route::get('{idTab}','HosokhoahocController@getThongtin');
	Route::post('{idTab}','HosokhoahocController@postThongtin');
});

Route::group(['prefix'=>'qua-trinh-dao-tao'],function(){
	Route::get('{idTab}','HosokhoahocController@getDaotao');
});

Route::group(['prefix'=>'de-tai-nghien-cuu'],function(){
	Route::get('{idTab}','HosokhoahocController@getDetainghiencuu');
});

Route::group(['prefix'=>'bai-bao-khoa-hoc'],function(){
	Route::get('{idTab}','HosokhoahocController@getBaibaokhoahoc');
});

Route::group(['prefix'=>'huong-dan-sau-dai-hoc'],function(){
	Route::get('{idTab}','HosokhoahocController@getHuongdansaudaihoc');
});

Route::group(['prefix'=>'mon-giang-day'],function(){
	Route::get('{idTab}','HosokhoahocController@getMongiangday');
});

Route::group(['prefix'=>'qua-trinh-cong-tac-giang-day'],function(){
	Route::get('{idTab}','HosokhoahocController@getQuatrinhcongtacgiangday');
});

Route::group(['prefix'=>'ngoai-ngu'],function(){
	Route::get('{idTab}','HosokhoahocController@getngoaingu');
});

Route::group(['prefix'=>'xem-lai'],function(){
	Route::get('tieng-anh/{idTab}','HosokhoahocController@getXemlaien');
	Route::get('tieng-viet/{idTab}','HosokhoahocController@getXemlaivi');
});

});


Route::group(['prefix' => 'nhom-nghien-cuu'],function(){
	Route::get('dang-ky-nhom','NhomnghiencuuController@getdangkynhom');
	Route::post('dang-ky-nhom','NhomnghiencuuController@postdangkynhom');

	Route::get('danh-sach-nhom','NhomnghiencuuController@danhsachnhom');

	Route::get('them-thanh-vien/{id}','NhomnghiencuuController@getthemthanhvien');
	Route::post('them-thanh-vien/{id}','NhomnghiencuuController@postthemthanhvien');

	Route::get('danh-sach-thanh-vien/{id}','NhomnghiencuuController@danhsachthanhvien');

	Route::get('xoa-nhom/{id}','NhomnghiencuuController@xoanhom');
	Route::get('roi-nhom/{id}','NhomnghiencuuController@roinhom');
	Route::get('kich-nhom/{id_nhom}/{id_giangvien}','NhomnghiencuuController@kichnhom');

	Route::get('dang-ky-bao-cao/{id}','NhomnghiencuuController@getdangkybaocao');
	Route::post('dang-ky-bao-cao/{id}','NhomnghiencuuController@postdangkybaocao');

	Route::get('danh-sach-bai-bao-cao/{id}','NhomnghiencuuController@getdanhsachbaibaocao');
	Route::post('danh-sach-bai-bao-cao/{id}','NhomnghiencuuController@postdanhsachbaibaocao');

	Route::get('sap-lich/{id}','NhomnghiencuuController@getsaplich');
	Route::post('sap-lich/{id}','NhomnghiencuuController@postsaplich');

	Route::get('upload-file/{id}','NhomnghiencuuController@getuploadfile');
	Route::post('upload-file/{id}','NhomnghiencuuController@postuploadfile');

	Route::get('xoa-bao-cao/{id}','NhomnghiencuuController@xoabaocao');

	Route::get('danh-sach-phan-cong-bao-cao','NhomnghiencuuController@getdanhsachphancong');

	Route::get('xoa-phan-cong-bao-cao/{id}','NhomnghiencuuController@xoaphancongbaocao');
});


Route::group(['prefix' => 'auto'],function(){
	Route::group(['prefix' => 'baibao'],function(){
		Route::get('tenbaibaovi','AutoController@tenbaibaovi');
		Route::get('tenbaibaoen','AutoController@tenbaibaoen');
		Route::get('nhaxuatbanvi','AutoController@nhaxuatbanvi');
		Route::get('nhaxuatbanen','AutoController@nhaxuatbanen');
		Route::get('soissn','AutoController@soissn');
	});

	Route::group(['prefix' => 'detai'],function(){
		Route::get('tendetaivi','AutoController@tendetaivi');
		Route::get('tendetaien','AutoController@tendetaien');
	});

	Route::group(['prefix' => 'quatrinhdaotao'],function(){
		Route::get('tencosovi','AutoController@tencosovi');
		Route::get('tencosoen','AutoController@tencosoen');
		Route::get('noidaotaovi','AutoController@noidaotaovi');
		Route::get('noidaotaoen','AutoController@noidaotaoen');
		Route::get('chuyennganhvi','AutoController@chuyennganhvi');
		Route::get('chuyennganhen','AutoController@chuyennganhen');
	});

	Route::group(['prefix' => 'huongdansaudaihoc'],function(){
		Route::get('tencosovi','AutoController@hdsdhtencosovi');
		Route::get('tencosoen','AutoController@hdsdhtencosoen');
	});

	Route::group(['prefix' => 'mongiangday'],function(){
		Route::get('tenmonvi','AutoController@tenmonvi');
		Route::get('tenmonen','AutoController@tenmonen');
		Route::get('doituongvi','AutoController@doituongvi');
		Route::get('doituongen','AutoController@doituongen');
		Route::get('noidayvi','AutoController@noidayvi');
		Route::get('noidayen','AutoController@noidayen');
	});

	Route::group(['prefix' => 'quatrinhcongtac'],function(){
		Route::get('tencosovi','AutoController@qtdttencosovi');
		Route::get('tencosoen','AutoController@qtdttencosoen');
		Route::get('diachicosovi','AutoController@qtdtdiachicosovi');
		Route::get('diachicosoen','AutoController@qtdtdiachicosoen');
	});



});




});

});
