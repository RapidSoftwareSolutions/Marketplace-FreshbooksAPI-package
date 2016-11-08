<?php

$app->post('/api/FreshbooksAPI/updateSinglePayment', function ($request, $response, $args) {
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
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken cannot be empty';
    }
    if(empty($post_data['args']['accountId'])) {
        $error[] = 'accountId cannot be empty';
    }
    if(empty($post_data['args']['invoiceId'])) {
        $error[] = 'invoiceId cannot be empty';
    }
    if(empty($post_data['args']['paymentId'])) {
        $error[] = 'invoiceId cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/payments/payments/'.$post_data['args']['paymentId'];
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $client = $this->httpClient;
    
    $body = [];
    if(!empty($post_data['args']['invoiceId'])) {
        $body['payment']['invoiceid'] = $post_data['args']['invoiceId'];
    }
    if(!empty($post_data['args']['amount'])) {
        $body['payment']['amount']['amount'] = (float) $post_data['args']['amount'];
    }
    if(!empty($post_data['args']['date'])) {
        $body['payment']['date'] = $post_data['args']['date'];
    }
    if(!empty($post_data['args']['type'])) {
        $body['payment']['type'] = $post_data['args']['type'];
    }
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

        $resp = $client->put( $query_str, 
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
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
