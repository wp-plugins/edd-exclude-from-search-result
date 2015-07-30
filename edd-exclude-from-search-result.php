<?php

/*
Plugin Name: EDD Exclude From Search Result
Plugin URI: http://www.iwebdc.com/edd-exclude-from-search-result/
Description: This Plugin Automatically Exclude Downloads Search Results In Easy Digital Downloads.
Version: 1.0.0
Author: iwebdc
Author URI: http://www.iwebdc.com
License: GPLv2 or later
License URI:        http://www.gnu.org/licenses/gpl-2.0.txt
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


// Easy Digital Downloads Exclude downloads from search

function my_child_theme_download_post_type_args( $download_args ) {
$download_args['exclude_from_search'] = true;
return $download_args;
}
add_action( 'edd_download_post_type_args', 'my_child_theme_download_post_type_args' ); 

add_filter( 'plugin_row_meta', 'custom_plugin_row_meta', 10, 2 );

function custom_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'edd-exclude.php' ) !== false ) {
		$new_links = array(
					'<a href="http://www.iwebdc.com/edd-exclude-from-search-result/" target="_blank">Donate</a>'
				);
		
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}