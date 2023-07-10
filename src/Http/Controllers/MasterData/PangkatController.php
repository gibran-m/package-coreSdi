<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Illuminate\Support\Facades\Log;
use DataTables;
use Validator;


class PangkatController extends Controller
{

    public function __construct() 
    {
        $this->api = (new APIController);
        
    }

    public function index(){
        $title = "DigiForSDI | Unit Pangakt";

        //get data
        $url = 'api/v1/master-data/pangkat/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return view('hrdlive.master-data.pangkat.index', compact('title', 'datas'));
    }

    public function add(){
        $title = "DigiForSDI | Form unit pangkat";
        $new_index = $this->getIndex() + 2;

        return view('hrdlive.master-data.pangkat.add', compact('title', 'new_index'));

    }

    public function create(Request $request){

        $url='api/v1/master-data/pangkat/add';

   
        $validator = Validator::make($request->all(), [
            'grdname' => 'required',
            // Add more validation rules as needed
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $param = array(
            "grade" => "",
            "grdname" => $request['grdname'],
            "ika_min" =>  (int)$request['ika_min'],
            "ika_tengah" => (int)$request['ika_tengah'],
            "ika_max"=>  (int)$request['ika_maks'],
            "ika_interval"=>  (int)$request['ika_interval'],
            "corporate_title" =>  $request['corporate_title'],
            "kjenis" =>  (int)$request['kjenis'],
            "Max_mskerja" => "",
        );


        // dd($request, $param);
        $getFromApi = $this->api->post($url, $param);
        // dd($request, json_encode($param), $getFromApi);
        // return redirect()->route('master-data.pangkat.index');
        return response()->json($getFromApi);
    }

    public function edit($id){

        $title = "DigiForSDI | Jabatan";
        
        $datas = $this->getDataDetail($id);

        // dd($datas);
        return view('hrdlive.master-data.pangkat.edit',compact('title', 'datas'));
    }

    public function update(Request $request, $id){

        $url='api/v1/master-data/pangkat/update/'.$id;

        $param = array(
                "grade" => 1,
                "grdname" => $request['grdname'],
                "ika_min" =>  (int)$request['ika_min'],
                "ika_tengah" => (int)$request['ika_tengah'],
                "ika_max"=>  (int)$request['ika_max'],
                "ika_interval"=>  (int)$request['ika_interval'],
                "corporate_title" =>  $request['corporate_title'],
                "kjenis" =>  (int)$request['kjenis'],
                "Max_mskerja" => "",
                "is_active" => boolval($request['is_active']),
        );

        $getFromApi = $this->api->put($url, $param);

        return response()->json($getFromApi);
    }


    private function getIndex()
    {
        //get data
        $url = 'api/v1/master-data/pangkat/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return array_key_last($datas);
    }

    private function getDataDetail($id)
    {
        //get data
        $url = 'api/v1/master-data/pangkat/'.$id;
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return $datas;
    }

    public function dataTables(Request $request){
        if ($request->ajax()) {

            //get data
            if(isset($request['nextPage'])){
                $url = 'api/v1/master-data/pangkat/?orderBy=kgrade&orderDirection=asc&size=5&page='.$request['nextPage'].'';

            }else{
                $url = 'api/v1/master-data/pangkat/?orderBy=kgrade&orderDirection=asc&size=5&page=0';
            }

            $param = '';
            $getFromApi = $this->api->get($url, $param);
            dd($getFromApi);
            $query = $getFromApi['data']['content'];

            //get extra data
            $totalItems = $getFromApi['data']['totalItems'];
            $totalPages = $getFromApi['data']['totalPages'];
            $currentPage = $getFromApi['data']['currentPage'];
 
            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('is_active', function ($query) {
                return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
            })
            ->editColumn('kgrade', function ($query) {
                return  '<td><a href="/master-data/pangkat/edit/'.$query['kgrade'].'">'.$query['kgrade'].'</td>';
            })
            ->rawColumns(['is_active', 'kgrade'])
            ->with('totalItems', $totalItems)
            ->with('totalPages', $totalPages)
            ->with('currentPage', $currentPage)
            ->toJson();
        
        }
    }

    public function dataTablesFilter(Request $request){

        if ($request->ajax()) {

            $url = 'api/v1/master-data/pangkat/?searchBy='.$request['searchBy'].'&searchValue='.$request['value'];

            $getFromApi = $this->api->get($url, '');
            $query = $getFromApi['data']['content'];
            // dd($query);  

            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('is_active', function ($query) {
                return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
            })
            ->editColumn('kgrade', function ($query) {
                return  '<td><a href="/master-data/pangkat/edit/'.$query['kgrade'].'">'.$query['kgrade'].'</td>';
            })
            ->rawColumns(['is_active', 'kgrade'])
            ->toJson();
        
        }
    }

}
