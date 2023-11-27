<?php

namespace App\Http\Controllers;

use App\Models\EspDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EspDeviceController extends Controller
{
    public function status (Request $request)
    {
        $mac = json_encode($request->json()->get('mac'));
        $record = EspDevice::query()->firstOrCreate([
            'mac_address' => Str::remove('"', $mac),
        ],
        [
            'API' => Str::random(60),
        ]);
        //Storage::prepend('public/esp/file.log', Str::remove('"', $mac));
        return $record->API;
    }
}
