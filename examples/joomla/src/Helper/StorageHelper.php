<?php

namespace Helper;

// Load SMS namespace
JLoader::registerNamespace('SMS', __DIR__ . '/../../../../src');

use SMS\S3;

/**
 * Class StorageHelper
 */
class StorageHelper
{
	/**
	 * Storage client.
	 *
	 * @var S3
	 */
	protected static $client;

	/**
	 * Get storage client
	 *
	 * @return  S3
	 */
	public static function getStorageClient()
	{
		if (static::$client instanceof S3)
		{
			return static::$client;
		}

		$params = JComponentHelper::getParams('com_organization');

		$config = array(
			'key'    => $params['s3Key'],
			'secret' => $params['s3Secret'],
			'bucket' => $params['s3Bucket'],
			'region' => $params['s3Region'],
			'hash'   => $params['s3EnableFileHash'],
			'prefix' => $params['s3RemoteFilePathPrefix'],
		);

		static::$client = new S3($config);

		return static::$client;
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
		return static::getStorageClient()->put($localFilePath, $storageFilePath);
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
		return static::getStorageClient()->delete($storageFilePath);
	}
}
