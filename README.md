## CropEntropy für WordPress


Jedes in WordPress hochgeladene Bild bekommt meist mehrere Thumbnails in unterschiedlichen Bildgrößen angelegt. Thumbnails finden direkt in WordPress, aber auch im Theme und Plugins Verwendung. Die Generierung dieser Vorschaubilder funktioniert in WordPress nach einem simplen Prinzip: Weicht die festgelegte Proportion des Thumbnails von der Proportion des Originals ab, so wird ein mittig positionierter Ausschnitt gewählt und als Vorschau gespeichert.


Die „goldene“ Mitte
-------------------

Einen Ausschnitt aus der Mitte der Abbildung zu selektieren, muss nicht immer von Vorteil sein: „Abgeschnittene“ Motive und die „verloren“ gegangene Fokussierung resultieren daraus. Einen kleinen Workaround mit der Umpositionierung der Ausschnittfläche wurde im Beitrag „[Startposition des Thumbnail-Ausschnittes steuern](https://plus.google.com/b/114450218898660299759/114450218898660299759/posts/8zTnSougv9c)“ vorgestellt. Doch auch diese Lösung ist nicht perfekt, da nicht auf jedes Foto anwendbar.


Der Wunsch jeden Bloggers
-------------------------

Es wäre doch schön, wenn der Upload-Prozess schlau genug wäre, selbst zu entscheiden, was auf dem gesamten Fotomotiv sich als Ausschnitt perfekt eignen würde.


Suche nach der Lösung
---------------------

Basierend auf der [Entropie-Technik](http://de.wikipedia.org/wiki/Entropie_(Informationstheorie)) wurde für WordPress ein experimentelles Plugin entwickelt, welches auf [Crop](https://github.com/tim-reynolds/crop/tree/UpdateEntropyAlgorithm), eine fähige PHP-Bibliothek aufbaut, die das Bild auf die Informationsdichte analysiert, diesen Bereich fokusiert und abschließend ausschneidet. Der lesenswerte Artikel „[Image Cropping in PHP using Entropy – Explained](http://envalo.com/image-cropping-php-using-entropy-explained/)“ führt in die Materie ein.


Beispiel aus der Praxis
-----------------------

### Upload-Bild
![Original-Bild in WordPress](https://github.com/sergejmueller/wp-crop-entropy/raw/master/img/original.jpg)

### Durch WordPress erzeugtes Thumbnail
![Durch WordPress erzeugtes Thumbnail](https://github.com/sergejmueller/wp-crop-entropy/raw/master/img/wordpress-center-150x150.jpg)

### Durch CropEntropy erzeugtes Thumbnail
![Durch CropEntropy für WordPress erzeugtes Thumbnail](https://github.com/sergejmueller/wp-crop-entropy/raw/master/img/crop-entropy-150x150.jpg)


Zu Risiken und Nebenwirkungen
-----------------------------

* Technisch (eher WordPress)-bedingt wird CropEntropy erst dann ausgeführt, wenn die Generierung der Thumbnails in WordPress abgeschlossen ist. Nicht wirklich effizient, da Thumbnails auf diese Weise zwei Mal erstellt werden.
* Die zugrundeliegende PHP-Lib ist nicht dafür ausgelegt, mehrere Thumbnails von einem Bild zu erzeugen. Daher kommt es beim Bild-Upload zu Verzögerungen. Das ist auch der Grund für die Erhöhung der Ausführungsdauer im Plugin-Code.
* Experimentelle Umsetzung, bitte nicht auf Produktivumgebungen einsetzen.


Mindestvoraussetzungen
----------------------
* WordPress 3.8
* PHP 5.3
* ImageMagick


Inbetriebnahme
--------------

1. ZIP herunterladen
2. Den entpackten Ordner nach WordPress kopieren
3. Plugin aktivieren


Autor
-----
*Sergej Müller* / [Google+](https://plus.google.com/110569673423509816572?rel=author) / [Twitter](https://twitter.com/wpSEO) / [WordPress-Plugins](http://wpcoder.de)