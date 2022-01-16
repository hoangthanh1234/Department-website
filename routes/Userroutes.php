<?php


Route::group(['middleware' => 'Locale','namespace' => 'User'], function() {


    Route::get('capnhat.html',function(){
        die('Nội dung này đang được cập nhật ! ! ! Vui lòng liện hệ quản trị viên');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loadmap','UserAjaxController@loadmap');
        Route::post('cuusinhvien/updatecuusinhvien','UserAjaxController@updatecuusinhvien');
        Route::get('loadlop/{id_bomon}','UserAjaxController@loadlop');
        Route::get('loadketquathi/{id_lop}','UserAjaxController@loadketquathi');
         Route::get('loaddecuongchitiet/{id_lop}','UserAjaxController@loaddecuongchitiet');
        Route::get('loadthanhvien/{id}','UserAjaxController@loadthanhvien');
       // Route::post('hoidap','UserAjaxController@hoidap');

    });

    Route::get('nhom-nghien-cuu/{ten}/{id}.html','PagesController@getnhomnghiencuu');

    Route::get('login2','TamController@login');

		Route::get('email.html','PagesController@getEmail');
		Route::post('email.html','PagesController@postEmail');

    Route::get('{provider}/redirect','SocialController@redirectToProvider');
    Route::get('{provider}/callback','SocialController@handleProviderCallback');


    //Route::get('{provider}/logout','SocialController@logoutProvider');
    //Route::get('{bomon}/{provider}/logout','SocialController@logoutProvider2');

    Route::get('{provider}/logout','SocialController@logout');

    Route::get('{bomon}/{provider}/logout','SocialController@logout');

    Route::get('language/{language}', 'PagesController@changeLanguage');
    Route::get('/','PagesController@trangchu');

    Route::get('chi-tiet-de-tai/{id}.html','PagesController@chitietdetai');
    Route::get('chi-tiet-bai-bao/{id}.html','PagesController@chitietbaibao');

    Route::get('project-detail/{id}.html','PagesController@chitietdetai');

    Route::get('trang-chu.html','PagesController@trangchu');
    Route::get('home.html','PagesController@trangchu');

    Route::get('news/category/{ten}/{id}.html','PagesController@tintuc');
    Route::get('tin-tuc/danh-muc/{ten}/{id}.html','PagesController@tintuc');

    Route::get('news/post/{ten}/{id}.html','PagesController@tintucdetail');
    Route::get('tin-tuc/bai-viet/{ten}/{id}.html','PagesController@tintucdetail');


    Route::get('gioi-thieu/{ten}/{id}.html','PagesController@gioithieu');
    Route::get('introduce/{ten}/{id}.html','PagesController@gioithieu');
    
    Route::get('enrollment-graduation.html','PagesController@enrollment');
    Route::get('dangki-totnghiep.html','PagesController@enrollment');

    Route::get('tuyen-sinh.html','PagesController@tuyensinh');
    Route::get('admissions.html','PagesController@tuyensinh');

    Route::get('tuyen-sinh/{ten}/{id}.html','PagesController@tuyensinhdetail');
    Route::get('admissions/{ten}/{id}.html','PagesController@tuyensinhdetail');

    Route::get('chuong-trinh/{ten}/{id}.html','PagesController@chuongtrinh');
    Route::get('program/{ten}/{id}.html','PagesController@chuongtrinh');

    Route::get('ho-so/{ten}/{id}.html','PagesController@hoso');
    Route::get('profile/{ten}/{id}.html','PagesController@hoso');
    Route::get('ho-so/tao-moi.html','PagesController@themhoso');
    Route::get('profile/create.html','PagesController@themhoso');


    Route::get('bo-mon/{ten}/{id}.html','PagesController@bomon');
    Route::get('department/{ten}/{id}.html','PagesController@bomon');

    Route::get('bo-mon/{ten}/{id}/nhan-su.html','PagesController@nhansubomon');
    Route::get('department/{ten}/{id}/personnel.html','PagesController@nhansubomon');

    Route::get('ho-so-khoa-hoc/{ten}/{id}.html','PagesController@gethosokhoahoc');
    Route::get('scientific-records/{ten}/{id}.html','PagesController@gethosokhoahoc');

    Route::get('{bomon}/{id}/de-tai.html','PagesController@getnghiencuubm');
    Route::get('{bomon}/{id}/project.html','PagesController@getnghiencuubm');

    Route::get('de-tai.html','PagesController@getnghiencuu');
    Route::get('project.html','PagesController@getnghiencuu');

    Route::get('du-an.html','PagesController@getduan');
    Route::get('international-project.html','PagesController@getduan');

    Route::get('chi-tiet-du-an/{ten}/{id}.html','PagesController@chitietduan');
    Route::get('international-project-detail/{ten}/{id}.html','PagesController@chitietduan');

    Route::get('department/enrollment-graduation/{ten}/{id}.html','PagesController@enrollment_bm');
    Route::get('bo-mon/dangki-totnghiep/{ten}/{id}.html','PagesController@enrollment_bm');
    // cuu sinh vien thuoc bo mon

    Route::group(['prefix'=>'cuu-sinh-vien/tim-kiem'],function(){

        Route::get('bo-mon/key={key}.html','PagesController@getcuusinhvienbomonbm');
        Route::get('bo-mon/{id}/key={key}.html','PagesController@getcuusinhvienbomonbm2');
        Route::get('bo-mon/{id}/lop={key}.html','PagesController@getcuusinhvienlopbm');
        Route::get('bo-mon/{id}/ten={key}.html','PagesController@getcuusinhvientenbm');

    });

     Route::group(['prefix'=>'alumni/search'],function(){

        Route::get('department/key={key}.html','PagesController@getcuusinhvienbomonbm');
        Route::get('department/{id}/key={key}.html','PagesController@getcuusinhvienbomonbm2');
        Route::get('department/{id}/class={key}.html','PagesController@getcuusinhvienlopbm');
        Route::get('department/{id}/name={key}.html','PagesController@getcuusinhvientenbm');

    });

    // cuu sinh vien thuoc khoa

     Route::get('cuu-sinh-vien.html','PagesController@getcuusinhvien');
     Route::get('alumni.html','PagesController@getcuusinhvien');

    Route::group(['prefix'=>'cuu-sinh-vien/tim-kiem'],function(){
        Route::get('bo-mon={key}.html','PagesController@getcuusinhvienbomon');
        Route::get('lop={key}.html','PagesController@getcuusinhvienlop');
        Route::get('ten={key}.html','PagesController@getcuusinhvienten');
    });

     Route::group(['prefix'=>'alumni/search'],function(){
        Route::get('department={key}.html','PagesController@getcuusinhvienbomon');
        Route::get('class={key}.html','PagesController@getcuusinhvienlop');
        Route::get('name={key}.html','PagesController@getcuusinhvienten');
    });

    // dao tao theo bo mon

     Route::get('bo-mon/{tenbomon}/{id}/dao-tao.html','PagesController@getdaotaobm');
     Route::get('department/{tenbomon}/{id}/education.html','PagesController@getdaotaobm');

     Route::get('bo-mon/{tenbomon}/{idbomon}/{tenchuongtrinh}/{idchuongtrinh}.html','PagesController@getctdaotaobm');
     Route::get('department/{tenbomon}/{id}/{tenchuongtrinh}/{idchuongtrinh}.html','PagesController@getctdaotaobm');

    // dao tao khoa

      Route::get('dao-tao/{ten}/{id}.html','PagesController@getdaotao');
      Route::get('education/{ten}/{id}.html','PagesController@getdaotao');

     Route::get('dao-tao-ct/{tenchuongtrinh}/{idchuongtrinh}.html','PagesController@getctdaotao');
     Route::get('education-ct/{tenchuongtrinh}/{idchuongtrinh}.html','PagesController@getctdaotao');

     //sinh vien hien tai
     Route::get('sinh-vien-set.html','PagesController@getSinhvien');
     Route::get('student-set.html','PagesController@getSinhvien');
      //sinh vien hien tai danh muc
     Route::get('sinh-vien-set/danh-muc/{id}.html','PagesController@getChitietsinhvien');
     Route::get('student-set/category/{id}.html','PagesController@getChitietsinhvien');
      //sinh vien hien tai bai viet

     Route::get('sinh-vien-set/bai-viet/{id}.html','PagesController@getChitietsinhvienbaiviet');
     Route::get('student-set/post/{id}.html','PagesController@getChitietsinhvienbaiviet');

     //sinh vien dang ki lay bang diem
     Route::get('sinh-vien-set/dang-ki-bang-diem.html','PagesController@view_dangKyCapBangDiem');
     Route::post('sinh-vien-set/dang-ki-bang-diem.html','PagesController@post_dangKyCapBangDiem');
     //hoidap
     Route::get('hoi-dap.html','PagesController@hoidap');
     Route::get('Q-&-A.html','PagesController@hoidap');

    Route::post('hoi-dap.html','PagesController@posthoidap');

    Route::get('bo-mon/{ten}/{id}/ban-tu-van-chuong-trinh.html','PagesController@bantuvan');
    Route::get('department/{ten}/{id}/advisory-board.html','PagesController@bantuvan');

});
