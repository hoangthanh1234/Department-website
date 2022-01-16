 <ul class="sidebar-menu" data-widget="tree">
	    <li class="header">BẢNG ĐIỀU KHIỂN</li>	

	   

       <li class="treeview">
         <a>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <span> Cập nhật Giới thiệu</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
         </a>
         <ul class="treeview-menu">
              <li> 
                <a href="set_bomon/about/list/{{Session::get('user_department')}}"><i class="fa fa-circle-o"></i>Danh sách giới thiệu</a>
              </li>  
                                   
          </ul>
       </li>

       <li class="treeview">
                  <a>
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                      <span>Tin tức</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                     <ul class="treeview-menu">                        
                          <li><a href="set_bomon/tintuc/list"><i class="fa fa-circle-o"></i>Bài viết</a></li> 
                          <li><a href="set_bomon/tintuc/dang-nhanh"><i class="fa fa-circle-o"></i>Đăng nhanh</a></li> 
                      </ul>
                </li>

       

        <li class="treeview">
           <a>
                   <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Giảng viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
           </a>
           <ul class="treeview-menu">
                <li>
                  <a href="set_bomon/giangvien/list/{{Session::get('user_department')}}"><i class="fa fa-circle-o"></i>Danh sách Giảng viên</a>
                </li>
                <li><a href="set_bomon/danh-gia-vien-chuc/list"><i class="fa fa-circle-o"></i>Đánh giá giảng viên</a></li>
               
            </ul>
        </li>


        <li class="treeview">
           <a>
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Ban tư vấn</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
           </a>
           <ul class="treeview-menu">
                <li>
                <a href="set_bomon/bantuvan/list/{{Session::get('user_department')}}"><i class="fa fa-circle-o"></i>Danh sách thành viên </a>
                </li>
                
               
            </ul>
        </li>


        <li class="treeview">
           <a>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>P / C chủ nhiệm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
           </a>
           <ul class="treeview-menu">
                <li><a><i class="fa fa-circle-o"></i>Danh sách phân công</a></li>               
            </ul>
        </li>


        <li class="treeview">
           <a>
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span>P / C giảng dạy</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
           </a>
           <ul class="treeview-menu">
                <li><a><i class="fa fa-circle-o"></i>Danh sách phân công</a></li>
               
            </ul>
        </li>


        <li class="treeview">
           <a>
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span class="text-right">P / C hướng dẫn đồ án</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
           </a>
           <ul class="treeview-menu">
                <li><a><i class="fa fa-circle-o"></i>Danh sách phân công</a></li>
                
            </ul>
        </li>       

        <li class="treeview">
            <a>
               <i class="fa fa-list-alt" aria-hidden="true"></i>
               <span>Đào tạo</span>
               <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
                 <li><a href="{{ asset('set_bomon/mon/list/0') }}" title="Môn"><i class="fa fa-circle-o"></i>Môn học</a></li>
                 <li><a href="{{ asset('set_bomon/chuong-trinh/list') }}" title="chương trình"><i class="fa fa-circle-o"></i>Chương trình đào tạo</a></li>
            </ul>
        </li>
  </ul>