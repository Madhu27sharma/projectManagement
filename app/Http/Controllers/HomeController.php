<?php

namespace App\Http\Controllers;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use GeoIP;
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
    public function index(Request $request)
    {
        $reader = new Reader(storage_path('app/geoip/GeoLite2-City.mmdb'));
            $record = $reader->city($request->ip());
          
            return view('home', [

                'city' => $record->city->name,
                'state' => $record->subdivisions[0]->name ?? 'Unknown',
            ]);
           
    }
}
