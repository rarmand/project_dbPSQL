
/**********          KIEROWCY          **********/

/*
CREATE SEQUENCE public.kierowca_kierowca_id_seq;

CREATE TABLE public.Kierowca (
          Kierowca_ID NUMERIC(6) NOT NULL DEFAULT nextval('public.kierowca_kierowca_id_seq'),
          Imie VARCHAR NOT NULL,
          Nazwisko VARCHAR NOT NULL,
          Pesel NUMERIC(11) NOT NULL,
          Mail VARCHAR NOT NULL,
          Data_Zatrudnienia DATE NOT NULL,
          CONSTRAINT kierowca_id_pk PRIMARY KEY (Kierowca_ID)
);

ALTER SEQUENCE public.kierowca_kierowca_id_seq RESTART WITH 156800 OWNED BY public.Kierowca.Kierowca_ID;
*/
/*		drop table Kierowca cascade;		*/


insert into projekt.kierowca (Imie, Nazwisko, Pesel, Mail, Data_Zatrudnienia) 
values ('Krzysztof', 'Urbanik', 90121908188, 'k.u@gmail.com', '2012-09-01');

insert into projekt.kierowca (Imie, Nazwisko, Pesel, Mail, Data_Zatrudnienia) 
values ('Kamil', 'Rachwalski', 79061387229, 'rachwalski@hotmail.com', '2010-07-01');

insert into projekt.kierowca (Imie, Nazwisko, Pesel, Mail, Data_Zatrudnienia) 
values ('Przemysław', 'Niewolski', 87121565982, 'niewola@interia.pl', '2014-07-01');

insert into projekt.kierowca (Imie, Nazwisko, Pesel, Mail, Data_Zatrudnienia) 
values ('Marek', 'Filip', 82122354245, 'Marek.Filip@wp.pl', '2012-07-01');

/**** indeks wyliczony przez komputer?????? ****/
