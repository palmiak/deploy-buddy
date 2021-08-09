<?php

namespace BuddyIntegration;

/**
 * Immutable configuration.
 */
final class Config {

	/** @var array<string, mixed> */
	private static $container;

	/**
	 * @param array<string, mixed> $container
	 * @return void
	 */
	public static function init( array $container ) {
		if ( isset( self::$container ) ) {
			return;
		}

		self::$container = $container;
	}

	/**
	 * @return mixed
	 */
	public static function get( string $key ) {
		if ( ! isset( self::$container ) || ! array_key_exists( $key, self::$container ) ) {
			return null;
		}

		return self::$container[ $key ];
	}
}
