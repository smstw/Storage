<?php

namespace Helper;

// Load SMS namespace
JLoader::registerNamespace('SMS', __DIR__ . '/../../../../src');

/**
 * Class StorageHelper
 */
class StorageHelper
{
	/**
	 * Storage client.
	 *
	 * @var \SMS\StorageInterface
	 */
	protected static $client;

	/**
	 * Get storage client
	 *
	 * @return  \SMS\StorageInterface
	 */
	public static function getStorageClient()
	{
		$params = JComponentHelper::getParams('com_organization');

		$config = array(
			'key'    => $params['s3Key'],
			'secret' => $params['s3Secret'],
			'bucket' => $params['s3Bucket'],
			'region' => $params['s3Region'],
			'hash'   => $params['s3EnableFileHash'],
			'prefix' => $params['s3RemoteFilePathPrefix'],
		);

		static::$client = new \SMS\S3($config);
	}

	/**
	 * Put file to storage
	 *
	 * @param   string  $localFilePath   Local file path
	 * @param   string  $storageFilePath  Storage file path
	 *
	 * @return  mixed
	 */
	public static function put($localFilePath, $storageFilePath)
	{
		return static::$client->put($localFilePath, $storageFilePath);
	}

	/**
	 * Delete storage file
	 *
	 * @param   string  $storageFilePath  Storage file path
	 *
	 * @return  mixed
	 */
	public function delete($storageFilePath)
	{
		return static::$client->delete($storageFilePath);
	}
}
