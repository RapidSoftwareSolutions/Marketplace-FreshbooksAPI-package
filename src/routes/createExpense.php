<?php

$app->post('/api/FreshbooksAPI/createExpense', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken';
    }
    if(empty($post_data['args']['accountId'])) {
        $error[] = 'accountId';
    }
    if(empty($post_data['args']['amount'])) {
        $error[] = 'amount';
    }
    if(empty($post_data['args']['date'])) {
        $error[] = 'date';
    }
    if(empty($post_data['args']['staffId'])) {
        $error[] = 'staffId';
    }
    if(empty($post_data['args']['categoryId'])) {
        $error[] = 'categoryId';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/expenses/expenses';
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $body['expense']['amount']['amount'] = $post_data['args']['amount'];
    $body['expense']['date'] = $post_data['args']['date'];
    $body['expense']['staffid'] = $post_data['args']['staffId'];
    $body['expense']['categoryid'] = $post_data['args']['categoryId'];
    if(!empty($post_data['args']['markupPercent'])) {
        $body['expense']['markup_percent'] = $post_data['args']['markupPercent'];
    }
    if(!empty($post_data['args']['projectId'])) {
        $body['expense']['projectid'] = $post_data['args']['projectId'];
    }
    if(!empty($post_data['args']['clientId'])) {
        $body['expense']['clientid'] = $post_data['args']['clientId'];
    }
    if(!empty($post_data['args']['taxPercent1'])) {
        $body['expense']['taxPercent1'] = $post_data['args']['taxPercent1'];
    }
    if(!empty($post_data['args']['taxName1'])) {
        $body['expense']['taxName1'] = $post_data['args']['taxName1'];
    }
    if(!empty($post_data['args']['taxPercent2'])) {
        $body['expense']['taxPercent2'] = $post_data['args']['taxPercent2'];
    }
    if(!empty($post_data['args']['taxName2'])) {
        $body['expense']['taxName2'] = $post_data['args']['taxName2'];
    }
    if(!empty($post_data['args']['isDuplicate'])) {
        $body['expense']['isduplicate'] = $post_data['args']['isDuplicate'];
    }
    if(!empty($post_data['args']['profileId'])) {
        $body['expense']['profileid'] = $post_data['args']['profileId'];
    }
    if(!empty($post_data['args']['accountName'])) {
        $body['expense']['account_name'] = $post_data['args']['accountName'];
    }
    if(!empty($post_data['args']['transactionId'])) {
        $body['expense']['transactionid'] = $post_data['args']['transactionId'];
    }
    if(!empty($post_data['args']['invoiceId'])) {
        $body['expense']['invoiceid'] = $post_data['args']['invoiceId'];
    }
    if(!empty($post_data['args']['taxAmount1'])) {
        $body['expense']['taxAmount1']['amount'] = $post_data['args']['taxAmount1'];
    }
    if(!empty($post_data['args']['taxCode1'])) {
        $body['expense']['taxCode1']['code'] = $post_data['args']['taxCode1'];
    }
    if(!empty($post_data['args']['taxAmount2'])) {
        $body['expense']['taxAmount2']['amount'] = $post_data['args']['taxAmount2'];
    }
    if(!empty($post_data['args']['taxCode2'])) {
        $body['expense']['taxCode2']['code'] = $post_data['args']['taxCode2'];
    }
    if(!empty($post_data['args']['visState'])) {
        $body['expense']['vis_state'] = $post_data['args']['visState'];
    }
    if(!empty($post_data['args']['status'])) {
        $body['expense']['status'] = $post_data['args']['status'];
    }
    if(!empty($post_data['args']['bankName'])) {
        $body['expense']['bank_name'] = $post_data['args']['bankName'];
    }
    if(!empty($post_data['args']['vendor'])) {
        $body['expense']['vendor'] = $post_data['args']['vendor'];
    }
    if(!empty($post_data['args']['extSystemId'])) {
        $body['expense']['ext_systemid'] = $post_data['args']['extSystemId'];
    }
    if(!empty($post_data['args']['hasReceipt'])) {
        $body['expense']['has_receipt'] = $post_data['args']['hasReceipt'];
    }
    if(!empty($post_data['args']['notes'])) {
        $body['expense']['notes'] = $post_data['args']['notes'];
    }
    if(!empty($post_data['args']['extInvoiceId'])) {
        $body['expense']['ext_invoiceid'] = $post_data['args']['extInvoiceId'];
    }
    if(!empty($post_data['args']['amountCode'])) {
        $body['expense']['amount']['code'] = $post_data['args']['amountCode'];
    }
    if(!empty($post_data['args']['compoundedTax'])) {
        $body['expense']['compounded_tax'] = $post_data['args']['compoundedTax'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'json' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
