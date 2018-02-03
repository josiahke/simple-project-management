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
        return self::determine_msg_type($message_type,$message);
    }

    public function complete_request($api='no',$message='', $message_type='') {
        if ($api == 'yes') {
            return response()->json(['message' => $message, 'message_type' => $message_type ]);
        }
        return self::determine_msg_type($message_type,$message);
    }

    public function determine_msg_type ($msg_type,$message) {
        if ($msg_type == 'success') {
            return redirect()->back()->withSuccess($message);
        }if ($msg_type == 'warning') {
            return redirect()->back()->withWarning($message);
        }if ($msg_type == 'info') {
            return redirect()->back()->withInfo($message);
        }if ($msg_type == 'error') {
            return redirect()->back()->withError($message);
        }if ($msg_type == 'message') {
            return redirect()->back()->withMessage($message);
        }
        return redirect()->back()->withError($message);
    }

}