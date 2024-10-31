<?php

/*
Plugin Name: SearchBySuggestions SBS
Plugin URI: http://quietschbunt.wordpress.com/sbs
Description: Dieses Plugin erweitert die Suchfunktion um eine AJAX-Vorschlagsfunktion
Author: Sebastian Schwaner
Author URI: http://quietschbunt.wordpress.com
Version: 0.1.0 beta
*/ 

# --- FUNCTIONS --------------------------------------------------------------------------------

add_action('wp_head', 'sbs_header' );
add_action('wp_head', 'sbs_style' );

function setSBSEventHandler() {
     echo " onkeyup=\"sbs_loadSuggestions(this.value,'sbs_suggests');\" ";
}

function setSBSSuggestionsBox() {
     echo "<div id=\"sbs_suggests\" class=\"sbs_suggests\"></div>";
}

function sbs_style() {
     require( $_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/sbs/sbs.css" );
}

function sbs_header() {

     // use JavaScript SACK library for Ajax
     wp_print_scripts( array( 'sack' ));

     // Define custom JavaScript function
     print "<script type=\"text/javascript\">\n";
     print "//<![CDATA[\n";
     print "function sbs_loadSuggestions( s,layer ) {\n";
     print "var mysack = new sack('".get_option("home")."/wp-content/plugins/sbs/ajax-replies.php');\n";
     print "mysack.execute = 1;\n";
     print "mysack.method = 'POST';\n";
     print "mysack.setVar( 's', s );\n";
     print "mysack.setVar( 'layer', layer );\n";
     print "mysack.onError = function() { alert('Ajax error in voting' )};\n";
     print "mysack.runAJAX();\n";
     print "return true;\n";
     print "}\n";
     print "//]]\n";
     print "</script>\n\n";

}

