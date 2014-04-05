<?php

namespace Helper;

/**
 * Class StorageHelper
 */
class StorageHelper
{
	/**
	 * Storage client.
	 *
	 * @var \StorageInterface
	 */
	protected static $client;

	/**
	 * Get storage client
	 *
	 * @return  \StorageInterface
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
		);

		static::$client = new \S3($config);
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
