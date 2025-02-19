<?php

namespace App\Http\Controllers;

use App\Models\Penya;
use App\Models\Location;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    const MAX_HEIGHT = 5;
    const MAX_WIDTH = 5;
    

    // Show the Draw View for a spesific year
    public function show($year = null)
    {
        $currentYear = now()->year;
        if(is_null($year)){
            $year = $currentYear;
        }
        $locations = Location::where('year', $year)->with('crew')->get();
        $showDrawButton = true;
        $penyas = Penya::all();
        if ($locations->count() > 0) {
            $showDrawButton = false;
        }
        $rangeYears = range($currentYear-4, $currentYear);
        rsort($rangeYears);

        return view('admin.lottery', [
            'penyas'=>$penyas,
            'locations' => $locations,
            'year' => $year ?? now()->year,
            'showDrawButton' => $showDrawButton,
            'rangeYears' => $rangeYears
        ]);
    }




    // Perform the draw process and assign locations to crews
    public function draw(Request $request)
    {
        $year = $request->year ?? now()->year;
        $penyas = Penya::all()->pluck('name', 'id');
        $locations = Location::where('year', $year)->get();

        if (count($penyas) === 0) {
            return back()->withErrors('No hay peñas disponibles para este año.');
        }

        $places = [];
        $nPenyas = count($penyas);

        // Assign random valid coordinates to each crew
        foreach($penyas as $penyaId => $penyaName){
            $isValidCoord = false;
            while(!$isValidCoord){
                $x = rand(0, (self::MAX_WIDTH-1));
                $y = rand(0, (self::MAX_HEIGHT-1));
                $coord = [$x, $y];
                $isValidCoord = $this->isValidCoord($coord, $places);
                if($isValidCoord){
                    $places[$penyaId] = $coord;
                }
            }    
        }
       
        $locations = [];
        foreach ($places as $crewId => $coord) {
            $locations[] = [
                'x' => $coord[0], //x
                'y' => $coord[1], //y
                'penya_id' => $penyaId, // Avoid assigning crew_id if it's "No Crew"
                'year' => $year
            ];
        }
        //Save locations in DB
        foreach ($locations as $location) {
            Location::create($location); 
        }

        return redirect()->route('lottery.draw', ['year' => $year]);
    }



    private function isValidCoord($coord, $places)
    {
        $isValidCoord = true;
        list($x, $y) = $coord;
        if(in_array($coord, $places)){
            $isValidCoord = false;
        }
        return $isValidCoord;
    }
}
