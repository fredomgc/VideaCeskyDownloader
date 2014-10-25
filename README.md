# VideaČeskyDownloader

Jednoduchá, ale robustní aplikace na stahování videí a titulků z webu VideaČesky.cz. Proč vznikla? Rád sleduji videa na tabletu a nevyhovuje mi nutnost být připojen k internetu a krkolomně pouštět videa přímo z webu, která navíc potřebují Adobe Flash Player.

## Použití
Na úvodní stránce vyplníte URL videa, které se nachází přímo na webu VideaČesky. Aplikace následně připraví přímý odkaz ke stažení videa z YouTube a přidá i odkaz na titulky.

## Instalace
Jedná se o webovou aplikaci napsanou v PHP, která používá framework Nette. K interpretaci PHP budete potřebovat webový server Apache.
- Nainstalujte Apache
- V kořenové složce Apache vytvořte libovolnou složku **foo**, a do ní zkopírujte celý obsah repozitáře
- Ve webovém prohlížeči načtěte 127.0.0.1/**foo**
- Pokud se zobrazí chyba, nastavte práva zápisu složkám **temp** a **log**
- Hotovo, můžete začít aplikaci používat

## Co to umí
- Podporuje příspěvky s jedním nebo několika videi
- Rozpozná playlist
- Připraví přímý odkaz na stažení videa z YouTube ve formátu MP4
- Vlastní bookmarklet pro ještě pohodlnější stahování
