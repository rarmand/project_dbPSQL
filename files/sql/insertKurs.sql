
/**********          KURS          **********/

/*
CREATE TABLE public.Kurs (
          Kurs_ID NUMERIC(10) NOT NULL,
          Pojazd_ID VARCHAR(5) NOT NULL,
          Kierowca_ID NUMERIC(6) NOT NULL,
          Trasa_Id NUMERIC(3) NOT NULL,
          Liczba_Pasazerow INTEGER DEFAULT 0 NOT NULL,
          Godzina_Wyjazdu TIMESTAMP NOT NULL,
          Godzina_Przyjazdu TIMESTAMP NOT NULL,
          CONSTRAINT kurs_id_pk PRIMARY KEY (Kurs_ID, Pojazd_ID, Kierowca_ID, Trasa_Id)
);
*//*		drop table Kurs cascade;	*/


		Warszawa - Rzeszów 

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100001, 10, 0, '2017-01-16 10:00', '2017-01-16 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100002, 11, 0, '2017-01-16 18:00', '2017-01-17 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100002, 10, 0, '2017-01-17 10:00', '2017-01-17 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100001, 11, 0, '2017-01-17 18:00', '2017-01-18 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100003, 10, 0, '2017-01-18 10:00', '2017-01-18 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100001, 11, 0, '2017-01-18 18:00', '2017-01-19 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100001, 10, 0, '2017-01-19 10:00', '2017-01-19 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100003, 11, 0, '2017-01-19 18:00', '2017-01-20 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100002, 10, 0, '2017-01-20 10:00', '2017-01-20 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100001, 11, 0, '2017-01-20 18:00', '2017-01-21 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23604, 100000, 10, 0, '2017-01-21 10:00', '2017-01-21 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23604, 100001, 11, 0, '2017-01-21 18:00', '2017-01-22 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23604, 100002, 10, 0, '2017-01-22 10:00', '2017-01-22 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23603, 100001, 11, 0, '2017-01-22 18:00', '2017-01-23 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23603, 100003, 10, 0, '2017-01-23 10:00', '2017-01-23 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23603, 100000, 11, 0, '2017-01-23 18:00', '2017-01-24 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100003, 10, 0, '2017-01-24 10:00', '2017-01-24 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100000, 11, 0, '2017-01-24 18:00', '2017-01-25 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100001, 10, 0, '2017-01-25 10:00', '2017-01-25 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100000, 11, 0, '2017-01-25 18:00', '2017-01-26 00:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100001, 10, 0, '2017-01-26 10:00', '2017-01-26 16:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100002, 11, 0, '2017-01-26 18:00', '2017-01-27 00:00');



Kraków - Rzeszów

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100004, 12, 0, '2017-01-16 9:00', '2017-01-16 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100003, 13, 0, '2017-01-16 17:00', '2017-01-16 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100003, 12, 0, '2017-01-17 9:00', '2017-01-17 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100004, 13, 0, '2017-01-17 17:00', '2017-01-17 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100002, 12, 0, '2017-01-18 9:00', '2017-01-18 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100003, 13, 0, '2017-01-18 17:00', '2017-01-18 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100000, 12, 0, '2017-01-19  9:00', '2017-01-19 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100001, 13, 0, '2017-01-19 17:00', '2017-01-19 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100000, 12, 0, '2017-01-20 9:00', '2017-01-20 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23600, 100003, 13, 0, '2017-01-20 17:00', '2017-01-20 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100003, 12, 0, '2017-01-21 9:00', '2017-01-21 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100002, 13, 0, '2017-01-21 17:00', '2017-01-21 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100000, 12, 0, '2017-01-22 9:00', '2017-01-22 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100003, 13, 0, '2017-01-22 17:00', '2017-01-22 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100001, 12, 0, '2017-01-23 9:00', '2017-01-23 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100002, 13, 0, '2017-01-23 17:00', '2017-01-23 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100000, 12, 0, '2017-01-24 9:00', '2017-01-24 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23602, 100001, 13, 0, '2017-01-24 17:00', '2017-01-24 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23603, 100002, 12, 0, '2017-01-25 9:00', '2017-01-25 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23603, 100001, 13, 0, '2017-01-25 17:00', '2017-01-25 21:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100003, 12, 0, '2017-01-26 9:00', '2017-01-26 13:00');

insert into projekt.kurs (Pojazd_ID, Kierowca_ID, Trasa_Id, Liczba_Pasazerow, Godzina_Wyjazdu, Godzina_Przyjazdu)
values (23601, 100000, 13, 0, '2017-01-26 17:00', '2017-01-26 21:00');
	
