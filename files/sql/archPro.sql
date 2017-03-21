drop table projekt.Trasa cascade;
drop table projekt.Kierowca cascade;
drop table projekt.Pojazd cascade;
drop table projekt.Klient cascade;
drop table projekt.Kurs cascade;
drop table projekt.Promocja cascade;
drop table projekt.Rezerwacja cascade;
drop table projekt.Wypozyczenie cascade;

create schema projekt;

CREATE SEQUENCE projekt.trasa_trasa_id_seq;

CREATE TABLE projekt.Trasa (
                Trasa_Id NUMERIC(3) NOT NULL DEFAULT nextval('projekt.trasa_trasa_id_seq'),
                Trasa_Start VARCHAR NOT NULL,
                Trasa_Meta VARCHAR NOT NULL,
                Odleglosc BIGINT NOT NULL,
                Cena FLOAT NOT NULL,
                CONSTRAINT trasa_id_pk PRIMARY KEY (Trasa_Id)
);

ALTER SEQUENCE projekt.trasa_trasa_id_seq RESTART WITH 10 OWNED BY projekt.Trasa.Trasa_Id;



CREATE SEQUENCE projekt.kierowca_kierowca_id_seq;

CREATE TABLE projekt.Kierowca (
                Kierowca_ID NUMERIC(6) NOT NULL DEFAULT nextval('projekt.kierowca_kierowca_id_seq'),
                Imie VARCHAR NOT NULL,
                Nazwisko VARCHAR NOT NULL,
                Pesel NUMERIC(11) NOT NULL,
                Mail VARCHAR NOT NULL,
                Data_Zatrudnienia DATE NOT NULL,
                CONSTRAINT kierowca_id_pk PRIMARY KEY (Kierowca_ID)
);

ALTER SEQUENCE projekt.kierowca_kierowca_id_seq RESTART WITH 100000 OWNED BY projekt.Kierowca.Kierowca_ID;



CREATE SEQUENCE projekt.pojazd_pojazd_id_seq;

CREATE TABLE projekt.Pojazd (
                Pojazd_ID NUMERIC(5) NOT NULL DEFAULT nextval('projekt.pojazd_pojazd_id_seq'),
                Marka VARCHAR NOT NULL,
                Data_Produkcji DATE NOT NULL,
                Data_Zakupu DATE NOT NULL,
                Liczba_Miejsc INTEGER NOT NULL,
                Przeglad DATE,
                Cena_Wypozyczenia REAL NOT NULL,
                Pozyczony BOOLEAN NOT NULL,
                CONSTRAINT pojazd_id_pk PRIMARY KEY (Pojazd_ID)
);

ALTER SEQUENCE projekt.pojazd_pojazd_id_seq RESTART WITH 23600 OWNED BY projekt.Pojazd.Pojazd_ID;




CREATE SEQUENCE projekt.kurs_kurs_id_seq;

CREATE TABLE projekt.Kurs (
                Kurs_ID NUMERIC(10) NOT NULL DEFAULT nextval('projekt.kurs_kurs_id_seq'),
                Pojazd_ID NUMERIC(5) NOT NULL,
                Kierowca_ID NUMERIC(6) NOT NULL,
                Trasa_Id NUMERIC(3) NOT NULL,
                Liczba_Pasazerow INTEGER DEFAULT 0 NOT NULL,
                Godzina_Wyjazdu TIMESTAMP NOT NULL,
                Godzina_Przyjazdu TIMESTAMP NOT NULL,
                CONSTRAINT kurs_id_pk PRIMARY KEY (Kurs_ID, Pojazd_ID, Kierowca_ID, Trasa_Id)
);

ALTER SEQUENCE projekt.kurs_kurs_id_seq OWNED BY projekt.Kurs.Kurs_ID;



CREATE SEQUENCE projekt.klient_klient_id_seq;

CREATE TABLE projekt.Klient (
                Klient_ID NUMERIC(7) NOT NULL DEFAULT nextval('projekt.klient_klient_id_seq'),
                Promocja_ID NUMERIC(3) NOT NULL DEFAULT 999,
                Imie VARCHAR NOT NULL,
                Nazwisko VARCHAR NOT NULL,
                Pesel NUMERIC(11) NOT NULL,
                Mail VARCHAR NOT NULL,
                Telefon NUMERIC(9) NOT NULL,
                Firma VARCHAR,
                Ile_Tras INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT klient_id_pk PRIMARY KEY (Klient_ID)
);

ALTER SEQUENCE projekt.klient_klient_id_seq RESTART WITH 1000000 OWNED BY projekt.Klient.Klient_ID;
                
                

CREATE SEQUENCE projekt.promocja_promocja_id_seq;

CREATE TABLE projekt.Promocja (
                Promocja_ID NUMERIC(3) NOT NULL DEFAULT nextval('projekt.promocja_promocja_id_seq'),
                Nazwa VARCHAR NOT NULL,
                Darmowe_Przejazdy INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT promocja_id_pk PRIMARY KEY (Promocja_ID)
);

