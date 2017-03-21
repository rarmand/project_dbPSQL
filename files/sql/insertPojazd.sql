	
/************         POJAZD         ************/

/*
CREATE SEQUENCE public.pojazd_pojazd_id_seq;

CREATE TABLE public.Pojazd (
          Pojazd_ID VARCHAR(5) NOT NULL DEFAULT nextval('public.pojazd_pojazd_id_seq'),
          Marka VARCHAR NOT NULL,
          Data_Produkcji DATE NOT NULL,
          Data_Zakupu DATE NOT NULL,
          Liczba_Miejsc INTEGER NOT NULL,
          Przeglad DATE,
          Cena_Wypozyczenia REAL NOT NULL,
          Pozyczony BOOLEAN NOT NULL,
          CONSTRAINT pojazd_id_pk PRIMARY KEY (Pojazd_ID)
);

ALTER SEQUENCE public.pojazd_pojazd_id_seq RESTART WITH 23600 OWNED BY public.Pojazd.Pojazd_ID;

*//*		drop table Pojazd cascade;		*/


insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('VDL Futura FHD2', '2012-04-23', '2014-04-12', 57, '2016-06-08', 600.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('VDL Jonckheere JSD 140-510', '2011-04-08', '2012-08-17', 57, '2016-05-08', 500.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Scania Irizar 12-35 Century', '2011-01-15', '2014-04-12', 57, '2016-02-12', 480.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('BOVA FUTURA FHD 15.430', '2005-09-13', '2012-08-17', 67, '2016-09-12', 250.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Setra S 431 DT', '2014-11-06', '2016-04-12', 79, '2016-09-19', 1200.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Setra S 431 DT', '2014-11-06', '2016-04-12', 79, '2016-09-19', 1200.00, false);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Volvo 9700', '2009-02-01', '2014-05-18', 46, '2016-05-08', 380.00, true);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Berkhof Axial 70', '2011-03-16', '2012-08-17', 51, '2016-05-08', 500.00, true);

insert into projekt.pojazd (Marka, Data_Produkcji, Data_Zakupu, Liczba_Miejsc, Przeglad, Cena_Wypozyczenia, Pozyczony) 
values ('Mercedes-Benz 516 CDI Sprinter Lord light', '2013-10-03', '2016-05-06', 18, '2016-09-19', 180.00, true);

/** stworzyć do tego odpowiednie okienka na stronie internetowej **/
