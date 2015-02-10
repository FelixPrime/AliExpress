<?php

/**
 * AliExpress Request
 */
abstract class Request
{
    /**
     * Template api url
     * @var string
     */
    private $apiUrl = 'http://gw.api.alibaba.com/openapi/param2/2/portals.open/[api_request_name]/[app_key]';
    
    /**
     * Return api request name
     */
    protected abstract function getApiRequestName();
    
    /**
     * Return error message by error code
     */
    protected abstract function getError($error);
    
    /**
     * Return array of request input params
     */
    protected abstract function getRequestInputParams();
    
    /**
     * Return API url
     * @param string $apiRequestName
     * @param string $appKey
     * @return string
     */
    public function getApiUrl($apiRequestName, $appKey)
    {
        $apiUrl = str_replace('[app_key]', $appKey, 
                str_replace('[api_request_name]', $apiRequestName, $this->apiUrl));
        
        return $apiUrl;
    }
}
