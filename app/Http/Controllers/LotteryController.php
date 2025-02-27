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
        $locations = Location::where('year', $year)->with('penya')->get();
        $showDrawButton = true;
        $penyas = Penya::all();
        if ($locations->count() > 0) {
            $showDrawButton = false;
        }
        $rangeYears = range($currentYear-4, $currentYear);
        rsort($rangeYears);
        $places = [];
        foreach ($locations as $location) {
            $index = ($location->y * 9) + $location->x; 
            $places[$index] = $location->penya; 
        }
        return view('admin.lottery', [
            'penyas'=>$penyas,
            'locations' => $locations,
            'year' => $year ?? now()->year,
            'showDrawButton' => $showDrawButton,
            'rangeYears' => $rangeYears,
            'places'=>$places
        ]);
    }




    // Perform the draw process and assign locations to crews
    public function draw(Request $request)
    {
        
        
        $year = filter_var($request->year, FILTER_VALIDATE_INT) ?? now()->year;
        $penyas = Penya::all()->pluck('name', 'id');
        $locations = Location::where('year', $year)->get();
        
        if (count($penyas) === 0) {
            return back()->withErrors('No hay peñas disponibles para este año.');
        }

        $places = [];
        $nPenyas = count($penyas);

        // Assign random valid coordinates to each crew
        foreach($penyas as $penya_id => $penyaName){
            $isValidCoord = false;
            while(!$isValidCoord){
                $x = rand(0, (self::MAX_WIDTH-1));
                $y = rand(0, (self::MAX_HEIGHT-1));
                $coord = [$x, $y];
                $isValidCoord = $this->isValidCoord($coord, $places);
                if($isValidCoord){
                    $places[$penya_id] = $coord;
                }
            }    
        }
       
        $locations = [];
        foreach ($places as $penya_id => $coord) {
            $locations[] = [
                'x' => $coord[0], //x
                'y' => $coord[1], //y
                'penya_id' => $penya_id, // Avoid assigning crew_id if it's "No Crew"
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
