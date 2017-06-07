<?php

$app->post('/api/FreshbooksAPI/createSingleInvoice', function ($request, $response, $args) {
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
    if(empty($post_data['args']['customerId'])) {
        $error[] = 'customerId';
    }
    if(empty($post_data['args']['createDate'])) {
        $error[] = 'createDate';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/invoices/invoices';
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $body = [];
    $body['invoice']['customerid'] = $post_data['args']['customerId'];
    $dateTime = new DateTime($post_data['args']['createDate']);
    $body['invoice']['create_date'] = $dateTime->format('Y-m-d');

    if(!empty($post_data['args']['ownerId'])) {
        $body['invoice']['ownerid'] = $post_data['args']['ownerId'];
    }
    if(!empty($post_data['args']['estimateId'])) {
        $body['invoice']['estimateid'] = $post_data['args']['estimateId'];
    }
    if(!empty($post_data['args']['basecampId'])) {
        $body['invoice']['basecampid'] = $post_data['args']['basecampId'];
    }
    if(!empty($post_data['args']['sentId'])) {
        $body['invoice']['sentid'] = $post_data['args']['sentId'];
    }
    if(!empty($post_data['args']['status'])) {
        $body['invoice']['status'] = $post_data['args']['status'];
    }
    if(!empty($post_data['args']['parent'])) {
        $body['invoice']['parent'] = $post_data['args']['parent'];
    }
    if(!empty($post_data['args']['displayStatus'])) {
        $body['invoice']['display_status'] = $post_data['args']['displayStatus'];
    }
    if(!empty($post_data['args']['autobillStatus'])) {
        $body['invoice']['autobill_status'] = $post_data['args']['autobillStatus'];
    }
    if(!empty($post_data['args']['paymentStatus'])) {
        $body['invoice']['payment_status'] = $post_data['args']['paymentStatus'];
    }
    if(!empty($post_data['args']['lastOrderStatus'])) {
        $body['invoice']['last_order_status'] = $post_data['args']['lastOrderStatus'];
    }
    if(!empty($post_data['args']['disputeStatus'])) {
        $body['invoice']['dispute_status'] = $post_data['args']['disputeStatus'];
    }
    if(!empty($post_data['args']['depositStatus'])) {
        $body['invoice']['deposit_status'] = $post_data['args']['depositStatus'];
    }
    if(!empty($post_data['args']['autoBill'])) {
        $body['invoice']['auto_bill'] = $post_data['args']['autoBill'];
    }
    if(!empty($post_data['args']['v3Status'])) {
        $body['invoice']['v3_status'] = $post_data['args']['v3Status'];
    }
    if(!empty($post_data['args']['invoiceNumber'])) {
        $body['invoice']['invoice_number'] = $post_data['args']['invoiceNumber'];
    }
    if(!empty($post_data['args']['generationDate'])) {
        $dateTime = new DateTime($post_data['args']['generationDate']);
        $body['invoice']['generation_date'] = $dateTime->format('Y-m-d');
    }
    if(!empty($post_data['args']['discountValue'])) {
        $body['invoice']['discount_value'] = $post_data['args']['discountValue'];
    }
    if(!empty($post_data['args']['discountDescription'])) {
        $body['invoice']['discount_description'] = $post_data['args']['discountDescription'];
    }
    if(!empty($post_data['args']['poNumber'])) {
        $body['invoice']['po_number'] = $post_data['args']['poNumber'];
    }
    if(!empty($post_data['args']['currencyCode'])) {
        $body['invoice']['currency_code'] = $post_data['args']['currencyCode'];
    }
    if(!empty($post_data['args']['language'])) {
        $body['invoice']['language'] = $post_data['args']['language'];
    }
    if(!empty($post_data['args']['terms'])) {
        $body['invoice']['terms'] = $post_data['args']['terms'];
    }
    if(!empty($post_data['args']['notes'])) {
        $body['invoice']['notes'] = $post_data['args']['notes'];
    }
    if(!empty($post_data['args']['address'])) {
        $body['invoice']['address'] = $post_data['args']['address'];
    }
    if(!empty($post_data['args']['depositAmount'])) {
        $body['invoice']['deposit_amount'] = $post_data['args']['depositAmount'];
    }
    if(!empty($post_data['args']['depositPercentage'])) {
        $body['invoice']['deposit_percentage'] = $post_data['args']['depositPercentage'];
    }
    if(!empty($post_data['args']['gmail'])) {
        $body['invoice']['gmail'] = $post_data['args']['gmail'];
    }
    if(!empty($post_data['args']['showAttachments'])) {
        $body['invoice']['show_attachments'] = $post_data['args']['showAttachments'];
    }
    if(!empty($post_data['args']['visState'])) {
        $body['invoice']['vis_state'] = $post_data['args']['visState'];
    }
    if(!empty($post_data['args']['street'])) {
        $body['invoice']['street'] = $post_data['args']['street'];
    }
    if(!empty($post_data['args']['street2'])) {
        $body['invoice']['street2'] = $post_data['args']['street2'];
    }
    if(!empty($post_data['args']['city'])) {
        $body['invoice']['city'] = $post_data['args']['city'];
    }
    if(!empty($post_data['args']['province'])) {
        $body['invoice']['province'] = $post_data['args']['province'];
    }
    if(!empty($post_data['args']['code'])) {
        $body['invoice']['code'] = $post_data['args']['code'];
    }
    if(!empty($post_data['args']['country'])) {
        $body['invoice']['country'] = $post_data['args']['country'];
    }
    if(!empty($post_data['args']['organization'])) {
        $body['invoice']['organization'] = $post_data['args']['organization'];
    }
    if(!empty($post_data['args']['fname'])) {
        $body['invoice']['fname'] = $post_data['args']['fname'];
    }
    if(!empty($post_data['args']['lname'])) {
        $body['invoice']['lname'] = $post_data['args']['lname'];
    }
    if(!empty($post_data['args']['vatName'])) {
        $body['invoice']['vat_name'] = $post_data['args']['vatName'];
    }
    if(!empty($post_data['args']['vatNumber'])) {
        $body['invoice']['vat_number'] = $post_data['args']['vatNumber'];
    }
    if(!empty($post_data['args']['dueOffsetDays'])) {
        $body['invoice']['due_offset_days'] = $post_data['args']['dueOffsetDays'];
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
