<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use WordTemplate;


class WordController extends Controller
{
    public function test(){

    	$file = public_path('ht96_word/surat_pernyataan.rtf');
		
		$array = array(
			'[NOMOR_SURAT]' => '015/BT/SK/V/2017',
			'[PERUSAHAAN]' => 'CV. Borneo Teknomedia',
			'[NAMA]' => 'Melani Malik',
			'[NIP]' => '6472065508XXXX',
			'[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
			'[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
			'[KOTA]' => 'Samarinda',
			'[DIRECTOR]' => 'Noviyanto Rahmadi',
			'[TANGGAL]' => date('d F Y'),
			'[thanhpro]' => 'thanhpro chỗ này',
		);

		$nama_file = 'surat-keterangan-kerja.doc';
		
		return WordTemplate::export($file, $array, $nama_file);
    }
}
