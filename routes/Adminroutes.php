<?php
Route::post('set_admin/login_submit','Admin\Logincontroller@login_submit');

Route::get('set_admin/login','Admin\Logincontroller@getLogin');
Route::post('set_admin/login','Admin\Logincontroller@postLogin');
Route::get('set_admin/logout','Admin\Logincontroller@getLogout');
Route::get('set_admin/logout2','Admin\Logincontroller@getLogout2');

Route::get('chooselevel','Admin\Khoa\ChooselevelController@getchoose');
Route::post('chooselevel','Admin\Khoa\ChooselevelController@postchoose');



Route::group(['middleware' =>'Isadmin'], function (){

	Route::group(['prefix'=>'set_admin','namespace'=>'Admin\Khoa'],function(){

		Route::get('checkct','AjaxController@checkct');
		
	    Route::get('updatediemmoi/{id_thongbao}','PDFController@updatediemmoi');

			Route::group(['prefix' => 'phan-cong-giang-day'],function(){

				Route::get('loadgiangvien/{id_bomon}','PhanconggiangdayController@loadgiangvien');

				Route::get('loadgiangvienbac2/{id}','PhanconggiangdayController@loadgiangvienbac2');

				Route::get('addsessiongiangvien/{id}','PhanconggiangdayController@addsessiongiangvien');

				Route::get('deletesessiongiangvien/{id}','PhanconggiangdayController@deletesessiongiangvien');

				Route::get('phan-cong.html','PhanconggiangdayController@getPhancong');

				Route::post('phan-cong.html','PhanconggiangdayController@postPhancong');

				Route::get('list/{id_bomon}/{namhoc}.html','PhanconggiangdayController@getList');

				/////////////////////////////////////////////////////////////////////////////

				Route::get('xoadanhsachlop','PhanconggiangdayController@xoadanhsachlop');

				Route::get('loadlop/{id_bomon}','PhanconggiangdayController@loadlop');

				Route::get('addsessionlop/{id}','PhanconggiangdayController@addsessionlop');

				Route::get('loaddanhsachchitiet/{id}','PhanconggiangdayController@loaddanhsachchitiet');

				////////////////////////////////////////////////////////////////////////////

				Route::get('xoadanhsachlopngoaikhoa','PhanconggiangdayController@xoadanhsachlopngoaikhoa');

				Route::get('loadlopngoaikhoa/{id_bomon}/{nam}','PhanconggiangdayController@loadlopngoaikhoa');

				Route::get('addsessionlopngoaikhoa/{id}','PhanconggiangdayController@addsessionlopngoaikhoa');

				Route::get('loaddanhsachchitietngoaikhoa/{id}','PhanconggiangdayController@loaddanhsachchitietngoaikhoa');

				Route::get('loaddanhsachphancong/{nam}/{giangvien}','PhanconggiangdayController@loaddanhsachphancong');

				Route::get('chuyengiangvien/{id_phancong}/{id_giangvien}','PhanconggiangdayController@chuyengiangvien');

				Route::get('xoahet/{nam}/{bomon}','PhanconggiangdayController@xoahet');
			});

			Route::group(['prefix' => 'phan-cong-giang-day-giang-vien'],function(){

				Route::get('loadgiangvien/{id_bomon}','PhanconggiangdaygiangvienController@loadgiangvien');

				Route::get('loadgiangvienbac2/{id}','PhanconggiangdaygiangvienController@loadgiangvienbac2');

				Route::get('addsessiongiangvien/{id}','PhanconggiangdaygiangvienController@addsessiongiangvien');

				Route::get('deletesessiongiangvien/{id}','PhanconggiangdaygiangvienController@deletesessiongiangvien');

				Route::get('phan-cong.html','PhanconggiangdaygiangvienController@getPhancong');

				Route::post('phan-cong.html','PhanconggiangdaygiangvienController@postPhancong');

				Route::get('list/{id_bomon}/{namhoc}.html','PhanconggiangdaygiangvienController@getList');

				/////////////////////////////////////////////////////////////////////////////

				Route::get('xoadanhsachlop','PhanconggiangdaygiangvienController@xoadanhsachlop');

				Route::get('loadlop/{id_bomon}','PhanconggiangdaygiangvienController@loadlop');

				Route::get('loadloptwo/{id_bomon}','PhanconggiangdaygiangvienController@loadloptwo');

				Route::get('addsessionlop/{id}','PhanconggiangdaygiangvienController@addsessionlop');

				Route::get('loaddanhsachchitiet/{id}','PhanconggiangdaygiangvienController@loaddanhsachchitiet');

				////////////////////////////////////////////////////////////////////////////

				Route::get('loadlopngoaikhoa/{id_bomon}/{nam}','PhanconggiangdaygiangvienController@loadlopngoaikhoa');

				Route::get('xoadanhsachlopngoaikhoa','PhanconggiangdaygiangvienController@xoadanhsachlopngoaikhoa');

				Route::get('addsessionlopngoaikhoa/{id}','PhanconggiangdaygiangvienController@addsessionlopngoaikhoa');

				Route::get('loaddanhsachchitietngoaikhoa/{id}','PhanconggiangdaygiangvienController@loaddanhsachchitietngoaikhoa');

				Route::get('loaddanhsachphancong/{nam}/{giangvien}','PhanconggiangdaygiangvienController@loaddanhsachphancong');

				Route::get('chuyengiangvien/{id_phancong}/{id_giangvien}','PhanconggiangdaygiangvienController@chuyengiangvien');

				Route::get('xoahet/{nam}/{bomon}','PhanconggiangdaygiangvienController@xoahet');

				Route::get('xoa-phan-cong/{id}','PhanconggiangdaygiangvienController@xoaphancong');

				Route::get('huy-xoa-phan-cong/{id}','PhanconggiangdaygiangvienController@huyxoaphancong');

				Route::get('danh-sach-lop/{id_bomon}','PhanconggiangdaygiangvienController@danhsachlop');

				Route::group(['prefix' => 'excel'],function(){
					Route::get('phan-cong-giang-day/{id_bomon}/{namhoc}','PhanconggiangdaygiangvienController@excel');
					Route::get('phan-cong-thinh-giang/{id_bomon}/{namhoc}','PhancongthinhgiangController@excel');
				});

				Route::get('xoa-danh-sach-phan-cong/{namhoc}/{id_bomon}','PhanconggiangdaygiangvienController@xoadanhsachphancong');
			});

			Route::group(['prefix' => 'phan-cong-thinh-giang'],function(){
				Route::post('phan-cong.html','PhancongthinhgiangController@postPhancong');
				Route::get('xoa-het/{nam}/{id_bomon}','PhancongthinhgiangController@xoahet');
				Route::get('loaddanhsachthinhgiang/{id}/{nam}','PhancongthinhgiangController@loaddanhsach');
				Route::get('checkxoaphancong/{id}','PhancongthinhgiangController@checkxoaphancong');
			});

			Route::group(['prefix' => 'phan-cong-chu-nhiem'],function(){

				Route::get('list/{id}','PhancongchunhiemController@getList');
				Route::get('add','PhancongchunhiemController@getAdd');
				Route::post('add','PhancongchunhiemController@postAdd');

				Route::get('edit/{id}','PhancongchunhiemController@getEdit');
				Route::post('edit/{id}','PhancongchunhiemController@postEdit');

				Route::get('one_delete/{id}','PhancongchunhiemController@one_delete');

				Route::get('export/{id_bomon}','PhancongchunhiemController@export');
			});

			Route::get('capnhatbaibao','AjaxController@capnhatbaibao');
			Route::get('capnhatdetai','AjaxController@capnhatdetai');
			Route::get('capnhathoso','AjaxController@capnhathoso');



			Route::get('/',function(){ return view('Admin.Trangchu');});

			Route::get('xoadetai','HosokhoahocController@xoadetai');
			Route::get('xoabaibao','HosokhoahocController@xoabaibao');

			Route::group(['prefix'=>'{ten}'],function(){

				Route::group(['prefix'=>'thong-tin-chung'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getThongtin');
					Route::post('{idTab}/{id_giangvien}','HosokhoahocController@postThongtin');
				});

				Route::group(['prefix'=>'qua-trinh-dao-tao'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getDaotao');
				});

				Route::group(['prefix'=>'de-tai-nghien-cuu'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getDetainghiencuu');
				});

				Route::group(['prefix'=>'bai-bao-khoa-hoc'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getBaibaokhoahoc');
				});

				Route::group(['prefix'=>'huong-dan-sau-dai-hoc'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getHuongdansaudaihoc');
				});

				Route::group(['prefix'=>'mon-giang-day'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getMongiangday');
				});

				Route::group(['prefix'=>'qua-trinh-cong-tac-giang-day'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getQuatrinhcongtacgiangday');
				});

				Route::group(['prefix'=>'ngoai-ngu'],function(){
					Route::get('{idTab}/{id_giangvien}','HosokhoahocController@getNgoaingu');
				});

				Route::group(['prefix'=>'xem-lai'],function(){
					Route::get('tieng-anh/{idTab}/{id_giangvien}','HosokhoahocController@getXemlaien');
					Route::get('tieng-viet/{idTab}/{id_giangvien}','HosokhoahocController@getXemlaivi');
				});
			});

			Route::group(['prefix'=>'thongke'],function(){
				Route::get('khoa/{id_thongbao}','ThongkeController@theokhoa');
				Route::get('bomon/{id_thongbao}/{id_bomon}','ThongkeController@theobomon');
				Route::get('xeploai/{thongbao}','ThongkeController@xeploai');
				Route::get('baibaokhoahoc','ThongkeController@getBaibaokhoahoc');
				Route::post('baibaokhoahoc','ThongkeController@postBaibaokhoahoc');
				Route::get('detainghiencuu','ThongkeController@getDetainghiencuu');
				Route::post('detainghiencuu','ThongkeController@postDetainghiencuu');
			});

			Route::group(['prefix'=>'PDF'],function(){

				Route::get('danhsachdanhgiatheokhoa/{id_thongbao}','PDFController@exportkhoa');
				
				Route::get('danhsachdanhgiatheokhoatheodiemgv/{id_thongbao}','PDFController@exportkhoadiemgv');
				Route::get('danhsachdanhgiatheokhoaphantram/{id_thongbao}/{id_phantram}','PDFController@exportkhoaphantram');


				Route::get('danhsachdanhgiatheobomon/{id_thongbao}/{id_bomon}','PDFController@exportbomon');
				Route::get('danhsachdanhgiachitiet/{id_thongbao}/{id_bomon}/{check}','PDFController@exportchitietbomon');
				Route::get('danhsachdanhgiachitiet_gioNCKH/{id_thongbao}/{id_bomon}/{check}','PDFController@exportchitietbomon_gioNCKH');

				Route::get('danhsachdanhgiatheokhoaphantram/{id_thongbao}/{id_bomon}/{id_phantram}','PDFController@exportbomonphantram');

				Route::get('baibaokhoahoc/{tungay}/{denngay}/{loaitacgia}','PDFController@exportbaibaokhoahoc');
				Route::get('detainghiencuu/{tungay}/{denngay}','PDFController@exportdetainghiencuu');


				Route::get('lylichkhoahoc/list','PDFController@lylichkhoahoclist');
				Route::get('lylichkhoahoc/chitietlylich/{id}','PDFController@chitietlylich');
				Route::get('lylichkhoahoc/chitietlylichen/{id}','PDFController@chitietlylichen');
				Route::get('thongkenckh/{id_thongbao}','PDFController@thongkenckh');
			});

			Route::group(['prefix'=>'Excel'],function(){
				Route::get('danhsachdanhgiatheokhoa/{id_thongbao}','ExcelController@exportkhoa');
				Route::get('danhsachbaibaokhoahoc/{tungay}/{denngay}/{loaitacgia}','ExcelController@exportbaibao');
			});

			Route::group(['prefix'=>'Excel','namespace' => 'Excel'],function(){
				Route::post('importsinhvien','Importsinhvien@importsinhvien');
			});

			Route::group(['prefix'=>'tieu-chi'],function(){


				Route::group(['prefix'=>'giang-day'],function(){
					Route::get('list','TieuchigiangdayController@getList');
					Route::get('add','TieuchigiangdayController@getAdd');
					Route::post('add','TieuchigiangdayController@postAdd');
					Route::get('edit/{id}','TieuchigiangdayController@getEdit');
					Route::post('edit/{id}','TieuchigiangdayController@postEdit');
					Route::get('one_delete/{id}','TieuchigiangdayController@OneDelete');
					Route::get('multi_delete/{id}','TieuchigiangdayController@MultiDelete');
				});

				Route::group(['prefix'=>'nghien-cuu-khoa-hoc'],function(){

						Route::group(['prefix'=>'bai-bao'],function(){
							Route::get('list','Tieuchibaibao@getList');
							Route::get('add','Tieuchibaibao@getAdd');
							Route::post('add','Tieuchibaibao@postAdd');
							Route::get('edit/{id}','Tieuchibaibao@getEdit');
							Route::post('edit/{id}','Tieuchibaibao@postEdit');
							Route::get('one_delete/{id}','Tieuchibaibao@OneDelete');
							Route::get('multi_delete/{id}','Tieuchibaibao@MultiDelete');
						});

						Route::group(['prefix'=>'de-tai'],function(){
							Route::get('list','Tieuchidetai@getList');
							Route::get('add','Tieuchidetai@getAdd');
							Route::post('add','Tieuchidetai@postAdd');
							Route::get('edit/{id}','Tieuchidetai@getEdit');
							Route::post('edit/{id}','Tieuchidetai@postEdit');
							Route::get('one_delete/{id}','Tieuchidetai@OneDelete');
							Route::get('multi_delete/{id}','Tieuchidetai@MultiDelete');
						});
				});

				Route::group(['prefix'=>'khac'],function(){
					Route::get('list','TieuchikhacController@getList');
					Route::get('add','TieuchikhacController@getAdd');
					Route::post('add','TieuchikhacController@postAdd');
					Route::get('edit/{id}','TieuchikhacController@getEdit');
					Route::post('edit/{id}','TieuchikhacController@postEdit');
					Route::get('one_delete/{id}','TieuchikhacController@OneDelete');
					Route::get('multi_delete/{id}','TieuchikhacController@MultiDelete');
				});
			});

			Route::group(['prefix'=>'ajax'],function(){
					Route::get('duyetnhomnghiencuu/{id_nhom}/{value}','AjaxController@duyetnhomnghiencuu');
					Route::get('loadhocky/{sohk}','ChuongtrinhAjaxController@loadhocky');
					Route::get('loadsomon/{soluong}/{hocky}','ChuongtrinhAjaxController@loadsomon');
					Route::get('search/tenmonhoc', 'ChuongtrinhAjaxController@searchbyname');

					Route::get('capnhatmon/{chuongtrinh}/{mon}/{hocky}/{thinhgiang}','ChuongtrinhAjaxController@capnhatmon');
					Route::get('themmonmoi/{chuongtrinh}/{mon}/{hocky}/{thinhgiang}','ChuongtrinhAjaxController@themmonmoi');
					Route::get('xoamonmoi/{chuongtrinh}/{mon}','ChuongtrinhAjaxController@xoamonmoi');

					Route::get('capnhattohop/{chuongtrinh}/{id_tohop}/{diem}','ChuongtrinhAjaxController@capnhattohop');
					Route::get('xoatohopmoi/{chuongtrinh}/{id_tohop}','ChuongtrinhAjaxController@xoatohopmoi');
					Route::get('themtohopmoi/{chuongtrinh}/{id_tohop}/{diem}','ChuongtrinhAjaxController@themtohopmoi');


					Route::get('luumonsotruong/{id_mon}/{id_giangvien}','ChuongtrinhAjaxController@luumonsotruong');
					Route::get('xoamonsotruong/{id_mon}/{id_giangvien}','ChuongtrinhAjaxController@xoamonsotruong');
					Route::get('loadmon/{id_bomon}','ChuongtrinhAjaxController@loadmon');

					Route::get('loadchuyennganh/{id}','AjaxController@loadchuyennganh');

				    Route::get('danhsachphantram/{thongbao}/{phantram}','AjaxController@danhsachphantram');
				    Route::get('danhsachphantram/{thongbao}/{bomon}/{phantram}','AjaxController@danhsachphantrambomon');
				    Route::get('xeploaitoankhoatheopt/{id_thongbao}/{loaia}/{loaib}/{loaic}/{loaid}/{tenloaia}/{tenloaib}/{tenloaic}/{tenloaid}/{tc1}/{tc2}','AjaxController@xeploaikhoa');
				    Route::get('luuxeploaitoankhoatheopt/{id_thongbao}/{loaia}/{loaib}/{loaic}/{loaid}/{tenloaia}/{tenloaib}/{tenloaic}/{tenloaid}/{tc1}/{tc2}','AjaxController@luuxeploaikhoa');
				    Route::post('capnhatgopy','AjaxController@gopy');
				    Route::get('danhgiagiangvien/duyet/{value}/{tieuchi}/{phieu}/{diem}/{soluong}','AjaxController@duyetdanhgia');
				    Route::post('uploadminhchung','AjaxController@uploadminhchung');
				    Route::post('uploadminhchunglink','AjaxController@uploadminhchunglink');
				    Route::get('danhgiagiangvien/diemtru/{value}/{tieuchi}/{phieu}/{soluong}/{diemdat}/{tong}','AjaxController@diemtru');
				    Route::get('danhgiagiangvien/diemtru/xoa/{tieuchi}/{phieu}/{tong}','AjaxController@xoadiemtru');
				    Route::get('danhgiagiangvien/diemtru/update/{value}/{tieuchi}/{phieu}/{soluong}/{diemdat}/{tong}','AjaxController@updatediemtru');

				    Route::get('loadgiangvien/{id_bomon}','AjaxController@loadgiangvien');
				    Route::post('cuusinhvien/updatecuusinhvien','AjaxController@updatecuusinhvien');
					Route::get('hienthi/{id}/{bang}/{type}/{value}','AjaxController@hienthi');
					Route::get('stt/{id}/{bang}/{value}','AjaxController@stt');
					Route::get('loadlop/{id_bomon}','AjaxController@loadlop'); //load lop trang sinnh vien list

					//đánh giá viên chức
					Route::post('uploadminhchunggiangdaylink','AjaxController@uploadminhchunggiangdaylink');
					Route::post('uploadminhchungkhaclink','AjaxController@uploadminhchungkhaclink');

					Route::post('uploadminhchunggiangdayfile','AjaxController@uploadminhchunggiangdayfile');
					Route::post('uploadminhchungkhacfile','AjaxController@uploadminhchungkhacfile');

					Route::get('get/{filename}','AjaxController@getfiledrive');

				    Route::group(['prefix'=>'cap-nhat-gop-y'],function(){
				    	Route::post('giang-day','AjaxController@capnhatgopygiangday');
				    	Route::post('khac','AjaxController@capnhatgopykhac');
				    });

				    Route::group(['prefix'=>'huy-duyet'],function(){
				    	Route::post('giang-day','AjaxController@huyduyetgiangday');
				    	Route::post('khac','AjaxController@huyduyetkhac');
				    });

				    Route::post('duyet-phieu-bai-bao','AjaxController@duyetphieubaibao');
				    Route::post('huy-phieu-bai-bao','AjaxController@huyphieubaibao');

				    Route::post('duyet-phieu-de-tai','AjaxController@duyetphieudetai');
				    Route::post('huy-phieu-de-tai','AjaxController@huyphieudetai');


					// de tai nghien cuu
					Route::get('loadtacgiadetai/{id_detai}','HosoAjaxController@loadtacgiadetai');
					Route::post('themdetai','HosoAjaxController@themdetai');
					Route::get('xoadetai/{id}','HosoAjaxController@xoadetainghiencuu');
					Route::post('hosokhoahoc/capnhatdetainghiencuu','HosoAjaxController@capnhatdetainghiencuu');
					Route::get('hosokhoahoc/xoadetainghiencuu/{id}','HosoAjaxController@xoadetainghiencuu');
					Route::get('hosokhoahoc/xoadetainghiencuuhet/{id}','HosoAjaxController@xoadetainghiencuuhet');
					Route::get('loadtextfiledetai/{id}','HosoAjaxController@loadtextfiledetai');
					Route::get('search/tendetai', 'HosoAjaxController@searchdetaiByName');
					Route::post('themtacgiadetai','HosoAjaxController@themtacgiadetai');
					Route::post('xoatacgiadetai','HosoAjaxController@xoatacgiadetai');
					Route::post('themtacgiadetaitest','HosoAjaxController@themtacgiadetaitest');
					// bai bao khoa hoc
					Route::get('loadtacgia/{id_baibao}','HosoAjaxController@loadtacgia');
					Route::get('loadloaibaibao/{id}','HosoAjaxController@loadloaibaibao');
					Route::get('loadloaitacgia/{id}','HosoAjaxController@loadloaitacgia');
					Route::get('capnhatduyetbaibao/{id_ct}/{id_loaibaibao}/{id_loaitacgia}','HosoAjaxController@capnhatduyetbaibao');
					Route::get('loadcapdetai/{id}','HosoAjaxController@loadcapdetai');
					Route::get('loadtrachnhiem/{id}','HosoAjaxController@loadtrachnhiem');
					Route::get('capnhatduyetdetai/{id_ct}/{id_capdetai}/{id_trachnhiem}','HosoAjaxController@capnhatduyetdetai');
					Route::post('thembaibao','HosoAjaxController@thembaibao');
					Route::get('capnhatbaibao/{id}/{id_loaibaibao}','HosoAjaxController@capnhatbaibao');
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

			Route::group(['prefix'=>'phancongviec'],function(){
				Route::post('themmoi','AjaxQuanlycongviec@themphancong');
				Route::post('capnhat','AjaxQuanlycongviec@capnhatphancong');
				Route::post('xoa','AjaxQuanlycongviec@xoaphancong');
				Route::post('goimail','AjaxQuanlycongviec@goimail');

				Route::get('duyetcap1/{id}','AjaxQuanlycongviec@duyetcap1');
				Route::get('huyduyetcap1/{id}','AjaxQuanlycongviec@huyduyetcap1');
			});

			});

			Route::group(['prefix'=>'khoa'],function(){
				Route::get('list','KhoaController@getList');
				Route::get('add','KhoaController@getAdd');
				Route::post('add','KhoaController@postAdd');
				Route::get('edit/{id}','KhoaController@getEdit');
				Route::post('edit/{id}','KhoaController@postEdit');
				Route::get('one_delete/{id}','KhoaController@OneDelete');
				Route::get('multi_delete/{id}','KhoaController@MultiDelete');
			});

			Route::group(['prefix'=>'nhomcongviec'],function(){
				Route::get('list','NhomcongviecController@getList');
				Route::get('add','NhomcongviecController@getAdd');
				Route::post('add','NhomcongviecController@postAdd');
				Route::get('edit/{id}','NhomcongviecController@getEdit');
				Route::post('edit/{id}','NhomcongviecController@postEdit');
				Route::get('one_delete/{id}','NhomcongviecController@OneDelete');
				Route::get('multi_delete/{id}','NhomcongviecController@MultiDelete');
			});

			Route::group(['prefix'=>'congviec'],function(){
				Route::get('list','CongviecController@getList');
				Route::get('add','CongviecController@getAdd');
				Route::post('add','CongviecController@postAdd');
				Route::get('edit/{id}','CongviecController@getEdit');
				Route::post('edit/{id}','CongviecController@postEdit');
				Route::get('one_delete/{id}','CongviecController@OneDelete');
				Route::get('multi_delete/{id}','CongviecController@MultiDelete');

				Route::get('{ten}/{id}.html','CongviecController@getChitietgiangvien');
			});

			Route::group(['prefix'=>'giaoviec'],function(){ // dành cho cán bộ lãnh đạo
				Route::get('list','GiaoviecController@getList');
				Route::get('list/{id}','GiaoviecController@getListid');
				Route::get('add','GiaoviecController@getAdd');
				Route::post('add','GiaoviecController@postAdd');
				Route::get('edit/{id}','GiaoviecController@getEdit');
				Route::post('edit/{id}','GiaoviecController@postEdit');
				Route::get('one_delete/{id}','GiaoviecController@OneDelete');
				Route::get('multi_delete/{id}','GiaoviecController@MultiDelete');
			});


			Route::group(['prefix'=>'dmtintuc'],function(){
				Route::get('list','Dm_tintucController@getList');
				Route::get('add','Dm_tintucController@getAdd');
				Route::post('add','Dm_tintucController@postAdd');
				Route::get('edit/{id}','Dm_tintucController@getEdit');
				Route::post('edit/{id}','Dm_tintucController@postEdit');
				Route::get('one_delete/{id}','Dm_tintucController@OneDelete');
				Route::get('multi_delete/{id}','Dm_tintucController@MultiDelete');
			});

			Route::group(['prefix'=>'tintuc'],function(){
				Route::get('list','TintucController@getList');
				Route::get('dang-nhanh','TintucController@getAddfast');
				Route::post('dang-nhanh','TintucController@postAddfast');
				Route::get('add','TintucController@getAdd');
				Route::post('add','TintucController@postAdd');
				Route::get('edit/{id}','TintucController@getEdit');
				Route::post('edit/{id}','TintucController@postEdit');
				Route::get('one_delete/{id}','TintucController@OneDelete');
				Route::get('multi_delete/{id}','TintucController@MultiDelete');
			});

			Route::group(['prefix'=>'qlduan'],function(){
				Route::get('list','QuanlyduanController@getList');
				Route::get('add','QuanlyduanController@getAdd');
				Route::post('add','QuanlyduanController@postAdd');
				Route::get('edit/{id}','QuanlyduanController@getEdit');
				Route::post('edit/{id}','QuanlyduanController@postEdit');
				Route::get('one_delete/{id}','QuanlyduanController@OneDelete');
				Route::get('multi_delete/{id}','QuanlyduanController@MultiDelete');
			});

			Route::get('goiemail','GoiemailController@getgoimail');
			Route::post('goiemail','GoiemailController@postgoimail');

			Route::group(['prefix'=>'chude'],function(){
				Route::get('list','ChudeController@getList');
				Route::get('add','ChudeController@getAdd');
				Route::post('add','ChudeController@postAdd');
				Route::get('edit/{id}','ChudeController@getEdit');
				Route::post('edit/{id}','ChudeController@postEdit');
				Route::get('one_delete/{id}','ChudeController@OneDelete');
				Route::get('multi_delete/{id}','ChudeController@MultiDelete');
			});

			Route::group(['prefix'=>'decuongchitiet'],function(){
				Route::get('list/{id}','DecuongchitietController@getList');
				Route::get('add','DecuongchitietController@getAdd');
				Route::post('add','DecuongchitietController@postAdd');
				Route::get('edit/{id}','DecuongchitietController@getEdit');
				Route::post('edit/{id}','DecuongchitietController@postEdit');
				Route::get('one_delete/{id}','DecuongchitietController@OneDelete');
				Route::get('multi_delete/{id}','DecuongchitietController@MultiDelete');
			});

			Route::group(['prefix'=>'ketquathi'],function(){
				Route::get('list/{id}','KetquathiController@getList');
				Route::get('add','KetquathiController@getAdd');
				Route::post('add','KetquathiController@postAdd');
				Route::get('edit/{id}','KetquathiController@getEdit');
				Route::post('edit/{id}','KetquathiController@postEdit');
				Route::get('one_delete/{id}','KetquathiController@OneDelete');
				Route::get('multi_delete/{id}','KetquathiController@MultiDelete');
			});

			Route::group(['prefix'=>'bieumau'],function(){
				Route::get('list','BieumauController@getList');
				Route::get('add','BieumauController@getAdd');
				Route::post('add','BieumauController@postAdd');
				Route::get('edit/{id}','BieumauController@getEdit');
				Route::post('edit/{id}','BieumauController@postEdit');
				Route::get('one_delete/{id}','BieumauController@OneDelete');
				Route::get('multi_delete/{id}','BieumauController@MultiDelete');
			});

			Route::group(['prefix'=>'phancongtraloi'],function(){
				Route::get('list','PhancongtraloiController@getList');
				Route::get('add','PhancongtraloiController@getAdd');
				Route::post('add','PhancongtraloiController@postAdd');
				Route::get('edit/{id}','PhancongtraloiController@getEdit');
				Route::post('edit/{id}','PhancongtraloiController@postEdit');
				Route::get('one_delete/{id}','PhancongtraloiController@OneDelete');
				Route::get('multi_delete/{id}','PhancongtraloiController@MultiDelete');
			});

			Route::group(['prefix'=>'user'],function(){
				Route::get('list','UserController@getList');
				Route::get('add','UserController@getAdd');
				Route::post('add','UserController@postAdd');
				Route::get('edit/{id}','UserController@getEdit');
				Route::post('edit/{id}','UserController@postEdit');
				Route::get('one_delete/{id}','UserController@OneDelete');
				Route::get('multi_delete/{id}','UserController@MultiDelete');
			});

			Route::group(['prefix'=>'danhmucthongbao'],function(){
				Route::get('list','DanhmucthongbaoController@getList');
				Route::get('add','DanhmucthongbaoController@getAdd');
				Route::post('add','DanhmucthongbaoController@postAdd');
				Route::get('edit/{id}','DanhmucthongbaoController@getEdit');
				Route::post('edit/{id}','DanhmucthongbaoController@postEdit');
				Route::get('one_delete/{id}','DanhmucthongbaoController@OneDelete');
				Route::get('multi_delete/{id}','DanhmucthongbaoController@MultiDelete');
			});

			Route::group(['prefix'=>'thongbao'],function(){
				Route::get('list/{id}','ThongbaoController@getList');
				Route::get('add','ThongbaoController@getAdd');
				Route::post('add','ThongbaoController@postAdd');
				Route::get('edit/{id}','ThongbaoController@getEdit');
				Route::post('edit/{id}','ThongbaoController@postEdit');
				Route::get('one_delete/{id}','ThongbaoController@OneDelete');
				Route::get('multi_delete/{id}','ThongbaoController@MultiDelete');
			});

			Route::group(['prefix'=>'thongbaodanhgia'],function(){
				Route::get('list','ThongbaodanhgiaController@getList');
				Route::get('add','ThongbaodanhgiaController@getAdd');
				Route::post('add','ThongbaodanhgiaController@postAdd');
				Route::get('edit/{id}','ThongbaodanhgiaController@getEdit');
				Route::post('edit/{id}','ThongbaodanhgiaController@postEdit');
				Route::get('one_delete/{id}','ThongbaodanhgiaController@OneDelete');
				Route::get('multi_delete/{id}','ThongbaodanhgiaController@MultiDelete');
				Route::get('danhsachdanhgia/TB={thongbao}/BM={bomon}','ThongbaodanhgiaController@danhsachdanhgia');
				Route::get('danhgia/P={idphieu}','ThongbaodanhgiaController@getdanhgia');
			});

			Route::group(['prefix' => 'danh-gia-vien-chuc'],function(){
				Route::get('danh-sach-bo-mon','DanhgiavienchucController@getdanhsachbomon');
				Route::get('danh-sach-thanh-vien/{id_bomon}','DanhgiavienchucController@getdanhsachthanhvien');

				Route::group(['prefix' => '{ten}'],function(){
					Route::group(['prefix' => 'giang-day'],function(){
						Route::get('{idtab}/{id_phieu}','DanhgiavienchucController@getGiangday');
						Route::post('{idTab}/{id_phieu}','DanhgiavienchucController@postGiangday');
					});

					Route::group(['prefix' => 'nghien-cuu-khoa-hoc'],function(){
						Route::get('{idtab}/{id_phieu}','DanhgiavienchucController@getNghiencuukhoahoc');
					});

					Route::group(['prefix' => 'tieu-chi-khac'],function(){
						Route::get('{idtab}/{id_phieu}','DanhgiavienchucController@getTieuchikhac');
						Route::post('{idTab}/{id_phieu}','DanhgiavienchucController@postTieuchikhac');
					});
				});
			});

			Route::group(['prefix'=>'giangvien'],function(){
				Route::get('list/{id}','GiangvienController@getList');
				Route::get('mon-so-truong/{id}','GiangvienController@getMonsotruong');

				Route::get('add','GiangvienController@getAdd');
				Route::post('add','GiangvienController@postAdd');
				Route::get('edit/{id}','GiangvienController@getEdit');
				Route::post('edit/{id}','GiangvienController@postEdit');
				Route::get('one_delete/{id}','GiangvienController@OneDelete');
				Route::get('multi_delete/{id}','GiangvienController@MultiDelete');
			});

			Route::group(['prefix'=>'lop'],function(){
				Route::get('list/{id}','LopController@getList');
				Route::get('add','LopController@getAdd');
				Route::post('add','LopController@postAdd');
				Route::get('edit/{id}','LopController@getEdit');
				Route::post('edit/{id}','LopController@postEdit');
				Route::get('one_delete/{id}','LopController@OneDelete');
				Route::get('multi_delete/{id}','LopController@MultiDelete');
			});

			Route::group(['prefix'=>'sinhvien'],function(){
				Route::get('list/{lop}','SinhvienController@getList');
				Route::get('add','SinhvienController@getAdd');
				Route::post('add','SinhvienController@postAdd');
				Route::get('edit/{id}','SinhvienController@getEdit');
				Route::post('edit/{id}','SinhvienController@postEdit');
				Route::get('one_delete/{id}','SinhvienController@OneDelete');
				Route::get('multi_delete/{id}','SinhvienController@MultiDelete');
			});

			Route::group(['prefix'=>'cuusinhvien'],function(){
				Route::get('list/{id}','CuusinhvienController@getList');
				Route::get('add','CuusinhvienController@getAdd');
				Route::post('add','CuusinhvienController@postAdd');
				Route::get('edit/{id}','CuusinhvienController@getEdit');
				Route::post('edit/{id}','CuusinhvienController@postEdit');
				Route::get('one_delete/{id}','CuusinhvienController@OneDelete');
				Route::get('multi_delete/{id}','CuusinhvienController@MultiDelete');
			});

			Route::group(['prefix'=>'capdetai'],function(){
				Route::get('list','CapdetaiController@getList');
				Route::get('add','CapdetaiController@getAdd');
				Route::post('add','CapdetaiController@postAdd');
				Route::get('edit/{id}','CapdetaiController@getEdit');
				Route::post('edit/{id}','CapdetaiController@postEdit');
				Route::get('one_delete/{id}','CapdetaiController@OneDelete');
				Route::get('multi_delete/{id}','CapdetaiController@MultiDelete');
			});

			Route::group(['prefix'=>'hskhoahoc'],function(){
				Route::get('list','HosokhoahockhoahocController@getList');
				Route::get('add','HosokhoahocController@getAdd');
				Route::post('add','HosokhoahocController@postAdd');
				Route::get('edit/{id}','HosokhoahocController@getEdit');
				Route::post('edit/{id}','HosokhoahocController@postEdit');
				Route::get('one_delete/{id}','HosokhoahocController@OneDelete');
				Route::get('multi_delete/{id}','HosokhoahocController@MultiDelete');
			});

			Route::group(['prefix'=>'trinhdo'],function(){
				Route::get('list','TrinhdoController@getList');
				Route::get('add','TrinhdoController@getAdd');
				Route::post('add','TrinhdoController@postAdd');
				Route::get('edit/{id}','TrinhdoController@getEdit');
				Route::post('edit/{id}','TrinhdoController@postEdit');
				Route::get('one_delete/{id}','TrinhdoController@OneDelete');
				Route::get('multi_delete/{id}','TrinhdoController@MultiDelete');
			});

			Route::group(['prefix'=>'chucvu'],function(){
				Route::get('list','ChucvuController@getList');
				Route::get('add','ChucvuController@getAdd');
				Route::post('add','ChucvuController@postAdd');
				Route::get('edit/{id}','ChucvuController@getEdit');
				Route::post('edit/{id}','ChucvuController@postEdit');
				Route::get('one_delete/{id}','ChucvuController@OneDelete');
				Route::get('multi_delete/{id}','ChucvuController@MultiDelete');
			});

			Route::group(['prefix'=>'chuyen-nganh'],function(){
				Route::get('list/{id}','ChuyennganhController@getList');
				Route::get('add','ChuyennganhController@getAdd');
				Route::post('add','ChuyennganhController@postAdd');
				Route::get('edit/{id}','ChuyennganhController@getEdit');
				Route::post('edit/{id}','ChuyennganhController@postEdit');
				Route::get('one_delete/{id}','ChuyennganhController@OneDelete');
				Route::get('multi_delete/{id}','ChuyennganhController@MultiDelete');
			});

			Route::group(['prefix'=>'giangvien'],function(){
				Route::get('list','GiangvienController@getList');
				Route::get('add','GiangvienController@getAdd');
				Route::post('add','GiangvienController@postAdd');
				Route::get('edit/{id}','GiangvienController@getEdit');
				Route::post('edit/{id}','GiangvienController@postEdit');
				Route::get('one_delete/{id}','GiangvienController@OneDelete');
				Route::get('multi_delete/{id}','GiangvienController@MultiDelete');
			});

			Route::group(['prefix'=>'loaibaibao'],function(){
				Route::get('list','LoaibaibaoController@getList');
				Route::get('add','LoaibaibaoController@getAdd');
				Route::post('add','LoaibaibaoController@postAdd');
				Route::get('edit/{id}','LoaibaibaoController@getEdit');
				Route::post('edit/{id}','LoaibaibaoController@postEdit');
				Route::get('one_delete/{id}','LoaibaibaoController@OneDelete');
				Route::get('multi_delete/{id}','LoaibaibaoController@MultiDelete');
			});

			Route::group(['prefix'=>'loaitacgia'],function(){
				Route::get('list','LoaitacgiaController@getList');
				Route::get('add','LoaitacgiaController@getAdd');
				Route::post('add','LoaitacgiaController@postAdd');
				Route::get('edit/{id}','LoaitacgiaController@getEdit');
				Route::post('edit/{id}','LoaitacgiaController@postEdit');
				Route::get('one_delete/{id}','LoaitacgiaController@OneDelete');
				Route::get('multi_delete/{id}','LoaitacgiaController@MultiDelete');
			});

			Route::group(['prefix'=>'trachnhiemdetai'],function(){
				Route::get('list','TrachnhiemdetaiController@getList');
				Route::get('add','TrachnhiemdetaiController@getAdd');
				Route::post('add','TrachnhiemdetaiController@postAdd');
				Route::get('edit/{id}','TrachnhiemdetaiController@getEdit');
				Route::post('edit/{id}','TrachnhiemdetaiController@postEdit');
				Route::get('one_delete/{id}','TrachnhiemdetaiController@OneDelete');
				Route::get('multi_delete/{id}','TrachnhiemdetaiController@MultiDelete');
			});

			Route::group(['prefix'=>'che-do-gio-chuan'],function(){
				Route::get('list','ChedogiochuanController@getList');
				Route::get('add','ChedogiochuanController@getAdd');
				Route::post('add','ChedogiochuanController@postAdd');
				Route::get('edit/{id}','ChedogiochuanController@getEdit');
				Route::post('edit/{id}','ChedogiochuanController@postEdit');
				Route::get('one_delete/{id}','ChedogiochuanController@OneDelete');
				Route::get('multi_delete/{id}','ChedogiochuanController@MultiDelete');
			});

			Route::group(['prefix'=>'slider'],function(){
				Route::get('list','SliderController@getList');
				Route::get('add','SliderController@getAdd');
				Route::post('add','SliderController@postAdd');
				Route::get('edit/{id}','SliderController@getEdit');
				Route::post('edit/{id}','SliderController@postEdit');
				Route::get('one_delete/{id}','SliderController@OneDelete');
				Route::get('multi_delete/{id}','SliderController@MultiDelete');
			});

			Route::group(['prefix'=>'video'],function(){
				Route::get('list','VideoController@getList');
				Route::get('add','VideoController@getAdd');
				Route::post('add','VideoController@postAdd');
				Route::get('edit/{id}','VideoController@getEdit');
				Route::post('edit/{id}','VideoController@postEdit');
				Route::get('one_delete/{id}','VideoController@OneDelete');
				Route::get('multi_delete/{id}','VideoController@MultiDelete');
			});

			Route::group(['prefix'=>'lkweb'],function(){
				Route::get('list','LKwebController@getList');
				Route::get('add','LKwebController@getAdd');
				Route::post('add','LKwebController@postAdd');
				Route::get('edit/{id}','LKwebController@getEdit');
				Route::post('edit/{id}','LKwebController@postEdit');
				Route::get('one_delete/{id}','LKwebController@OneDelete');
				Route::get('multi_delete/{id}','LKwebController@MultiDelete');
			});

			Route::group(['prefix'=>'nhom-mon'],function(){
				Route::get('list','NhommonController@getList');
				Route::get('add','NhommonController@getAdd');
				Route::post('add','NhommonController@postAdd');
				Route::get('edit/{id}','NhommonController@getEdit');
				Route::post('edit/{id}','NhommonController@postEdit');
				Route::get('one_delete/{id}','NhommonController@OneDelete');
				Route::get('multi_delete/{id}','NhommonController@MultiDelete');
			});

			Route::group(['prefix'=>'mon'],function(){
				Route::get('list/{bomon}/{bacdaotao}','MonController@getList');
				Route::get('add','MonController@getAdd');
				Route::post('add','MonController@postAdd');
				Route::get('edit/{id}','MonController@getEdit');
				Route::post('edit/{id}','MonController@postEdit');
				Route::get('one_delete/{id}','MonController@OneDelete');
				Route::get('multi_delete/{id}','MonController@MultiDelete');
			});

			Route::group(['prefix'=>'tohop'],function(){
				Route::get('list','TohopController@getList');
				Route::get('add','TohopController@getAdd');
				Route::post('add','TohopController@postAdd');
				Route::get('edit/{id}','TohopController@getEdit');
				Route::post('edit/{id}','TohopController@postEdit');
				Route::get('one_delete/{id}','TohopController@OneDelete');
				Route::get('multi_delete/{id}','TohopController@MultiDelete');
			});

			Route::group(['prefix'=>'bomon'],function(){
				Route::get('list','BomonController@getList');
				Route::get('add','BomonController@getAdd');
				Route::post('add','BomonController@postAdd');
				Route::get('edit/{id}','BomonController@getEdit');
				Route::post('edit/{id}','BomonController@postEdit');
				Route::get('one_delete/{id}','BomonController@OneDelete');
				Route::get('multi_delete/{id}','BomonController@MultiDelete');
			});

			Route::group(['prefix'=>'about'],function(){
				Route::get('list','AboutController@getList');
				Route::get('add','AboutController@getAdd');
				Route::post('add','AboutController@postAdd');
				Route::get('edit/{id}','AboutController@getEdit');
				Route::post('edit/{id}','AboutController@postEdit');
				Route::get('one_delete/{id}','AboutController@OneDelete');
				Route::get('multi_delete/{id}','AboutController@MultiDelete');
			});

			Route::group(['prefix'=>'chuong-trinh'],function(){
				Route::get('list','ChuongtrinhController@getList');
				Route::get('them-chuong-trinh/thong-tin-chung/{tab}.html','ChuongtrinhController@getthongtinchung');
				Route::post('them-chuong-trinh/thong-tin-chung.html','ChuongtrinhController@postthongtinchung');
				Route::get('them-chuong-trinh/mon-hoc/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@getmonhoc');
				Route::post('them-chuong-trinh/mon-hoc/{id_chuongtrinh}.html','ChuongtrinhController@postmonhoc');
				Route::get('them-chuong-trinh/to-hop/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@gettohop');
				Route::post('them-chuong-trinh/to-hop/{id_chuongtrinh}.html','ChuongtrinhController@posttohop');
				Route::get('them-chuong-trinh/huy/{id_chuongtrinh}','ChuongtrinhController@gethuythem');

				Route::get('cap-nhat-chuong-trinh/thong-tin-chung/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@getcapnhatthongtinchung');
				Route::post('cap-nhat-chuong-trinh/thong-tin-chung/{id_chuongtrinh}.html','ChuongtrinhController@postcapnhatthongtinchung');
				Route::get('cap-nhat-chuong-trinh/mon-hoc/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@getcapnhatmonhoc');
				Route::post('cap-nhat-chuong-trinh/mon-hoc/{id_chuongtrinh}.html','ChuongtrinhController@postcapnhatmonhoc');
				Route::get('cap-nhat-chuong-trinh/to-hop/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@getcapnhattohop');
				Route::get('cap-nhat-chuong-trinh/huy/{id_chuongtrinh}','ChuongtrinhController@gethuythem');

				Route::get('edit/{id}','ChuongtrinhController@getEdit');
				Route::post('edit/{id}','ChuongtrinhController@postEdit');
				Route::get('one_delete/{id}','ChuongtrinhController@OneDelete');
				Route::get('multi_delete/{id}','ChuongtrinhController@MultiDelete');
			});

			Route::group(['prefix'=>'tieu-chuan-chuong-trinh'],function(){
				Route::get('list/{id}','TieuchuanchuongtrinhController@getList');
				Route::get('add','TieuchuanchuongtrinhController@getAdd');
				Route::post('add','TieuchuanchuongtrinhController@postAdd');
				Route::get('edit/{id_chuongtrinh}/{id_hocky}','TieuchuanchuongtrinhController@getEdit');
				Route::post('edit/{id_chuongtrinh}/{id_hocky}','TieuchuanchuongtrinhController@postEdit');
				Route::get('one_delete/{id_chuongtrinh}/{id_hocky}','TieuchuanchuongtrinhController@OneDelete');
			});


			Route::group(['prefix'=>'infor'],function(){
				Route::get('edit/{id}','InforController@getEdit');
				Route::post('edit/{id}','InforController@postEdit');
			});


			Route::group(['prefix'=>'daotao','namespace'=>'Daotao'],function(){

				Route::group(['prefix'=>'hedaotao'],function(){
				    Route::get('list','HedaotaoController@getList');
						Route::get('add','HedaotaoController@getAdd');
						Route::post('add','HedaotaoController@postAdd');
						Route::get('edit/{id}','HedaotaoController@getEdit');
						Route::post('edit/{id}','HedaotaoController@postEdit');
						Route::get('one_delete/{id}','HedaotaoController@OneDelete');
						Route::get('multi_delete/{id}','HedaotaoController@MultiDelete');
				    });

				    Route::group(['prefix'=>'bacdaotao'],function(){
				    	Route::get('list','BacdaotaoController@getList');
						Route::get('add','BacdaotaoController@getAdd');
						Route::post('add','BacdaotaoController@postAdd');
						Route::get('edit/{id}','BacdaotaoController@getEdit');
						Route::post('edit/{id}','BacdaotaoController@postEdit');
						Route::get('one_delete/{id}','BacdaotaoController@OneDelete');
						Route::get('multi_delete/{id}','BacdaotaoController@MultiDelete');

				    });

			});

			Route::group(['prefix' => 'nhom-nghien-cuu'],function(){

				Route::group(['prefix'=>'loai-phong'],function(){
					Route::get('list','LoaiphongController@getList');
					Route::get('add','LoaiphongController@getAdd');
					Route::post('add','LoaiphongController@postAdd');
					Route::get('edit/{id}','LoaiphongController@getEdit');
					Route::post('edit/{id}','LoaiphongController@postEdit');
					Route::get('one_delete/{id}','LoaiphongController@OneDelete');
					Route::get('multi_delete/{id}','LoaiphongController@MultiDelete');
				});

				Route::group(['prefix'=>'phong'],function(){
					Route::get('list/{id}','PhongController@getList');
					Route::get('add','PhongController@getAdd');
					Route::post('add','PhongController@postAdd');
					Route::get('edit/{id}','PhongController@getEdit');
					Route::post('edit/{id}','PhongController@postEdit');
					Route::get('one_delete/{id}','PhongController@OneDelete');
					Route::get('multi_delete/{id}','PhongController@MultiDelete');
				});

				Route::group(['prefix'=>'nhiem-vu'],function(){
					Route::get('list','NhiemvuController@getList');
					Route::get('add','NhiemvuController@getAdd');
					Route::post('add','NhiemvuController@postAdd');
					Route::get('edit/{id}','NhiemvuController@getEdit');
					Route::post('edit/{id}','NhiemvuController@postEdit');
					Route::get('one_delete/{id}','NhiemvuController@OneDelete');
					Route::get('multi_delete/{id}','NhiemvuController@MultiDelete');
				});

				Route::group(['prefix'=>'linh-vuc'],function(){
					Route::get('list','LinhvucncController@getList');
					Route::get('add','LinhvucncController@getAdd');
					Route::post('add','LinhvucncController@postAdd');
					Route::get('edit/{id}','LinhvucncController@getEdit');
					Route::post('edit/{id}','LinhvucncController@postEdit');
					Route::get('one_delete/{id}','LinhvucncController@OneDelete');
					Route::get('multi_delete/{id}','LinhvucncController@MultiDelete');
				});

				Route::group(['prefix'=>'bao-cao'],function(){
					Route::get('list','BaocaoController@getList');
					Route::get('thang','BaocaoController@getBaocaothang');
				});

				Route::get('danh-sach-nhom','NhomnghiencuuController@getList');
				Route::get('chi-tiet-nhom/{id}','NhomnghiencuuController@chitietnhom');
				Route::get('danh-sach-thanh-vien/{id}','NhomnghiencuuController@danhsachthanhvien');
				Route::get('bao-cao-chuyen-de','NhomnghiencuuController@baocaochuyende');
				Route::get('bao-cao-hang-thang','NhomnghiencuuController@baocaohangthang');
				Route::get('xoa/{id}','NhomnghiencuuController@xoa');

			});

	});
});
