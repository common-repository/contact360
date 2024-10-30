# Contact360 PHP-API
Entry classes for Contact360 API communication.

## Table of contents
-----
1. [Installation/Requirements](#installationrequirements)
    * [Requirements](#requirements)
    * [Installation with Composer](#installation-with-composer)
    * [Manual Installation](#manual-installation)
2. [Features](#features)
3. [Usage/Examples](#usageexamples)
    * [Usage](#usage)
    * [Examples](#examples)
    
    
### Installation/Requirements

#### Requirements
1. Installed JavaScript snippet in \<head/> section of your website from panel.stelsoft.pl > "Konfiguracja" > "Integracje" tab
2. "Client ID" and "API secret" from panel.stelsoft.pl > "Konfiguracja" > "Integracje" tab
3. Dependencies:
- php >= 5.3
- ext-json >= 1.2
- ext-curl

#### Installation with Composer
1. Require composer package:
~~~
composer require contact360/php-api
~~~
2. Include reference in your code:
~~~
use Contact360\API;
require 'vendor\autoload.php';
~~~

#### Manual Installation
1. Download this repository as ZIP
2. Unpack and include in your code

### Features
- insert web form contact event
- insert web cart event

### Usage/Examples

#### Usage
~~~
use Contact360\API;
$client_id = 'YOUR-CLIENT-ID';
$secret = 'YOUR-API-SECRET';
$APIClient = new API($client_id, $secret);
$form_name = 'Contact Page Form';
$enquiry_content = 'Equiry from your website:<br/>First Name: John\nLast Name: Doe';
$fields = [
    'email' => 'example@example.org', 
    'phone' => '123087923', 
    'name' => 'John Doe',
    //'firstname' => 'John', //alternative for single "name" field
    //'lastname' => 'Doe', //alternative for single "name" field
];
$result = $APIClient->insertContactForm($form_name, $enquiry_content, $fields);
if($result){
    echo 'Contact form event registered.';
}
else{
    echo 'Could not communicate to API right now.';
}
~~~

#### Examples
- Debugging:
~~~
$APIClient = new API($client_id, $secret, true);
$result = $APIClient->insertContactForm($form_name, $enquiry_content, $fields);
if(!$result){
    var_dump($result->getCallResults());
}
~~~