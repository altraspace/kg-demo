<?php
namespace App\Components;

trait ApiResponser{

    function successResponse($data = null, $message = null, $message_code=null, $code = 200)
	{
        if(!$message && $message_code)
        {
            $message = trans("response.".$message_code);
        }

	    $response = array();
        $response['success'] = true;
        $response['code'] = $message_code?:$code;
        // $response['code'] = $code;
        $response['message'] = $message?:trans('response.5004');
        if(!empty($data) && $data){
            $response['data'] = $data;
        }
		return response()->json($response, $code);
	}

    function errorResponse($message = null, $message_code=null, $code = 422)
	{
        if(gettype($message) == 'object' && get_class($message) == 'Illuminate\Validation\Validator') {
            // $message = $message->errors();
            $message = $message->errors()->all();
            // $message = $message->errors()->first();
            $message_code = 5006;
        }

        if(!$message && $message_code)
        {
            $message = trans("response.".$message_code);
        }
        
        $response = array();
        $response['success'] = false;
        $response['code'] = $message_code?:$code;
        $response['message'] = $message?:trans('response.5003');
		return response()->json($response, $code);
	}

	function customResponse($message = null, $code = 103): \Illuminate\Http\JsonResponse
    {
        $response = array();
        $response['success'] = false;
        // $response['status'] = 'Default Error';
        $response['code'] = $code?:103;
        $response['message'] = $message?:trans('response.103');
        return response()->json($response, $code);
    }

	function exceptionResponse(\Exception $e)
	{
		return response()->json([
			'success'=>false,
			'code'=> 500,
			'message' => $e->getMessage(),
			'data' => null
		], 500);

	}
}
?>