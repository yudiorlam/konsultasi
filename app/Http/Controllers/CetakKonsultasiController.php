<?php

namespace App\Http\Controllers;
use App\Models\Conversation;

use Illuminate\Http\Request;

class CetakKonsultasiController extends Controller
{
    public function index(){
        $daftarCetak= Conversation::join('users', 'users.id', '=' ,'conversations.user_id')
        ->join('topics', 'topics.id' , '=' ,'conversations.topic_id')
        ->join('m_pegawai', 'm_pegawai.nipbaru', '=', 'conversations.nip')
        ->select(['conversations.*' , 'users.name', 'topics.topic_name', 'm_pegawai.nama'])
        ->get();
        // dd($daftarCetak);
        return view ('admin.cetakKonsultasi', compact('daftarCetak'));
    }

    public function cetak(Request $request)
    {
        $bulan = array(" ", "Januari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        //dd($request);
        $filter['id'] = $request->input('id');
        $data = Conversation::select('*')->where($filter)->orderBy('updated_at', 'desc')->get()->first();


        //echo Carbon::now()->format('l, d F Y H:i');
        // Sabtu, 04 Maret 2017 07:38
        // dd($data);
        $File = Conversation::select('*');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Konsultasi.docx');
        //$templateProcessor->setValue('tanggal', Carbon::now()->format('d ') . $bulan[(int) Carbon::now()->format('m')] . Carbon::now()->format(' Y'));
        $templateProcessor->setValue('namaOrganisasi',$data->namaOrganisasi);
        $templateProcessor->setValue('bidangKegiatan',$data->bidangKegiatan);
        $templateProcessor->setValue('namaKetua',$data->namaKetua);
        $templateProcessor->setValue('namaSekertaris',$data->namaSekertaris);
        $templateProcessor->setValue('namaBendahara',$data->namaBendahara);
        $templateProcessor->setValue('alamatSekertariat',$data->alamatSekertariat);
         //var_dump($data['fileKartuKuning']);die();
        

        //$templateProcessor->setValue('alamat', 'John Doe');
        //$templateProcessor->setValue(
        //    ['nama', 'street'],
        //    ['alamat', '123 International Lane']);

        $templateProcessor->saveAs('TemporaryOrber.docx');
        //dd(public_path(). "\MyWordFile.docx");
        //$file = public_path() . "\Temporary.docx";
        $file = public_path() . "/TemporaryOrber.docx";
        //dd($file);
        $headers = array(
            'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        );

        return Response::download($file, $request->input('id') . '.docx', $headers);
    }
}
