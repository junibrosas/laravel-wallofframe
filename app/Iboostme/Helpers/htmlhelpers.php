<?php
use Illuminate\Support\Facades\HTML;

	// Display Arrays/Objects Properly
	function trace($ar, $color = "F00"){
		echo '<pre style="z-index:9999;color:#'.$color.'">';
		print_r($ar);
		echo '</pre><br style="clear:both;" /><br />';
	}

	//Link CSS
	function link_css( $path )
	{
		$path = asset( $path );
		return "<link rel=\"stylesheet\" href=\"{$path}\" />";
	}

	//LINK JS
	function link_js( $path )
	{
		$path = asset( $path );
		return "<script src=\"{$path}\"></script>";
	}


	//LINK Image
	function img( $path, array $attrs = [ ] )
	{
		$path       = asset( $path );
		$attributes = null;

		foreach ( $attrs as $attr => $value )
		{
			$attributes .= "{$attr}=\"{$value}\"";
		}
		return "<img src=\"{$path}\" {$attributes} />";

	}


	// returns money as a formatted string
	function money( $amount, $symbol = 'AED ' )
	{
		return $symbol . number_format($amount);
	}


