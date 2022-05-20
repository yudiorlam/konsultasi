<?php

namespace App\Http\Controllers;
use App\Models\Conversation;
use Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CetakKonsultasiController extends Controller
{
    public function index(){
        if(auth()->user()->role == 1){
           $daftarCetak= Conversation::join('users', 'users.id', '=' ,'conversations.user_id')
            ->join('topics', 'topics.id' , '=' ,'conversations.topic_id')
            ->join('m_pegawai', 'm_pegawai.nipbaru', '=', 'conversations.nip')
            ->select(['conversations.*' , 'users.name', 'topics.topic_name', 'm_pegawai.nama'])
            ->get(); 
        } else {
            $daftarCetak= Conversation::join('users', 'users.id', '=' ,'conversations.user_id')
                ->join('topics', 'topics.id' , '=' ,'conversations.topic_id')
                ->join('m_pegawai', 'm_pegawai.nipbaru', '=', 'conversations.nip')
                ->where('conversations.user_id', auth()->user()->id)
                ->select(['conversations.*' , 'users.name', 'topics.topic_name', 'm_pegawai.nama'])
                ->get();
        }
        // dd($daftarCetak);
        return view ('admin.cetakKonsultasi', compact('daftarCetak'));
    }

    public function cetak(Request $request)
    {
        
        $bulan = array(" ", "Januari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

         
        $filter['id'] = $request->input('id');
        $data = Conversation::join('users', 'users.id', '=' ,'conversations.user_id')
        ->join('topics', 'topics.id' , '=' ,'conversations.topic_id')
        ->join('m_pegawai', 'm_pegawai.nipbaru', '=', 'conversations.nip')
        ->join('m_unitkerja', 'm_unitkerja.id', '=' ,'m_pegawai.fkunitkerja')
        ->select(['conversations.*' , 'users.name', 'topics.topic_name', 'm_pegawai.nama', 'm_pegawai.nipbaru', 'users.nip', 'm_unitkerja.nama as instansi'])
        ->where('conversations.id', $filter)
        ->first();
        // dd($data);


        //echo Carbon::now()->format('l, d F Y H:i');
        // Sabtu, 04 Maret 2017 07:38
        // dd($data);
        $File = Conversation::select('*');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Konsultasi.docx');
        //$templateProcessor->setValue('tanggal', Carbon::now()->format('d ') . $bulan[(int) Carbon::now()->format('m')] . Carbon::now()->format(' Y'));
        $templateProcessor->setValue('name',$data->name);
        $templateProcessor->setValue('nip',$data->nip);
        $templateProcessor->setValue('topic_name',$data->topic_name);
        $templateProcessor->setValue('rangkuman',$data->rangkuman);
        $templateProcessor->setValue('materi',$data->materi);
        $templateProcessor->setValue('saran',$data->saran);
        $templateProcessor->setValue('nama',$data->nama);
        $templateProcessor->setValue('nipbaru',$data->nipbaru);
        $templateProcessor->setValue('instansi',$data->instansi);
        
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
