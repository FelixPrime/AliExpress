<?php

class AliClient
{    
    /**
     * Access KEY
     * @var string
     */
    private $appKey;
    
    public function __construct()
    {
        require_once 'ali_keys.php';
        
        $this->appKey = APP_KEY;
        $this->appSecret = APP_SECRET;
    }
    
    /**
     * Get data from AliExpress
     * @param Request $request
     */
    public function getData(Request $request)
    {
        $apiUrl = $request->getApiUrl($request->getApiRequestName(), $this->appKey);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
                $request->getRequestInputParams($request)));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
        $responce = curl_exec($ch);
        
        $content = json_decode($responce);
        
        if ($content->errorCode !== 20010000) {
            $errorMsg = $request->getError($content->errorCode);
            $error = new stdClass();
            $error->status = 'ERROR';
            $error->errorCode = $content->errorCode;
            $error->errorMsg = $errorMsg;
            $content = $error;
        }
            
        curl_close($ch);
		
        return $content;
    }
}