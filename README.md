## Storage Helper

### Usage

```php
<?php
/**
 * In file test.php
 */

require_once __DIR__ . '/lib/Symfony/Component/ClassLoader/UniversalClassLoader.php';

// Register Autoloader
$classLoader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$classLoader->registerNamespaces(array(
	'SMS'      => __DIR__ . '/src',
));
$classLoader->register();

// Setup configuration
$config = array(
	'key'    => 'API Key',
	'secret' => 'API Secret',
	'bucket' => 'my-bucket-name',
	'region' => 'ap-northeast-1',
	'hash'   => true,
);

$client = StorageFactory::factory('S3', $config);

$res = $client->put('/path/to/source_file.jpg', '/path/to/remote/directory');

var_dump($res);
```
