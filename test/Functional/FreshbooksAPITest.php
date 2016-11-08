<?php

namespace Test\Functional;

class FreshbooksAPITest extends BaseTestCase {
    
    public function testGetIdentityInfo() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getIdentityInfo', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testCreateExpense() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "amount": "19.99",
                            "date": "2016-11-07",
                            "staffId": "1",
                            "categoryId": "3977455"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createExpense', $post_data);

        $expenseId = json_decode($response->getBody())->contextWrites->to->response->result->expense->expenseid;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $expenseId;
    }
    
    /**
     * @depends testCreateExpense
     */
    public function testGetExpense($expenseId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "expenseId": "'.$expenseId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getExpense', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateExpense
     */
    public function testUpdateSingleExpense($expenseId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "expenseId": "'.$expenseId.'",
                            "amount": "17.99"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSingleExpense', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetAllExpenses() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getAllExpenses', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateExpense
     */
    public function testDeleteSingleExpense($expenseId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "expenseId": "'.$expenseId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSingleExpense', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetAllExpenseCategories() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getAllExpenseCategories', $post_data);
        
        $categoryId = json_decode($response->getBody())->contextWrites->to->response->result->categories[0]->categoryid;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $categoryId;

    }
    
    /**
     * @depends testGetAllExpenseCategories
     */
    public function testGetSingleExpenseCategory($categoryId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "categoryId": "'.$categoryId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleExpenseCategory', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetGateways() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getGateways', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);

    }
    
    public function testGetInvoices() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getInvoices', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testCreateSingleInvoice() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "customerId": "107490",
                            "createDate": "'.date("Y-m-d").'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createSingleInvoice', $post_data);
        
        $invoiceId = json_decode($response->getBody())->contextWrites->to->response->result->invoice->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $invoiceId;

    }
    
    /**
     * @depends testCreateSingleInvoice
     */
    public function testGetSingleInvoice($invoiceId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "invoiceId": "'.$invoiceId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleInvoice', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleInvoice
     */
    public function testUpdateSingleInvoice($invoiceId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "invoiceId": "'.$invoiceId.'",
                            "customerId": "107490",    
                            "currencyCode": "USD"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSingleInvoice', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleInvoice
     */
    public function testDeleteSingleInvoice($invoiceId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "invoiceId": "'.$invoiceId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSingleInvoice', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetItems() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getItems', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testCreateSingleItem() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "name": "Test item new '.rand(1,10000).'",
                            "quantity": "1",
                            "inventory": "1",
                            "amount": "1000",
                            "code": "UAH",
                            "description": "some description about item"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createSingleItem', $post_data);
        
        $itemId = json_decode($response->getBody())->contextWrites->to->response->result->item->itemid;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $itemId;

    }
    
    /**
     * @depends testCreateSingleItem
     */
    public function testGetSingleItem($itemId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "itemId": "'.$itemId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleItem', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleItem
     */
    public function testUpdateSingleItem($itemId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "itemId": "'.$itemId.'",
                            "name": "Test item new upd_'.rand(1,10000).'",
                            "quantity": "5"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSingleItem', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleItem
     */
    public function testDeleteSingleItem($itemId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "itemId": "'.$itemId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSingleItem', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetPayments() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getPayments', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testCreateSinglePayment() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "invoiceId": 102830,
                            "amount": "100.00",
                            "date": "2016-11-08",
                            "type": "Cash"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createSinglePayment', $post_data);
        
        $paymentId = json_decode($response->getBody())->contextWrites->to->response->result->payment->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $paymentId;

    }
    
    /**
     * @depends testCreateSinglePayment
     */
    public function testGetSinglePayment($paymentId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "paymentId": "'.$paymentId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSinglePayment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSinglePayment
     */
    public function testUpdateSinglePayment($paymentId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "invoiceId": 102830,
                            "paymentId": "'.$paymentId.'",
                            "amount": "150.00"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSinglePayment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSinglePayment
     */
    public function testDeleteSinglePayment($paymentId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "paymentId": "'.$paymentId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSinglePayment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetSystemInfo() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "systemId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSystemInfo', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetTaxes() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getTaxes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testCreateSingleTax() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "name": "new_tax_'.rand(1,10000).'",
                            "amount": "2"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createSingleTax', $post_data);
        
        $taxId = json_decode($response->getBody())->contextWrites->to->response->result->tax->taxid;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $taxId;

    }
    
    /**
     * @depends testCreateSingleTax
     */
    public function testGetSingleTax($taxId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "taxId": "'.$taxId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleTax', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleTax
     */
    public function testUpdateSingleTax($taxId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "taxId": "'.$taxId.'",
                            "amount": "4"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSingleTax', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleTax
     */
    public function testDeleteSingleTax($taxId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "taxId": "'.$taxId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSingleTax', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetClients() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getClients', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testCreateSingleClient() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "fname": "Petr",
                            "lname": "Petrov",
                            "organization": "TestORG",
                            "mobPhone": "+380931112233"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/createSingleClient', $post_data);
        
        $clientId = json_decode($response->getBody())->contextWrites->to->response->result->client->userid;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $clientId;

    }
    
    /**
     * @depends testCreateSingleClient
     */
    public function testGetSingleClient($clientId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "clientId": "'.$clientId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleClient', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleClient
     */
    public function testUpdateSingleClient($clientId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "clientId": "'.$clientId.'",
                            "mobPhone": "+380935656677"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/updateSingleClient', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateSingleClient
     */
    public function testDeleteSingleClient($clientId) {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "clientId": "'.$clientId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/deleteSingleClient', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetStaffs() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getStaffs', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    public function testGetSingleStaff() {
        
        $var = '{
                    "args": {
                            "accessToken": "eaeb10d2465d7eab218ca522afda9630c4212d059631dbf67cf8415acc246faa",
                            "accountId": "V6zRd",
                            "staffId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FreshbooksAPI/getSingleStaff', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
}
