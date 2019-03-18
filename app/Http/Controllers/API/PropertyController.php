<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

use League\Csv\Reader;
use League\Csv\Statement;
use Phpml\Regression\LeastSquares;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function linearRegression(Request $request){

        $this->validate($request, [
            'location' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'kitchens' => 'required',
            'size' => 'required'
        ]);

        $uLocation = intval($request->location);
        $uSize = intval($request->size);
        $uBedrooms = intval($request->bedrooms);
        $uBathrooms = intval($request->bathrooms);
        $uKitchen = intval($request->kitchens);
        $uImportedkitchen = intval($request->importedkitchen);
        $uSwimmingpool = intval($request->swimmingpool);
        $uGym = intval($request->gym);
        $uCornerplot = intval($request->cornerplot);
        $uJacuzzi = intval($request->jacuzzi);
        $uServantquarters = intval($request->servantquarters);
        $uBuild = intval($request->build);
        $uGarden = intval($request->garden);






        $csv = Reader::createFromPath('csv/finalIsbData.csv', 'r');
        $csv->setHeaderOffset(0);

        $stmt = (new Statement())
            ->offset(0)
        ;


        $samples = [];
        $targets = [];
        $records = $stmt->process($csv);
        $i = 1;
        $sectornum = 0;
        foreach ($records as $record) {

            if ($record['bedrooms'] && $record['baths'] && $record['normalizedPrice']) {



                switch ($record['sector']) {
                    case "e7":
                        $sectornum = 1000;
                    break;
                    case "f6":
                        $sectornum = 980;
                        break;
                    case "f7":
                        $sectornum = 960;
                        break;
                    case "bahria town":
                        $sectornum = 940;
                        break;
                    case "dha defence":
                        $sectornum = 920;
                        break;
                    case "f8":
                        $sectornum = 900;
                        break;
                    case "f10":
                        $sectornum = 880;
                        break;
                    case "f11":
                        $sectornum = 860;
                        break;
                    case "e11":
                        $sectornum = 840;
                        break;
                    case "fechs":
                        $sectornum = 850;
                        break;
                    case "d12":
                        $sectornum = 820;
                        break;
                    case "g6":
                        $sectornum = 800;
                        break;
                    case "g8":
                        $sectornum = 780;
                        break;
                    case "i8":
                        $sectornum = 760;
                        break;
                    case "g9":
                        $sectornum = 740;
                        break;
                    case "i9":
                        $sectornum = 720;
                        break;
                    case "g10":
                        $sectornum = 700;
                        break;
                    case "g11":
                        $sectornum = 680;
                        break;
                    case "i10":
                        $sectornum = 660;
                        break;
                    case "g13":
                        $sectornum = 695;
                        break;
                    case "g14":
                        $sectornum = 620;
                        break;
                    case "g15":
                        $sectornum = 600;
                        break;
                    case "i13":
                        $sectornum = 580;
                        break;
                    case "i14":
                        $sectornum = 560;
                        break;
                    case "d17":
                        $sectornum = 540;
                        break;
                    case "bani gala":
                        $sectornum = 650;
                        break;
                    case "f17":
                        $sectornum = 520;
                        break;
                    case "pwd":
                        $sectornum = 655;
                        break;
                    case "soan garden":
                        $sectornum = 645;
                        break;
                        case "pakistan town":
                        $sectornum = 640;
                        break;
                    case "bhara kaho":
                        $sectornum = 590;
                        break;
                    case "national police foundation o9":
                        $sectornum = 635;
                        break;
                    case "ghauri town":
                        $sectornum = 655;
                        break;
                    case "h13":
                        $sectornum = 500;
                        break;
                    case "b17":
                        $sectornum = 480;
                        break;
                    case "cbr town":
                        $sectornum = 460;
                        break;
                    
                    default:
                        $sectornum = 0;
                }




                if($sectornum){
            /*        
    //echo '<pre>' . var_dump($record) . '</pre><br />';
    echo 'Price: '.$record['normalizedPrice'] . "<hr />";
*/
                    if($record['Swimming Pool'] == "Yes") $swimmingPool = 1;
                    else $swimmingPool = 0;

                    $Kitchen = intval($record['Kitchen']);

                    if($record['Gym'] == "Yes") $Gym = 1;
                    else $Gym = 0;

                    $Floors = intval($record['Floors']);

                    if($record['Imported Kitchen'] == "Yes") $ImportedKitchen = 0;
                    else $ImportedKitchen = 1;

                    if($record['Corner Plot'] == "Yes") $CornerPlot = 1;
                    else $CornerPlot = 0;

                    $Price = intval($record['normalizedPrice']);

                    $bedrooms = intval($record['bedrooms']);

                    $baths = intval($record['baths']);
                    $size = intval($record['h_size']);
                    
                    if($record['Jacuzzi'] == "Yes") $jacuzzi = 0;
                    else $jacuzzi = 1;

                    if($record['bdate'] == "new") $build = 2;
                    elseif($record['bdate'] == "old") $build = 0;
                    else $build = 1;

                    if($record['Garden'] == "Yes") $garden = 0;
                    else $garden = 1;

                    

                    $servantquarters = intval($record['Servant Quarters']);

                    array_push($samples,[$sectornum, $size,  $bedrooms, $baths, $Kitchen, $ImportedKitchen, $swimmingPool, $Gym, $CornerPlot, $jacuzzi, $garden, $servantquarters, $build]);
                    array_push($targets, $Price);
    


                }
                
            }

        }
        //dd($targets);
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        return $regression->predict([$uLocation, $uSize, $uBedrooms , $uBathrooms, $uKitchen, $uImportedkitchen, $uSwimmingpool, $uGym, $uCornerplot, $uJacuzzi, $uGarden, $uServantquarters, $uBuild]);

    }




    public function search(){
        if ($search = \Request::get('q')) {
            $properties = Property::where(function($query) use ($search){
                $query->where('propertylocation','LIKE',"%$search%")
                        ->orWhere('descr','LIKE',"%$search%");
            })->paginate(10);
        }else{
            //$properties = Property::latest()->paginate(5);
            return null;
        }
        return $properties;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
