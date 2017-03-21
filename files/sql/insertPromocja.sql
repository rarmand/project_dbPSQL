/****** 	PROMOCJA 	*****/

/*
		Promocja_ID NUMERIC(3) NOT NULL DEFAULT nextval('projekt.promocja_promocja_id_seq'),
		Nazwa VARCHAR NOT NULL,
		Darmowe_Przejazdy INTEGER DEFAULT 0 NOT NULL,	

*//* 	drop table projekt.Promocja cascade; 	*/

insert into projekt.Promocja (Promocja_ID, Nazwa, Darmowe_Przejazdy)
values (999,'Powitać w Bambusie', 0);


insert into projekt.Promocja (Nazwa, Darmowe_Przejazdy)
values ('3000km razem', 3);

insert into projekt.Promocja (Nazwa, Darmowe_Przejazdy)
values ('5000km za nami', 5);

insert into projekt.Promocja (Nazwa, Darmowe_Przejazdy)
values ('10000km wspólnie', 7);
