# Seminární práce pro předmět KIV/WEB

## Konferenčí systém

### V této seminární práci byly vytvořeny webové stránky pro správu konference.  

* Uživateli systému jsou autoři příspěvků (vkládají abstrakty článků a PDF dokumenty), recenzenti příspěvků (hodnotí příspěvky) a administrátoři (spravují uživatele, přiřazují příspěvky recenzentům k hodnocení a rozhodují o publikování příspěvků). Každý uživatel se do systému přihlašuje prostřednictvím vlastního uživatelského jména a hesla. Nepřihlášený uživatel vidí pouze publikované příspěvky.
* Nový uživatel se může do systému zaregistrovat, čímž získá status autora.
* Přihlášený autor vidí svoje příspěvky a stav, ve kterém se nacházejí (v recenzním řízení / přijat +hodnocení / odmítnut +hodnocení). Své příspěvky může přidávat, editovat a volitelně i mazat.
* Přihlášený recenzent vidí příspěvky, které mu byly přiděleny k recenzi, a může je hodnotit (nutně alespoň 3 kritéria hodnocení). Pokud příspěvek nebyl dosud publikován, tak své hodnocení může změnit.
* Přihlášený administrátor spravuje uživatele (určuje jejich role a může uživatele zablokovat či smazat), přiřazuje neschválené příspěvky recenzentům k hodnocení (každý příspěvek bude recenzován minimálně třemi recenzenty) a na základě recenzí rozhoduje o publikování nebo odmítnutí příspěvku. Publikované příspěvky jsou automaticky zobrazovány ve veřejné části webu.
* Webová stránka komunikuje s MYSQL databází.
