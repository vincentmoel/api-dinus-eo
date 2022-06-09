<?php 

if(!function_exists('response_format'))
{
    function response_format($httpCode, $status, $message, $data)
    {
        return response()->json([
            'code'      => $httpCode,
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ]);
    }
}

?>