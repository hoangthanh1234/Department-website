<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxReuqest;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Cuusinhvien;
use App\Models\Lop;
use App\Models\Ketquathi;
use App\Models\Decuongchitiet;
use App\Models\Yeucauthanhvien;

class UserAjaxController extends Controller
{
    

    public function updatecuusinhvien(){
        $Cuusinhvien=Cuusinhvien::find($_POST['id']);
        $Cuusinhvien->noicongtac_vi=$_POST['noicongtac_vi'];
        $Cuusinhvien->noicongtac_en=$_POST['noicongtac_en'];
        $Cuusinhvien->chucvu_vi=$_POST['chucvu_vi'];
        $Cuusinhvien->chucvu_en=$_POST['chucvu_en'];
        $Cuusinhvien->socoquan=$_POST['socoquan'];
        $Cuusinhvien->hinhanh=Session::get('user_avatar');
        $Cuusinhvien->diachicoquan=$_POST['diachicoquan'];
        $Cuusinhvien->save();
        echo "Cập nhật thành công !! Vui lòng đăng nhập lại";
    }

    public function hoidap(AjaxReuqest $request){
        echo "123";
    }

      public function loadlop($id_bomon){
        $Lop=Lop::where('ngoaikhoa',0)->where('id_bomon',$id_bomon)->orderby('malop')->get();      
        foreach($Lop as $L){
            echo '<option value="'.$L->id.'" style="font-weight:bold;">'.$L->malop.' - '.$L->tenlop.'</option>';
        }
    }

    public function loadketquathi($id_lop){
        $Ketquathi=Ketquathi::where('id_lop',$id_lop)->orderby('ten')->get();
        foreach($Ketquathi as $kq){
            $pieces = explode(".",substr($kq->ten,5));
            echo "<tr>";              
                echo "<td class='bold'>".$pieces[0]."</td>";
                echo "<td class='bold'><a href='ht96_ketquathi/".$kq->file."' target='_blank'>Tải về</a>"."</td>";
            echo "</tr>";
        }
    }

    public function loaddecuongchitiet($id_lop){
        $Decuongchitiet=Decuongchitiet::where('id_lop',$id_lop)->orderby('ten')->get();
        foreach($Decuongchitiet as $dc){
            $pieces = explode(".",substr($dc->ten,5));
            echo "<tr>";              
                echo "<td class='bold'>".$pieces[0]."</td>";
                echo "<td class='bold'><a href='ht96_decuongchitiet/".$dc->file."' target='_blank'>Tải về</a>"."</td>";
            echo "</tr>";
        }
    }

    public function loadthanhvien($id){
        $Yeucauthanhvien = Yeucauthanhvien::where('id_detai',$id)->get();
        $lang = Session::get('language');
        $ten = 'ten_'.$lang;
        $noidung = '';
        $i=1;
        foreach ($Yeucauthanhvien as $yc){
            $noidung.='<tr>';
                $noidung.='<td class="text-center">'.$i++.'</td>';
                $noidung.='<td class="text-center">'.$yc->soluong.'</td>';
                $noidung.='<td>'.$yc->chuyennghanh->$ten.'</td>';
                $noidung.='<td class="text-center">'.$yc->ghichu.'</td>';
            $noidung.='</tr>';
        }
        echo $noidung;
    }
}
