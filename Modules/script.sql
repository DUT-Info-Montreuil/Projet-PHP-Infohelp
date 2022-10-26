------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------



------------------------------------------------------------
-- Table: Tuto
------------------------------------------------------------
CREATE TABLE public.Tuto(
	idTuto SERIAL NOT NULL ,
	titre  VARCHAR (25)  ,
	Auteur VARCHAR (25)  ,
	NbVue  INT   ,
	CONSTRAINT prk_constraint_Tuto PRIMARY KEY (idTuto)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Ville
------------------------------------------------------------
CREATE TABLE public.Ville(
	idVille     SERIAL NOT NULL ,
	nomVille    VARCHAR (25)  ,
	code_Postal VARCHAR (25)  ,
	CONSTRAINT prk_constraint_Ville PRIMARY KEY (idVille)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Technicien
------------------------------------------------------------
CREATE TABLE public.Technicien(
	idTechnicien     SERIAL NOT NULL ,
	nom              VARCHAR (25)  ,
	prenom           VARCHAR (25)  ,
	Avis             VARCHAR (25)  ,
	Favoris          BOOL   ,
	Rayon_d_activite BOOL   ,
	CONSTRAINT prk_constraint_Technicien PRIMARY KEY (idTechnicien)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Devis
------------------------------------------------------------
CREATE TABLE public.Devis(
	idDevis       SERIAL NOT NULL ,
	Prix          INT   ,
	Descriptif    VARCHAR (25)  ,
	accepter      BOOL   ,
	idUtilisateur INT   ,
	idTechnicien  INT   ,
	CONSTRAINT prk_constraint_Devis PRIMARY KEY (idDevis)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Utilisateur
------------------------------------------------------------
CREATE TABLE public.Utilisateur(
	idUtilisateur SERIAL NOT NULL ,
	nom           VARCHAR (25)  ,
	prenom        VARCHAR (25)  ,
	email         VARCHAR (25) NOT NULL UNIQUE,
	passwd        VARCHAR (25)  ,
	CONSTRAINT prk_constraint_Utilisateur PRIMARY KEY (idUtilisateur)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Rendez vous
------------------------------------------------------------
CREATE TABLE public.Rendez_vous(
	idRdv         SERIAL NOT NULL ,
	horaire       VARCHAR (25)  ,
	DateRDV       DATE   ,
	idTechnicien  INT   ,
	idUtilisateur INT   ,
	CONSTRAINT prk_constraint_Rendez_vous PRIMARY KEY (idRdv)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Matériel
------------------------------------------------------------
CREATE TABLE public.Materiel(
	idMateriel      SERIAL NOT NULL ,
	nom             VARCHAR (25)  ,
	quantite        INT   ,
	idUtilisateur   INT   ,
	idUtilisateur_1 INT   ,
	CONSTRAINT prk_constraint_Materiel PRIMARY KEY (idMateriel)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Catégorie
------------------------------------------------------------
CREATE TABLE public.Categorie(
	id_Categorie  SERIAL NOT NULL ,
	Developpement VARCHAR (25)  ,
	Reseaux       VARCHAR (25)  ,
	Systeme       VARCHAR (25)  ,
	Maintenance   VARCHAR (25)  ,
	Telecoms      VARCHAR (25)  ,
	CONSTRAINT prk_constraint_Categorie PRIMARY KEY (id_Categorie)
)WITHOUT OIDS;


/* ------------------------------------------------------------
-- Table: Etre situé
------------------------------------------------------------
CREATE TABLE public.Etre_situe(
	idVille       INT  NOT NULL ,
	idUtilisateur INT  NOT NULL ,
	idTechnicien  INT  NOT NULL ,
	CONSTRAINT prk_constraint_Etre_situe PRIMARY KEY (idVille,idUtilisateur,idTechnicien)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Regarder
------------------------------------------------------------
CREATE TABLE public.Regarder(
	idTuto        INT  NOT NULL ,
	idUtilisateur INT  NOT NULL ,
	CONSTRAINT prk_constraint_Regarder PRIMARY KEY (idTuto,idUtilisateur)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Possède
------------------------------------------------------------
CREATE TABLE public.Possede(
	id_Categorie INT  NOT NULL ,
	idTechnicien INT  NOT NULL ,
	CONSTRAINT prk_constraint_Possede PRIMARY KEY (id_Categorie,idTechnicien)
)WITHOUT OIDS; */



ALTER TABLE public.Devis ADD CONSTRAINT FK_Devis_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Devis ADD CONSTRAINT FK_Devis_idTechnicien FOREIGN KEY (idTechnicien) REFERENCES public.Technicien(idTechnicien);
ALTER TABLE public.Rendez_vous ADD CONSTRAINT FK_Rendez_vous_idTechnicien FOREIGN KEY (idTechnicien) REFERENCES public.Technicien(idTechnicien);
ALTER TABLE public.Rendez_vous ADD CONSTRAINT FK_Rendez_vous_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Materiel ADD CONSTRAINT FK_Materiel_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Materiel ADD CONSTRAINT FK_Materiel_idUtilisateur_1 FOREIGN KEY (idUtilisateur_1) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Etre_situe ADD CONSTRAINT FK_Etre_situe_idVille FOREIGN KEY (idVille) REFERENCES public.Ville(idVille);
ALTER TABLE public.Etre_situe ADD CONSTRAINT FK_Etre_situe_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Etre_situe ADD CONSTRAINT FK_Etre_situe_idTechnicien FOREIGN KEY (idTechnicien) REFERENCES public.Technicien(idTechnicien);
ALTER TABLE public.Regarder ADD CONSTRAINT FK_Regarder_idTuto FOREIGN KEY (idTuto) REFERENCES public.Tuto(idTuto);
ALTER TABLE public.Regarder ADD CONSTRAINT FK_Regarder_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES public.Utilisateur(idUtilisateur);
ALTER TABLE public.Possede ADD CONSTRAINT FK_Possede_id_Categorie FOREIGN KEY (id_Categorie) REFERENCES public.Categorie(id_Categorie);
ALTER TABLE public.Possede ADD CONSTRAINT FK_Possede_idTechnicien FOREIGN KEY (idTechnicien) REFERENCES public.Technicien(idTechnicien);