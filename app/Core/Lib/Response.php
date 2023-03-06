<?php

namespace Howdy\Core\Lib;

/**
 * Handle HTTP response attributes.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class Response
{
	private $response;

	public function __construct($response)
	{
		$this->response = $response;
		return $this;
	}

	public function dump($die = false)
	{
		$data = $this->response;
		if ( function_exists( 'dump' ) ) {
			if ( $die ) {
				\dd( $data );
			} else {
				\dump( $data );
			}
		} else {
			echo '<pre>';
			print_r( $data ); // @phpcs:ignore
			echo '</pre>';
		}
	}

	public function getBody($decode = true)
	{
		if ( $decode ) {
			return json_decode( \wp_remote_retrieve_body( $this->response ), true );
		}
		return \wp_remote_retrieve_body( $this->response );
	}

	public function getStatusCode()
	{
		return \wp_remote_retrieve_response_code( $this->response );
	}

	public function getMessage()
	{
		return \wp_remote_retrieve_response_message( $this->response );
	}

	public function getHeaders()
	{
		return \wp_remote_retrieve_headers( $this->response );
	}

}
