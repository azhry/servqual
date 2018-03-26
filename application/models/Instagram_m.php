<?php 

class Instagram_m extends MY_Model {

	private $profile_url;

	public function __construct() {

		parent::__construct();
		$this->profile_url = null;

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

}