-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
CREATE TABLE cat (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    digital_chip CHAR(15),
    `description` TEXT,
    adoption_date DATE,
    birth_date DATE,
    color_id INT,
    gender_id INT,
    breed_id INT,
    furr_id INT,
    `image` CHAR(255)
  );
CREATE TABLE color (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `name` VARCHAR(100)
  );
CREATE TABLE furr (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `length` VARCHAR(100)
  );
CREATE TABLE breed (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `name` VARCHAR(100)
  );
CREATE TABLE gender (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL
  );
CREATE TABLE article (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `date` DATE,
    `image` CHAR(255)
  );
CREATE TABLE member (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `gender` VARCHAR(4) NOT NULL,
    `firstname` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `job` VARCHAR(100) NOT NULL,
    `image` CHAR(255)
  );
INSERT INTO
  member (
    `gender`,
    `firstname`,
    `lastname`,
    `job`,
    `image`
  )
VALUES
  (
    "M.",
    "Frodon",
    "Sacquet",
    "Directeur de l\'APCLO",
    "Frodon.jpg"
  ),
  (
    "M.",
    "Sam",
    "Gamegie",
    "Trésorier de l\'APCLO",
    "Sam.jpg"
  ),
  (
    "M.",
    "Gandalf",
    "Legris",
    "Vétérinaire de l\'APCLO",
    "Gandalf.jpg"
  ),
  (
    "M.",
    "Peregrin",
    "Touque",
    "Bénévole de l\'APCLO",
    "Peregrin.jpg"
  ),
  (
    "Mme.",
    "Gala",
    "Driel",
    "Secrétaire de l\'APCLO",
    "Galadriel.jpg"
  );
INSERT INTO
  gender (`name`)
VALUES
  ('Mâle'),
  ('Femelle');
INSERT INTO
  color (`name`)
VALUES
  ('Noir'),
  ('Marron'),
  ('Beige'),
  ('Roux'),
  ('Gris'),
  ('Blanc'),
  ('Bicolore'),
  ('Tricolore'),
  ('Tigré'),
  ('Tâcheté');
INSERT INTO
  furr (`length`)
VALUES
  ('court'),
  ('mi-long'),
  ('long');
INSERT INTO
  breed (`name`)
VALUES
  ('Abyssin'),
  ('Shorthair'),
  ('Angora'),
  ('Bengale'),
  ('Bleu Russe'),
  ('Bombay'),
  ('Burmilla'),
  ('Ceylan'),
  ('Chartreux'),
  ('Chausie'),
  ('Européen'),
  ('Javanais'),
  ('Korat'),
  ('Maine Coon'),
  ('Mau Égyptien'),
  ('Norvégien'),
  ('Persan'),
  ('Ragdoll'),
  ('Sacré de Birmanie'),
  ('Savannah'),
  ('Siamois'),
  ('Sibérien'),
  ('Sphynx'),
  ('Turc de Van'),
  ('Angora Turc');
INSERT INTO
  cat (
    `name`,
    digital_chip,
    `description`,
    adoption_date,
    birth_date,
    `image`,
    gender_id,
    furr_id,
    breed_id,
    color_id
  )
