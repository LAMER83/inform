<?php

namespace App\Actions\StorageBox;

use App\Models\Kultura;
use App\Models\Nomenklature;
use App\Models\Reproduktion;
use App\Models\StorageName;

class StorageBoxCreateAction
{
    public function __invoke()
    {
        foreach (Nomenklature::orderby('name')->get() as $value){
            $nomen_arr [$value->kultura_id] [$value->name] =  $value->id;
        }
        asort($nomen_arr);

        foreach (Reproduktion::all() as $value){
            $reprod_arr [$value->kultura_id] [$value->id] =  $value->name;
        }

        $storage = StorageName::orderby('name')->get();

        $kultura = Kultura::orderby('name')->get();

        return [
            'storage' => $storage,
            'kultura' => $kultura,
            'nomen_arr' => json_encode($nomen_arr, JSON_UNESCAPED_UNICODE),
            'reprod_arr' => json_encode($reprod_arr, JSON_UNESCAPED_UNICODE)
        ];
    }

}
