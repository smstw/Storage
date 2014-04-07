## Storage Helper

### Usage

```php
<?php

require_once __DIR__ .'/src/StorageFactory.php';

$config = array(
	'key'    => 'API Key',
	'secret' => 'API Secret',
	'bucket' => 'my-bucket-name',
	'region' => 'ap-northeast-1',
	'hash'   => true,
);

$client = StorageFactory::factory('S3', $config);

$res = $client->put('/path/to/srouce_file.jpg', '/path/to/remote/directory');

var_dump($res);
```
