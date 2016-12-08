<?php

$app->post('/api/FreshbooksAPI/createSinglePayment', function ($request, $response, $args) {
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
    if(empty($post_data['args']['invoiceId'])) {
        $error[] = 'invoiceId';
    }
    if(empty($post_data['args']['amount'])) {
        $error[] = 'amount';
    }
    if(empty($post_data['args']['date'])) {
        $error[] = 'date';
    }
    if(empty($post_data['args']['type'])) {
        $error[] = 'type';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/payments/payments';
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $client = $this->httpClient;
    
    $body['payment']['invoiceid'] = $post_data['args']['invoiceId'];
    $body['payment']['amount']['amount'] = (float) $post_data['args']['amount'];
    $body['payment']['date'] = $post_data['args']['date'];
    $body['payment']['type'] = $post_data['args']['type'];
    if(!empty($post_data['args']['creditId'])) {
        $body['payment']['creditid'] = $post_data['args']['creditId'];
    }
    if(!empty($post_data['args']['code'])) {
        $body['payment']['amount']['code'] = $post_data['args']['code'];
    }
    if(!empty($post_data['args']['clientId'])) {
        $body['payment']['clientid'] = $post_data['args']['clientId'];
    }
    if(!empty($post_data['args']['visState'])) {
        $body['payment']['vis_state'] = $post_data['args']['visState'];
    }
    if(!empty($post_data['args']['note'])) {
        $body['payment']['note'] = $post_data['args']['note'];
    }
    if(!empty($post_data['args']['overpaymentId'])) {
        $body['payment']['overpaymentid'] = $post_data['args']['overpaymentId'];
    }
    if(!empty($post_data['args']['gateway'])) {
        $body['payment']['gateway'] = $post_data['args']['gateway'];
    }
    if(!empty($post_data['args']['fromCredit'])) {
        $body['payment']['from_credit'] = $post_data['args']['fromCredit'];
    }
    
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
