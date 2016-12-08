<?php

$app->post('/api/FreshbooksAPI/updateSingleClient', function ($request, $response, $args) {
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
    if(empty($post_data['args']['id'])) {
        $error[] = 'id';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.freshbooks.com/accounting/account/'.$post_data['args']['accountId'].'/users/clients/'.$post_data['args']['id'];
    
    $headers['Api-Version'] = 'alpha';
    $headers['Content-Type'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $body = [];
    if(!empty($post_data['args']['busPhone'])) {
        $body['client']['bus_phone'] = $post_data['args']['busPhone'];
    }
    if(!empty($post_data['args']['companyIndustry'])) {
        $body['client']['company_industry'] = $post_data['args']['companyIndustry'];
    }
    if(!empty($post_data['args']['companySize'])) {
        $body['client']['company_size'] = $post_data['args']['companySize'];
    }
    if(!empty($post_data['args']['currencyCode'])) {
        $body['client']['currency_code'] = $post_data['args']['currencyCode'];
    }
    if(!empty($post_data['args']['email'])) {
        $body['client']['email'] = $post_data['args']['email'];
    }
    if(!empty($post_data['args']['fax'])) {
        $body['client']['fax'] = $post_data['args']['fax'];
    }
    if(!empty($post_data['args']['fname'])) {
        $body['client']['fname'] = $post_data['args']['fname'];
    }
    if(!empty($post_data['args']['homePhone'])) {
        $body['client']['home_phone'] = $post_data['args']['homePhone'];
    }
    if(!empty($post_data['args']['language'])) {
        $body['client']['language'] = $post_data['args']['language'];
    }
    if(!empty($post_data['args']['lname'])) {
        $body['client']['lname'] = $post_data['args']['lname'];
    }
    if(!empty($post_data['args']['mobPhone'])) {
        $body['client']['mob_phone'] = $post_data['args']['mobPhone'];
    }
    if(!empty($post_data['args']['note'])) {
        $body['client']['note'] = $post_data['args']['note'];
    }
    if(!empty($post_data['args']['organization'])) {
        $body['client']['organization'] = $post_data['args']['organization'];
    }
    if(!empty($post_data['args']['billingCity'])) {
        $body['client']['p_city'] = $post_data['args']['billingCity'];
    }
    if(!empty($post_data['args']['billingCode'])) {
        $body['client']['p_code'] = $post_data['args']['billingCode'];
    }
    if(!empty($post_data['args']['billingCountry'])) {
        $body['client']['p_country'] = $post_data['args']['billingCountry'];
    }
    if(!empty($post_data['args']['billingProvince'])) {
        $body['client']['p_province'] = $post_data['args']['billingProvince'];
    }
    if(!empty($post_data['args']['billingStreet'])) {
        $body['client']['p_street'] = $post_data['args']['billingStreet'];
    }
    if(!empty($post_data['args']['billingStreet2'])) {
        $body['client']['p_street2'] = $post_data['args']['billingStreet2'];
    }
    if(!empty($post_data['args']['prefEmail'])) {
        $body['client']['pref_email'] = $post_data['args']['prefEmail'];
    }
    if(!empty($post_data['args']['prefGmail'])) {
        $body['client']['pref_gmail'] = $post_data['args']['prefGmail'];
    }
    if(!empty($post_data['args']['shippingCity'])) {
        $body['client']['s_city'] = $post_data['args']['shippingCity'];
    }
    if(!empty($post_data['args']['shippingCode'])) {
        $body['client']['s_code'] = $post_data['args']['shippingCode'];
    }
    if(!empty($post_data['args']['shippingCountry'])) {
        $body['client']['s_country'] = $post_data['args']['shippingCountry'];
    }
    if(!empty($post_data['args']['shippingProvince'])) {
        $body['client']['s_province'] = $post_data['args']['shippingProvince'];
    }
    if(!empty($post_data['args']['shippingStreet'])) {
        $body['client']['s_street'] = $post_data['args']['shippingStreet'];
    }
    if(!empty($post_data['args']['shippingStreet2'])) {
        $body['client']['s_street2'] = $post_data['args']['shippingStreet2'];
    }
    if(!empty($post_data['args']['vatName'])) {
        $body['client']['vat_name'] = $post_data['args']['vatName'];
    }
    if(!empty($post_data['args']['vatNumber'])) {
        $body['client']['vat_number'] = $post_data['args']['vatNumber'];
    }
    if(!empty($post_data['args']['visState'])) {
        $body['client']['vis_state'] = $post_data['args']['visState'];
    }
    
    $client = $this->httpClient;

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
