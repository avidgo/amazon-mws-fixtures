<?php

const EOL = PHP_EOL;

$json = json_decode(file_get_contents('mws-api.json'));

foreach($json as $key => $val) {
    echo $key, ' ';
#   echo $val->Name, ' ';
    echo 'VERSION=', $val->Version, ' ';
    echo EOL;

    if ($key == 'Feeds') {
        foreach($val->Groups->Feeds->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Finances') {
        foreach($val->Groups->Finances->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'FulfillmentByAmazon') {
        echo "\tFulfillmentInbound", EOL;
        foreach($val->Groups->FulfillmentInbound->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
        echo "\tFulfillmentInventory", EOL;
        foreach($val->Groups->FulfillmentInventory->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
        echo "\tFulfillmentOutbound", EOL;
        foreach($val->Groups->FulfillmentOutbound->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
    }

    if ($key == 'MerchantFulfillment') {
        foreach($val->Groups->{'Merchant Fulfillment'}->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'OffAmazonPayments') {
        foreach($val->Groups->OffAmazonPayments->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'OffAmazonPayments-Sandbox') {
        foreach($val->Groups->{'OffAmazonPayments-Sandbox'}->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Orders') {
        foreach($val->Groups->{'Order Retrieval'}->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Products') {
        foreach($val->Groups->Products->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Recommendations') {
        foreach($val->Groups->Recommendations->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Reports') {
        echo "\tReports", EOL;
        foreach($val->Groups->Reports->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
        echo "\tReportSchedule", EOL;
        foreach($val->Groups->ReportSchedule->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
    }

    if ($key == 'Sellers') {
        foreach($val->Groups->{'Sellers Retrieval'}->ApiCalls as $name => $calls) {
            echo "\t", $name, EOL;
        }
    }

    if ($key == 'Subscriptions') {
        echo "\tDestinations", EOL;
        foreach($val->Groups->Destinations->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
        echo "\tSubscriptions", EOL;
        foreach($val->Groups->Subscriptions->ApiCalls as $name => $calls) {
            echo "\t\t", $name, EOL;
        }
    }

    echo EOL;
}
