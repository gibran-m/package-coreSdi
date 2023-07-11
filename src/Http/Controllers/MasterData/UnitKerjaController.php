<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use DataTables;
use Validator;

class UnitKerjaController extends Controller
{

    public function __construct() 
    {
        $this->api = (new APIController);
        
    }


    public function index(){
        $title = "DigiForSDI | Unit Kerja";

        return view('vendor.coreSdi.master-data.unit-kerja.index',compact('title'));
    }

    public function add(){
        $title = "DigiForSDI | Unit Kerja";
        $new_index = $this->getIndex() + 2;

        //tipe kantor
        $url = 'api/v2/master/tipekantor/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $kantors = $getFromApi['data'];

        // jenis unit kerja
        $url = 'api/v1/master-data/jenis-unit-kerja/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $jenisUKs = $getFromApi['data'];

        return view('vendor.coreSdi.master-data.unit-kerja.add',compact('title', 'new_index', 'kantors', 'jenisUKs'));
    }

    public function create(Request $request){

        $url='api/v1/master-data/unit-kerja/add';

   
        $validator = Validator::make($request->all(), [
            'longname' => 'required',
            'shortname' => 'required',
            'kjenisuk' => 'required',
            'kcbs' => 'required|max:3',
            'kodepos' => 'required|max:7',
            'kelas' => 'required|max:3',
            // Add more validation rules as needed
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $param = array(
            "longname" => $request['longname'],
            "shortname" => $request['shortname'],
            "kjenisuk" => array("kjenisuk" => (int)$request['kjenisuk']),
            "kcbs" => (int)$request['kcbs'],
            "alamat" => $request['alamat'],
            "phone" => $request['phone'],
            "city" => (int)$request['city'],
            "fax" => $request['fax'],
            "kelas" => "abc",
            "shift" => boolval($request['shift']),
            "prov" => (int)$request['prov'],
            "kelurahan" => (int)$request['kelurahan'],
            "kecamatan" => (int)$request['kecamatan'],
            "kodepos" => (int)$request['kodepos'],
            "longlang" => $request['longlang'],
            "email" => $request['email'],
            "parent" => (int)$request['parent'],
            "kheadoffice" => boolval($request['kheadoffice']),
            "kcabang" => boolval($request['kcabang']),
            "ktipekantor" => array("ktipekantor" => (int)$request['ktipekantor']['ktipekantor']),
            "imageurl" => $image,
            "namafile" => $image
        );


        // dd($param);
        $getFromApi = $this->api->post($url, $param);
        // dd(json_encode($param), $getFromApi);
        // return redirect()->route('master-data.pangkat.index');
        return response()->json($getFromApi);
    }

    public function edit($id){

        $title = "DigiForSDI | Jabatan";

        $datas = $this->getDataDetail($id);

        //tipe kantor
        $url = 'api/v2/master/tipekantor/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $kantors = $getFromApi['data'];
        // dd($kantors);

        // jenis unit kerja
        $url = 'api/v1/master-data/jenis-unit-kerja/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $jenisUKs = $getFromApi['data'];

        // dd($datas);
        return view('vendor.coreSdi.master-data.unit-kerja.edit',compact('title', 'datas', 'kantors', 'jenisUKs'));
    }

    public function update(Request $request, $id){
        $tipeKantor = intval($request['ktipekantor']['ktipekantor']);
        $url='api/v1/master-data/unit-kerja/update/'.$id;
        if($request['namafile'] == null) {
            $param = array(
                "longname" => $request['longname'],
                "shortname" => $request['shortname'],
                "kjenisuk" => array("kjenisuk" => (int)$request['kjenisuk']),
                "kcbs" => (int)$request['kcbs'],
                "alamat" => $request['alamat'],
                "phone" => $request['phone'],
                "city" => (int)$request['city'],
                "fax" => $request['fax'],
                "kelas" => "abc",
                "shift" => boolval($request['shift']),
                "prov" => (int)$request['prov'],
                "kelurahan" => (int)$request['kelurahan'],
                "kecamatan" => (int)$request['kecamatan'],
                "kodepos" => (int)$request['kodepos'],
                "longlang" => $request['longlang'],
                "email" => $request['email'],
                "parent" => (int)$request['parent'],
                "kheadoffice" => boolval($request['kheadoffice']),
                "kcabang" => boolval($request['kcabang']),
                "ktipekantor" => array("ktipekantor" => (int)$request['ktipekantor']['ktipekantor']),
                "is_active" => $request['is_active']
            );
        }else{
            $param = array(
                "longname" => $request['longname'],
                "shortname" => $request['shortname'],
                "kjenisuk" => array("kjenisuk" => (int)$request['kjenisuk']),
                "kcbs" => (int)$request['kcbs'],
                "alamat" => $request['alamat'],
                "phone" => $request['phone'],
                "city" => intval($request['city']),
                "fax" => $request['fax'],
                "kelas" => "abc",
                "shift" => boolval($request['shift']['shift']),
                "prov" => intval($request['prov']),
                "kelurahan" => intval($request['kelurahan']),
                "kecamatan" => intaval($request['kecamatan']),
                "kodepos" => intval($request['kodepos']),
                "longlang" => $request['longlang'],
                "email" => $request['email'],
                "parent" => intval($request['parent']),
                "kheadoffice" => boolval($request['kheadoffice']),
                "kcabang" => boolval($request['kcabang']),
                "ktipekantor" => array("ktipekantor" => $tipeKantor),
                "imageurl" => $request['namafile'],
                "namafile" => $request['namafile'],
                "is_active" => $request['is_active']
            );
        }


        $getFromApi = $this->api->put($url, $param);
        // dd($getFromApi, json_encode($param), $url, (int)$request['ktipekantor']['ktipekantor'], $request['ktipekantor'] );

        return response()->json($getFromApi);
    }

    private function getIndex()
    {
        //get data
        $url = 'api/v1/master-data/unit-kerja/all';
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return array_key_last($datas);
    }

    private function getDataDetail($id)
    {
        //get data
        $url = 'api/v1/master-data/unit-kerja/'.$id;
        $param = '';
        $getFromApi = $this->api->get($url, $param);
        $datas = $getFromApi['data'];

        return $datas;
    }

    public function dataTables(Request $request){
        if ($request->ajax()) {

            //get data
            if(isset($request['nextPage'])){
                $url = 'api/v1/master-data/unit-kerja/?orderBy=kuk&orderDirection=desc&size=10&page='.$request['nextPage'].'';

            }else{
                $url = 'api/v1/master-data/unit-kerja/?orderBy=kuk&orderDirection=desc&size=10&page=0';
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
            ->editColumn('kuk', function ($query) {
                return  '<td><a href="/master-data/unit-kerja/edit/'.$query['kuk'].'">'.$query['kuk'].'</td>';
            })
            ->editColumn('is_active', function ($query) {
                return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
            })
            ->editColumn('shift', function ($query) {
                return  ($query['shift'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
            })
            ->editColumn('namafile', function ($query) {
                return  '<td><a href="'.$query['imageurl'].'">'.$query['namafile'].'</a></td>';
            })
            ->editColumn('kjenisuk', function ($query) {
                return  ($query['kjenisuk'] != null ) ? '<td>'.$query['kjenisuk']['longname'].'</td>': '';
            })
            ->editColumn('ktipekantor', function ($query) {
                return  ($query['ktipekantor'] != null ) ? '<td>'.$query['ktipekantor']['longname'].'</td>': '';
            })
            ->rawColumns(['is_active', 'kuk', 'namafile', 'shift', 'kjenisuk', 'ktipekantor'])
            ->with('totalItems', $totalItems)
            ->with('totalPages', $totalPages)
            ->with('currentPage', $currentPage)
            ->addColumn('noSk', 'xxx.xxx.xxx')
            ->addColumn('npwp', 'xxx.xxx.xxx')
            ->toJson();
        
        }
    }

    public function dataTablesFilter(Request $request){

        if ($request->ajax()) {

        
            $url = 'api/v1/master-data/unit-kerja/?size=10&page=0&searchBy='.$request['searchBy'].'&searchValue='.$request['value'];
            

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
            ->editColumn('kuk', function ($query) {
                return  '<td><a href="/master-data/unit-kerja/edit/'.$query['kuk'].'">'.$query['kuk'].'</td>';
            })
            ->editColumn('is_active', function ($query) {
                return  ($query['is_active'] == true) ?  '<td><span><i class="text-success bi bi-dot fs-6"></i></span> Aktif</td>': '<td><span><i class="text-danger bi bi-dot fs-6"></i></span> Tidak Aktif</td>';
            })
            ->editColumn('shift', function ($query) {
                return  ($query['shift'] == true) ?  ' <td>YA</td>': ' <td>TIDAK</td>';
            })
            ->editColumn('namafile', function ($query) {
                return  '<td><a href="'.$query['imageurl'].'">'.$query['namafile'].'</a></td>';
            })
            ->editColumn('kjenisuk', function ($query) {
                return  ($query['kjenisuk'] != null ) ? '<td>'.$query['kjenisuk']['longname'].'</td>': '';
            })
            ->editColumn('ktipekantor', function ($query) {
                return  ($query['ktipekantor'] != null ) ? '<td>'.$query['ktipekantor']['longname'].'</td>': '';
            })
            ->rawColumns(['is_active', 'kuk', 'namafile', 'shift', 'kjenisuk', 'ktipekantor'])
            ->with('totalItems', $totalItems)
            ->with('totalPages', $totalPages)
            ->with('currentPage', $currentPage)
            ->addColumn('noSk', 'xxx.xxx.xxx')
            ->addColumn('npwp', 'xxx.xxx.xxx')
            ->toJson();
        
        }
    }
}
