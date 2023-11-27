<?php

namespace App\Http\Controllers;

use App\Models\Thermometer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThermometerController extends Controller
{
    public function store (Request $request)
    {
        $addres = json_encode($request->json()->all());
        /* $test = '';
         $i = 0;
         foreach ($e as $value){
             if ($i === array_key_first($e)) {
                 $test = '{';
             }
             if ($i === array_key_last($e)) {
                 $test .= '0x' . strtoupper($value) . '}';
             } else {
                 $test .= '0x' . strtoupper($value) . ', ';
             }
             $i++;
         }*/
        // Storage::prepend('public/esp/file.log', $e);
        $store = Thermometer::query()->firstOrCreate(
            ['sn' => $addres]);
        // Storage::prepend('public/esp/file.log', $store);

        return "№ record to DB - $store->id";
    }
}
