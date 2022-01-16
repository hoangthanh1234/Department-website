 <ul class="sidebar-menu" data-widget="tree">
	    <li class="header">BẢNG ĐIỀU KHIỂN</li>	
	   
      
       <li class="treeview">
         <a>
            <i class="fa fa-user-circle" aria-hidden="true"></i>
              <span>THÔNG TIN CHUNG</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
         </a>
         <ul class="treeview-menu">
              <li>
                <a href="set_giangvien/giangvien/edit/{{Session::get('user_id')}}">
                    <i class="fa fa-circle-o"></i>Thông tin cá nhân
                </a>
              </li>
               <li>
                  <a href="set_giangvien/{{Session::get('user_tenkhongdau')}}/thong-tin-chung/1">
                      <i class="fa fa-circle-o"></i>Lý lịch khoa học
                  </a>
              </li> 
               <li>
                <a href="set_giangvien/giangvien/mon-so-truong.html">
                  <i class="fa fa-circle-o"></i>Môn sở trường
                </a>
              </li>
          </ul>
       </li>

       <li class="treeview">
         <a>
           <i class="fa fa-braille" aria-hidden="true"></i>
              <span>HOẠT ĐỘNG</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
         </a>
         <ul class="treeview-menu">
              <li>
                <a href="set_giangvien/danh-gia-vien-chuc/giang-day/1">
                  <i class="fa fa-smile-o" aria-hidden="true"></i>
                  <span>Đánh giá giảng viên</span>
                </a>
              </li>
               <li>
                  <a href="set_giangvien/dinh-huong-tu-chon/danh-sach-lop">
                  <i class="fa fa-smile-o" aria-hidden="true"></i>
                  <span>Định hướng cho SV (chủ nhiệm)</span>
                </a>
              </li> 
               <li>
                <a href="set_giangvien/phancongviec/list">
                  <i class="fa fa-wpexplorer" aria-hidden="true"></i>
                  <span>Phân công công việc</span>
                </a>
              </li>
          </ul>
       </li>

       

       <li class="treeview">
           <a>
              <i class="fa fa-recycle" aria-hidden="true"></i>
              <span>NHÓM NGHIÊN CỨU</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
           </a>
           <ul class="treeview-menu">
                <li><a href="set_giangvien/nhom-nghien-cuu/dang-ky-nhom"><i class="fa fa-circle-o"></i>Đăng ký nhóm</a></li>
                <li><a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><i class="fa fa-circle-o"></i>DS nhóm</a></li>     
            </ul>
       </li>

        
      <li class="treeview">
           <a>
              <i class="fa fa-circle-o" aria-hidden="true"></i>
              <span>GIẢNG DẠY</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
           </a>
           <ul class="treeview-menu">               
              <li><a><i class="fa fa-circle-o"></i>Thanh toán giờ giảng</a></li>
              <li><a><i class="fa fa-circle-o"></i>Báo cáo kết thúc môn</a></li>
           </ul>
      </li>

        <li class="treeview">
           <a>
              <i class="fa fa-smile-o" aria-hidden="true"></i>
                <span>HỎI ĐÁP</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
           </a>
           <ul class="treeview-menu">
                <li><a href="set_giangvien/hoidap/list"><i class="fa fa-circle-o"></i>Danh sách câu hỏi</a></li>                
            </ul>
        </li>        
  </ul>