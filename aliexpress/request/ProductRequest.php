<?php

require_once 'Request.php';

/**
 * getPromotionProductDetail
 * @link http://portals.aliexpress.com/help/help_center_API.html API documentation
 */
class ProductRequest extends Request
{
    
    /**
     * List of fields needed to return. Please separate each other with an 
     * English comma “,” if you want to use more than one field.
     * (Field list: productId, productTitle, productUrl, imageUrl, originalPrice, 
     * salePrice, discount, evaluateScore, commission, commissionRate, 30daysCommission, 
     * volume, packageType, lotNum, validTime, storeName, storeUrl)
     * @var string 
     */
    private $fields;
    
    /**
     * The product ID
     * @var string
     */
    private $productId;
    
    public function getFields()
    {
        return $this->fields;
    }

    public function getproductId()
    {
        return $this->productId;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Return API Request name
     * @return string
     */
    public function getApiRequestName()
    {
        return 'api.getPromotionProductDetail';
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
            '20030070' => 'Product ID input parameter error',
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
        return 'productId,productTitle,productUrl,imageUrl,'
        . 'originalPrice,salePrice,discount,evaluateScore,commission,'
                . 'commissionRate,30daysCommission,volume,packageType,'
                . 'lotNum,validTime,storeName,storeUrl';
    }
}
