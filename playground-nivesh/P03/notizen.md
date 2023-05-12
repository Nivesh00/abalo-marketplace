# Namen:

* Selim Ülker, 3146034
* Nivesh Ramlochun, 3280680

### A5:

Set.Prototype:
* [JavaScriptCore: unterstützt](https://developer.apple.com/documentation/javascriptcore/1451747-jsobjectsetprototype)
* [V8: unterstützt](https://www.tabnine.com/code/java/methods/com.eclipsesource.v8.V8/setPrototype)
* SpiderMonkey: nicht unterstützt?
erklärung: Set.prototype.*, mengenoperationen auf ein Set Objekt. z.B add(), was ein wert einfügt, falls es noch nicht vorhanden ist
verwendung: Ja, falls Logik für Mengenlehre etc. implementiert werden soll

Static Blocks:
* JSC: nicht unterstützt?
* [V8: unterstützt](https://v8.dev/features/class-static-initializer-blocks)
* SpiderMonkey: nicht unterstützt?
erklärung: Lässt code in einer Klasse laufen, der für eine gegebene Klassendefinition nur einmal laufen soll
verwendung: Nein? Könnte auch im Konstruktor ausgeführt werden -> leserlicher/mehr bekannt

Array.protoype.flat(depth)
* [JSC: unterstützt](https://opensource.apple.com/source/JavaScriptCore/JavaScriptCore-7607.1.40.1.4/builtins/ArrayPrototype.js.auto.html)
* [V8: unterstützt](https://v8.dev/features/array-flat-flatmap)
* SpiderMonkey: nicht unterstützt?
eklärung: Transformiert mehrdimensionale Arrays in flache, 1 dimensionales Array
verwendung: Ja, falls man ein Array transformieren möchte

Array.protoype.group:
[mozilla](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/group)
* Alle nicht unterstützt
erklärung: gruppiert Elemente eines Arrays nach einem Argument
verwendung: Ja, erleichtert gruppieren von Daten. Codesparend und einfach zu implementieren. Gut für Endbenutzter

Temportal time:
* JSC: nicht unterstützt?
* V8: unterstützt ECMA[[1]](https://tc39.es/ecma262/) [[2]](https://tc39.es/proposal-temporal/)
* SpiderMonkey: nicht unterstützt?
erklärung: Besseres Konstrukt für Zeit und Datum.
verwendung. Vielleicht. Nur wenn die Anwendung extrem Zeitkritisch ist.

### A6:

Rest APIs:
* [github](https://docs.github.com/en/rest?apiVersion=2022-11-28)
* [spotify](https://developer.spotify.com/documentation/web-api)

Zweck:
Github: Bietet die möglichkeit einfach auf ressource wie Reposiories, Benutzerprofile, pullrequests etc. zuzugreifen und zu automatisieren.
Spotify: Bietet eine schnittstelle für Musikinhalte, Alben, Künstlerinformationen etc; Musik suchen, Musikinhalte in eigene Anwendung zu implementieren
Rest Prinzipien:
1. Client-Server Aufteilung: Beide erfüllt: Server bietet die Daten wie Musik, Benutzerprofile bereits, client kann diese verarbeiten
2. Zustandslosigkeit: Beide erfüllt: es werden keine anfrage enthält alle informationen, die zu verarbeiten notwendig sind ohne kenntnis einer vorherigen anfrage etc.
3. Cacheable:  
   * Github [Ja](https://docs.github.com/en/rest/guides/getting-started-with-the-rest-api?apiVersion=2022-11-28#caching)
   * Spotify: [Ja](https://developer.spotify.com/documentation/web-api/concepts/api-calls)
4. Einheitliche Schnittstelle:
   * Spotify [Ja](https://developer.spotify.com/documentation/web-api/concepts/authorization#spotify-web-api-endpoints)
   * Github: [Ja](https://docs.github.com/en/rest/overview/resources-in-the-rest-api?apiVersion=2022-11-28)
5. Mehrschichtige Systeme: Beide Ja

Level:
* Github: Wäre auf Level 2, es bietet verschiedene ressourcen mit URLs an und bietet die standard HTTP Status Codes an[[1]](https://docs.github.com/en/rest/guides/getting-started-with-the-rest-api?apiVersion=2022-11-28#the-rest-apis-uniform-interface)
* Spotify: Das Gleiche gilt für Spotify[[2]](https://developer.spotify.com/)[[3]](https://developer.spotify.com/documentation/web-api/reference/get-users-top-artists-and-tracks)

Versionierung:
Beide bieten Versionierung an: 
* https://api.spotify.com/v1/
* https://api.github.com/v3/


