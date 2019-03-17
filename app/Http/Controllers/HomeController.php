<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use League\Csv\Statement;
use Phpml\Regression\LeastSquares;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function random()
    {

        $samples = [[73676, 1996, 1], [77006, 1998, 2], [10565, 2000, 3], [146088, 1995, 2], [15000, 2001, 5], [65940, 2000, 6], [9300, 2000, 4], [93739, 1996, 5], [153260, 1994, 5], [17764, 2002, 6], [57000, 1998, 1], [15000, 2000, 4]];
        $targets = [2000, 2750, 15500, 960, 4400, 8800, 7100, 2550, 1025, 5900, 4600, 4400];

        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        return $regression->predict([60000, 1995, 4]);

    }

    public function propertydata()
    {
        $csv = Reader::createFromPath('csv/finalIsbData.csv', 'r');
        $csv->setHeaderOffset(0);

//get 25 records starting from the 11th row
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
                        $sectornum = 640;
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
                    
    echo $i++ . '<br />';
    echo '<pre>' . var_dump($record) . '</pre><br />';
    echo 'size: '.$record['h_size'] . "<br />";
    echo 'build date: '.$record['bdate'] . "<br />";
    echo 'kitchen: '.$record['Kitchen'] . "<br />";
    echo 'garden: '.$record['Garden'] . "<br />";
    echo 'Servant Quarters: '.$record['Servant Quarters'] . "<br />";
    echo 'jacuzzi: '.$record['Jacuzzi'] . "<hr />";

/*
    if($record['Swimming Pool'] == "Yes") $swimmingPool = 1.5;
    else $swimmingPool = 1;

    $Kitchen = intval($record['Kitchen']);

    if($record['Gym'] == "Yes") $Gym = 1.5;
    else $Gym = 1;

    $Floors = intval($record['Floors']);

    if($record['Imported Kitchen'] == "Yes") $ImportedKitchen = 1.5;
    else $ImportedKitchen = 1;

    if($record['Corner Plot'] == "Yes") $CornerPlot = 1.5;
    else $CornerPlot = 1;

    $Price = intval($record['normalizedPrice']);

    $bedrooms = intval($record['bedrooms']);

    $baths = intval($record['baths']);

    array_push($samples,[$bedrooms, $baths, $sectornum]);
    array_push($targets, $Price);
    
    //$samples = [[73676, 1996, 1, 1], [73676, 1996, 1, 1], [77006, 1998, 2, 1],[77006, 1998, 2, 5], [10565, 2000, 3, 6], [146088, 1995, 2, 7], [15000, 2001, 5, 4], [65940, 2000, 6, 5], [9300, 2000, 4, 6], [93739, 1996, 5, 7], [153260, 1994, 5, 8], [17764, 2002, 6, 9], [57000, 1998, 1, 5], [15000, 2000, 4, 6]];
    //$targets = [2000, 2000, 2750, 2750, 15500, 960, 4400, 8800, 7100, 2550, 1025, 5900, 4600, 4400];
*/


                }
                
            }

        }
        //dd($targets);
        /*
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        return $regression->predict([6, 7 , 1000]);
        */
    }
}