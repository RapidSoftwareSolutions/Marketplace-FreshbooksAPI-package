[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/FreshbooksAPI/functions?utm_source=RapidAPIGitHub_FreshbooksAPIFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# FreshbooksAPI Package
Manage invoices, taxes and expenses programmatically.
* Domain: [FreshbooksAPI](http://https://freshbooks.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Log in or create new account 
1. Go to [Developer section](https://my.freshbooks.com/#/developer)
2. Create an App
3. After creating app you will see Client ID and Client


## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## FreshbooksAPI.getAccessToken
This endpoint allows to retrive access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Your clientId obtained from Freshbooks.
| clientSecret| credentials| Your clientSecret obtained from Freshbooks.
| code        | String     | Authorization code.
| redirectUri | String     | Your redirect uri.

## FreshbooksAPI.refreshAccessToken
This endpoint allows to retrive access token from refresh token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Your clientId obtained from Freshbooks.
| clientSecret| credentials| Your clientSecret obtained from Freshbooks.
| refreshToken| String     | Refresh token obtained from getAccessToken method.
| redirectUri | String     | Your redirect uri.

## FreshbooksAPI.getIdentityInfo
The endpoint provides OAuth authentication, preferences, permissions, roles, and business information.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.

## FreshbooksAPI.getExpense
The endpoint allows to retrive information about single expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| expenseId  | String| The ID of the expense.
| include    | List  | Indicate which additional data will be include. Array. Example: category,project,...

## FreshbooksAPI.createExpense
The endpoint allows to create new expense.

| Field        | Type      | Description
|--------------|-----------|----------
| accessToken  | String    | Access token obtained from getAccessToken method.
| accountId    | String    | The ID of the account.
| amount       | String    | The amount of the expense.
| date         | DatePicker| The date of the expense.
| staffId      | Number    | id of related staff member if applicable.
| categoryId   | Number    | id of related expense category.
| markupPercent| String    | string-decimal, note of percent to mark expense up.
| projectId    | Number    | id of related project if applicable.
| clientId     | Number    | id of related client if applicable.
| taxPercent1  | String    | string-decimal tax amount.
| taxName1     | String    | name of first tax.
| taxPercent2  | String    | string-decimal tax amount for second tax.
| taxName2     | String    | name of second tax.
| profileId    | Number    | id of related profile if applicable.
| accountName  | String    | name of related account if applicable.
| transactionId| Number    | id of related transaction if applicable.
| taxAmount1   | String    | amount for first tax.
| taxCode1     | String    | 3-letter currency code for first tax.
| taxAmount2   | String    | amount for second tax.
| taxCode2     | String    | 3-letter currency code for second tax.
| visState     | Select    | 0 for active, 1 for deleted.
| status       | Select    | values from expense status table. 0 - internal (-internal- rather than client); 1 - outstanding (has client, needs to be applied to an invoice); 2 - invoiced (has client, attached to an invoice); 4 - recouped (has client, attached to an invoice, and paid).
| bankName     | String    | name of bank expense was imported from, if applicable.
| vendor       | String    | name of vendor.
| extSystemId  | Number    | id of related contractor system if applicable.
| notes        | String    | notes about expense.
| extInvoiceId | Number    | id of related contractor invoice if applicable.
| amountCode   | String    | 3-letter currency code.
| compoundedTax| Select    | true/false tax2 was a compound tax.

## FreshbooksAPI.getAllExpenses
The endpoint allows to retrive information about all expenses.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Array. Example: category,project,...

## FreshbooksAPI.updateSingleExpense
The endpoint allows to update existing expenses.

| Field        | Type      | Description
|--------------|-----------|----------
| accessToken  | String    | Access token obtained from getAccessToken method.
| accountId    | String    | The ID of the account.
| expenseId    | Number    | The ID of the expense.
| amount       | String    | The amount of the expense.
| date         | DatePicker| The date of the expense.
| staffId      | Number    | id of related staff member if applicable.
| categoryId   | Number    | id of related expense category.
| markupPercent| String    | string-decimal, note of percent to mark expense up.
| projectId    | Number    | id of related project if applicable.
| clientId     | Number    | id of related client if applicable.
| taxPercent1  | String    | string-decimal tax amount.
| taxName1     | String    | name of first tax.
| taxPercent2  | String    | string-decimal tax amount for second tax.
| taxName2     | String    | name of second tax.
| isDuplicate  | Select    | true/false is duplicated expense.
| profileId    | Number    | id of related profile if applicable.
| accountName  | String    | name of related account if applicable.
| transactionId| Number    | id of related transaction if applicable.
| invoiceId    | Number    | id of related invoice if applicable.
| taxAmount1   | String    | amount for first tax.
| taxCode1     | String    | 3-letter currency code for first tax.
| taxAmount2   | String    | amount for second tax.
| taxCode2     | String    | 3-letter currency code for second tax.
| visState     | Select    | 0 for active, 1 for deleted.
| status       | Select    | values from expense status table. 0 - internal (-internal- rather than client); 1 - outstanding (has client, needs to be applied to an invoice); 2 - invoiced (has client, attached to an invoice); 4 - recouped (has client, attached to an invoice, and paid).
| bankName     | String    | name of bank expense was imported from, if applicable.
| vendor       | String    | name of vendor.
| extSystemId  | Number    | id of related contractor system if applicable.
| hasReceipt   | Select    | true/false has receipt attached.
| notes        | String    | notes about expense.
| extInvoiceId | Number    | id of related contractor invoice if applicable.
| amountCode   | String    | 3-letter currency code.
| compoundedTax| Select    | true/false tax2 was a compound tax.

## FreshbooksAPI.deleteSingleExpense
The endpoint allows to delete expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| expenseId  | String| The ID of the expense.

## FreshbooksAPI.getAllExpenseCategories
The endpoint allows to retrive all expense categories.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Array. Example: category,project,...

## FreshbooksAPI.getSingleExpenseCategory
The endpoint allows to retrive information about indecated expense category.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| categoryId | String| The ID of the category.
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.getInvoices
This endpoint allows to retrive information about invoices.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.createSingleInvoice
This endpoint allows to create single invoice.

| Field              | Type      | Description
|--------------------|-----------|----------
| accessToken        | String    | Access token obtained from getAccessToken method.
| accountId          | String    | The ID of the account.
| customerId         | String    | The ID of the client.
| createDate         | DatePicker| The date of the invoice.
| ownerId            | Number    | id of creator of invoice. 1 if business admin, other if created by e.g. a contractor.
| estimateId         | Number    | id of associated estimate, 0 if none.
| basecampId         | Number    | id of connected basecamp account, 0 if none.
| status             | String    | Invoice Status.
| parent             | Number    | id of object this invoice was generated from, 0 if none.
| displayStatus      | Select    | Description of status shown in FreshBooks UI, one of 'draft', 'created', 'sent', 'viewed', or 'outstanding'.
| autobillStatus     | String    | one of retry, failed, or success.
| paymentStatus      | Select    | description of payment status. One of 'unpaid', 'partial', 'paid', and 'auto-paid'. See the v3_status table on this page for descriptions of each.
| lastOrderStatus    | String    | describes status of last attempted payment.
| disputeStatus      | String    | description of whether invoice has been disputed.
| depositStatus      | Select    | description of deposits applied to invoice. One of 'paid', 'unpaid', 'partial', 'none', and 'converted'.
| autoBill           | Select    | whether this invoice has a credit card saved.
| v3Status           | String    | description of Invoice Status, see V3 Status Table.
| invoiceNumber      | String    | user-specified and visible invoice id.
| generationDate     | DatePicker| date invoice generated from object, null if it wasn't, YYYY-MM-DD if it was.
| discountValue      | String    | decimal-string amount.
| discountDescription| String    | public note about discount.
| poNumber           | String    | Post Office box number for address on invoice.
| currencyCode       | String    | three-letter currency code for invoice.
| language           | String    | two-letter language code, e.g. "en".
| terms              | String    | terms listed on invoice.
| notes              | String    | Notes listed on invoice.
| address            | String    | First line of address on invoice.
| depositAmount      | String    | amount required as deposit, null if none.
| depositPercentage  | String    | percent of the invoice's value required as a deposit.
| showAttachments    | Select    | whether attachments on invoice are rendered.
| visState           | Select    | 0 for active, 1 for deleted.
| street             | String    | street for address on invoice.
| street2            | String    | second line of street for address on invoice.
| city               | String    | city for address on invoice.
| province           | String    | Province for address on invoice.
| code               | String    | zip code for address on invoice.
| country            | String    | Country for address on invoice.
| organization       | String    | Name of organization being invoiced.
| fname              | String    | First name of Client on invoice.
| lname              | String    | Last name of client being invoiced.
| vatName            | String    | Value Added Tax name if provided.
| vatNumber          | String    | Value Added Tax number if provided.
| dueOffsetDays      | Number    | Number of days from creation that invoice is due.

## FreshbooksAPI.getSingleInvoice
This endpoint allows to retrive information about single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| invoiceId  | String| The ID of the invoice.
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.updateSingleInvoice
This endpoint allows to update single invoice.

| Field              | Type      | Description
|--------------------|-----------|----------
| accessToken        | String    | Access token obtained from getAccessToken method.
| accountId          | String    | The ID of the account.
| invoiceId          | String    | The ID of the invoice.
| customerId         | String    | The ID of the client.
| createDate         | DatePicker| The date of the invoice.
| ownerId            | Number    | id of creator of invoice. 1 if business admin, other if created by e.g. a contractor.
| estimateId         | Number    | id of associated estimate, 0 if none.
| basecampId         | Number    | id of connected basecamp account, 0 if none.
| status             | String    | Invoice Status.
| parent             | Number    | id of object this invoice was generated from, 0 if none.
| autobillStatus     | String    | one of retry, failed, or success.
| paymentStatus      | Select    | description of payment status. One of 'unpaid', 'partial', 'paid', and 'auto-paid'. See the v3_status table on this page for descriptions of each.
| lastOrderStatus    | String    | describes status of last attempted payment.
| disputeStatus      | String    | description of whether invoice has been disputed.
| depositStatus      | Select    | description of deposits applied to invoice. One of 'paid', 'unpaid', 'partial', 'none', and 'converted'.
| autoBill           | Select    | whether this invoice has a credit card saved.
| v3Status           | String    | description of Invoice Status, see V3 Status Table.
| invoiceNumber      | String    | user-specified and visible invoice id.
| generationDate     | DatePicker| date invoice generated from object, null if it wasn't, YYYY-MM-DD if it was.
| discountValue      | String    | decimal-string amount.
| discountDescription| String    | public note about discount.
| poNumber           | String    | Post Office box number for address on invoice.
| currencyCode       | String    | three-letter currency code for invoice.
| language           | String    | two-letter language code, e.g. "en".
| terms              | String    | terms listed on invoice.
| notes              | String    | Notes listed on invoice.
| address            | String    | First line of address on invoice.
| depositAmount      | String    | amount required as deposit, null if none.
| depositPercentage  | String    | percent of the invoice's value required as a deposit.
| showAttachments    | Select    | whether attachments on invoice are rendered.
| visState           | Select    | 0 for active, 1 for deleted.
| street             | String    | street for address on invoice.
| street2            | String    | second line of street for address on invoice.
| city               | String    | city for address on invoice.
| province           | String    | Province for address on invoice.
| code               | String    | zip code for address on invoice.
| country            | String    | Country for address on invoice.
| organization       | String    | Name of organization being invoiced.
| fname              | String    | First name of Client on invoice.
| lname              | String    | Last name of client being invoiced.
| vatName            | String    | Value Added Tax name if provided.
| vatNumber          | String    | Value Added Tax number if provided.
| dueOffsetDays      | Number    | Number of days from creation that invoice is due.

## FreshbooksAPI.deleteSingleInvoice
This endpoint allows to delete single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| invoiceId  | String| The ID of the invoice.

## FreshbooksAPI.getItems
This endpoint allows to retrive information about items.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...

## FreshbooksAPI.createSingleItem
This endpoint allows to create new item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| name       | String| The name of the item.
| quantity   | String| decimal-string number to multiply unit cost by.
| inventory  | String| decimal-string count of inventory.
| amount     | String| amount paid on invoice, to two decimal places.
| code       | String| three-letter currency code.
| tax1       | Number| id of tax on invoice.
| tax2       | Number| id of second tax on invoice if applicable.
| visState   | Select| 0 for active, 1 for deleted.
| description| String| descriptive text for item.

## FreshbooksAPI.getSingleItem
This endpoint allows to retrive information about single item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| itemId     | String| The ID of the item.

## FreshbooksAPI.updateSingleItem
This endpoint allows to update item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| itemId     | String| The ID of the item.
| name       | String| The name of the item.
| quantity   | String| decimal-string number to multiply unit cost by.
| inventory  | String| decimal-string count of inventory.
| amount     | String| amount paid on invoice, to two decimal places.
| code       | String| three-letter currency code.
| tax1       | Number| id of tax on invoice.
| tax2       | Number| id of second tax on invoice if applicable.
| visState   | Select| 0 for active, 1 for deleted.
| description| String| descriptive text for item.

## FreshbooksAPI.deleteSingleItem
This endpoint allows to delete item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| itemId     | String| The ID of the item.

## FreshbooksAPI.getPayments
This endpoint allows to retrive information about payments.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.createSinglePayment
This endpoint allows to create new payment.

| Field        | Type      | Description
|--------------|-----------|----------
| accessToken  | String    | Access token obtained from getAccessToken method.
| accountId    | String    | The ID of the account.
| invoiceId    | Number    | id of related invoice.
| amount       | String    | amount paid on invoice, to two decimal places.
| date         | DatePicker| date the payment was made, YYYY-MM-DD format.
| type         | String    | "Check", "Credit", "Cash", etc.
| creditId     | Number    | id of related credit.
| code         | String    | three-letter currency code.
| clientId     | String    | id of client who made the payment.
| visState     | Select    | 0 for active, 1 for deleted.
| note         | String    | notes on payment, often used for credit card reference number.
| overpaymentId| Number    | id of related overpayment if relevant.
| gateway      | String    | the payment processor used, if any.
| fromCredit   | Select    | whether or not the payment was converted from a Credit on a Client's account.

## FreshbooksAPI.getSinglePayment
This endpoint allows to retrive information about single payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| paymentId  | String| The ID of the payment.
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.updateSinglePayment
This endpoint allows to update payment.

| Field        | Type      | Description
|--------------|-----------|----------
| accessToken  | String    | Access token obtained from getAccessToken method.
| accountId    | String    | The ID of the account.
| invoiceId    | Number    | id of related invoice.
| paymentId    | String    | The ID of the payment.
| amount       | String    | amount paid on invoice, to two decimal places.
| date         | DatePicker| date the payment was made, YYYY-MM-DD format.
| type         | String    | "Check", "Credit", "Cash", etc.
| creditId     | Number    | id of related credit.
| code         | String    | three-letter currency code.
| clientId     | String    | id of client who made the payment.
| visState     | Select    | 0 for active, 1 for deleted.
| note         | String    | notes on payment, often used for credit card reference number.
| overpaymentId| Number    | id of related overpayment if relevant.
| gateway      | String    | the payment processor used, if any.
| fromCredit   | Select    | whether or not the payment was converted from a Credit on a Client's account.

## FreshbooksAPI.deleteSinglePayment
This endpoint allows to delete payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| paymentId  | String| The ID of the payment.

## FreshbooksAPI.getSystemInfo
An Accounting System represents an entity that can send invoices. It is the central point of association between all of a single Administrator of a single Business’ Invoices, Clients, Staff, Expenses, and Reports.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| systemId   | String| The ID of the system. The value is only meaningful if a user has access to multiple systems.

## FreshbooksAPI.getTaxes
This endpoint allows to retrive information about taxes.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | List  | Filter to search. Pattern: key=value,key=value,...

## FreshbooksAPI.createSingleTax
This endpoint allows to create new tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| name       | String| The name of the new tax.
| number     | String| an external number that identifies your tax submission.
| amount     | String| string-decimal representing percentage value of tax.
| compound   | Select| compound taxes are calculated on top of primary taxes. True || false

## FreshbooksAPI.getSingleTax
This endpoint allows to retrieve existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| taxId      | Number| The ID of the tax.

## FreshbooksAPI.updateSingleTax
This endpoint allows to update existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| taxId      | Number| The ID of the tax.
| name       | String| The name of the new tax.
| number     | String| an external number that identifies your tax submission.
| amount     | String| string-decimal representing percentage value of tax.
| compound   | Select| compound taxes are calculated on top of primary taxes. True || false

## FreshbooksAPI.deleteSingleTax
This endpoint allows to delete existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| taxId      | Number| The ID of the tax.

## FreshbooksAPI.getClients
This endpoint allows to retrive information about clients.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| page       | Number| The ID of the retun page. Default 0.
| perPage    | Number| Number of results to return. Default 100.
| search     | String| Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.createSingleClient
This endpoint allows to create new client.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Access token obtained from getAccessToken method.
| accountId       | String| The ID of the account.
| busPhone        | String| business phone number.
| companyIndustry | String| description of industry client is in.
| companySize     | String| size of client's company.
| currencyCode    | String| 3-letter shortcode for preferred currency.
| email           | String| client email.
| fax             | String| client fax.
| fname           | String| first name.
| lname           | String| last name.
| homePhone       | String| home phone number.
| language        | String| shortcode indicating user language e.g. "en".
| mobPhone        | String| mobile phone number.
| note            | String| notes kept by admin about client.
| organization    | String| name for client's business.
| billingCity     | String| billing city.
| billingCode     | String| billing postal code.
| billingCountry  | String| billing country.
| billingProvince | String| billing province.
| billingStreet   | String| billing street address.
| billingStreet2  | String| billing street address second part.
| prefEmail       | Select| prefers email over ground mail. true || false
| prefGmail       | Select| prefers ground mail over email. true || false
| shippingCity    | String| shipping address city.
| shippingCode    | String| shipping postal code.
| shippingCountry | String| shipping country.
| shippingProvince| String| shipping short form for province.
| shippingStreet  | String| shipping street address.
| shippingStreet2 | String| shipping address second street info.
| vatName         | String| Value Added Tax name.
| vatNumber       | String| Value Added Tax number.
| visState        | Number| "visibility state", active, deleted, or archived.

## FreshbooksAPI.getSingleClient
This endpoint allows to retrive information about single client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| id         | Number| Unique to this business id for client.
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.updateSingleClient
This endpoint allows to update client.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Access token obtained from getAccessToken method.
| accountId       | String| The ID of the account.
| id              | Number| Unique to this business id for client.
| busPhone        | String| business phone number.
| companyIndustry | String| description of industry client is in.
| companySize     | String| size of client's company.
| currencyCode    | String| 3-letter shortcode for preferred currency.
| email           | String| client email.
| fax             | String| client fax.
| fname           | String| first name.
| lname           | String| last name.
| homePhone       | String| home phone number.
| language        | String| shortcode indicating user language e.g. "en".
| mobPhone        | String| mobile phone number.
| note            | String| notes kept by admin about client.
| organization    | String| name for client's business.
| billingCity     | String| billing city.
| billingCode     | String| billing postal code.
| billingCountry  | String| billing country.
| billingProvince | String| billing province.
| billingStreet   | String| billing street address.
| billingStreet2  | String| billing street address second part.
| prefEmail       | Select| prefers email over ground mail. true || false
| prefGmail       | Select| prefers ground mail over email. true || false
| shippingCity    | String| shipping address city.
| shippingCode    | String| shipping postal code.
| shippingCountry | String| shipping country.
| shippingProvince| String| shipping short form for province.
| shippingStreet  | String| shipping street address.
| shippingStreet2 | String| shipping address second street info.
| vatName         | String| Value Added Tax name.
| vatNumber       | Number| Value Added Tax number.
| visState        | Select| "visibility state", active, deleted, or archived.

## FreshbooksAPI.deleteSingleClient
This endpoint allows to delete client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| id         | Number| Unique to this business id for client.

## FreshbooksAPI.getStaffs
This endpoint allows to retrive information about staffs.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| search     | List  | Filter to search. Pattern: key=value,key=value,...
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.getSingleStaff
This endpoint allows to retrive information about single staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| staffId    | String| The ID of the staff.
| include    | List  | Indicate which additional data will be include. Comma-separated. Example: category,project,...

## FreshbooksAPI.updateSingleStaff
This endpoint allows to update single staff.

| Field          | Type  | Description
|----------------|-------|----------
| accessToken    | String| Access token obtained from getAccessToken method.
| accountId      | String| The ID of the account.
| staffId        | String| The ID of the staff.
| fax            | String| fax number.
| rate           | String| rate this staff is billed at.
| note           | String| notes about staff.
| displayName    | String| name chosen by staff member to display.
| lname          | String| last name.
| mobPhone       | String| mobile phone number.
| homePhone      | String| home phone number.
| email          | String| email address for staff.
| username       | String| username for staff; randomly assigned if none specified at creation time.
| billingProvince| String| billing address province.
| billingCity    | String| billing address city.
| billingCode    | String| billing address zip code.
| billingCountry | String| billing address country.
| busPhone       | String| business phone number.
| language       | String| staff's selected language.
| billingStreet2 | String| billing address secondary street info.
| visState       | Select| "visibility state", active, deleted, or archived.
| fname          | String| first name.
| organization   | String| organization staff member is affiliated with.
| billingStreet  | String| billing address primary street info.
| currencyCode   | String| 3-letter shortcode for preferred currency.

## FreshbooksAPI.deleteSingleStaff
This endpoint allows to delete staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token obtained from getAccessToken method.
| accountId  | String| The ID of the account.
| staffId    | String| The ID of the staff.

