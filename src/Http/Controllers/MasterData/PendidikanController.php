<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;


class PendidikanController extends Controller
{
    public function __construct() 
    {
        $this->api = (new APIController);
        
    }

    public function index(){
        $title = "DigiForSDI | Pendidikan";

        //get data
        // $url = 'api/v1/master-data/pangkat/all';
        // $param = '';
        // $getFromApi = $this->api->get($url, $param);
        // $datas = $getFromApi['data'];

        return view('hrdlive.master-data.pendidikan.index', compact('title'));
    }

    public function addPendidikan(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.pendidikan', compact('title', 'new_index'));

    }

    public function addPerguruan(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.perguruan', compact('title', 'new_index'));
    }

    public function addFakultas(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.fakultas', compact('title', 'new_index'));
    }

    public function addJurusan(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.jurusan', compact('title', 'new_index'));
    }

    public function addKursus(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.kursus', compact('title', 'new_index'));
    }

    public function addAkreditasi(){
        $title = "DigiForSDI | Form unit pangkat";
        // $new_index = $this->getIndex() + 2;
        $new_index = "1";

        return view('hrdlive.master-data.pendidikan.add.akreditasi', compact('title', 'new_index'));
    }

    public function create(Request $request){

        $url='api/v1/master-data/pangkat/add';

        $param = array(
                "grade" => "",
                "grdname" => (int)$request['grade_form'],
                "ika_min" =>  (int)$request['ika_min'],
                "ika_tengah" => (int)$request['ika_tengah'],
                "ika_max"=>  (int)$request['ika_maks'],
                "ika_interval"=>  (int)$request['ika_interval'],
                "corporate_title" =>  $request['corp_title'],
                "kjenis" =>  (int)$request['jenis_form'],
                "Max_mskerja" => $request['maks_kerja'],
        );

        // dd($request, $param);
        $getFromApi = $this->api->post($url, $param);

        return redirect()->route('master-data.pangkat.index');
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


}
