	
/************         TRASA         ************/

/*
	CREATE SEQUENCE public.trasa_trasa_id_seq;

	CREATE TABLE public.Trasa (
                Trasa_Id NUMERIC(3) NOT NULL DEFAULT nextval('public.trasa_trasa_id_seq'),
                Trasa_Start VARCHAR NOT NULL,
                Trasa_Meta VARCHAR NOT NULL,
                Odleglosc BIGINT NOT NULL,
                cena REAL NOT NULL,
                CONSTRAINT trasa_id_pk PRIMARY KEY (Trasa_Id)
	);

	ALTER SEQUENCE public.trasa_trasa_id_seq RESTART WITH 10 OWNED BY public.Trasa.Trasa_Id;

*/
/*	drop table Trasa cascade;	*/


insert into projekt.Trasa (Trasa_Start, Trasa_Meta, Odleglosc, cena) 
values ('Rzeszów', 'Warszawa', 297, 42.00);

insert into projekt.Trasa (Trasa_Start, Trasa_Meta, Odleglosc, cena) 
values ('Warszawa', 'Rzeszów', 297, 42.00);

insert into projekt.Trasa (Trasa_Start, Trasa_Meta, Odleglosc, cena) 
values ('Rzeszów', 'Kraków', 168, 18.00);

insert into projekt.Trasa (Trasa_Start, Trasa_Meta, Odleglosc, cena) 
values ('Kraków', 'Rzeszów', 168, 18.00);