VALUES
  (
    'Arthus',
    '250269590400705',
    "Arthus est apparu dans un quartier où une campagne de stérilisation a déjà été effectuée par l\'APCLO. 
    Son caractère sociable et sa grande gentillesse ont déterminé sa mise à l\'adoption. Un jardin est préférable. 
    Cohabitation possible avec de jeunes enfants, avec un autre chat à voir.",
    null,
    '2018-03-25',
    'Arthus.jpg',
    1,
    1,
    2,
    9
  ),
  (
    'Boris',
    '250268743981257',
    "Boris est arrivé dans un quartier de Saran où vit déjà une chatte libre. 
    Il s\'est montré agressif envers celle-ci ce qui a entrainé un comportement agressif de certains résidents. 
    C\'est un chat tranquille, très cool qui ne demande qu\'à se rapprocher de l\'humain. 
    Cohabitation avec de jeunes enfants possible. Un jardin est conseillé. 
    Boris est positif au virus de l\'immunodéficience féline (FIV) mais il est en très bonne santé et il peut vivre encore longtemps. 
    Le FIV NE PEUT PAS se transmettre aux êtres humains et aux autres espèces. 
    Il devra être le seul chat du foyer compte-tenu de sa positivité.",
    null,
    '2016-05-01',
    'Boris.jpg',
    1,
    1,
    6,
    1
  ),
  (
    'Bulle',
    '25026959040495',
    "Bulle errait impasse Emile Zola à Orléans. 
    C\'est une petite chatte pleine de vie qui recherche le contact des humains, très câline. 
    Elle peut vivre en appartement si celui-ci est spacieux, cohabitation possible avec de jeunes enfants, avec un autre animal à voir.",
    null,
    '2019-05-12',
    'Bulle.jpg',
    2,
    1,
    2,
    9
  ),
  (
    'Carlos',
    '250268743803076',
    "Carlos errait rue de Bourgogne à Orléans. 
    C\'est un chat certainement foncièrement gentil qui se laisse caresser mais qui reste très craintif et méfiant. 
    Ses adoptants devront faire preuve de patience pour qu\'il s'habitue à son nouveau foyer. 
    Compte-tenu de son caractère, un appartement est impératif. 
    La cohabitation avec de jeunes enfants ou un autre animal est déconseillée.",
    null,
    '2019-03-01',
    'Carlos.jpg',
    1,
    1,
    2,
    7
  ),
  (
    'Charlot',
    '250268743893107',
    "Chat errant très apprivoisé, nourri depuis l\'hiver dernier par l'adoptant d\'un chat de l\'APCLO. 
    Compte-tenu de la mésentente persistante entre les 2 chats et de son caractère sociable, il a été décidé de le proposer à l'adoption. 
    Charlot est un chat très sociable, sans aucun problème. 
    Un jardin est conseillé, cohabitation possible avec de jeunes enfants s\'ils sont calmes. 
    Charlot est positif au virus de l\'immunodéficience féline (FIV), mais il est en très bonne santé et il peut vivre encore longtemps. 
    Le FIV NE PEUT PAS se transmettre aux êtres humains et aux autres espèces. 
    Il devra être le seul chat du foyer compte-tenu de sa positivité.",
    null,
    '2016-05-01',
    'Charlot.jpg',
    1,
    1,
    6,
    1
  ),
  (
    'Pierrot',
    '250268743893112',
    "Pierrot a été abandonné et laissé à l\'association lors d'une collecte à Fleury les Aubrais. 
    C\'est un chaton dynamique et joueur qui aura besoin d'espace. 
    Un jardin est donc conseillé, cohabitation possible avec de jeunes enfants, avec un autre chat à éviter. 
    Pierrot est stérilisé.",
    '2021-09-28',
    '2021-04-10',
    'Pierrot.jpg',
    1,
    1,
    8,
    7
  ),
  (
    'Mireille',
    '250268743893036',
    "Mireille a été récupérée avec 5 chatons à Cléry St André.
    Atteinte de teigne elle a été mise à l\'isolement pour être soignée. 
    Enfin guérie, elle attend une famille qui voudra bien l\'accueillir pour lui offrir un foyer chaleureux. 
    Aime beaucoup les caresses mais encore vite effarouchée. 
    Ses adoptants devront la laisser venir vers eux et ne pas la brusquer. 
    Cohabitation avec de jeunes enfants déconseillée. 
    Vie en appartement possible.",
    '2021-10-21',
    '2018-05-01',
    'Mireille.jpg',
    2,
    1,
    8,
    7
  ),
  (
    'Nebraska',
    '250268743893015',
    "Nebraska fait partie d\'une fratrie de 4 chatons récupérés avec leur mère à Orléans la Source. 
    Adorable chatonne, très vive et très joueuse elle aime le contact avec les autres chats et le chien de la maison. 
    Elle serait très heureuse dans une famille habitant en maison avec jardin car elle a besoin d'espace et de contact. 
    Dernière de sa fratrie, elle attend de trouver, comme ses frères et soeur, une famille pour l\'accueillir.",
    '2021-07-10',
    '2021-04-28',
    'Nebraska.jpg',
    2,
    1,
    2,
    9
  ),
  (
    'Opium',
    '250268743803005',
    "Opium fait partie d\'une fratrie de 4 chatons qui s\'étaient installés dans le jardin de leur famille d\'accueil. 
    C'est la plus petite de la fratrie, elle est très vive et très joueuse. 
    Elle continue d\'apprendre en observant son environnement. 
    Opium, sa soeur Opale et son frère Oscar recherchent leur famille pour la vie. 
    Leur frère Othello est déjà réservé.",
    '2021-07-15',
    '2021-04-25',
    'Opium.jpg',
    2,
    1,
    2,
    7
  ),
  (
    'Lego',
    '250268780066882',
    "Lego fait partie d'une fratrie de 5 chatons, récupérés avec leur mère dans le parc des Longues Allées à St Jean de Braye.
    C\'est un petit chaton très joueur. ",
    null,
    '2021-09-01',
    'Lego.jpg',
    1,
    1,
    2,
    4
  ),
  (
    'Robert',
    '294 UCM',
    "Robert errait dans l\'enceinte de la résidence, fermée aux passants, nourri par une résidente en même temps qu\'une minette avec laquelle il était \'cul et chemise\'. La minette étant reprise par sa propriétaire, ce chat était voué à ne plus avoir aucune pitance, ce qui a justifié sa prise en charge pour l\'adoption malgré son âge avancé et les diverses balafres dont il porte encore les cicatrices, témoins de ses accrochages divers et variés avec ses congénères C\'est un adorable et attendrissant gros chat. Un jardin est fortement conseillé, cohabitation  avec de jeunes enfants à éviter.",
    null,
    '2012-05-01',
    'Robert.jpg',
    1,
    1,
    2,
    1
  ),
  (
    'Wally',
    '250268743803069',
    "Wally a été nourri dans la rue pendant 2 ans par son protecteur qui a ensuite demandé sa prise en charge par l\'association pour le sortir de l\'errance et lui trouver une famille. C\'est un chat calme et gentil qui s\'intègrera facilement dans un nouveau foyer. Un espace extérieur est conseillé, cohabitation possible avec de jeunes enfants s\'ils sont calmes, avec un autre animal à voir.",
    null,
    '2015-05-01',
    'Wally.jpg',
    1,
    1,
    2,
    4
  ),
  (
    'Luna',
    '250268780068675',
    "Luna fait partie d\'une fratrie de 5 chatons, récupérés avec leur mère dans le parc des Longues Allées à St Jean de Braye. C\'est une petite chatonne sociable mais encore un peu timide. Il faudra lui laisser le temps de s\'installer dans son nouvel environnement.",
    null,
    '2021-09-01',
    'Luna.jpg',
    2,
    1,
    2,
    4
  ),
  (
    'Lutèce',
    '294UCY',
    "Lutèce, gestante, errait rue St Marc, abandonnée suite à un déménagement. Agressive au départ, elle a vite retrouvé son caractère câlin et sociable. Lutèce, adorable minette très indépendante, caline à ses heures et très joyeuse cherche un foyer calme sans enfant. Un extérieur serait le top pour elle qui aime chasser les insectes et regarder les oiseaux.",
    '2021-10-02',
    '2018-05-01',
    'Lutece.jpg',
    2,
    2,
    2,
    9
  ),
  (
    'Artemis',
    '50128780026',
    "Chaton très gentil, aime la compagnie des humains. Un jardin serait un plus pour cette aventurière et chasseuse d\'insectes",
    '2021-09-02',
    '2021-06-01',
    'Artemis.jpg',
    2,
    1,
    2,
    6
  ),
  (
    'Felindra',
    '984513258',
    "Chatte gentille quand elle l\'a décidé, ne se gènera pas pour mettre des petits coups de pattes aux personnes qui passent trop près d\'elle.",
    '2015-02-18',
    '2014-12-01',
    'Felindra.jpg',
    2,
    1,
    2,
    9
  ),
  (
    'Loupi',
    '4098409845',
    "Le plus mignon de tous les chats, ses propriétaires ont vraiment de la chance. Même s\'il prend régulièrement en volume, ce n\'est que pour lui conférer plus de charisme",
    '2015-10-12',
    '2015-06-01',
    'Loupi.jpg',
    1,
    1,
    2,
    9
  ),
  (
    'Coocky',
    '984951951',
    "Jeune chat qui appréciera chasser tout ce qui passe à sa portée dans un jardin. Il saura aussi vous montrer son affection en échange de quelques croquettes.",
    '2019-07-29',
    '2019-03-05',
    'Coocky.jpg',
    1,
    1,
    2,
    1
  ),
  (
    'Shadow',
    '9870987985',
    "Chat adulte qui saura apprécier la compagnie des humains, même si il peut sembler timide au premier abord, il saura montrer son affection au fur et à mesure qu\'il se sentira en confiance.",
    '2016-08-02',
    '2016-11-05',
    'Shadow.jpg',
    1,
    1,
    2,
    1
  ),
  (
    'Masca',
    '250268780066882',
    "Masca est une petite chatte très jolie qui, avec ses plumettes sur les oreilles, ressemble à un petit lynx. Masca est propre et bien habituée à vivre à l\’intérieur d’une maison, mais elle est encore un peu craintive, surtout avec les personnes qu\’elle ne connait pas.Pour Masca nous cherchons une famille sans très jeunes enfants, qui connait déjà les chats et qui aura la patience d\’attendre quelques semaines (peut-être moins) pour qu\’elle soit complètement en confiance. La présence d\’un autre chat, comme compagnon de jeux, serait un plus. ",
    null,
    '2021-06-01',
    'Masca.jpg',
    2,
    2,
    2,
    9
  );
