<?php

$app->post('/api/FreshbooksAPI/updateSingleStaff', function ($request, $response, $args) {
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
    if(empty($post_data['args']['staffId'])) {
        $error[] = 'staffId cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/users/staffs/'.$post_data['args']['staffId'];
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $client = $this->httpClient;
    
    $body = [];
    if(!empty($post_data['args']['fax'])) {
        $body['staff']['fax'] = $post_data['args']['fax'];
    }
    if(!empty($post_data['args']['rate'])) {
        $body['staff']['rate'] = $post_data['args']['rate'];
    }
    if(!empty($post_data['args']['note'])) {
        $body['staff']['note'] = $post_data['args']['note'];
    }
    if(!empty($post_data['args']['displayName'])) {
        $body['staff']['display_name'] = $post_data['args']['displayName'];
    }
    if(!empty($post_data['args']['lname'])) {
        $body['staff']['lname'] = $post_data['args']['lname'];
    }
    if(!empty($post_data['args']['mobPhone'])) {
        $body['staff']['mob_phone'] = $post_data['args']['mobPhone'];
    }
    if(!empty($post_data['args']['homePhone'])) {
        $body['staff']['home_phone'] = $post_data['args']['homePhone'];
    }
    if(!empty($post_data['args']['email'])) {
        $body['staff']['email'] = $post_data['args']['email'];
    }
    if(!empty($post_data['args']['username'])) {
        $body['staff']['username'] = $post_data['args']['username'];
    }
    if(!empty($post_data['args']['billingProvince'])) {
        $body['staff']['p_province'] = $post_data['args']['billingProvince'];
    }
    if(!empty($post_data['args']['billingCity'])) {
        $body['staff']['p_city'] = $post_data['args']['billingCity'];
    }
    if(!empty($post_data['args']['billingCode'])) {
        $body['staff']['p_code'] = $post_data['args']['billingCode'];
    }
    if(!empty($post_data['args']['billingCountry'])) {
        $body['staff']['p_country'] = $post_data['args']['billingCountry'];
    }
    if(!empty($post_data['args']['busPhone'])) {
        $body['staff']['bus_phone'] = $post_data['args']['busPhone'];
    }
    if(!empty($post_data['args']['language'])) {
        $body['staff']['language'] = $post_data['args']['language'];
    }
    if(!empty($post_data['args']['billingStreet2'])) {
        $body['staff']['p_street2'] = $post_data['args']['billingStreet2'];
    }
    if(!empty($post_data['args']['visState'])) {
        $body['staff']['vis_state'] = $post_data['args']['visState'];
    }
    if(!empty($post_data['args']['fname'])) {
        $body['staff']['fname'] = $post_data['args']['fname'];
    }
    if(!empty($post_data['args']['organization'])) {
        $body['staff']['organization'] = $post_data['args']['organization'];
    }
    if(!empty($post_data['args']['billingStreet'])) {
        $body['staff']['p_street'] = $post_data['args']['billingStreet'];
    }
    if(!empty($post_data['args']['currencyCode'])) {
        $body['staff']['currency_code'] = $post_data['args']['currencyCode'];
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
            $result['contextWrites']['to'] = "updated";
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
