<?php 

require 'vendor/autoload.php';

use GuzzleHttp\Client;

class Instagram_m extends MY_Model {

	private $profile_url;

	public function __construct() {

		parent::__construct();
		$this->profile_url = null;
		$this->config->load( 'api' );

	}

	public function set_username( $username ) {
		$this->profile_url = 'https://www.instagram.com/' . $username . '/?__a=1';
	}

	private function get_nodes() {

		if ( $this->profile_url != null ) {

			$instagram = json_decode( file_get_contents( $this->profile_url ) );
			$posts = [];
			foreach ( $instagram->graphql->user->edge_owner_to_timeline_media->edges as $edge ) {
				$posts[ (string)$edge->node->id ] = $edge->node->edge_media_preview_like;
			}
			array_multisort( $posts, SORT_DESC,  $instagram->graphql->user->edge_owner_to_timeline_media->edges);
			return $instagram->graphql->user->edge_owner_to_timeline_media->edges;

		}

		return false;

	}

	public function get_posts() {

		$nodes = $this->get_nodes();
		$posts = [];
		if ( $nodes != false ) {

			foreach ( $nodes as $node ) {
				$posts []= $node->node;
			}

			return $posts;

		}
		return null;

	}

	public function login_url() {
		return 'https://ta-commerce.auth0.com/authorize?client_id=u22fA9WkFU_6uWxUF-gIaX5frpXcsCCj&response_type=code&connection=instagram&prompt=consent&redirect_uri=http://localhost/e-commerce/login';
	}

	public function get_code() {

		$url = 'https://ta-commerce.auth0.com/authorize?client_id=u22fA9WkFU_6uWxUF-gIaX5frpXcsCCj&response_type=code&connection=instagram&prompt=consent&redirect_uri=http://localhost/e-commerce/login';
		return $this->curl_get_request( $url );

	}

	public function get_access_token() {

		$url = 'https://api.instagram.com/oauth/access_token';
	
		$curlPost = 'client_id='. $this->config->item( 'INSTAGRAM_CLIENT_ID' ) . '&redirect_uri=' . $this->config->item( 'INSTAGRAM_REDIRECT_URI' ) . '&client_secret=' . $this->config->item( 'INSTAGRAM_CLIENT_SECRET' ) . '&code=NhlTPmIQ7OSLezRF9&grant_type=authorization_code';
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);			
		$data = json_decode(curl_exec($ch), true);	
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		curl_close($ch); 		
		if($http_code != '200') {
			var_dump( $data );
			throw new Exception('Error : Failed to receieve access token');
		}		
		
		return $data['access_token'];

	}

}

// https://www.instagram.com/oauth/authorize/?client_id=60e7d5a56c854f089eda06e7316e7490&redirect_uri=http://localhost/e-commerce/login&response_type=token&scope=public_content