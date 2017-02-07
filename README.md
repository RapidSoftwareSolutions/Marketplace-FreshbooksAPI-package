[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/FreshbooksAPI/functions?utm_source=RapidAPIGitHub_FreshbooksFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# FreshbooksAPI Package
Manage invoices, taxes and expenses programmatically.
* Domain: freshbooks.com
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Log in or create new account 
1. Go to [Developer section](https://my.freshbooks.com/#/developer)
2. Create an App
3. After creating app you will see Client ID and Client

## FreshbooksAPI.getAccessToken
This endpoint allows to retrieve access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: Your clientId obtained from Freshbooks.
| clientSecret| credentials| Required: Your clientSecret obtained from Freshbooks.
| code        | String     | Required: Authorization code.
| redirectUri | String     | Required: Your redirect uri.


## FreshbooksAPI.refreshAccessToken
This endpoint allows to retrieve access token from refresh token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: Your clientId obtained from Freshbooks.
| clientSecret| credentials| Required: Your clientSecret obtained from Freshbooks.
| refreshToken| String     | Required: Refresh token obtained from getAccessToken method.
| redirectUri | String     | Required: Your redirect uri.


## FreshbooksAPI.getIdentityInfo
The endpoint provides OAuth authentication, preferences, permissions, roles, and business information.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.


## FreshbooksAPI.getExpense
The endpoint allows to retrieve information about single expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| expenseId  | String| Required: The ID of the expense.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


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


## FreshbooksAPI.deleteSingleExpense
The endpoint allows to delete expense.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| expenseId  | String| Required: The ID of the expense.


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


## FreshbooksAPI.getSingleExpenseCategory
The endpoint allows to retrieve information about indecated expense category.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| categoryId | String| Required: The ID of the category.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


## FreshbooksAPI.getGateways
The information returned by these endpoints specifies what payment processors are enabled for your Businesses.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.


## FreshbooksAPI.deleteSingleGateway
Endpoint allows to delete single gateway.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| gatewayId  | String| Required: The ID of the gateway.


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


## FreshbooksAPI.getSingleInvoice
This endpoint allows to retrieve information about single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| invoiceId  | String| Required: The ID of the invoice.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


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


## FreshbooksAPI.deleteSingleInvoice
This endpoint allows to delete single invoice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| invoiceId  | String| Required: The ID of the invoice.


## FreshbooksAPI.getItems
This endpoint allows to retrieve information about items.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...


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


## FreshbooksAPI.getSingleItem
This endpoint allows to retrieve information about single item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| itemId     | String| Required: The ID of the item.


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


## FreshbooksAPI.deleteSingleItem
This endpoint allows to update item.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| itemId     | String| Required: The ID of the item.


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


## FreshbooksAPI.getSinglePayment
This endpoint allows to retrieve information about single payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| paymentId  | String| Required: The ID of the payment.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


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


## FreshbooksAPI.deleteSinglePayment
This endpoint allows to delete payment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| paymentId  | String| Required: The ID of the payment.


## FreshbooksAPI.getSystemInfo
An Accounting System represents an entity that can send invoices. It is the central point of association between all of a single Administrator of a single Business’ Invoices, Clients, Staff, Expenses, and Reports.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| systemId   | String| Required: The ID of the system. The value is only meaningful if a user has access to multiple systems.


## FreshbooksAPI.getTaxes
This endpoint allows to retrieve information about taxes.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| page       | String| Optional: The ID of the return page. Default 0.
| perPage    | String| Optional: Number of results to return. Default 100.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...


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


## FreshbooksAPI.getSingleTax
This endpoint allows to create new tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| taxId      | String| Required: The ID of the tax.


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


## FreshbooksAPI.deleteSingleTax
This endpoint allows to delete existing tax.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| taxId      | String| Required: The ID of the tax.


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


## FreshbooksAPI.getSingleClient
This endpoint allows to retrieve information about single client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| id         | String| Required: Unique to this business id for client.
| include    | String| Optional: Indicate which additional data will be include. Comma-separated. Example: category,project,...


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


## FreshbooksAPI.deleteSingleClient
This endpoint allows to delete client.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| id         | String| Required: Unique to this business id for client.


## FreshbooksAPI.getStaffs
This endpoint allows to retrieve information about staffs.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| search     | String| Optional: Filter to search. Pattern: key=value,key=value,...
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


## FreshbooksAPI.getSingleStaff
This endpoint allows to retrieve information about single staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| staffId    | String| Required: The ID of the staff.
| include    | String| Optional: Indicate wich additional data will be include. Comma-separated. Example: category,project,...


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


## FreshbooksAPI.deleteSingleStaff
This endpoint allows to delete staff.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Access token obtained from getAccessToken method.
| accountId  | String| Required: The ID of the account.
| staffId    | String| Required: The ID of the staff.


