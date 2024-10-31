<?php 

/*
     FILE:          ajax-replies.php
     DESC:          replies to the AJAX-requests from search form
     AUTHOR:        Sebastian Schwaner
     COPYRIGHT:     (C) 2008 by smallit
     LICENSE:       PUBLISHED UNDER THE TERMS OF THE GPL
*/

require($_SERVER['DOCUMENT_ROOT']."/wp-config.php");

$result = null;
$posts = $table_prefix."posts";
$res = null;

$s        = @$_POST['s'];
$layer    = @$_POST['layer'];

if( ! $layer || $layer != "sbs_suggests" ) $layer = "sbs_suggests";

if( $s ) :

     $handle = mysql_connect( DB_HOST,DB_USER,DB_PASSWORD );
     if( $handle ) mysql_select_db( DB_NAME,$handle );

     $s = mysql_real_escape_string( strip_tags( $s ) );

     $res = mysql_query("SELECT post_title,guid FROM $posts WHERE post_title like '$s%' AND post_status='publish' AND post_type='post' ORDER BY post_title asc LIMIT 0,10");

     if( ! $res ) die(" alert('MySQL-Abfragefehler'); ");

     while( $item = mysql_fetch_object( $res ) ) :
          $result .= "<a href=\"$item->guid\">$item->post_title</a><br/>";
     endwhile;

     print "document.getElementById('$layer').style.visibility='visible';";
     if( ! $result ) die(" document.getElementById('$layer').innerHTML='Keine Entprechung gefunden!'; ");
     else die(" document.getElementById('$layer').innerHTML='$result'; ");

else :

     print "document.getElementById('$layer').style.visibility='hidden';";
     die(" document.getElementById('$layer').innerHTML=''; ");

endif;


?>