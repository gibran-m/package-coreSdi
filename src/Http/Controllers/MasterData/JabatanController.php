<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use DataTables;
use Validator;


class JabatanController extends APIController
{
    
    public function __construct() 
    {
        $this->api = (new APIController);
        
    }

    public function index(){
        $title = "DigiForSDI | Jabatan";
        


        // dd($datas);

        return view('hrdlive.master-data.jabatan.index',compact('title'));
    }

    public function add(){

        $title = "DigiForSDI | Jabatan";
        $new_index = $this->getIndex() + 2;

        return view('hrdlive.master-data.jabatan.add',compact('title', 'new_index'));
    }

    public function create(Request $request){
        $title = "DigiForSDI | Jabatan";

        $url='api/v1/master-data/jabatan/add';

        // $validator = Validator::make($request->all(), [
        //     'kcorpt' => 'kcorpt',
        //     // Add more validation rules as needed
        // ]);
    
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        $param = array(
                "jablongname" => $request['jablongname'],
                "kcorpt" =>  (int)$request['kcorpt'],
                "kjnspeg" =>  $request['kjnspeg'],
                "grade_min" => (int)$request['grade_min'],
                "grade_max"=>  (int)$request['grade_max'],
                "kjobfam"=>  (int)$request['kjobfam'],
                "jbisnon" =>  $request['jbisnon'],
                "jobdesc" =>  $request['jobdesc'],
                "sy_pendidikan" => (int)$request['sy_pendidikan'],
                "sy_jurusan" => (int)$request['sy_jurusan'],
                "sy_umur_max" =>  (int)$request['sy_umur'],
                "sy_umur_min" =>  (int)$request['sy_umur_min'],
                "sy_stanikah" => (int)$request['sy_stanikah'],
                "sy_umum" =>  $request['sy_umum'],
                "sy_khusus" =>  $request['sy_khusus'],
                "kjabcritical" => true,
                "kjabeksekutif" => true,
                "kjabbisnis" => true,
                "kjabstruktural" => true,
                "kjabfungsional" => true,
                "kverify" => $request['kverify'],
                "nomorsk" => $request['nomorsk'],
                "kuk" => array("kuk" => (int)$request['kuk']['kuk']),
                "kverify" =>(bool)$request['kverify']
        );

        // dd($request, $param);
        $getFromApi = $this->api->post($url, $param);
        // dd($getFromApi, json_encode($param), $url);


        // return view('hrdlive.master-data.jabatan.index',compact('title'))
        return response()->json($getFromApi);
    }

    public function edit($id){

        $title = "DigiForSDI | Jabatan";
        
        $datas = $this->getDataDetail($id);

        // dd($datas);
        return view('hrdlive.master-data.jabatan.edit',compact('title', 'datas'));
    }

    public function update(Request $request, $id){
        $title = "DigiForSDI | Jabatan";

        $url='api/v1/master-data/jabatan/update/'.$id;

        $param = array(
                "jablongname" => $request['nama_jabatan'],
                "jabshortname" => "",
                "kcorpt" =>  (int)$request['corporate_title'],
                "kjnspeg" =>  $request['jenis_jabatan'],
                "grade_min" => (int)$request['min_grade'],
                "grade_max"=>  (int)$request['max_grade'],
                "kjobfam"=>  (int)$request['rumpun_jabatan'],
                "jbisnon" =>  $request['jabatan_pkwt'], 
                "jobdesc" =>  $request['unit_kerja'],
                "sy_pendidikan" => (int)$request['syarat_pendidikan'],
                "sy_jurusan" => (int)$request['syarat_jurusan'],
                "sy_umur" =>  (int)$request['min_umur'],
                "sy_stanikah" => (int)$request['status_kawin'],
                "sy_umum" =>  $request['syarat_umum'], 
                "sy_khusus" =>  $request['syarat_khusus'],
                "kjabcritical" => true,
                "kjabeksekutif" => true,
                "kjabbisnis" => true,
                "kjabstruktural" => true,
                "kjabfungsional" => true,
                "kverify" =>(bool)$request['status']
        );

        // dd($request, $param, $url, "update");
        $getFromApi = $this->api->put($url, $param);

        // return view('hrdlive.master-data.jabatan.index',compact('title'))
        return redirect()->route('master-data.jabatan.index');
    }

