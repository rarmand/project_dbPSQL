
/************         KLIENT         ************/

/*
CREATE SEQUENCE public.klient_klient_id_seq;

CREATE TABLE public.Klient (
		Klient_ID NUMERIC(7) NOT NULL DEFAULT nextval('projekt.klient_klient_id_seq'),
		Promocja_ID NUMERIC(3) NOT NULL default 0,
		Imie VARCHAR NOT NULL,
		Nazwisko VARCHAR NOT NULL,
		Pesel NUMERIC(11) NOT NULL,
		Mail VARCHAR NOT NULL,
		Haslo VARCHAR(8) NOT NULL,
		Telefon NUMERIC(9) NOT NULL,
		Firma VARCHAR,
		Przejechane_KM BIGINT DEFAULT 0 NOT NULL,
		CONSTRAINT klient_id_pk PRIMARY KEY (Klient_ID)
);

ALTER SEQUENCE public.klient_klient_id_seq RESTART WITH 2365000 OWNED BY public.Klient.Klient_ID;

*//*		drop table Klient cascade;		*/


insert into projekt.Klient (Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Ireneusz', 'Jóźwiak', 90120919111, 'ireneusz.jozwiak@int.com', 'zielone', 777888999, 'Fejmbuk S.A.');

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon)
values ('Magdalena', 'Pasikowska', 90082536255, 'magda.pasikonikk@interia.pl', 'apvamara', 698559325);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Ewa', 'Zwierzynska', 92060707896, 'pacyfikator@interia.pl', 'pacyfik', 725442365, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Henryk', 'Bierzyński', 86121203122, 'bierzynski@gmail.com', 'chrome12', 509723215, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Grzegorz', 'Janowski', 7205093265, 'janpan@gmail.com', 'janowski', 552156325, 'Troller Start');

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Barbara', 'Lapisz', 85010654232, 'basiunia01@interia.com', 'basia123', 726012236, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Malwina', 'Król', 68030405562, 'krolika@onet.pl', 'Krolik11', 726468562, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Wiesław', 'Hulewiak', 87110935026, 'hulew.wies@gmail.com', 'HulEwi12', 509723215, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Hubert', 'Bysiek', 78061305699, 'bysiek33@hotmail.com', 'adventu3', 725442365, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Piotr', 'Alban', 76020856558, 'omennomen@wp.com', 'hvjajl', 785223645, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Mariola', 'Mańko', 84123165255, 'marimanko@polpol.com', 'zon11ek', 501325225, null);

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Erazm', 'Ulman', 80020232332, 'pietro@lisp.com', 'haha1234', 724032235, 'Ulman Company');

insert into projekt.Klient(Imie, Nazwisko, Pesel, Mail, Haslo, Telefon, Firma)
values ('Adam', 'Partyka', 86052862132, 'adman@partyka.com', 'firmowe', 501895821, 'Partyka s. z o.o');


/*
 *	indeks wytworzony przez komputer ?? rand ???
 *	dodanie 0 km automatycznie przez komputer przy rejestracji konta	
 */
 
/*** sprawdzać czy taka osoba już istnieje z danym mailem ***/
