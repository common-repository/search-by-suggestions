=== Search-By-Suggestions SBS ===
Contributors: Sebastian Schwaner
Donate link: http://quietschbunt.wordpress.com/sbs
Tags: search,ajax
Requires at least: 2.1.0
Tested up to: 2.6.2
Stable tag: 0.1.0

Search-By-Suggestions (SBS) zeigt je nach Eingabe ins Suchfeld eine Auswahlbox mit Vorschlägen an.

== Description ==

Search-By-Suggestions (SBS) reagiert auf die Eingaben des Texteingabefeldes des Searchforms, gibt diese mittels AJAX-Request (WP-Framework SACK) an die Schnittstelle weiter, die, je nach Eingabe, relevante Suchergebnisse in eine Auwahl(vorschlags-)box zurückgibt und dem Anwender anzeigt. Dieser kann Postings direkt aus der Auswahlbox anwählen. 

== Installation ==

1. Download des ZIP-Archivs.

2. Entpacken des Archivs.

3. Den gesamten Ordner in das Plugin-Verzeichnis der Wordpress-Installation hochladen (wp-content/plugins)

4. Logge Dich ein und aktiviere das Plugin.

5. Öffne das Themefile <em>searchform.php</em> in einem Texteditor.

6. Füge in den Tag 

     &lt;input type="text" name="s" id="s"&gt;
     
   den folgenden PHP-Code ein:
   
     &lt;?php if( function_exists('setSBSEventHandler') ) setSBSEventHandler(); ?&gt;

7. Füge vor dem schließenden &lt;/form&gt; - Tag folgende Zeile PHP-Code ein:

     &lt;?php if( function_exists('setSBSSuggestionsBox') ) setSBSSuggestionsBox(); ?&gt;

8. Lade das aktualisierte Themefile zurück auf den Server

9. Logge Dich aus und überprüfe die Suchfunktion Deines Weblogs.

10. Gut gemacht!

== Frequently Asked Questions ==

== Screenshots ==

http://quietschbunt.files.wordpress.com/2008/11/sbs.jpg

