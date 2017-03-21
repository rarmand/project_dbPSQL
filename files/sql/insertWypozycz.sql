/***		 WYPOZYCZENIE		 ***/
/*
 		    Klient_ID NUMERIC(7) NOT NULL DEFAULT nextval('projekt.klient_klient_id_seq'),
                Promocja_ID NUMERIC(3) NOT NULL,
                Imie VARCHAR NOT NULL,
                Nazwisko VARCHAR NOT NULL,
                Pesel NUMERIC(11) NOT NULL,
                Mail VARCHAR NOT NULL,
                Haslo VARCHAR(8) NOT NULL,
                Telefon NUMERIC(9) NOT NULL,
                Firma VARCHAR,
                Ile_Tras INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT klient_id_pk PRIMARY KEY (Klient_ID)

*/


insert into projekt.Wypozyczenie (Klient_ID, Pojazd_ID, Kierowca_ID, Data)
values (1000000, 23607, 100000, '2017-01-16');

insert into projekt.Wypozyczenie (Klient_ID, Pojazd_ID, Kierowca_ID, Data)
values (1000000, 23601, 100003, '2017-01-15');

insert into projekt.Wypozyczenie (Klient_ID, Pojazd_ID, Kierowca_ID, Data)
values (1000004, 23603, 100002, '2017-01-18');

insert into projekt.Wypozyczenie (Klient_ID, Pojazd_ID, Kierowca_ID, Data)
values (1000011, 23603, 100002, '2017-01-17');

insert into projekt.Wypozyczenie (Klient_ID, Pojazd_ID, Kierowca_ID, Data)
values (1000000, 23607, 100000, '2017-01-16');
