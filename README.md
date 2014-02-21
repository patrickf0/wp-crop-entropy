## CropEntropy für WordPress ##


Werden Bilder in WordPress hochgeladen, so werden Thumbnails nach einem einfachen Prinzip erstellt: Weicht die Proportion der festgelegten Thumbnails von der Portion des Originals ab, so wird ein mittig positionierter Ausschnitt gewählt und als Vorschau gespeichert.

Einfach einen Ausschnitt aus der Mitte einer Abbildung zu selektionieren kann nicht immer von Vorteil sein. „Abgeschnittene“ Motive und „verlorener“ Fokus resultieren daraus. Einen kleinen Workaround mit der Umpositionierung der Ausschnittfläche wurde auf [Google+](https://plus.google.com/b/114450218898660299759/114450218898660299759/posts/8zTnSougv9c) gezeigt. Doch auch diese Lösung ist nicht perfekt, da nicht auf jedes Foto anwendbar.

Es wäre doch schön, wenn der Upload-Prozess schlau wäre und selbst entscheiden könnte, was aus dem gesamten Fotomotiv sich perfekt als Ausschnitt eignen würde. Basierend auf der [Entropie-Technik](http://envalo.com/image-cropping-php-using-entropy-explained/) habe ich für WordPress ein experimentelles Plugin programmiert, welches auf eine [PHP-Lib](https://github.com/tim-reynolds/crop/tree/UpdateEntropyAlgorithm) aufbaut, die das Bild auf die Informationsdichte analysiert und den in Frage kommenden Bereich im Bild mittig ausschneidet.


### Zu Risiken und Nebenwirkungen ###

* Technisch (eher WordPress)-bedingt wird CropEntropy erst dann ausgeführt, wenn die Generierung der Thumbnails in WordPress abgeschlossen ist. Nicht unbedingt effizient, da Thumbnails auf diese Weise zwei Mal erstellt werden.
* CropEntropy setzt PHP 5.3 und ImageMagick voraus.
* Die zugrundeliegende PHP-Lib ist nicht dafür ausgelegt, mehrere Thumbs zu erzeugen, daher wird der Bild-Upload in WordPress verzögert. Das ist auch der Grund für die Erhöhung der Ausführungsdauer im Code.
* Experimentelle Umsetzung, bitte nicht auf Produktivumgebungen einsetzen.


### Inbetriebnahme

1. ZIP herunterladen
2. Den entpackten Ordner nach WordPress kopieren
3. Plugin aktivieren


### Autor
*Sergej Müller* / [Google+](https://plus.google.com/110569673423509816572?rel=author) / [Twitter](https://twitter.com/wpSEO) / [WordPress-Plugins](http://wpcoder.de)