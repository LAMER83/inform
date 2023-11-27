<?php

namespace App\Http\Controllers;

use App\Models\EspStore;
use App\Models\Thermometer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EspStoreController extends Controller
{

    public function esp(Request $request)
    {
        //Storage::prepend('public/esp/file.log', $request->json()->get('mac'));
        EspStore::query()->create([
            'mac' => $request->mac,
            'Wifi' => $request->Wifi_dB,
            'Temp' => $request->DS18B20,
            'ADC' => $request->ADC,
        ]);
        return true;
    }

    public function addresses(Request $request)
    {

    }

    public function test()
    {
        return view('esp');
    }
}
