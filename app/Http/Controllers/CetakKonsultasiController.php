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
        ->select(['conversations.*' , 'users.name', 'topics.topic_name', 'm_pegawai.nama', 'm_pegawai.nipbaru', 'users.nip', 'm_unitkerja.nama as instansi', 'users.jabatan'])
        ->where('conversations.id', $filter)
        ->first();
        // dd($data);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.eabsensi.luwutimurkab.go.id/public/api/pegawai/getbynip',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYHOST=> false,
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'nip=' . $data->nipbaru . '',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
       
        // if (curl_errno($curl)) {
        //     $error_msg = curl_error($curl);
        // }
        // curl_close($curl);

        // if (isset($error_msg)) {
        //     echo $error_msg;
        // }
        // die();

        // curl_close($curl);
        //dd(json_decode($response)->data->namajabatan);

        // $url="https://api.eabsensi.luwutimurkab.go.id/public/api/pegawai/getbynip";
        // $data=array("nip" => "198504182009021004");
        
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // $response = curl_exec($curl);
        // var_dump($response); die();


        //echo Carbon::now()->format('l, d F Y H:i');
        // Sabtu, 04 Maret 2017 07:38
        // dd($data);
        $File = Conversation::select('*');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Konsultasi.docx');
        //$templateProcessor->setValue('tanggal', Carbon::now()->format('d ') . $bulan[(int) Carbon::now()->format('m')] . Carbon::now()->format(' Y'));
        //dd($data);
        $templateProcessor->setValue('name',htmlspecialchars($data->name));
        $templateProcessor->setValue('nip',htmlspecialchars($data->nip));
        $templateProcessor->setValue('topic_name',htmlspecialchars($data->topic_name));
        $templateProcessor->setValue('rangkuman',htmlspecialchars($data->rangkuman));
        $templateProcessor->setValue('materi',htmlspecialchars($data->materi));
        $templateProcessor->setValue('saran',htmlspecialchars($data->saran));
        $templateProcessor->setValue('nama',htmlspecialchars($data->nama));
        $templateProcessor->setValue('nipbaru',htmlspecialchars($data->nipbaru));
        $templateProcessor->setValue('jabatan',htmlspecialchars($data->jabatan));
        $templateProcessor->setValue('instansi',htmlspecialchars($data->instansi));
        $templateProcessor->setValue('namajabatan',htmlspecialchars(json_decode($response)->data->namajabatan));
        
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
