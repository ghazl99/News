<?php

namespace App\Traits;

trait ApiTraitResponse {

    public function ApiResponse( $data, $status, $msg ) {

        $array = [
            'data'=>$data,
            'status'=>$status,
            'message'=>$msg
        ];
        return \response( $array );
    }
}