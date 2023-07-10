<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use DataTables;


class CorporateTitleController extends APIController
{
    
    public function __construct() 
    {
        $this->api = (new APIController);
        
    }

    public function index(){
        $title = "DigiForSDI | Jabatan";
        
        //get data
        $url = 'api/v1/master-data/corporate-title/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        // dd($datas);

        return view('hrdlive.master-data.corporate-title.index',compact('title', 'datas'));
    }

    public function add(){

        $title = "DigiForSDI | Jabatan";
        $new_index = $this->getIndex() + 2;

        return view('hrdlive.master-data.corporate-title.add',compact('title', 'new_index'));
    }

    public function create(Request $request){
        $title = "DigiForSDI | Jabatan";

        $url='api/v1/master-data/corporate-title/add';

        $param = array(
                // "jablongname" => $request['nama_jabatan'],
                // "jabshortname" => "",
                // "kcorpt" =>  (int)$request['corporate_title'],
                // "kjnspeg" =>  $request['jenis_jabatan'],
                // "grade_min" => (int)$request['min_grade'],
                // "grade_max"=>  (int)$request['max_grade'],
                // "kjobfam"=>  (int)$request['rumpun_jabatan'],
                // "jbisnon" =>  $request['jabatan_pkwt'],
                // "jobdesc" =>  $request['unit_kerja'],
                // "sy_pendidikan" => (int)$request['syarat_pendidikan'],
                // "sy_jurusan" => (int)$request['syarat_jurusan'],
                // "sy_umur" =>  (int)$request['min_umur'],
                // "sy_stanikah" => (int)$request['status_kawin'],
                // "sy_umum" =>  $request['syarat_umum'],
                // "sy_khusus" =>  $request['syarat_khusus'],
                // "kjabcritical" => true,
                // "kjabeksekutif" => true,
                // "kjabbisnis" => true,
                // "kjabstruktural" => true,
                // "kjabfungsional" => true,
                // "kverify" =>(bool)$request['status']
        );

        // dd($request, $param);
        // $getFromApi = $this->api->post($url, $param);

        // // return view('hrdlive.master-data.jabatan.index',compact('title'))
        // return redirect()->route('master-data.jabatan.index');
    }

    // public function edit($id){

    //     $title = "DigiForSDI | Jabatan";
        
    //     $datas = $this->getDataDetail($id);

    //     // dd($datas);
    //     return view('hrdlive.master-data.jabatan.edit',compact('title', 'datas'));
    // }

    // public function update(Request $request, $id){
    //     $title = "DigiForSDI | Jabatan";

    //     $url='api/v1/master-data/jabatan/update/'.$id;

    //     $param = array(
    //             "jablongname" => $request['nama_jabatan'],
    //             "jabshortname" => "",
    //             "kcorpt" =>  (int)$request['corporate_title'],
    //             "kjnspeg" =>  $request['jenis_jabatan'],
    //             "grade_min" => (int)$request['min_grade'],
    //             "grade_max"=>  (int)$request['max_grade'],
    //             "kjobfam"=>  (int)$request['rumpun_jabatan'],
    //             "jbisnon" =>  $request['jabatan_pkwt'], 
    //             "jobdesc" =>  $request['unit_kerja'],
    //             "sy_pendidikan" => (int)$request['syarat_pendidikan'],
    //             "sy_jurusan" => (int)$request['syarat_jurusan'],
    //             "sy_umur" =>  (int)$request['min_umur'],
    //             "sy_stanikah" => (int)$request['status_kawin'],
    //             "sy_umum" =>  $request['syarat_umum'], 
    //             "sy_khusus" =>  $request['syarat_khusus'],
    //             "kjabcritical" => true,
    //             "kjabeksekutif" => true,
    //             "kjabbisnis" => true,
    //             "kjabstruktural" => true,
    //             "kjabfungsional" => true,
    //             "kverify" =>(bool)$request['status']
    //     );

    //     // dd($request, $param, $url, "update");
    //     $getFromApi = $this->api->put($url, $param);

    //     // return view('hrdlive.master-data.jabatan.index',compact('title'))
    //     return redirect()->route('master-data.jabatan.index');
    // }

    private function getIndex()
    {
        //get data
        $url = 'api/v1/master-data/jabatan/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return array_key_last($datas);
    }

    // private function getDataDetail($id)
    // {
    //     //get data
    //     $url = 'api/v1/master-data/jabatan/'.$id;
    //     $param = '';
    //     $getFromApi = $this->api->get($url, $param);
    //     $datas = $getFromApi['data'];

    //     return $datas;
    // }

        // public function dataTables(Request $request){
    //     if ($request->ajax()) {
        
    //         //get data
    //         $url = 'api/v1/master-data/jabatan/all';
    //         $param = '';
    //         $getFromApi = $this->api->get($url, $param);
    //         $datas = $getFromApi['data'];
    //         // dd($datas);

    //         return DataTables::of($datas)
    //         ->addIndexColumn()
    //         ->toJson();
        
    //     }
    // }
}
