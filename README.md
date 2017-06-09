very wip.

usage example
    
    $key='myApplicationKey';
    $token = 'md5-string';
    $domain='my-cool-shop.com';
    $useHttps=true;
    
    $transport  = new \InsalesApi\Transport(
        $key,
        $token,
        $domain,
        $useHttps
    );
    $api        = new \InsalesApi\InsalesAPI($transport);
    $webhookApi = $api->webhook();
    
    $webhook = $webhookApi->create('http://my-domain.com/callback.php',$webhookApi::MESSAGE_FORMAT_JSON);
    
concrete model properties are public 

    $id        = $webhook->id;
    $format    = $webhook->format_type;
    $createdAt = $webhook->created_at;
    $topic     = $webhook->topic;
    $address   = $webhook->address;

each response model has these methods

    $lastHeaders          = $webhook->getHeaders();
    $request              = $webhook->getRequest();
    $originServerResponse = $webhook->getOriginData();

