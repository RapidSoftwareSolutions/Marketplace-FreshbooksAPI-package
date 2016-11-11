# FreshbooksAPI Package
The API makes it easy to create web and desktop applications that integrate with your account. Possible uses for it include automatically creating and sending invoices when users sign up on your website, pulling lists of client information, copying data to 3rd party services, and more.
* Domain: freshbooks.com
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Log in or create new account 
1. Go to [Developer section](https://my.freshbooks.com/#/developer)
2. Create an App
3. After creating app you will see Client ID and Client

## TOC:
* [getAccessToken](#getAccessToken)
* [refreshAccessToken](#refreshAccessToken)
* [getIdentityInfo](#getIdentityInfo)
* [getExpense](#getExpense)
* [createExpense](#createExpense)
* [getAllExpenses](#getAllExpenses)
* [updateSingleExpense](#updateSingleExpense)
* [deleteSingleExpense](#deleteSingleExpense)
* [getAllExpenseCategories](#getAllExpenseCategories)
* [getSingleExpenseCategory](#getSingleExpenseCategory)
* [getGateways](#getGateways)
* [deleteSingleGateway](#deleteSingleGateway)
* [getInvoices](#getInvoices)
* [createSingleInvoice](#createSingleInvoice)
* [getSingleInvoice](#getSingleInvoice)
* [updateSingleInvoice](#updateSingleInvoice)
* [deleteSingleInvoice](#deleteSingleInvoice)
* [getItems](#getItems)
* [createSingleItem](#createSingleItem)
* [getSingleItem](#getSingleItem)
* [updateSingleItem](#updateSingleItem)
* [deleteSingleItem](#deleteSingleItem)
* [getPayments](#getPayments)
* [createSinglePayment](#createSinglePayment)
* [getSinglePayment](#getSinglePayment)
* [updateSinglePayment](#updateSinglePayment)
* [deleteSinglePayment](#deleteSinglePayment)
* [getSystemInfo](#getSystemInfo)
* [getTaxes](#getTaxes)
* [createSingleTax](#createSingleTax)
* [getSingleTax](#getSingleTax)
* [updateSingleTax](#updateSingleTax)
* [deleteSingleTax](#deleteSingleTax)
* [getClients](#getClients)
* [createSingleClient](#createSingleClient)
* [getSingleClient](#getSingleClient)
* [updateSingleClient](#updateSingleClient)
* [deleteSingleClient](#deleteSingleClient)
* [getStaffs](#getStaffs)
* [getSingleStaff](#getSingleStaff)
* [updateSingleStaff](#updateSingleStaff)
* [deleteSingleStaff](#deleteSingleStaff)
 
<a name="getAccessToken"/>
## FreshbooksAPI.getAccessToken
This endpoint allows to retrieve access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: Your clientId obtained from Freshbooks.
| clientSecret| credentials| Required: Your clientSecret obtained from Freshbooks.
| code        | String     | Required: Authorization code.
| redirectUri | String     | Required: Your redirect uri.

#### Request example
```json

{
	"clientId": "xxxxxxxxx",
	"clientSecret": "xxxxxxxxxxxxx",
	"code": "xxxxxxxxxxxxxxxxx",
	"redirectUri": "https://your_redirect_url"
}
```

<a name="refreshAccessToken"/>
## FreshbooksAPI.refreshAccessToken
This endpoint allows to retrieve access token from refresh token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: Your clientId obtained from Freshbooks.
| clientSecret| credentials| Required: Your clientSecret obtained from Freshbooks.
| refreshToken| String     | Required: Refresh token obtained from getAccessToken method.
| redirectUri | String     | Required: Your redirect uri.

#### Request example
```json

{
	"clientId": "xxxxxxxxx",
	"clientSecret": "xxxxxxxxxxxxx",
	"refreshToken": "xxxxxxxxxxxxxxxxx",
	"redirectUri": "https://your_redirect_url"
}
```

<a name="getIdentityInfo"/>
## FreshbooksAPI.getIdentityInfo
The endpoint provides OAuth authentication, preferences, permissions, roles, and business information.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx"
}
```

<a name="getExpense"/>
## FreshbooksAPI.getExpense
The endpoint allows to retrieve information about single expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| expenseId  | String| Required: The ID of the expense.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "expenseId": "170573",
        "include": "category,project"
}
```

<a name="createExpense"/>
## FreshbooksAPI.createExpense
The endpoint allows to create new expense.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Required: Access token obtained from getAccessToken method.
| accountId    | String| Required: The ID of the account.
| amount       | String| Required: The amount of the expense.
| date         | String| Required: The date of the expense.
| staffId      | String| Required: id of related staff member if applicable.
| categoryId   | String| Required: id of related expense category.
| markupPercent| String| Optional: string-decimal, note of percent to mark expense up.
| projectId    | String| Optional: id of related project if applicable.
| clientId     | String| Optional: id of related client if applicable.
| taxPercent1  | String| Optional: string-decimal tax amount.
| taxName1     | String| Optional: name of first tax.
| taxPercent2  | String| Optional: string-decimal tax amount for second tax.
| taxName2     | String| Optional: name of second tax.
| isDuplicate  | String| Optional: true/false is duplicated expense.
| profileId    | String| Optional: id of related profile if applicable.
| accountName  | String| Optional: name of related account if applicable.
| transactionId| String| Optional: id of related transaction if applicable.
| invoiceId    | String| Optional: id of related invoice if applicable.
| taxAmount1   | String| Optional: amount for first tax.
| taxCode1     | String| Optional: 3-letter currency code for first tax.
| taxAmount2   | String| Optional: amount for second tax.
| taxCode2     | String| Optional: 3-letter currency code for second tax.
| visState     | String| Optional: 0 for active, 1 for deleted.
| status       | String| Optional: values from expense status table. 0 - internal (-internal- rather than client); 1 - outstanding (has client, needs to be applied to an invoice); 2 - invoiced (has client, attached to an invoice); 4 - recouped (has client, attached to an invoice, and paid).
| bankName     | String| Optional: name of bank expense was imported from, if applicable.
| vendor       | String| Optional: name of vendor.
| extSystemId  | String| Optional: id of related contractor system if applicable.
| hasReceipt   | String| Optional: true/false has receipt attached.
| notes        | String| Optional: notes about expense.
| extInvoiceId | String| Optional: id of related contractor invoice if applicable.
| amountCode   | String| Optional: 3-letter currency code.
| compoundedTax| String| Optional: true/false tax2 was a compound tax.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxx",
        "accountId": "V6zRd",
        "amount": "19.99",
	"date": "2016-11-07",
	"staffId": "1",
	"categoryId": "3977455"
}
```
<a name="getAllExpenses"/>
## FreshbooksAPI.getAllExpenses
The endpoint allows to retrieve information about all expenses.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "include": "category,project"
}
```

<a name="updateSingleExpense"/>
## FreshbooksAPI.updateSingleExpense
The endpoint allows to update existing expenses.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Required: Access token obtained from getAccessToken method.
| accountId    | String| Required: The ID of the account.
| expenseId    | String| Required: The ID of the expense.
| amount       | String| Optional: The amount of the expense.
| date         | String| Optional: The date of the expense.
| staffId      | String| Optional: id of related staff member if applicable.
| categoryId   | String| Optional: id of related expense category.
| markupPercent| String| Optional: string-decimal, note of percent to mark expense up.
| projectId    | String| Optional: id of related project if applicable.
| clientId     | String| Optional: id of related client if applicable.
| taxPercent1  | String| Optional: string-decimal tax amount.
| taxName1     | String| Optional: name of first tax.
| taxPercent2  | String| Optional: string-decimal tax amount for second tax.
| taxName2     | String| Optional: name of second tax.
| isDuplicate  | String| Optional: true/false is duplicated expense.
| profileId    | String| Optional: id of related profile if applicable.
| accountName  | String| Optional: name of related account if applicable.
| transactionId| String| Optional: id of related transaction if applicable.
| invoiceId    | String| Optional: id of related invoice if applicable.
| taxAmount1   | String| Optional: amount for first tax.
| taxCode1     | String| Optional: 3-letter currency code for first tax.
| taxAmount2   | String| Optional: amount for second tax.
| taxCode2     | String| Optional: 3-letter currency code for second tax.
| visState     | String| Optional: 0 for active, 1 for deleted.
| status       | String| Optional: values from expense status table. 0 - internal (-internal- rather than client); 1 - outstanding (has client, needs to be applied to an invoice); 2 - invoiced (has client, attached to an invoice); 4 - recouped (has client, attached to an invoice, and paid).
| bankName     | String| Optional: name of bank expense was imported from, if applicable.
| vendor       | String| Optional: name of vendor.
| extSystemId  | String| Optional: id of related contractor system if applicable.
| hasReceipt   | String| Optional: true/false has receipt attached.
| notes        | String| Optional: notes about expense.
| extInvoiceId | String| Optional: id of related contractor invoice if applicable.
| amountCode   | String| Optional: 3-letter currency code.
| compoundedTax| String| Optional: true/false tax2 was a compound tax.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxx",
        "accountId": "V6zRd",
        "expenseId": "170573",
        "amount": "17.99"
}
```
<a name="deleteSingleExpense"/>
## FreshbooksAPI.deleteSingleExpense
The endpoint allows to delete expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| expenseId  | String| Required: The ID of the expense.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxx",
        "accountId": "V6zRd",
        "expenseId": "170573"
}
```

<a name="getAllExpenseCategories"/>
## FreshbooksAPI.getAllExpenseCategories
The endpoint allows to retrieve all expense categories.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "search": "categoryids=14231,name=Test",
        "include": "category,project"
}
```

<a name="getSingleExpenseCategory"/>
## FreshbooksAPI.getSingleExpenseCategory
The endpoint allows to retrieve information about indecated expense category.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| categoryId | String| Required: The ID of the category.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "categoryId": "93992990",
        "include": "expense_usage_all_time"
}
```

<a name="getGateways"/>
## FreshbooksAPI.getGateways
The information returned by these endpoints specifies what payment processors are enabled for your Businesses.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "perPage": "25"
}
```

<a name="deleteSingleGateway"/>
## FreshbooksAPI.deleteSingleGateway
Endpoint allows to delete single gateway.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| gatewayId  | String| Required: The ID of the gateway.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "gatewayId": "1"
}
```

<a name="getInvoices"/>
## FreshbooksAPI.getInvoices
This endpoint allows to retrieve information about invoices.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "perPage": "25"
}
```

<a name="createSingleInvoice"/>
## FreshbooksAPI.createSingleInvoice
This endpoint allows to create single invoice.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| Required: Access token obtained from getAccessToken method.
| accountId          | String| Required: The ID of the account.
| customerId         | String| Required: The ID of the client.
| createDate         | String| Required: The date of the invoice.
| ownerId            | String| Optional: id of creator of invoice. 1 if business admin, other if created by e.g. a contractor.
| estimateId         | String| Optional: id of associated estimate, 0 if none.
| basecampId         | String| Optional: id of connected basecamp account, 0 if none.
| sentId             | String| Optional: userid of user who sent the invoice, typically 1 for admin.
| status             | String| Optional: Invoice Status.
| parent             | String| Optional: id of object this invoice was generated from, 0 if none.
| displayStatus      | String| Optional: Description of status shown in FreshBooks UI, one of 'draft', 'created', 'sent', 'viewed', or 'outstanding'.
| autobillStatus     | String| Optional: one of retry, failed, or success.
| paymentStatus      | String| Optional: description of payment status. One of 'unpaid', 'partial', 'paid', and 'auto-paid'. See the v3_status table on this page for descriptions of each.
| lastOrderStatus    | String| Optional: describes status of last attempted payment.
| disputeStatus      | String| Optional: description of whether invoice has been disputed.
| depositStatus      | String| Optional: description of deposits applied to invoice. One of 'paid', 'unpaid', 'partial', 'none', and 'converted'.
| autoBill           | String| Optional: whether this invoice has a credit card saved.
| v3Status           | String| Optional: description of Invoice Status, see V3 Status Table.
| invoiceNumber      | String| Optional: user-specified and visible invoice id.
| generationDate     | String| Optional: date invoice generated from object, null if it wasn't, YYYY-MM-DD if it was.
| discountValue      | String| Optional: decimal-string amount.
| discountDescription| String| Optional: public note about discount.
| poNumber           | String| Optional: Post Office box number for address on invoice.
| currencyCode       | String| Optional: three-letter currency code for invoice.
| language           | String| Optional: two-letter language code, e.g. "en".
| terms              | String| Optional: terms listed on invoice.
| notes              | String| Optional: Notes listed on invoice.
| address            | String| Optional: First line of address on invoice.
| depositAmount      | String| Optional: amount required as deposit, null if none.
| depositPercentage  | String| Optional: percent of the invoice's value required as a deposit.
| gmail              | String| Optional: whether to send via ground mail.
| showAttachments    | String| Optional: whether attachments on invoice are rendered.
| visState           | String| Optional: 0 for active, 1 for deleted.
| street             | String| Optional: street for address on invoice.
| street2            | String| Optional: second line of street for address on invoice.
| city               | String| Optional: city for address on invoice.
| province           | String| Optional: Province for address on invoice.
| code               | String| Optional: zip code for address on invoice.
| country            | String| Optional: Country for address on invoice.
| organization       | String| Optional: Name of organization being invoiced.
| fname              | String| Optional: First name of Client on invoice.
| lname              | String| Optional: Last name of client being invoiced.
| vatName            | String| Optional: Value Added Tax name if provided.
| vatNumber          | String| Optional: Value Added Tax number if provided.
| dueOffsetDays      | String| Optional: Number of days from creation that invoice is due.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxxxx",
        "accountId": "V6zRd",
        "customerId": "107490",
	"createDate": "2016-12-01",
        "organization": "My company"
}
```
<a name="getSingleInvoice"/>
## FreshbooksAPI.getSingleInvoice
This endpoint allows to retrieve information about single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| invoiceId  | String| Required: The ID of the invoice.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxxxx",
        "accountId": "V6zRd",
        "invoiceId": "107490"
}
```

<a name="updateSingleInvoice"/>
## FreshbooksAPI.updateSingleInvoice
This endpoint allows to update single invoice.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| Required: Access token obtained from getAccessToken method.
| accountId          | String| Required: The ID of the account.
| invoiceId          | String| Required: The ID of the invoice.
| customerId         | String| Optional: The ID of the client.
| createDate         | String| Optional: The date of the invoice.
| ownerId            | String| Optional: id of creator of invoice. 1 if business admin, other if created by e.g. a contractor.
| estimateId         | String| Optional: id of associated estimate, 0 if none.
| basecampId         | String| Optional: id of connected basecamp account, 0 if none.
| sentId             | String| Optional: userid of user who sent the invoice, typically 1 for admin.
| status             | String| Optional: Invoice Status.
| parent             | String| Optional: id of object this invoice was generated from, 0 if none.
| displayStatus      | String| Optional: Description of status shown in FreshBooks UI, one of 'draft', 'created', 'sent', 'viewed', or 'outstanding'.
| autobillStatus     | String| Optional: one of retry, failed, or success.
| paymentStatus      | String| Optional: description of payment status. One of 'unpaid', 'partial', 'paid', and 'auto-paid'. See the v3_status table on this page for descriptions of each.
| lastOrderStatus    | String| Optional: describes status of last attempted payment.
| disputeStatus      | String| Optional: description of whether invoice has been disputed.
| depositStatus      | String| Optional: description of deposits applied to invoice. One of 'paid', 'unpaid', 'partial', 'none', and 'converted'.
| autoBill           | String| Optional: whether this invoice has a credit card saved.
| v3Status           | String| Optional: description of Invoice Status, see V3 Status Table.
| invoiceNumber      | String| Optional: user-specified and visible invoice id.
| generationDate     | String| Optional: date invoice generated from object, null if it wasn't, YYYY-MM-DD if it was.
| discountValue      | String| Optional: decimal-string amount.
| discountDescription| String| Optional: public note about discount.
| poNumber           | String| Optional: Post Office box number for address on invoice.
| currencyCode       | String| Optional: three-letter currency code for invoice.
| language           | String| Optional: two-letter language code, e.g. "en".
| terms              | String| Optional: terms listed on invoice.
| notes              | String| Optional: Notes listed on invoice.
| address            | String| Optional: First line of address on invoice.
| depositAmount      | String| Optional: amount required as deposit, null if none.
| depositPercentage  | String| Optional: percent of the invoice's value required as a deposit.
| gmail              | String| Optional: whether to send via ground mail.
| showAttachments    | String| Optional: whether attachments on invoice are rendered.
| visState           | String| Optional: 0 for active, 1 for deleted.
| street             | String| Optional: street for address on invoice.
| street2            | String| Optional: second line of street for address on invoice.
| city               | String| Optional: city for address on invoice.
| province           | String| Optional: Province for address on invoice.
| code               | String| Optional: zip code for address on invoice.
| country            | String| Optional: Country for address on invoice.
| organization       | String| Optional: Name of organization being invoiced.
| fname              | String| Optional: First name of Client on invoice.
| lname              | String| Optional: Last name of client being invoiced.
| vatName            | String| Optional: Value Added Tax name if provided.
| vatNumber          | String| Optional: Value Added Tax number if provided.
| dueOffsetDays      | String| Optional: Number of days from creation that invoice is due.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxxxx",
        "accountId": "V6zRd",
        "invoiceId": "126749",
        "customerId": "107490",
        "currencyCode": "USD"
}
```
<a name="deleteSingleInvoice"/>
## FreshbooksAPI.deleteSingleInvoice
This endpoint allows to delete single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| invoiceId  | String| Required: The ID of the invoice.

#### Request example
```json

{
	"accessToken": "xxxxxxxxxxxxx",
        "accountId": "V6zRd",
        "invoiceId": "126749"
}
```

<a name="getItems"/>
## FreshbooksAPI.getItems
This endpoint allows to retrieve information about items.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd"
}
```

<a name="createSingleItem"/>
## FreshbooksAPI.createSingleItem
This endpoint allows to create new item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| name       | String| Required: The name of the item.
| quantity   | String| Optional: decimal-string number to multiply unit cost by.
| inventory  | String| Optional: decimal-string count of inventory.
| amount     | String| Optional: amount paid on invoice, to two decimal places.
| code       | String| Optional: three-letter currency code.
| tax1       | String| Optional: id of tax on invoice.
| tax2       | String| Optional: id of second tax on invoice if applicable.
| visState   | String| Optional: 0 for active, 1 for deleted.
| description| String| Optional: descriptive text for item.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"name": "Test item",
	"quantity": "1",
	"inventory": "1",
	"amount": "1000",
	"code": "USD",
	"description": "some description about item"
}
```
<a name="getSingleItem"/>
## FreshbooksAPI.getSingleItem
This endpoint allows to retrieve information about single item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| itemId     | String| Required: The ID of the item.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"itemId": "123"
}
```

<a name="updateSingleItem"/>
## FreshbooksAPI.updateSingleItem
This endpoint allows to update item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| itemId     | String| Required: The ID of the item.
| name       | String| Required: The name of the item.
| quantity   | String| Optional: decimal-string number to multiply unit cost by.
| inventory  | String| Optional: decimal-string count of inventory.
| amount     | String| Optional: amount paid on invoice, to two decimal places.
| code       | String| Optional: three-letter currency code.
| tax1       | String| Optional: id of tax on invoice.
| tax2       | String| Optional: id of second tax on invoice if applicable.
| visState   | String| Optional: 0 for active, 1 for deleted.
| description| String| Optional: descriptive text for item.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"itemId": "123",
	"name": "Test item updated",
	"quantity": "5"
}
```
<a name="deleteSingleItem"/>
## FreshbooksAPI.deleteSingleItem
This endpoint allows to update item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| itemId     | String| Required: The ID of the item.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"itemId": "123"
}
```

<a name="getPayments"/>
## FreshbooksAPI.getPayments
This endpoint allows to retrieve information about payments.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
        "include": "client,gateway"
}
```

<a name="createSinglePayment"/>
## FreshbooksAPI.createSinglePayment
This endpoint allows to create new payment.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Required: Access token obtained from getAccessToken method.
| accountId    | String| Required: The ID of the account.
| invoiceId    | String| Required: id of related invoice.
| amount       | String| Required: amount paid on invoice, to two decimal places.
| date         | String| Required: date the payment was made, YYYY-MM-DD format.
| type         | String| Required: "Check", "Credit", "Cash", etc.
| creditId     | String| Optional: id of related credit.
| code         | String| Optional: three-letter currency code.
| clientId     | String| Optional: id of client who made the payment.
| visState     | String| Optional: 0 for active, 1 for deleted.
| note         | String| Optional: notes on payment, often used for credit card reference number.
| overpaymentId| String| Optional: id of related overpayment if relevant.
| gateway      | String| Optional: the payment processor used, if any.
| fromCredit   | String| Optional: whether or not the payment was converted from a Credit on a Client's account.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"invoiceId": "102830",
	"amount": "100.00",
	"date": "2016-11-08",
	"type": "Cash"
}
```
<a name="getSinglePayment"/>
## FreshbooksAPI.getSinglePayment
This endpoint allows to retrieve information about single payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| paymentId  | String| Required: The ID of the payment.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"paymentId": "10283055"
}
```

<a name="updateSinglePayment"/>
## FreshbooksAPI.updateSinglePayment
This endpoint allows to update payment.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Required: Access token obtained from getAccessToken method.
| accountId    | String| Required: The ID of the account.
| invoiceId    | String| Required: id of related invoice.
| paymentId    | String| Required: The ID of the payment.
| amount       | String| Optional: amount paid on invoice, to two decimal places.
| date         | String| Optional: date the payment was made, YYYY-MM-DD format.
| type         | String| Optional: "Check", "Credit", "Cash", etc.
| creditId     | String| Optional: id of related credit.
| code         | String| Optional: three-letter currency code.
| clientId     | String| Optional: id of client who made the payment.
| visState     | String| Optional: 0 for active, 1 for deleted.
| note         | String| Optional: notes on payment, often used for credit card reference number.
| overpaymentId| String| Optional: id of related overpayment if relevant.
| gateway      | String| Optional: the payment processor used, if any.
| fromCredit   | String| Optional: whether or not the payment was converted from a Credit on a Client's account.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"paymentId": "10283055",
	"invoiceId": "102830",
	"amount": "150"
}
```
<a name="deleteSinglePayment"/>
## FreshbooksAPI.deleteSinglePayment
This endpoint allows to delete payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| paymentId  | String| Required: The ID of the payment.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"paymentId": "10283055"
}
```

<a name="getSystemInfo"/>
## FreshbooksAPI.getSystemInfo
An Accounting System represents an entity that can send invoices. It is the central point of association between all of a single Administrator of a single Business’ Invoices, Clients, Staff, Expenses, and Reports.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| systemId   | String| Required: The ID of the system. The value is only meaningful if a user has access to multiple systems.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"systemId": "1"
}
```
<a name="getTaxes"/>
## FreshbooksAPI.getTaxes
This endpoint allows to retrieve information about taxes.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd"
}
```

<a name="createSingleTax"/>
## FreshbooksAPI.createSingleTax
This endpoint allows to create new tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| name       | String| Required: The name of the new tax.
| number     | String| Optional: an external number that identifies your tax submission.
| amount     | String| Optional: string-decimal representing percentage value of tax.
| compound   | String| Optional: compound taxes are calculated on top of primary taxes. True || false

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"name": "new_tax",
	"amount": "2"
}
```
<a name="getSingleTax"/>
## FreshbooksAPI.getSingleTax
This endpoint allows to create new tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| taxId      | String| Required: The ID of the tax.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"taxId": "1111"
}
```

<a name="updateSingleTax"/>
## FreshbooksAPI.updateSingleTax
This endpoint allows to update existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| taxId      | String| Required: The ID of the tax.
| name       | String| Optional: The name of the new tax.
| number     | String| Optional: an external number that identifies your tax submission.
| amount     | String| Optional: string-decimal representing percentage value of tax.
| compound   | String| Optional: compound taxes are calculated on top of primary taxes. True || false

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"taxId": "1111",
	"amount": "4"
}
```
<a name="deleteSingleTax"/>
## FreshbooksAPI.deleteSingleTax
This endpoint allows to delete existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| taxId      | String| Required: The ID of the tax.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"taxId": "1111"
}
```

<a name="getClients"/>
## FreshbooksAPI.getClients
This endpoint allows to retrieve information about clients.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd"
}
```

<a name="createSingleClient"/>
## FreshbooksAPI.createSingleClient
This endpoint allows to create new client.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Required: Access token obtained from getAccessToken method.
| accountId       | String| Required: The ID of the account.
| busPhone        | String| Optional: business phone number.
| companyIndustry | String| Optional: description of industry client is in.
| companySize     | String| Optional: size of client's company.
| currencyCode    | String| Optional: 3-letter shortcode for preferred currency.
| email           | String| Optional: client email.
| fax             | String| Optional: client fax.
| fname           | String| Optional: first name.
| lname           | String| Optional: last name.
| homePhone       | String| Optional: home phone number.
| language        | String| Optional: shortcode indicating user language e.g. "en".
| mobPhone        | String| Optional: mobile phone number.
| note            | String| Optional: notes kept by admin about client.
| organization    | String| Optional: name for client's business.
| billingCity     | String| Optional: billing city.
| billingCode     | String| Optional: billing postal code.
| billingCountry  | String| Optional: billing country.
| billingProvince | String| Optional: billing province.
| billingStreet   | String| Optional: billing street address.
| billingStreet2  | String| Optional: billing street address second part.
| prefEmail       | String| Optional: prefers email over ground mail. true || false
| prefGmail       | String| Optional: prefers ground mail over email. true || false
| shippingCity    | String| Optional: shipping address city.
| shippingCode    | String| Optional: shipping postal code.
| shippingCountry | String| Optional: shipping country.
| shippingProvince| String| Optional: shipping short form for province.
| shippingStreet  | String| Optional: shipping street address.
| shippingStreet2 | String| Optional: shipping address second street info.
| vatName         | String| Optional: Value Added Tax name.
| vatNumber       | String| Optional: Value Added Tax number.
| visState        | String| Optional: "visibility state", active, deleted, or archived.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"fname": "John",
	"lname": "Dow",
	"mobPhone": "+1420901234567",
	"organization": "TestORG"
}
```
<a name="getSingleClient"/>
## FreshbooksAPI.getSingleClient
This endpoint allows to retrieve information about single client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| id         | String| Required: Unique to this business id for client.
| include    | String| Optional: Indicate which additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"id": "1"
}
```

<a name="updateSingleClient"/>
## FreshbooksAPI.updateSingleClient
This endpoint allows to update client.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Required: Access token obtained from getAccessToken method.
| accountId       | String| Required: The ID of the account.
| id              | String| Required: Unique to this business id for client.
| busPhone        | String| Optional: business phone number.
| companyIndustry | String| Optional: description of industry client is in.
| companySize     | String| Optional: size of client's company.
| currencyCode    | String| Optional: 3-letter shortcode for preferred currency.
| email           | String| Optional: client email.
| fax             | String| Optional: client fax.
| fname           | String| Optional: first name.
| lname           | String| Optional: last name.
| homePhone       | String| Optional: home phone number.
| language        | String| Optional: shortcode indicating user language e.g. "en".
| mobPhone        | String| Optional: mobile phone number.
| note            | String| Optional: notes kept by admin about client.
| organization    | String| Optional: name for client's business.
| billingCity     | String| Optional: billing city.
| billingCode     | String| Optional: billing postal code.
| billingCountry  | String| Optional: billing country.
| billingProvince | String| Optional: billing province.
| billingStreet   | String| Optional: billing street address.
| billingStreet2  | String| Optional: billing street address second part.
| prefEmail       | String| Optional: prefers email over ground mail. true || false
| prefGmail       | String| Optional: prefers ground mail over email. true || false
| shippingCity    | String| Optional: shipping address city.
| shippingCode    | String| Optional: shipping postal code.
| shippingCountry | String| Optional: shipping country.
| shippingProvince| String| Optional: shipping short form for province.
| shippingStreet  | String| Optional: shipping street address.
| shippingStreet2 | String| Optional: shipping address second street info.
| vatName         | String| Optional: Value Added Tax name.
| vatNumber       | String| Optional: Value Added Tax number.
| visState        | String| Optional: "visibility state", active, deleted, or archived.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"id": "1",
	"mobPhone": "+314235656677"
}
```
<a name="deleteSingleClient"/>
## FreshbooksAPI.deleteSingleClient
This endpoint allows to delete client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| id         | String| Required: Unique to this business id for client.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"id": "1"
}
```

<a name="getStaffs"/>
## FreshbooksAPI.getStaffs
This endpoint allows to retrieve information about staffs.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd"
}
```

<a name="getSingleStaff"/>
## FreshbooksAPI.getSingleStaff
This endpoint allows to retrieve information about single staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| staffId    | String| Required: The ID of the staff.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"staffId": "1"
}
```
<a name="updateSingleStaff"/>
## FreshbooksAPI.updateSingleStaff
This endpoint allows to update single staff.

| Field          | Type  | Description
|----------------|-------|----------
| accessToken    | String| Required: Access token obtained from getAccessToken method.
| accountId      | String| Required: The ID of the account.
| staffId        | String| Required: The ID of the staff.
| fax            | String| Optional: fax number.
| rate           | String| Optional: rate this staff is billed at.
| note           | String| Optional: notes about staff.
| displayName    | String| Optional: name chosen by staff member to display.
| lname          | String| Optional: last name.
| mobPhone       | String| Optional: mobile phone number.
| homePhone      | String| Optional: home phone number.
| email          | String| Optional: email address for staff.
| username       | String| Optional: username for staff; randomly assigned if none specified at creation time.
| billingProvince| String| Optional: billing address province.
| billingCity    | String| Optional: billing address city.
| billingCode    | String| Optional: billing address zip code.
| billingCountry | String| Optional: billing address country.
| busPhone       | String| Optional: business phone number.
| language       | String| Optional: staff's selected language.
| billingStreet2 | String| Optional: billing address secondary street info.
| visState       | String| Optional: "visibility state", active, deleted, or archived.
| fname          | String| Optional: first name.
| organization   | String| Optional: organization staff member is affiliated with.
| billingStreet  | String| Optional: billing address primary street info.
| currencyCode   | String| Optional: 3-letter shortcode for preferred currency.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"staffId": "1",
	"mobPhone": "+380951234567"
}
```
<a name="deleteSingleStaff"/>
## FreshbooksAPI.deleteSingleStaff
This endpoint allows to delete staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| staffId    | String| Required: The ID of the staff.

#### Request example
```json

{
	"accessToken": "xxxxxxxxx",
        "accountId": "V6zRd",
	"staffId": "1"
}
```

