<?php declare(strict_types=1);

namespace PhpStanTest;

final class TestFile
{
	/**
	 * @param array{
	 *     results: list<array{
	 *         plate: string,
	 *         plate_crop_jpeg: string,
	 *         confidence: number,
	 *     }>
	 * } $data
	 */
	public static function create(array $data): mixed
	{
		if (!isset($data['results'][0])) {
			return null;
		}
		\PHPStan\dumpType($data['results']);
		foreach ($data['results'] as &$result) {
			unset($result['plate_crop_jpeg']);
		}
		\PHPStan\dumpType($data['results']);
		\PHPStan\Testing\assertType('string', $data['results'][0]['plate']);

		return null;
	}

}