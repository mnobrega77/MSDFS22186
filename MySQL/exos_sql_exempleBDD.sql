-- Active: 1680764724036@@127.0.0.1@3306@exemple



--30 Part1Afficher le nom et le rang de la lettre « r » dans le nom des employés.-- 
select nom, LOCATE("r", nom) as rang
FROM employe;

SELECT nom, titre
FROM employe
WHERE titre IN (SELECT titre FROM employe WHERE nom="Amartakaldire");

-- 9.Part2 Rechercher les titres et la moyenne des salaires par titre dont la
-- moyenne est supérieure à la moyenne des salaires des Représentants.

select avg(salaire), titre
from employe
group by titre
having avg(salaire)>(
    select avg(salaire) from employe where titre='representant'
);

-- 10 Part2.Rechercher le nombre de salaires renseignés et le nombre de taux de commission renseignés.--

select COUNT(salaire) as sl, count(tauxcom) as tx
from employe
where salaire is not null and tauxcom is not null;

--pas le même resultat que --
select COUNT(salaire) as sl, count(tauxcom) as tx
from employe;

SELECT e.nom, d.nom
FROM employe e, dept d
JOIN dept d ON e.nodep = d.nodept;

-- Rechercher le nom et le salaire des employés qui gagnent plus que
-- leur patron, et le nom et le salaire de leur patron.

select employe.nom, employe.salaire, patron.nom, patron.salaire
from employe 
join employe as patron on employe.nosup=patron.noemp
where employe.salaire>patron.salaire;

-- Rechercher le nom et le titre des employés qui ont le même titre que
-- Amartakaldire.


select * from employe where titre = (
    select titre from employe where nom='Amartakaldire'
);


-- Rechercher le nom, le salaire et le numéro de département des
-- employés qui gagnent plus qu'un seul employé du département 31,
-- classés par numéro de département et salaire.

select nom, salaire, nodep
from employe
where salaire > ANY (
    select salaire 
    from employe 
    where nodep=31
);

select nom, prenom
from employe
where nom < prenom
ORDER BY nom desc;

select * from employe where salaire > (
    select MIN(salaire) from employe where nodep=31
);

-- Rechercher le nom et le titre des employés du service 31 qui ont un
-- titre l'on ne trouve pas dans le département 32.


select nom, titre
from employe 
where nodep=31 and titre not in (
    select titre 
    from employe
    where nodep=32
    );

--Afficher les lettres qui sont l'initiale d'au moins trois employés.--

select count(*) as nombre, SUBSTRING(nom, 1, 1) as initiale
from employe
group by initiale
having nombre>2;