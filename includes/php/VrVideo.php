<?php

/**
 *
 */
class VrVideo {
	public $vrVideoUrl;
	public $vrPreviewImageUrl;
	public $vrVideoWidth;
	public $vrVideoHeight;
	public $vrVideoIsStereo;
	public $vrVideoDefaultYaw;
	public $vrVideoHasControls;


	public function __construct( $arguments ) {
		$this->vrVideoUrl         = $arguments['video'];
		$this->vrPreviewImageUrl  = $arguments['img'];
		$this->vrVideoWidth       = $arguments['width'];
		$this->vrVideoHeight      = $arguments['height'];
		$this->vrVideoIsStereo    = $arguments['stereo'];
		$this->vrVideoDefaultYaw  = $arguments['yaw'];
		$this->vrVideoHasControls = $arguments['hascontrols'];

	}

	public function generateHtmlCode() {

		if ('true' === $this->vrVideoHasControls) {
			// get html code from views -  if has controls use JS API
			$htmlCode = VideoJsInit::render( $this->vrVideoUrl,
				$this->vrVideoWidth,
				$this->vrVideoHeight,
				$this->vrVideoIsStereo,
				$this->vrVideoDefaultYaw
			);
		} else {
			// get html code from views -  use iframe video -  as in previous versions.
			$htmlCode = VideoIframe::render( $this->vrVideoUrl,
				$this->vrPreviewImageUrl,
				$this->vrVideoWidth,
				$this->vrVideoHeight,
				$this->vrVideoIsStereo,
				$this->vrVideoDefaultYaw
			);
		}

		return $htmlCode;
	}
}
