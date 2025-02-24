<?php

namespace YDPL\Traits;

/**
 * Exit when accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @since 0.0.1
 */
trait ErrorLog
{
	public function logError( string $message ): void
	{
		if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
			return;
		}

		error_log( sprintf( 'Yard DeepL: %s', $message ) );
	}
}
