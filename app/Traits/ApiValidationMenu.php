<?php

namespace App\Traits;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Validator;

trait ApiValidationMenu {
    public static function scopeDummyMethod( $query, $argument = null ) {
        //
    }

    public function validation( $request ) {

        $val = $request->validate(
            [ 'type'=> 'required|max:30|unique:menus,type',
            // 'price'=>'required|numeric',
            //  'details'=> 'required',
        ] );
        if ( $val ->fails() ) {

            return $this->ApiResponse( null, 404, $val->errors() );
        }
    }
}