    private function getIndex()
    {
        //get data
        $url = 'api/v1/master-data/jabatan/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return array_key_last($datas);
    }

    private function getDataDetail($id)
    {
        //get data
        $url = 'api/v1/master-data/jabatan/'.$id;
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return $datas;
    }

    public function dataTables(Request $request){
            if ($request->ajax()) {


                //get data
                if(isset($request['nextPage'])){
                    $url = 'api/v1/master-data/jabatan/?orderBy=kjab&orderDirection=desc&size=10&page='.$request['nextPage'].'';
    
                }else{
                    $url = 'api/v1/master-data/jabatan/?orderBy=kjab&orderDirection=desc&size=10&page=0';
                }

                $param = '';
                $getFromApi = $this->api->get($url, $param);
                // dd($getFromApi, $url);
                $query = $getFromApi['data']['content'];

                //get extra data
                $totalItems = $getFromApi['data']['totalItems'];
                $totalPages = $getFromApi['data']['totalPages'];
                $currentPage = $getFromApi['data']['currentPage'];
     
                return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('kjab', function ($query) {
                    return  '<td><a href="/master-data/jabatan/edit/'.$query['kjab'].'">'.$query['kjab'].'</td>';
                })
                ->editColumn('is_active', function ($query) {
                    return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
                })
                ->editColumn('kjabcritical', function ($query) {
                    return  ($query['kjabcritical'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabeksekutif', function ($query) {
                    return  ($query['kjabeksekutif'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabbisnis', function ($query) {
                    return  ($query['kjabbisnis'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabstruktural', function ($query) {
                    return  ($query['kjabstruktural'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabfungsional', function ($query) {
                    return  ($query['kjabfungsional'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->rawColumns(['is_active', 'kjabcritical', 'kjabeksekutif', 'kjabbisnis', 'kjabstruktural', 'kjabfungsional', 'kjab'])
                ->with('totalItems', $totalItems)
                ->with('totalPages', $totalPages)
                ->with('currentPage', $currentPage)
                ->addColumn('noSk', 'xxx.xxx.xxx')
                ->toJson();
            
            }
    }

    public function dataTablesFilter(Request $request){

        if ($request->ajax()) {

           
            $url = 'api/v1/master-data/jabatan/?orderBy=kjab&orderDirection=desc&size=10&page=0&searchBy='.$request['searchBy'].'&searchValue='.$request['value'];
            

            $getFromApi = $this->api->get($url, '');
            // dd($getFromApi,$url);  

            $query = $getFromApi['data']['content'];
            // dd($query);  

            //get extra data
            $totalItems = $getFromApi['data']['totalItems'];
            $totalPages = $getFromApi['data']['totalPages'];
            $currentPage = $getFromApi['data']['currentPage'];

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('kjab', function ($query) {
                    return  '<td><a href="/master-data/jabatan/edit/'.$query['kjab'].'">'.$query['kjab'].'</td>';
                })
                ->editColumn('is_active', function ($query) {
                    return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
                })
                ->editColumn('kjabcritical', function ($query) {
                    return  ($query['kjabcritical'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabeksekutif', function ($query) {
                    return  ($query['kjabeksekutif'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabbisnis', function ($query) {
                    return  ($query['kjabbisnis'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabstruktural', function ($query) {
                    return  ($query['kjabstruktural'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->editColumn('kjabfungsional', function ($query) {
                    return  ($query['kjabfungsional'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
                })
                ->rawColumns(['is_active', 'kjabcritical', 'kjabeksekutif', 'kjabbisnis', 'kjabstruktural', 'kjabfungsional', 'kjab'])
                ->with('totalItems', $totalItems)
                ->with('totalPages', $totalPages)
                ->with('currentPage', $currentPage)
                ->addColumn('noSk', 'xxx.xxx.xxx')
                ->toJson();
        
        }
    }

    
}
