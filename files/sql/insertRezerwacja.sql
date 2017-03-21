/***** 	REZERWACJA 		******/
/*
                Rezerwacja_ID NUMERIC(10) NOT NULL DEFAULT nextval('projekt.rezerwacja_rezerwacja_id_seq'),
                Klient_ID NUMERIC(7) NOT NULL,
                Trasa_Id NUMERIC(3) NOT NULL,
                Kierowca_ID NUMERIC(6) NOT NULL,
                Pojazd_ID NUMERIC(5) NOT NULL,
                Kurs_ID NUMERIC(10) NOT NULL,
                Liczba_Miejsc INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT rezerwacja_id_pk PRIMARY KEY (Rezerwacja_ID, Klient_ID)
*/


trigger w celu sprawdzenia czy może dojść do rezerwacji !!!
NIE DA SIĘ BEZ PODANIA ID WSZYSTKICH LUDKÓW

//bad
insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000001, 10, 100001, 23600, 11, 2);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000002, 10, 100001, 23600, 11, 8);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000004, 10, 100001, 23600, 11, 13);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000003, 11, 100002, 23600, 12, 5);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000004, 11, 100002, 23600, 12, 12);



insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000005, 12, 100003, 23600, 32, 6);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000010, 12, 100003, 23600, 32, 6);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000006, 13, 100003, 23600, 33, 6);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000008, 13, 100003, 23600, 33, 6);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000009, 13, 100003, 23600, 33, 6);




insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000012, 10, 100002, 23604, 13, 8);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000008, 10, 100002, 23604, 13, 7);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000004, 11, 100001, 23603, 14, 3);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000007, 11, 100001, 23603, 14, 12);




insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000010, 12, 100000, 23601, 34, 13);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000009, 12, 100000, 23601, 34, 4);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000004, 13, 100003, 23601, 35, 6);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000011, 13, 100003, 23601, 35, 9);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000006, 12, 100001, 23602, 36, 4);

insert into projekt.Rezerwacja (Klient_ID, Trasa_Id, Kierowca_ID, Pojazd_ID, Kurs_ID, Liczba_Miejsc) 
values (1000011, 12, 100001, 23602, 36, 11);






po zamknięciu rezerwacji  dodać kierowca id, pojazd id
