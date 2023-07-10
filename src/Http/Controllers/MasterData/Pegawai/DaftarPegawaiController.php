<?php

namespace App\Http\Controllers\MasterData\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use DataTables;

class DaftarPegawaiController extends Controller
{
    public function __construct() 
    {
        $this->api = (new APIController);
        
    }

    public function index(){
        $title = "DigiForSDI | Daftar Pegawai";

        return view('hrdlive.master-data.pegawai.index', compact('title'));
    }

    public function dataTables(Request $request){
        if ($request->ajax()) {


            //get data
            if(isset($request['nextPage'])){
                $url = 'api/v1/master-data/jabatan/?orderBy=kjab&orderDirection=asc&size=10&page='.$request['nextPage'].'';

            }else{
                $url = 'api/v1/master-data/status-kepegawaian/?page=0&size=10&orderBy=fullname&orderDirection=asc';
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
            ->editColumn('nrp', function ($query) {
                return  '<td><a type="button" class="btn btn-primary" href="/master-data/pegawai/daftar-pegawai/edit/'.$query['nrp'].'">Lihat Detail</a></td>';
            })
            ->rawColumns(['nrp'])
            ->with('totalItems', $totalItems)
            ->with('totalPages', $totalPages)
            ->with('currentPage', $currentPage)
            ->toJson();
        
        }
}
}

