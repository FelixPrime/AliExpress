<?php

require_once 'Request.php';

/**
 * getPromotionLinks
 * @link http://portals.aliexpress.com/help/help_center_API.html API documentation
 */
class PromotionLinksRequest extends Request
{
    
    /**
     * List of fields needed to return, options including “tracking ID” , 
     * ”publisher ID” , ”promotion URL”. Please separate each other with “,” 
     * if you want to use more than one field.
     * (Field list: totalResults, trackingId, publisherId, url, promotionUrl)
     * @var string 
     */
    private $fields;
    
    /**
     * The tracking ID of your account in the Portals platform.
     * @var string
     */
    private $trackingId;
    
    /**
     * The list of URLs need to be converted to promotion URLs. Please separate 
     * each URL with an English “,” if you want to use more than one field. 
     * The limit of URL’s that can be used is 50. 
     * @var string 
     */
    private $urls;
    
    public function getFields()
    {
        return $this->fields;
    }

    public function getTrackingId()
    {
        return $this->trackingId;
    }

    public function getUrls()
    {
        return explode(",", $this->urls);
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setTrackingId($trackingId)
    {
        $this->trackingId = $trackingId;
    }

    public function setUrls($urls)
    {
        if (is_array($urls)) {
            $urls = implode(",", $urls);
        }
        $this->urls = $urls;
    }
    
    /**
     * Return API Request name
     * @return string
     */
    public function getApiRequestName()
    {
        return 'api.getPromotionLinks';
    }
    
    public function getRequestInputParams()
    {
        $params = array();
        
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $params[$key] = $value;
            }
        }
        if (!isset($params['fields']) || empty($params['fields'])) {
            $params['fields'] = $this->setDefaultFields();
        }
        return $params;
    }
    
    /**
     * Get Error
     * @param string $error
     * @return string
     */
    public function getError($error)
    {
        $aError = array(
            '20010000' => 'Call succeeds',
            '20020000' => 'System Error',
            '20030000' => 'Unauthorized transfer request',
            '20030010' => 'Required parameters',
            '20030020' => 'Invalid protocol format',
            '20030030' => 'API version input parameter error',
            '20030040' => 'API name space input parameter error',
            '20030050' => 'API name input parameter error',
            '20030060' => 'Fields input parameter error',
            '20030070' => 'Tracking ID input parameter error',
            '20030080' => 'URL input parameter error or beyond the maximum number of the URLs',
        );
                
        if (isset($aError[$error])) {
            return $aError[$error];
        } else {
            return 'Unknown error.';
        }
    }
    
    /**
     * Set default field list
     * @return string
     */
    private function setDefaultFields()
    {
        return 'totalResults,trackingId,publisherId,url,promotionUrl';
    }
}
