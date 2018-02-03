<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 03/02/18
 * Time: 12:57
 */

namespace App\library;

trait CustomResponses {

    public function invalid_request($api = 'no',$message='invalid request',$message_type='') {
        if ($api == 'yes') {
            return response()->json(['message' => $message,'message_type' => $message_type]);
        }
        return redirect()->back()->withError($message);
    }

    public function complete_request($api='no',$message='', $message_type='') {
        if ($api == 'yes') {
            return response()->json(['message' => $message, 'message_type' => $message_type ]);
        }
        return redirect()->back()->withError($message);
    }

}