ALTER SEQUENCE projekt.promocja_promocja_id_seq RESTART WITH 100 OWNED BY projekt.Promocja.Promocja_ID;




CREATE SEQUENCE projekt.rezerwacja_rezerwacja_id_seq;

CREATE TABLE projekt.Rezerwacja (
                Rezerwacja_ID NUMERIC(10) NOT NULL DEFAULT nextval('projekt.rezerwacja_rezerwacja_id_seq'),
                Klient_ID NUMERIC(7) NOT NULL,
                Trasa_Id NUMERIC(3) NOT NULL,
                Kierowca_ID NUMERIC(6) NOT NULL,
                Pojazd_ID NUMERIC(5) NOT NULL,
                Kurs_ID NUMERIC(10) NOT NULL,
                Liczba_Miejsc INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT rezerwacja_id_pk PRIMARY KEY (Rezerwacja_ID, Klient_ID)
);

ALTER SEQUENCE projekt.rezerwacja_rezerwacja_id_seq OWNED BY projekt.Rezerwacja.Rezerwacja_ID;



CREATE SEQUENCE projekt.wypozyczenie_wypozyczenie_id_seq;

CREATE TABLE projekt.Wypozyczenie (
                Wypozyczenie_ID NUMERIC(10) NOT NULL DEFAULT nextval('projekt.wypozyczenie_wypozyczenie_id_seq'),
                Klient_ID NUMERIC(7) NOT NULL,
                Pojazd_ID NUMERIC(5) NOT NULL,
                Kierowca_ID NUMERIC(6) NOT NULL,
                Data DATE NOT NULL,
                CONSTRAINT wypozyczenie_pk PRIMARY KEY (Wypozyczenie_ID, Klient_ID, Pojazd_ID, Kierowca_ID)
);
ALTER SEQUENCE projekt.wypozyczenie_wypozyczenie_id_seq OWNED BY projekt.Wypozyczenie.Wypozyczenie_ID;


ALTER TABLE projekt.Klient ADD CONSTRAINT promocja_klient_fk
FOREIGN KEY (Promocja_ID)
REFERENCES projekt.Promocja (Promocja_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Kurs ADD CONSTRAINT trasa_kurs_fk
FOREIGN KEY (Trasa_Id)
REFERENCES projekt.Trasa (Trasa_Id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wypozyczenie ADD CONSTRAINT kierowca_wypozyczenie_fk
FOREIGN KEY (Kierowca_ID)
REFERENCES projekt.Kierowca (Kierowca_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Kurs ADD CONSTRAINT kierowca_kurs_fk
FOREIGN KEY (Kierowca_ID)
REFERENCES projekt.Kierowca (Kierowca_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wypozyczenie ADD CONSTRAINT pojazd_wypozyczenie_fk
FOREIGN KEY (Pojazd_ID)
REFERENCES projekt.Pojazd (Pojazd_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Kurs ADD CONSTRAINT pojazd_kurs_fk
FOREIGN KEY (Pojazd_ID)
REFERENCES projekt.Pojazd (Pojazd_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Rezerwacja ADD CONSTRAINT kurs_rezerwacja_fk
FOREIGN KEY (Kurs_ID, Kierowca_ID, Trasa_Id, Pojazd_ID)
REFERENCES projekt.Kurs (Kurs_ID, Kierowca_ID, Trasa_Id, Pojazd_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

/* widok kurs - kierowca I */
create view projekt.KursKierowca as select kurs_id, imie, nazwisko from projekt.kurs, projekt.kierowca where projekt.kurs.kierowca_id = projekt.kierowca.kierowca_id;
/* widok kurs - pojazd II */
create view projekt.KursPojazd as select kurs_id, marka from projekt.kurs,projekt.pojazd where projekt.kurs.pojazd_id = projekt.pojazd.pojazd_id;
/* widok trasa - kurs */
create view projekt.KursTrasa as select kurs_id, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu, liczba_pasazerow from projekt.kurs, projekt.trasa where projekt.kurs.trasa_id = projekt.trasa.trasa_id;
/* łączenie pierwszych dwóch tabel */
create view projekt.KursKierowcaPojazd as select imie, nazwisko, projekt.kurspojazd.* from projekt.KursKierowca, projekt.KursPojazd where projekt.KursKierowca.kurs_id =  projekt.KursPojazd.kurs_id;
/* całość */
create view projekt.DanyKurs as select projekt.KursTrasa.kurs_id, imie, nazwisko, marka, trasa_start, godzina_wyjazdu, trasa_meta, godzina_przyjazdu, liczba_pasazerow from projekt.KursKierowcaPojazd, projekt.KursTrasa where projekt.KursTrasa.kurs_id = projekt.KursKierowcaPojazd.kurs_id
