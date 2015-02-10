<?php

require_once 'Request.php';

/**
 * listPromotionProduct
 * @link http://portals.aliexpress.com/help/help_center_API.html API documentation
 */
class ListProductRequest extends Request
{
    
    /**
     * List of fields needed to return. Please separate each other with an 
     * English comma “,” if you want to use more than one field.
     * @var string 
     */
    private $fields;
    
    /**
     * Product title must contain a relevant keyword. Note: You should select 
     * at least one of the parameters, keywords or category ID, when you run 
     * a query.
     * (Fields list: totalResults, productId, productTitle, productUrl, imageUrl, 
     * originalPrice, salePrice, discount, evaluateScore, commission, 
     * commissionRate, 30daysCommission, volume, packageType, lotNum, validTime)
     * @var string
     */
    private $keywords;
    
    /**
     * The category ID for the products. Add the level-1 category description 
     * below for your reference. 
     * @var string 
     */
    private $categoryId;
    
    /**
     * The minimum commission rate,must be stated in percentage, E.g. 0.03.
     * @var double
     */
    private $commissionRateFrom;
    
    /**
     * The maximum commission rate,must be stated in percentage E.g. 0.05.
     * @var double
     */
    private $commissionRateTo;
    
    /**
     * The lowest product price,must be stated in USD, E.g. 12.34.
     * @var double
     */
    private $originalPriceFrom;
    
    /**
     * The maximum product price,must be stated in USD E.g. US 56.78.
     * @var double
     */
    private $originalPriceTo;
    
    /**
     * The lower limit of the total volume by affiliates within the most 
     * recent 30 days, E.g. 123.
     * @var integer
     */
    private $volumeFrom;
    
    /**
     * The upper limit of the total volume by affiliates within the most 
     * recent 30days, for example, 456.
     * @var integer 
     */
    private $volumeTo;
    
    /**
     * Page number. The incoming value of 1 represents the first page; 
     * The incoming value of 2 represents the second page, and so on. 
     * The returned data from the first page is set to default.
     * @var pageNo
     */
    private $pageNo;
    
    /**
     * The maximum number of data that can be set on each page is 40. 
     * The default value is 20.
     * @var pageSize
     */
    private $pageSize;
    
    /**
     * You can set sort by price from high to low and from low to high, credit 
     * score from high to low and from low to high, the commission rate from 
     * high to low and from low to high, volume from high to low, the valid time 
     * from high to low and from low to high. 
     * Values(orignalPriceUp, orignalPriceDown, sellerRateDown, commissionRateUp, 
     * commissionRateDown, volumeDown, validTimeUp, validTimeDown) 
     * @var string
     */
    private $sort;
    
    /**
     * The lower limit of the credit score of the seller, for example, 12.
     * @var integer 
     */
    private $startCreditScore;
    
    /**
     * The upper limit of the credit score of the seller, for example, 123.
     * @var integer
     */
    private $endCreditScore;
    
    public function getFields()
    {
        return $this->fields;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getCommissionRateFrom()
    {
        return $this->commissionRateFrom;
    }

    public function getCommissionRateTo()
    {
        return $this->commissionRateTo;
    }

    public function getOriginalPriceFrom()
    {
        return $this->originalPriceFrom;
    }

    public function getOriginalPriceTo()
    {
        return $this->originalPriceTo;
    }

    public function getVolumeFrom()
    {
        return $this->volumeFrom;
    }

    public function getVolumeTo()
    {
        return $this->volumeTo;
    }

    public function getPageNo()
    {
        return $this->pageNo;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getStartCreditScore()
    {
        return $this->startCreditScore;
    }

    public function getEndCreditScore()
    {
        return $this->endCreditScore;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function setCommissionRateFrom($commissionRateFrom)
    {
        $this->commissionRateFrom = $commissionRateFrom;
    }

    public function setCommissionRateTo($commissionRateTo)
    {
        $this->commissionRateTo = $commissionRateTo;
    }

    public function setOriginalPriceFrom($originalPriceFrom)
    {
        $this->originalPriceFrom = $originalPriceFrom;
    }

    public function setOriginalPriceTo($originalPriceTo)
    {
        $this->originalPriceTo = $originalPriceTo;
    }

    public function setVolumeFrom($volumeFrom)
    {
        $this->volumeFrom = $volumeFrom;
    }

    public function setVolumeTo($volumeTo)
    {
        $this->volumeTo = $volumeTo;
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    public function setStartCreditScore($startCreditScore)
    {
        $this->startCreditScore = $startCreditScore;
    }

    public function setEndCreditScore($endCreditScore)
    {
        $this->endCreditScore = $endCreditScore;
    }
    
    /**
     * Return API Request name
     * @return string
     */
    public function getApiRequestName()
    {
        return 'api.listPromotionProduct';
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
            '20030070' => 'Keyword input parameter error',
            '20030080' => 'Category ID input parameter error',
            '20030090' => 'Tracking ID input parameter error',
            '20030100' => 'Commission rate input parameter error',
            '20030110' => 'Original Price input parameter error',
            '20030120' => 'Discount input parameter error',
            '20030130' => 'Volume input parameter error',
            '20030140' => 'Page number input parameter error',
            '20030150' => 'Page size input parameter error',
            '20030160' => 'Sort input parameter error',
            '20030170' => 'Credit Score input parameter error',
        );
        
        if (isset($aError[$error])) {
            return $aError[$error];
        } else {
            return 'Unknown error.';
        }
    }
    
    /**
     * Set default fields list
     * @return string
     */
    private function setDefaultFields()
    {
        return 'totalResults,productId,productTitle,productUrl,imageUrl,'
        . 'originalPrice,salePrice,discount,evaluateScore,commission,'
                . 'commissionRate,30daysCommission,volume,packageType,'
                . 'lotNum,validTime';
    }
}
