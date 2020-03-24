<?php
namespace App\Http\Controllers\Synchronization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Synchronization\AdmDatabaseSync;

class AdmDatabaseSyncController extends Controller
{
    

    public function synchronization(){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost/agate/public/index.php/api/synchronization_with_scaft');
        dd(json_decode($response->getBody()));
        $request = $client->post($url,  ['body'=>$myBody]);
        $newValor = $this->client;
    }

    public function synchronizationWithAgate(Request $request){
        $client = new \GuzzleHttp\Client();
        $array = array();
        $results = AdmDatabaseSync::select('name','updated_at')->where('active','5')->get();
        //dd($results);
        //$results = json_decode($results);
		foreach($results as $result){
			$array[] = $result->name."=".str_replace(" ", "**",$result->updated_at);
        }

        /*$request = $client->get('http://localhost/agate/public/index.php/api/synchronization',  [ \GuzzleHttp\RequestOptions::JSON => $results]);
        dd("sssssssss ",json_decode($request->getBody())); */
    
    
        $paramsInString = implode("&", $array);
        $url = "http://localhost/agate/public/index.php/api/sync?".$paramsInString;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $syncData = json_decode(curl_exec($curl));
        print_r($syncData); 
    }
    
}
/* 
    moiId -> slowCamelCase ---> variables
    MoiId -> UpperCamelCase  ---> funciones
    moi_id -> slow_snake_case  --->
    Moi_Id -> upper_Snake_Case  ---> 
*/
