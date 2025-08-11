-- Admin gestion utilisateur/personnel --
create table employes(
    idEmploye serial primary key,
    nom varchar(75),
    prenom varchar(75),
    matricule varchar(10) unique,
    fonction varchar(75),
    email varchar(75) unique,
    telephone varchar(10),
    departement varchar(75) default 'Maintenance'
);
create table roles(
    idRole serial primary key,
    role varchar(75)
);
create table users(
    idUser serial primary key,
    idEmploye int references employes(idEmploye) default 0,
    email varchar(75) unique not null,
    password varchar(255) not null,
    role int references roles(idRole)
);
-- Super admin gestion entreprise --
create table batiments(
    idBatiment serial primary key,
    nom varchar(75)
);
create table departements(
    idDepartement serial primary key,
    idBatiment int references batiments(idBatiment),
    nom varchar(75)
);
create table equipements(
    idEquipement serial primary key,
    code varchar(50),
    nom varchar(75),
    idDepartement int references departements(idDepartement),
    date_mise_service date
);

-- Gestion articles --
create table depots(
    idDepot serial primary key,
    nom varchar(75)
);
create table familles(
    idFamille serial primary key,
    idDepot int references depots(idDepot),
    nom varchar(75)
);
create table unites(
    idUnite serial primary key,
    unite varchar(10)
);
create table articles(
    idArticle serial primary key,
    code varchar(20) unique,
    designation text,
    quantite double precision,
    idUnite int references unites(idUnite),
    idFamille int references familles(idFamille)
);
-- Demande achats ou sorties -> stocks --
create table type_demandes(
    idTypeDemande serial primary key,
    nomType varchar(75)
);
create table demandes(
    idDemande serial primary key,
    idDemandeur int references users(idUser),   -- demandeur --
    idReceveur int references users(idUser),    -- receveur (achat -> responsable achat & sortie -> responsable magasin) --
    idTypeDemande int references type_demandes(idTypeDemande),
    dateDemande date,
    description text,
    statut int default 0  -- statut:0 = En attente / statut:1 = Reçu na validé / statut:2 = Rejeté --
);
create table detail_article_demandes(
    idArticleDemande serial primary key,
    idDemande int references demandes(idDemande),
    idArticle int references articles(idArticle),
    quantiteDemande double precision
);
-- Interventions --
create table type_interventions(
    idTypeIntervention serial primary key,
    type varchar(75) default 'Autres'
);
create table demande_interventions(  -- demande en cours --
    idDemandeIntervention serial primary key,
    idDemandeur int references users(idUser), -- celui qui a besoin de l'intervention de la maintenance
    idReceveur int references users(idUser), -- admin application Laravel (maintenance) = chef de departement maintenance
    idEquipement int references equipements(idEquipement),
    dateDemande timestamp default current_time,
    description text,
    statut int default 0  -- (0=en attente, 1=validé par le dept_maintenance, 3=rejetté)
);
create table fiche_interventions(
    idFicheIntervention serial primary key,
    idDemandeIntervention int references demande_interventions(idDemandeIntervention),
    idTypeintervention int references type_interventions(idTypeIntervention),
    idEmployeAssigne int references employes(idEmploye),
    datePlanifie date,
    date_intervention date
);
