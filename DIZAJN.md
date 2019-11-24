# Dizajn za Projekat

### Kategorije (Za sada osmisljene)
* Pozorisne predstave
* Filmske projekcije
* Likovne izlozbe
* Muzicki nastupi
* Ostalo

## Top Bar (Zajednicki za sve screenove)
### Desktop
#### Korisnik nije ulogovan
Levo logo i ime, desno su linkovi:  
* Kategorije (Dropdown meni)
* Login
* Registracija

#### Korisnik je ulogovan
Desno su linkovi:
* Kategorije (Dropdown meni)
* Novo Desavanje
* Moja Desavanja
* Moj Profil

### Mobile
U centru top bara je logo i title, desno je dugme za otvaranje side navigation bar-a  
Kada se otvori side navigation bar, tamo su linkovi  
**Isti slucaj linkova je i za mobile kada nije ulogovan i kada jeste ulogovan**

## Home Screen
Home ce za sada sadrzati dogadjaje sortirane po popularnosti (koliko njih ide na taj dogadjaj)
#### Opis Dogadjaja (komponenta)
1:1 aspect ratio
pozadina da bude slika dogadjaja
preko toga neki crni overlay koji ima gradijent transparentnosti (alpha), gore 0.0 (transparentan) -> dole 0.8 (skoro crno)  
Dole levo ime dogadjaja i neki manji text ispod toga neki kratak opis  
font: roboto ili open sans  
  
**Opcionalno**
* Brojac koliko ljudi ide sa desne strane kao broj i ikonica ljudi sa strane
* Kada je dogadjaj sa desne strane kao datum i vreme i pored ikonica kalendara
* Koliko je upad kao broj RSD i pored ikonica para

### Desktop
Vise dogadjaja u istom redu, centrirani  
*flex wrap, justify content space-evenly*
### Mobile
Jedan dogadjaj po redu, centriran, oko 80% sirine ekrana, scroll na dole za vise dogadjaja.