INSERT INTO
  article (title, `description`, `date`, `image`)
VALUES
  (
    "Adhésion",
    "La cotisation annuelle, d'un minimum de 10€, donne droit à une déduction fiscale : 
    66% des sommes versée, dans la limite de 20% du revenu imposable.",
    '2021-11-01',
    'donate.jpg'
  ),
  (
    "Reprise d'activité",
    'Nous reprenons notre activité "chats errants" à compter de ce jour. 
    Les demandes en provenance d\'Orléans et Meung sur Loire seront prioritaires, 
    ces communes ayant passé un accord avec l\'association. 
    Seront ensuite privilégiées les personnes s\'engageant à régler la totalité des frais. 
    En cette fin d\'année, nous devons tenir compte, plus que jamais, de nos possibilités financières.',
    '2021-10-23',
    'stray-cat.jpg'
  ),
  (
    "Fondation de l'APCLO",
    "L'Association pour la Protection des Chats Libres d'Orléans est fondée, 
    en accord avec la Direction de l'Environnement et de la Santé de la commune d'Orléans.",
    '1999-08-03',
    'apclo.jpg'
  ),
  (
    "​Comment éviter les miaulements intempestifs ?",
    "Si votre chaton est tout seul, s\'il est inquiet ou s\'il s'ennuie, il peut essayer de vous le 'dire' en miaulant pour attirer votre attention. Et il n'y a aucun mal à lui donner l\'attention qu\'il réclame. Mais veillez bien à poser les limites et à ne pas l\'encourager à miauler pour un oui ou pour un non, surtout quand vous n'êtes pas là. Vos voisins risquent de ne pas apprécier !",
    '2021-11-15',
    'miaulement.jpg'
  ),
  (
    "​​Éducation à la propreté des jeunes chats",
    "La plupart des chatons, dès l\'âge de quatre semaines, ressentent naturellement le besoin de gratter la litière dans leur bac. Si vous intervenez pour modifier son comportement lorsqu\'il utilise son bac, vous pourriez l\'amener à refuser de l\'utiliser. Voici quelques astuces: placez la caisse à litière dans un endroit tranquille auquel votre chaton peut avoir accès à toute heure. Gardez la caisse toujours propre. Enlevez la litière salie et changez-la au moins une fois par semaine. Observez votre chaton attentivement, particulièrement lorsqu\'il vient de se réveiller ou de manger, et placez-le dans sa caisse, si vous détectez le moindre signe laissant à penser qu\'il a besoin de l'utiliser. Enfin, félicitez toujours chaleureusement votre chaton pour bien lui montrer que vous êtes content.",
    '2021-06-02',
    'propre.jpg'
  ),
  (
    "Quelle conduite tenir si un chat qui n’a pas l’habitude de sortir s’échappe de votre logement ?",
    "Si vous habitez en pavillon ou en rez de jardin, laissez ouvert toute la nuit par là où le chat est sorti 
    et réitérez plusieurs nuits de suite si nécessaire. Mettez un tout petit peu de nourriture devant la porte 
    ou la fenêtre ouverte et davantage à l’intérieur.",
    '2021-11-03',
    'cat_garden.jpg'
  );
ALTER TABLE
  cat
ADD
  CONSTRAINT fk_cat_color FOREIGN KEY (color_id) REFERENCES color(id),
  CONSTRAINT fk_cat_breed FOREIGN KEY (breed_id) REFERENCES breed(id),
  CONSTRAINT fk_cat_furr FOREIGN KEY (furr_id) REFERENCES furr(id),
  gender_id INT NOT NULL,
  CONSTRAINT fk_cat_gender FOREIGN KEY (gender_id) REFERENCES gender(id);