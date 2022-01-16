<?php

Route::group(['middleware' => 'Isbomon'], function (){

Route::group(['prefix'=>'set_bomon','namespace'=>'Admin\Bomon'],function(){

	Route::get('/',function(){   
	    return view('Admin.Trangchu');
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

	 			
	Route::group(['prefix'=>'PDF'],function(){
	 	Route::get('theodiemgv/{id_thongbao}','PDFController@exporttheodiemgv');
	    Route::get('theodiembm/{id_thongbao}','PDFController@exporttheodiembm');
	    Route::get('tongthe/{id_thongbao}','PDFController@exporttongthe'); 
	});


	Route::group(['prefix'=>'danh-gia-vien-chuc'],function(){
		Route::get('list','DanhgiavienchucController@getList');

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



    			

    Route::group(['prefix'=>'ajax'],function(){


		Route::get('capnhattohop/{chuongtrinh}/{id_tohop}/{diem}','ChuongtrinhAjaxController@capnhattohop');
		Route::get('xoatohopmoi/{chuongtrinh}/{id_tohop}','ChuongtrinhAjaxController@xoatohopmoi');
		Route::get('themtohopmoi/{chuongtrinh}/{id_tohop}/{diem}','ChuongtrinhAjaxController@themtohopmoi');

    	
    	Route::get('danhgiagiangvien/duyet/{value}/{tieuchi}/{phieu}/{diem}/{soluong}','AjaxController@duyetdanhgia');
    	Route::get('danhgiagiangvien/diemtru/xoa/{tieuchi}/{phieu}/{tong}','AjaxController@xoadiemtru');

    	Route::get('danhgiagiangvien/diemtru/{value}/{tieuchi}/{phieu}/{soluong}/{diemdat}/{tong}','AjaxController@diemtru');
    	Route::get('danhgiagiangvien/diemtru/update/{value}/{tieuchi}/{phieu}/{soluong}/{diemdat}/{tong}','AjaxController@diemtruupdate');    	
    	Route::get('stt/{id}/{bang}/{value}','AjaxController@stt');
    	Route::get('hienthi/{id}/{bang}/{type}/{value}','AjaxController@hienthi'); 

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

    });

	Route::group(['prefix'=>'about'],function(){		    		    

		Route::get('list/{id}','AboutController@getList');
		Route::get('add','AboutController@getAdd');
		Route::post('add','AboutController@postAdd');
		Route::get('edit/{id}','AboutController@getEdit');
		Route::post('edit/{id}','AboutController@postEdit');
		Route::get('one_delete/{id}','AboutController@OneDelete');
		Route::get('multi_delete/{id}','AboutController@MultiDelete');
	});

	Route::group(['prefix'=>'thongbaodanhgia'],function(){			    		   
		Route::get('list','ThongbaodanhgiaController@getList');
		Route::get('danhsachdanhgia/{id_thongbao}','ThongbaodanhgiaController@danhsachdanhgia');
		Route::get('danhgia/P={id_phieu}','ThongbaodanhgiaController@getdanhgia');
		
	});

	Route::group(['prefix'=>'giangvien'],function(){		    		    

		Route::get('list/{id}','GiangvienController@getList');					    
		Route::get('edit/{id}','GiangvienController@getEdit');
		Route::post('edit/{id}','GiangvienController@postEdit');
		Route::get('one_delete/{id}','GiangvienController@OneDelete');
		Route::get('multi_delete/{id}','GiangvienController@MultiDelete');
	});

	Route::group(['prefix'=>'hosokhoahoc/{ten}'],function(){		    		    

		Route::group(['prefix'=>'thong-tin-chung'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getThongtin');
		    Route::post('{idTab}/{id_hoso}','HosokhoahocController@postThongtin');		    		    	
		 });

		Route::group(['prefix'=>'qua-trinh-dao-tao'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getDaotao');		    		    	
		});

		Route::group(['prefix'=>'de-tai-nghien-cuu'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getDetainghiencuu');		    		    	
		});

		Route::group(['prefix'=>'bai-bao-khoa-hoc'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getBaibaokhoahoc');		    		    	
		});

		Route::group(['prefix'=>'huong-dan-sau-dai-hoc'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getHuongdansaudaihoc');		    		    	
		});

		Route::group(['prefix'=>'mon-giang-day'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getMongiangday');		    		    	
		});

		Route::group(['prefix'=>'qua-trinh-cong-tac-giang-day'],function(){		    		    	
		    Route::get('{idTab}/{id_hoso}','HosokhoahocController@getQuatrinhcongtacgiangday');		    		    	
		});		    		    

		Route::group(['prefix'=>'xem-lai'],function(){		    		    	
		    Route::get('tieng-anh/{idTab}/{id_hoso}','HosokhoahocController@getXemlaien');
		    Route::get('tieng-viet/{idTab}/{id_hoso}','HosokhoahocController@getXemlaivi');		    		    	
		});
	});

	Route::group(['prefix'=>'bantuvan'],function(){	  
		Route::get('list/{id}','BantuvanController@getList');
		Route::get('add','BantuvanController@getAdd');
		Route::post('add','BantuvanController@postAdd');
		Route::get('edit/{id}','BantuvanController@getEdit');
		Route::post('edit/{id}','BantuvanController@postEdit');
		Route::get('one_delete/{id}','BantuvanController@OneDelete');
		Route::get('multi_delete/{id}','BantuvanController@MultiDelete');
	});

	Route::group(['prefix'=>'mon'],function(){
		Route::get('list/{bacdaotao}','MonController@getList');
		Route::get('add','MonController@getAdd');
		Route::post('add','MonController@postAdd');
		Route::get('edit/{id}','MonController@getEdit');
		Route::post('edit/{id}','MonController@postEdit');
		Route::get('one_delete/{id}','MonController@OneDelete');
		Route::get('multi_delete/{id}','MonController@MultiDelete');
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
		Route::post('cap-nhat-chuong-trinh/mon-hoc/themmonmoi','ChuongtrinhController@themmonmoi');
		Route::post('cap-nhat-chuong-trinh/mon-hoc/capnhatmon','ChuongtrinhController@capnhatmon');
		Route::get('cap-nhat-chuong-trinh/mon-hoc/xoamonmoi/{mon}','ChuongtrinhController@xoamonmoi');
		
		Route::get('cap-nhat-chuong-trinh/to-hop/{id_chuongtrinh}/{tab}.html','ChuongtrinhController@getcapnhattohop');
		Route::post('cap-nhat-chuong-trinh/to-hop/themtohopmoi','ChuongtrinhController@themtohopmoi');
		Route::post('cap-nhat-chuong-trinh/to-hop/capnhattohop','ChuongtrinhController@capnhattohop');
		Route::get('cap-nhat-chuong-trinh/to-hop/xoatohopmoi/{tohop}','ChuongtrinhController@xoatohopmoi');

		Route::get('cap-nhat-chuong-trinh/huy/{id_chuongtrinh}','ChuongtrinhController@gethuythem');

		Route::get('edit/{id}','ChuongtrinhController@getEdit');
		Route::post('edit/{id}','ChuongtrinhController@postEdit');
		Route::get('one_delete/{id}','ChuongtrinhController@OneDelete');
		Route::get('multi_delete/{id}','ChuongtrinhController@MultiDelete');
	});

	
});

});