<?php

namespace SMS;

/**
 * Class StorageFactory
 */
abstract class StorageFactory
{
	public static function factory($type, $config)
	{
		$type = strtoupper($type);

		switch ($type)
		{
			case 'S3':
				require_once __DIR__ . '/../lib/aws-autoloader.php';

				return new S3($config);
		}

		return null;
	}
}
