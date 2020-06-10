<?php

namespace Marketplace\Amazon;

class MwsApi 
{
    protected $client;

    public function __construct($client) { $this->client = $client; }
    public function ping() { echo get_called_class(), '::', __FUNCTION__, PHP_EOL; }
}

class FeedApi extends MwsApi { }
class FinanceApi extends MwsApi { }

class FulfillmentByAmazonApi extends MwsApi
{
    public function fulfillmentInbound()
    {
        if (!isset($this->fulfillmentInbound)) {
            $this->fulfillmentInbound = new FulfillmentInbound($this);
        }
        return $this->fulfillmentInbound;
    }

    public function fulfillmentInventory()
    {
        if (!isset($this->fulfillmentInventory)) {
            $this->fulfillmentInventory = new FulfillmentInventory($this);
        }
        return $this->fulfillmentInventory;
    }

    public function fulfillmentOutbound()
    {
        if (!isset($this->fulfillmentOutbound)) {
            $this->fulfillmentOutbound = new FulfillmentOutbound($this);
        }
        return $this->fulfillmentOutbound;
    }
}
class FulfillmentInbound extends MwsApi { }
class FulfillmentInventory extends MwsApi { }
class FulfillmentOutbound extends MwsApi { }

class MerchantFulfillmentApi extends MwsApi { }
class OffAmazonPaymentApi extends MwsApi { }
class OffAmazonPaymentsSandboxApi extends MwsApi { }
class OrderApi extends MwsApi { }
class ProductApi extends MwsApi { }
class RecommendationApi extends MwsApi { }

class ReportApi extends MwsApi 
{ 
    public function reports()
    {
        if (!isset($this->reports)) {
            $this->reports = new Reports($this);
        }
        return $this->reports;
    }

    public function reportSchedule()
    {
        if (!isset($this->reportSchedule)) {
            $this->reportSchedule = new ReportSchedule($this);
        }
        return $this->reportSchedule;
    }
}
class Reports extends MwsApi { }
class ReportSchedule extends MwsApi { }

class SellerApi extends MwsApi { }

class SubscriptionApi extends MwsApi
{ 
    public function destinations()
    {
        if (!isset($this->destinations)) {
            $this->destinations = new Destinations($this);
        }
        return $this->destinations;
    }

    public function subscriptions()
    {
        if (!isset($this->subscriptions)) {
            $this->subscriptions = new Subscriptions($this);
        }
        return $this->subscriptions;
    }
}
class Destinations extends MwsApi { }
class Subscriptions extends MwsApi { }

class Client
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function curlGet($url, $params) { }

    public function sendRequest($url, $params)
    {
        // call curlGet($url, $params);
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function feedApi()
    {
        if (!isset($this->feedApi)) {
            $this->feedApi = new FeedApi($this);
        }
        return $this->feedApi;
    }

    public function financeApi()
    {
        if (!isset($this->financeApi)) {
            $this->financeApi = new FinanceApi($this);
        }
        return $this->financeApi;
    }

    public function fulfillmentByAmazonApi()
    {
        if (!isset($this->fulfillmentByAmazonApi)) {
            $this->fulfillmentByAmazonApi = new FulfillmentByAmazonApi($this);
        }
        return $this->fulfillmentByAmazonApi;
    }

    public function merchantFulfillmentApi() 
    {
        if (!isset($this->merchantFulfillmentApi)) {
            $this->merchantFulfillmentApi = new MerchantFulfillmentApi($this);
        }
        return $this->merchantFulfillmentApi;
    }

    public function offAmazonPaymentApi() 
    {
        if (!isset($this->offAmazonPaymentApi)) {
            $this->offAmazonPaymentApi = new OffAmazonPaymentApi($this);
        }
        return $this->offAmazonPaymentApi;
    }

    public function offAmazonPaymentsSandboxApi() 
    {
        if (!isset($this->offAmazonPaymentsSandboxApi)) {
            $this->offAmazonPaymentsSandboxApi = new OffAmazonPaymentsSandboxApi($this);
        }
        return $this->offAmazonPaymentsSandboxApi;
    }

    public function orderApi() 
    {
        if (!isset($this->orderApi)) {
            $this->orderApi = new OrderApi($this);
        }
        return $this->orderApi;
    }

    public function productApi() 
    {
        if (!isset($this->productApi)) {
            $this->productApi = new ProductApi($this);
        }
        return $this->productApi;
    }

    public function recommendationApi()
    {
        if (!isset($this->recommendationApi)) {
            $this->recommendationApi = new RecommendationApi($this);
        }
        return $this->recommendationApi;
    }

    public function reportApi() 
    {
        if (!isset($this->reportApi)) {
            $this->reportApi = new ReportApi($this);
        }
        return $this->reportApi;
    }

    public function sellerApi() 
    {
        if (!isset($this->sellerApi)) {
            $this->sellerApi = new SellerApi($this);
        }
        return $this->sellerApi;
    }

    public function subscriptionApi() 
    {
        if (!isset($this->subscriptionApi)) {
            $this->subscriptionApi = new SubscriptionApi($this);
        }
        return $this->subscriptionApi;
    }
}

$amazon = new Client([]);

$amazon->feedApi()->ping();
$amazon->financeApi()->ping();

$amazon->fulfillmentByAmazonApi()->ping();
$amazon->fulfillmentByAmazonApi()->fulfillmentInbound()->ping();
$amazon->fulfillmentByAmazonApi()->fulfillmentInventory()->ping();
$amazon->fulfillmentByAmazonApi()->fulfillmentOutbound()->ping();

$amazon->merchantFulfillmentApi()->ping();
$amazon->offAmazonPaymentApi()->ping();
$amazon->offAmazonPaymentsSandboxApi()->ping();
$amazon->orderApi()->ping();
$amazon->productApi()->ping();
$amazon->recommendationApi()->ping();

$amazon->reportApi()->ping();
$amazon->reportApi()->reports()->ping();
$amazon->reportApi()->reportSchedule()->ping();

$amazon->sellerApi()->ping();

$amazon->subscriptionApi()->ping();
$amazon->subscriptionApi()->destinations()->ping();
$amazon->subscriptionApi()->subscriptions()->ping();
