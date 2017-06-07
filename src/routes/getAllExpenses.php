<?php

$app->post('/api/FreshbooksAPI/getAllExpenses', function ($request, $response, $args) {
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
    
    $client = $this->httpClient;

    //$query = [];
    if(!empty($post_data['args']['page'])) {
        $query_str .= '?page=' . (int) $post_data['args']['page'];
        //$query['page'] = (int) $post_data['args']['page'];
    } else {
        $query_str .= '?page=' . (int) 0;
        //$query['page'] = (int) 0;
    }
    if(!empty($post_data['args']['perPage'])) {
        $query_str .= '&per_page=' . (int) $post_data['args']['perPage'];
        //$query['per_page'] = (int) $post_data['args']['perPage'];
    } else {
        $query_str .= '&per_page=' . (int) 100;
        //$query['per_page'] = (int) 100;
    }
    if(!empty($post_data['args']['search'])) {
        $inc = is_array($post_data['args']['search']) ? $post_data['args']['search'] : explode(',', $post_data['args']['search']);
        $res = '';
        $i=1;
        foreach($inc as $item) {
            $search = explode('=', $item);
            ($i!=1) ? $res .= '&search['.$search[0].']='.$search[1] : $res .= 'search['.$search[0].']='.$search[1];
            $i++;
        }
        if(!empty($res)) {
            if(strstr($query_str, '?')) {
                $query_str .= '&'.$res;
            } else {
                $query_str .= '?'.$res;
            }
        }
    }
    if(!empty($post_data['args']['include'])) {
        $inc = is_array($post_data['args']['include']) ? $post_data['args']['include'] : explode(',', $post_data['args']['include']);
        $res = '';
        $i=1;
        foreach($inc as $item) {
            ($i!=1) ? $res .= '&include[]='.$item : $res .= 'include[]='.$item;
            $i++;
        }
        if(!empty($res)) {
            if(strstr($query_str, '?')) {
                $query_str .= '&'.$res;
            } else {
                $query_str .= '?'.$res;
            }
        }
    }

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers
                //'query' => $query
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
