<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Menace;
use App\Entity\Story;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Service\Slugify;
use DateTime;
use Faker\Factory;

class StoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(Slugify $slug)
    {
        $this->slug = $slug;
    }

    public function load(ObjectManager $manager)
    {
        $date = new DateTime('09/06/2020');
        $date->format('Y-m-d');
        $faker = Factory::create('fr_FR');

        $stories = [
            [
                'title' => 'Professeur décharné',
                'content' => "Procédures de Confinement Spéciales : SCP-220-FR est actuellement confiné dans une cellule de sécurité minimale, au Département Occulte du Site-██████. Une demande du Dr Arlington visant à alléger les procédures de confinement de SCP-220-FR a été soumise au Superviseur ████████████. Le sujet a notamment exprimé le désir de voir l'équipe de recherche disposer divers objets à l'intérieur de sa cellule.
                Sont autorisés, uniquement et exhaustivement, une tasse de café chaud (arabica, noir, sans sucre), un cigare allumé (tabac cubain), et un livre quelconque (ouvert, titre, auteur, genre et période non spécifiés), objets pour lesquels SCP-220-FR présentait de son vivant une passion immodérée, selon sa lettre de suicide1 et les informations récoltées par l'Agent ████████ auprès des proches du sujet. La demande d'un revolver de calibre .45 a été refusée. Toute nouvelle requête formulée par SCP-220-FR doit être soumise au Superviseur ████████████ et recevoir son autorisation écrite.
                Description : SCP-220-FR est un montage Beauchêne de crâne humain. L'armature en titane implique une fabrication récente, détail corroboré par les propos de SCP-220-FR, qui a indiqué au Dr Arlington être né en ████, et avoir ordonné dans son testament le montage de son crâne, après son suicide en ████.2 Des symboles occultes et religieux sont gravés sur les fragments de crâne, à l'aide d'un outil moderne, vraisemblablement de joaillerie. Les symboles sont imperceptibles à l’œil nu, et n'apparaissent que lorsque l'objet est soumis à une lumière noire, par la présence d'un composé fluorescent non-identifié incrusté dans la gravure, et reproduisant la texture de l'os du crâne humain.3
                SCP-220-FR est une anomalie post-humaine, sensible, douée de conscience, et est capable de communiquer avec un unique interlocuteur, si celui-ci fixe ses orbites. Il s'exprime par télépathie, ne communique qu'à son interlocuteur immédiat, répond à sa voix et aux stimuli auditifs en arrière-plan. La télépathie semble, a priori, être un mode d'expression à une voie, mais la possibilité d'une seconde voie de lecture qui permettrait à SCP-220-FR de lire les pensées de ses interlocuteurs n'est pas à négliger.
                Les sujets décrivent sa voix comme celle d'un homme blanc d'âge moyen, légèrement matinée d'un accent du sud de la France. La communication est décrite comme n'étant pas désagréable, bien qu'un peu déroutante. La voix de SCP-220-FR ne pouvant être enregistrée via un medium plus conventionnel, les transcriptions suivantes sont directement rapportées par ses interlocuteurs.",
                'number' => '220',
            ],
            [
                'title' => 'L\'oreiller qui rend cool',
                'content' => "Procédures de Confinement Spéciales : SCP-233-FR doit être rangé dans sa housse anti-acarien et conservé dans le casier de confinement n°042-2010 pour objets anormaux verrouillé par un cadenas à code du Site-Aleph. Le code doit être changé tous les deux (2) jours et n’est connu que du responsable de recherche.
                Les membres du personnel souhaitant utiliser SCP-223-FR doivent déposer au préalable une demande d’autorisation (formulaire Autorisation_223-FR) auprès du Dr Muse qui répondra sous trois (3) jours minimum.
                Toute demande de la part d’un membre du personnel ayant déjà été exposé plus de quatre-vingt (80) heures à SCP-233-FR sera systématiquement refusée. En cas de récidive, le demandeur devra être considéré comme sujet de stade C et un amnésique devra lui être administré.
                Description : SCP-233-FR est un oreiller en fibre synthétique coupe standard de 50 cm par 60 cm. Son apparence et les informations encore visibles sur l’étiquette correspondent au produit commercialisé par ███████ depuis janvier 2008. Il n'a été trouvé aucune anomalie concernant les fibres composantes de SCP-233-FR. Aucun autre produit de la même gamme prélevé à différents points de vente n’a montré d’effet anormal. Il est donc supposé que l’anomalie soit unique à SCP-233-FR.
                Selon le témoignage de l'Agent █████, il lui aurait été offert en cadeau par F███ O█████, proche de G█████████ C████, membre suspecté confirmé de la Main du Serpent (voir Rapport d’Acquisition RA12-233-FR).
                Les effets de SCP-233-FR se manifestent uniquement lorsqu'une personne, alors désignée sujet, entre en phase de sommeil paradoxal tout en restant en contact direct avec lui. SCP-233-FR ne fait aucune différence entre les sujets endormis par des moyens extérieurs (sujet assommé ou plongé dans le coma) ou simplement en suivant le cycle du sommeil.
                SCP-233-FR influe sur la qualité du sommeil du sujet et sur certaines facultés cognitives. Les risques de voir les effets de SCP-233-FR devenir permanents sur les sujets augmentent avec son temps d'utilisation.
                On dénombre plusieurs stades dans les effets anormaux sur un sujet, pouvant varier sensiblement d'un sujet à l'autre.",
                'number' => '233',
            ],
            [
                'title' => 'Société dimensionnelle parfaite',
                'content' => "Procédure de Confinement Spéciales : Compte tenu de la nature de SCP-122-FR, celui-ci ne peut être déplacé. Un réseau en étoile de radars installés sur des bouées a été mis en place dans un rayon de 40 km autour de l'île. Tout intrus détecté doit être immédiatement interrogé sur la façon dont il a trouvé l'île puis redirigé hors de la zone en prétextant la préservation d'espèces marines rares. Si un intrus ne donne pas suite aux demandes de redirection et s'approche à moins de 10 km de l'île, il devra être pourchassé par la Fondation et des amnésiques de type C devront être administrés à tous les intrus. L'armement létal ne doit être utilisé qu'en cas de force majeure.
                Description : SCP-122-FR est une ville circulaire de 10 km² environ, construite en terre cuite et entourée par une muraille de 7 m à 7,5 m de hauteur sur 4 m de largeur, constituée de la même matière. Le tout se trouve sur une île se situant aux coordonnées ██.██████,-███.██████, dans l'océan Pacifique. La muraille possède une unique porte d'accès de 7 m de haut sur 5 m de large ainsi qu'une boîte aux lettres en bois de séquoia incrustée dans le mur à gauche de la porte, le tout situé Sud-Sud-Ouest par rapport au centre de la ville. La ville recouvre la quasi-totalité de l'île mais ni celle-ci ni SCP-122-FR ne sont visibles via les radars ou les images satellites.
                Lorsque quelqu'un pénètre dans SCP-122-FR en passant au-dessus de la muraille, seuls des bâtiments vides sont présents.
                Le principal effet anormal de SCP-122-FR est observable dés que quelqu'un (désigné ci-après comme 'le sujet') passe la porte principale. Le sujet perçoit alors la même ville telle qu'observée en passant au-dessus de la muraille, mais cette dernière est alors peuplée par environ 2███ personnes (toutes désignées comme SCP-122-FR-1). Il est parfaitement possible pour le sujet d'interagir avec la population de SCP-122-FR. Le deuxième effet anormal de SCP-122-FR est observable si un problème, quel qu'il soit,
                venait à créer un différend (social ou non) entre le sujet et un des SCP-122-FR-1. Alors cette instance sera simplement effacée de la réalité perçue par le sujet, qui ne gardera aucun souvenir de l’événement ni de l'instance ainsi effacée. Pour autant, l'existence de l'instance n'est pas effacée de toutes les réalités perceptibles. Ainsi, si un second sujet est introduit dans SCP-122-FR, ce dernier pourra interagir normalement avec cette instance, mais aussi avec le premier sujet. De plus, il semble que dans la réalité du second sujet,
                aucun différend n'ait jamais existé entre le premier sujet et l'instance de SCP-122-FR-1. Aucun différend entre instances n'a été observé pour le moment.
                Peu après les premières expériences sur SCP-122-FR, une lettre est apparue dans la boîte aux lettres de la ville, déposée par 'Mr. Le Maire' (sic), désigné ci-après SCP-122-FR-2 (voir Addendum-01 pour la retranscription de la lettre), invitant le docteur responsable de l'étude de SCP-122-FR dans un bâtiment situé au centre de la ville et supposé être la mairie. Après un court débat, un Classe-D en blouse de docteur fut envoyé à la place du Dr ██████ (voir Addendum-02 pour la retranscription de l'entretien).
                SCP-122-FR-2 semble être une intelligence artificielle à l'origine des effets anormaux de SCP-122-FR.",
                'number' => '122',
            ],
            [
                'title' => 'Blue Mother',
                'content' => "Procédures de Confinement Spéciales : SCP-228-FR-1 doit être confiné dans une salle mesurant 5x5x2 mètres. Toutes les instances de SCP-228-FR-2 doivent être systématiquement éliminées, exceptées les instances de SCP-228-2-E qui doivent être gardées dans la même salle. Si la population des instances de SCP-228-FR-2-E dépasse cinq individus, les entités supplémentaires doivent être éliminées. Trois (3) kg de viande (peu importe la provenance) doivent être insérés chaque jour afin de nourrir les instances de SCP-228-FR-2-E.
                Description : SCP-228-FR-1 est une masse vivante informe, gélatineuse, translucide et bleue pesant soixante-quinze (75) kg et mesurant environ un (1) m sur soixante (60) cm. L'entité respire par six (6) orifices de deux (2) cm de diamètre disposés en ligne sur sa partie supérieure. SCP-228-FR-1 ressent aussi les effets de la faim et de la soif, mais ne possède pas d'orifice ou organe lui servant à absorber de la nourriture ou de l'eau. L'éjection des déchets se fait par un autre orifice, celui-ci étant latéral et mesurant quatre (4) cm de diamètre, ces déchets sont de couleur bleue.
                Une fente de dix (10) cm de long diamétralement opposée à l'orifice précédent est présente. Cette fente éjecte trois fois par jour une instance de SCP-228-FR-2 ainsi qu'un liquide de composition inconnue. Aucun autre organe n'est présent dans SCP-228-FR-1
                Si des dégâts physiques sont infligés à SCP-228-FR-1, son enveloppe externe se mettra à secréter un liquide acide de composition inconnue afin de le protéger.
                Les instances de SCP-228-FR-2 sont des prédateurs semblant être faits de la même matière que SCP-228-FR-1 et mesurant la plupart du temps une vingtaine de centimètres. Elles possèdent des formes différentes, mais des ressemblances entre certaines instances ont été notées, et ces dernières ont donc été classées dans des catégories allant de SCP-228-FR-2-A à SCP-228-FR-2-E. Les entités ne semblent pas posséder de besoins naturels tels que la faim, la soif, la fatigue ou l'évacuation de déchets. Elles restent en meute et semblent dotées d'une conscience collective. Ces prédateurs attaquent en priorité les petits mammifères comme les rats ou les chats, mais peuvent aussi prendre pour cible des animaux plus gros comme des vaches. Elle ne s'attaqueront par contre jamais aux humains.
                Toutes les instances de SCP-228-FR-2 possèdent :
                    Deux paires de pattes leur permettant d'atteindre une vitesse de pointe de sept (7) km.h-1
                    Un nombre variable d'yeux
                    Un squelette interne",
                'number' => '228',
            ],
            [
                'title' => 'Raie hautement inflammable',
                'content' => "Procédures de Confinement Spéciales : SCP-256-FR doit être conservé au Site-██████, dans un aquarium de 6 x 5 x 3 mètres dont les parois sont constituées de verre d'isolation thermique, d'une épaisseur de 75 mm conçu pour résister à de fortes pressions. SCP-256-FR doit être nourri une fois par jour avec 3 fois et demi la quantité nécessaire à un individu de l’espèce Torpedo sinuspersici. Une équipe de plongeurs doit endormir et retirer SCP-256-FR de son aquarium mensuellement à l'aide de seringues à Propofol dans le cadre d'examens vétérinaires.
                Description : SCP-256-FR est une raie dont l'espèce est inconnue, très similaire aux Torpedo sinuspersici. Cependant, les habituels organes électriques des Torpedo sinuspersici sont remplacés par des glandes qui produisent un mucus corporel inflammable, atteignant alors une température de plus de 170 °C.
                Le mucus parvient à alimenter la combustion grâce à sa composition chimique particulière, lui permettant d'effectuer un craquage de l'eau fonctionnant selon cette formule : 2H2O=2H2+O2, la combustion étant alimentée en comburant (O2) et en carburant (2H2).
                SCP-256-FR produit l'étincelle nécessaire à son auto-combustion en entrechoquant ses dents. En effet, SCP-256-FR utilise ses dents pour se nourrir, mais également pour briser de la roche contenant une faible quantité de platine1. Ce métal étant un catalyseur, il permet de produire une étincelle lors d'un choc violent.
                SCP-256-FR possède un organe s'apparentant à une poche qui se contracte lors de la combustion, lui permettant de se recouvrir instantanément d'une épaisse couche de mucus. SCP-256-FR ne s'enflammera cependant qu'en cas de menace, le mucus étant normalement utilisé comme lubrifiant corporel pour appuyer une fuite, à la manière d'une anguille.
                Données complémentaires : SCP-256-FR fut découvert suite à de nombreux cas de destructions de barques de pêcheurs. L'enquête de police privilégia l'hypothèse d'un pyromane particulièrement doué pour brouiller les pistes. Les témoins rapportèrent avoir vu 'une sorte de serpent bleu et luisant' se terrer dans les petits ports environnants, il est probable que SCP-256-FR tentait d'attaquer les barques de pêche à cause des fortes odeurs de poissons et de coquillages qui imprégnaient le bois.
                Le mode de vie de SCP-256-FR ne comporte que deux différences avec le mode de vie des Torpedo sinuspersici :
                    SCP-256-FR ne vit que dans des zones contenant de la roche faiblement enrichie en platine, la localisation du platine se faisant par l'intermédiaire d'organes similaires à des ampoules de Lorenzini réagissant au platine, même à très faible dose.
                    Le régime alimentaire de SCP-256-FR est le même que celui des raies normales, en revanche, SCP-256-FR ingère énormément de nourriture par rapport à sa taille et son poids. Il semblerait que la production du mucus chimiquement complexe soit très coûteuse en énergie.",
                'number' => '256',
            ],
            [
                'title' => 'Le Hamster assoiffé de puissance',
                'content' => "Procédures de Confinement Spéciales : SCP-287-FR doit être gardé en permanence dans un vivarium aux vitres blindées de dimensions cent (100) centimètres de longueur pour soixante-quinze centimètres de largeur pour cinquante (50) centimètres de hauteur. Le vivarium doit être équipé d'une roue standard pour hamster, de nourriture, de boisson et d'une litière adaptée (renouvelés toutes les semaines par un agent d'entretien différent), et de panneaux coulissants en acier activables à distance afin de prévenir toute entrée du sujet dans le champ de vision d'un membre du personnel. SCP-287-FR-01 doit être gardé dans une cellule pour humanoïde standard adaptée à sa nature.
                Mesures complémentaires suite à l'incident 287-FR-1 : Le vivarium de SCP-287-FR est disposé dans la cellule de SCP-287-FR-01 afin de rendre ce dernier plus docile. SCP-287-FR-01 est désormais pourvu d'une camisole, d'une muselière et d'une micro taser sous-cutané activable par une télécommande systématiquement remise aux membres du personnel entrant à l'intérieur. La décharge délivrée est non-létale et doit permettre aux membres du personnel de travailler en toute sécurité dans l'enceinte de la cellule.
                Description : SCP-287-FR est un hamster doré1 femelle mesurant 14,8 centimètres de long pour une masse de 132 grammes, soit une taille et une masse supérieures à la norme. Le sujet est également doué d'une intelligence supérieure à la norme chez les membres de son espèce et ses facultés pourraient être rapprochées de celles d'un grand singe (voir Addendum 287-FR-CM). SCP-287-FR-01 est actuellement [DONNÉES EFFACÉES].
                L'effet principal de SCP-287-FR, de nature mémétique, se déclenche chez ceux qui entrent en contact visuel avec lui. Il suscite chez ses observateurs une réaction empathique progressive et anormalement puissante. Si cette réaction peut sembler normale dans un premier temps, son intensité s’accroît au fil du temps passé à regarder SCP-287-FR. Les victimes développent alors un besoin constant d'être en présence du sujet, comportement similaire à une dépendance. Ceci s'accompagne d'une paranoïa croissante menant les victimes de l'effet à croire que toute autre personne veut nuire à SCP-287-FR, les poussant à agresser verbalement et physiquement tout individu tentant de l'approcher (voir Addendum 287-FR-CM). Les personnes subissant l'effet mémétique à de tels degrés sont susceptibles de devenir des instances de SCP-287-FR-01.",
                'number' => '287',
            ],
            [
                'title' => 'La Boîte à oiseaux',
                'content' => "Procédures de Confinement Spéciales : SCP-307-FR-α est conservé dans un coffre sécurisé standard situé dans le hangar de stockage numéro 3 du Site-Kybian. Le code de déverrouillage du coffre est accessible pour tous les membres du personnel de niveau 3 sous demande au professeur Fréry.
                Les tests sur SCP-307-FR doivent être effectués dans une salle fermée équipée de plusieurs perchoirs de différentes tailles. Toute apparition d’une nouvelle instance de SCP-307-FR-β doit être recensée dans l’Addendum 307-I.
                À la suite d’une demande du département d’Ingénierie et des Services Techniques, l’accès à SCP-307-FR est autorisé aux Spécialistes de confinement de niveau 3 ou supérieur sous autorisation de la directrice du Site-Kybian.
                En cas de réapparition de l’instance 307-β-12 où d’une autre instance inhabituelle, le personnel de test doit cesser toute expérimentation ou réparation en cours et prévenir immédiatement le Pr Fréry.
                Description : SCP-307-FR-α est une boîte à outils métallique de couleur verte pesant quatre-vingt-treize kilogrammes (93 kg) et mesurant un mètre vingt-cinq (1m25) de haut, soixante-seize centimètres (76 cm) de long et cinquante-huit centimètres (58 cm) de large. L’objet semble usé et ne dispose d’aucune marque ou de numéro de série pouvant permettre d’identifier un quelconque fabriquant à l’exception de l’inscription 'Boîte à Outilsiseaux' gravée en rayures sur le dessus de la boîte.
                Le tiroir inférieur de la boîte est rouillé et reste, à ce jour, impossible à ouvrir.
                Lorsqu’un compartiment de SCP-307-FR-α est ouvert, il en sortira immédiatement au moins une instance de SCP-307-FR-β. Toutes les instances sont des oiseaux de races et de tailles variées possédant chacun une anomalie anatomique différente, chacune des instances ayant une partie spécifique de son corps remplacée par un outil. Les chercheurs ignorent si chaque instance est unique ou si chaque anomalie anatomique est propre à une race aviaire particulière, cependant, jamais deux instances identiques n’ont été observées simultanément. En dépit du poids et du déséquilibre qui devrait être causé par la présence de ces outils, les instances de SCP-307-FR-β ne semblent jamais éprouver de difficulté lors de leurs déplacements (à l’exception de 307-β-11 et 307-β-13).",
                'number' => '307',
            ],
            [
                'title' => 'Eau rayée',
                'content' => "Procédures de Confinement Spéciales : Si une instance de SCP-320-FR-1 est découverte par des civils, les individus concernés doivent recevoir un amnésiant de classe B et toutes les structures s'apparentant à un château d'oreillers dans un rayon de 150 m autour des lieux de l'incident doivent être saisies par la Fondation. Toute disparition d'enfants doit être présentée auprès du public comme un enlèvement, et les enregistrements et témoignages présents en ligne doivent être supprimés si possible et décrédibilisés sinon.
                Comme la construction de châteaux en oreillers est une activité courante chez les enfants, SCP-320-FR ne peut actuellement pas être confiné. Cependant, ses conditions d'apparition étant très précises, une grande partie des incidents peuvent être évités en surveillant les festivals et événements prévoyant de grandes structures en oreillers.
                Description : SCP-320-FR est un phénomène affectant toutes les constructions répondant aux conditions suivantes :
                    L'édifice doit se composer uniquement d'oreillers, de coussins, de matelas et de couettes, et imiter le style d'un château fort médiéval.
                    Il doit avoir été construit par des enfants âgés de 4 à 14 ans.
                    Il doit comporter une ou plusieurs entrées, cloisonnées à l'aide d'une couverture, et l'intérieur du château ne doit pas être visible depuis l'extérieur.
                SCP-320-FR ne se manifeste que pour les constructions au volume supérieur à 10m³. Si la structure est laissée intacte durant vingt-sept (27) jours, un accès se crée vers une galerie beaucoup plus volumineuse, constituée des mêmes matériaux. À partir de cet instant, la construction est désignée instance de SCP-320-FR-1. Les galeries des instances de SCP-320-FR-1 sont constituées d'un enchaînement de salles faiblement éclairées par des veilleuses, et se rejoignent toutes en un même point -voir rapports d'exploration. Ces galeries sont indétectables depuis l'extérieur de la structure et creuser le sol ne les révélera pas.",
                'number' => '320',
            ],
            [
                'title' => "Relique garantie 100 % véritable",
                'content' => "Procédures de Confinement Spéciales : Les deux éléments de SCP-379-FR doivent être gardés dans un coffre de confinement standard au Hangar de stockage L122 du Site-██. Toute expérience sur SCP-379-FR est interdite sauf autorisation écrite d'un membre du Comité d'Éthique, en raison des implications à long terme de l'activation de SCP-379-FR-2.
                Toute nouvelle manifestation suspectée de SCP-379-FR-A doit faire l'objet d'une enquête complète et consignée dans un registre stocké aux archives. Cette enquête doit être réalisée sous couverture et sans faire mention d'éléments sensibles ou anormaux, en raison de l'impossibilité d'amnésier les personnes affectées. S'il est déterminé que le comportement de SCP-379-FR-A ne constitue pas un obstacle à l'intégrité physique des membres du personnel de santé, un suivi psychologique peut être proposé.
                Toute manifestation connue de SCP-379-FR-A doit faire l'objet d'un suivi de priorité moyenne afin de prévenir son comportement ou d'en réparer les conséquences.
                Description : SCP-379-FR désigne un ensemble de deux éléments distincts :
                    SCP-379-FR-1 est un morceau de tibia présenté comme une relique et réputé comme ayant appartenu à Ste ███████. Celui-ci est dans un état de conservation standard pour ce type d'objet, et présente quelques zones poreuses au niveau où se trouverait la jointure avec la rotule. La relique se trouve posée sur un petit présentoir en or, dans un coffre de 25 x 10 x 10 cm dont les arêtes sont en or massif décoré et sculpté de figures bibliques, représentant la Vierge Marie et 3 anges. Les faces sont en verre légèrement teinté mais permettent néanmoins d'observer l'os au travers ;
                    SCP-379-FR-2 est une urne rectangulaire et creuse présentant une face légèrement inclinée et percée d'une fente afin d'accueillir des donations. Elle est faite d'un or légèrement moins pur que celui trouvé sur SCP-379-FR-1, mais est décorée de façon similaire. Sur la face censée être présentée face aux donateurs se trouvait vraisemblablement une prière ou un morceau de prière en latin, mais seuls les mots 'Deus dat et accipit Deus', 'Dieu donne et Dieu reprend', sont encore lisibles.",
                'number' => '379',
            ],
            [
                'title' => 'Immobilis In Mobile',
                'content' => "Procédures de Confinement Spéciales : Deux compteurs de Kant doivent être positionnés au sein de chaque lieu ayant été l'objet d'une manifestation de SCP-455-FR. Le taux de Humes du lieu doit être mesuré toutes les deux heures et les résultats envoyés au Service d’Étude des Variations de la Normalité (EVN). Le lieu doit être placé sous la surveillance de la Force d'Intervention Mobile Oméga Rhô, 'Plus de Cauchemars', équipe spécialisée ayant suivi une formation de la Force d'Intervention Mobile Omicron Rhô, 'L’Équipe de Rêves'. Suite à la mise en œuvre du Protocole Immobilis In Mobile, la surveillance de SCP-455-FR est désormais confiée à la FIM Omicron Rhô.
                En cas de variation brutale du niveau de réalité dans une zone habitée, si au moins deux témoins interrogés dans le cadre du Protocole Standard Golconde prononcent la phrase 'Je suivais ma routine quotidienne dans un monde routinier', l'évènement doit immédiatement être considéré comme une manifestation de SCP-455-FR.
                Description : SCP-455-FR désigne un ensemble de perturbations localisées et ponctuelles de la réalité, recensées au nombre de quatre à la date du 21/02/2020, se produisant depuis le 14/07/2019 en divers points de la France. Suite à la réouverture de l’enquête les concernant, voir Addendum 455-FR-2, il a été découvert que ces anomalies étaient produites par un rêve issu d’une partie encore non quantifiable du Collectif Oneiroi. Le but de cette manifestation dans le monde physique n’a pas encore été identifié par la Fondation. Aidez nous, regardez au delà des mots, aidez nous, observez les fragments, aidez nous
                Les phénomènes enregistrés en tant que manifestations de SCP-455-FR n’ont jamais eu, pour l’instant, de cible clairement définie. Les individus présents dans le rayon d’action des perturbations n’ont subi aucune conséquence physique ou mentale à long terme suite à leur exposition.",
                'number' => '455',
            ],
            [
                'title' => 'Dessine-moi une transhumance',
                'content' => "Procédures de Confinement Spéciales : L’accès à SCP-489-FR doit être interdit au public, mais l'anomalie peut être exceptionnellement utilisée par les services de la Fondation en cas d’urgence. Les trois entrées de SCP-489-FR doivent être gardées par deux gardes chacune. L’ensemble des trois sites forme le Site He-489, également équipé pour assurer l'accueil d’une équipe scientifique réduite. L’anomalie n’est pas considérée comme prioritaire, mais des travaux sont toujours en cours pour comprendre son fonctionnement, celui-ci pouvant permettre à la Fondation de lutter de façon plus efficace contre certaines menaces en cas de brèche de confinement.
                Toute personne ayant connaissance des effets anormaux de SCP-489-FR devra être interrogée. SCP-489-FR semblant avoir été utilisé lors de la Seconde Guerre mondiale par les milieux résistants, une enquête est en cours pour retrouver d'éventuels témoins encore en vie, bien qu’il soit possible que l’anomalie ait été utilisée sans que ses utilisateurs n'aient pris conscience de son aspect anormal.
                Description : SCP-489-FR désigne une grotte souterraine traversant les Alpes, possédant trois entrées connues, sur les communes de █████████, entrée nord-ouest, ██████, entrée nord-est et ████████████, entrée sud. Quatre-vingt-dix-huit pour cent de la grotte sont constitués de boyaux et de chatières avec une épaisseur moyenne de six centimètres, ne permettant pas le passage d’un être humain.
                Son exploration complète dans notre plan d'existence est impossible : sa cartographie a donc été estimée à l’aide de relevés sismographiques, malheureusement peu précis.",
                'number' => '489',
            ],
            [
                'title' => "Ginnungagap",
                'content' => "Procédures de Confinement Spéciales : Le Site He-499-FR a été créé pour couvrir et surveiller l'étendue de SCP-499-FR. La zone de confinement étant exclusivement aquatique, les structures de stockage et d'hébergement du Site He-499-FR elles-mêmes sont positionnées à 55°49'18,943''S 66°45'6,645''W.
                Le Site He-499-FR est soumis à deux patrouilles journalières et une surveillance constante par des bouées-capteurs reliées au Site He-499-FR. Le passage d'embarcations extérieures à la Fondation à travers la zone de confinement est autorisé, mais celles-ci doivent être surveillées à distance durant tout le processus et ne devront en aucun cas être laissées effectuer des activités de plongée à but scientifique ou d'agrément. Des brouilleurs de sonar ont également été placés sur le plancher océanique aux alentours de SCP-499-FR pour donner l'illusion d'un relief normal.
                Le Site He-499-FR est enregistré auprès du gouvernement chilien comme une base de recherche scientifique et son personnel est chargé de produire et fournir aux organisations scientifiques qui le demandent des relevés de natures diverses, falsifiés pour occulter les indices de l'existence de SCP-499-FR si nécessaire.
                Des explorations à but de recherche ou de contrôle peuvent être organisées à l'intérieur de SCP-499-FR avec l'approbation de la Dre Hagen. Si l'expédition implique un contact quel qu'il soit avec SCP-499-FR-1, cependant, l'autorisation de trois membres du Conseil O5 est nécessaire pour sa validation.
                Description : SCP-499-FR est une faille océanique anormale, dont le point d'entrée officiel utilisé par la Fondation est défini à 55°40'55,916''S 67°13'7,471''W : Cabo de Hornos, Province de l'Antarctique chilien, Chili. La première anomalie de SCP-499-FR consiste en son isolation spatiale apparente : bien que l'ouverture de la faille se situe à 6000 m de profondeur sur une distance de 53 km, l'eau s'y arrête et l'intérieur de la faille est entièrement à sec1.",
                'number' => "499",
            ],
            [
                'title' => 'La Statue - L\'original',
                'content' => "Procédures de Confinement Spéciales : L'objet SCP-173 doit être conservé dans un conteneur verrouillé en toutes circonstances. Lorsque des membres du personnel doivent entrer dans la chambre de confinement de SCP-173, ils doivent systématiquement être un minimum de trois personnes et la porte doit être immédiatement reverrouillée derrière eux. Deux personnes doivent maintenir un contact visuel direct avec SCP-173 en toutes circonstances et ce jusqu'à ce que tous les membres du personnel aient quitté et reverrouillé le conteneur.
                Description : Transféré au Site-19 en 1993. Origine inconnue jusqu'à présent. Il est constitué de barres d'armature et de béton comportant des traces de peinture aérosol de marque Krylon. SCP-173 est animé et extrêmement hostile. L'objet ne peut pas bouger tant qu'il se trouve dans un champ visuel direct. Il est impératif que le contact visuel avec SCP-173 ne soit pas interrompu. Les membres du personnel assignés à entrer dans le conteneur sont chargés de s'alerter mutuellement avant de cligner des yeux. L'objet attaque en brisant le cou de la victime à la base du crâne, ou par strangulation. Dans le cas d'une attaque, le personnel doit respecter les procédures de confinement de Classe 4 concernant les objets dangereux.
                Le personnel a rapporté avoir entendu des bruits de grattements provenant de l'intérieur du conteneur lorsque personne n'est présent à l'intérieur. Ceci est considéré comme normal et toute modification de ce comportement doit être signalé au superviseur de la LGED en service.
                La substance brun rougeâtre sur le sol est une combinaison de matières fécales et de sang. L'origine de ces substances est inconnue. La salle doit être nettoyée selon une fréquence bi-hebdomadaire.",
                'number' => '173',
            ],
            [
                'title' => 'Un "Whisky médicinal"',
                'content' => "Procédures de Confinement Spéciales : Un total de dix-sept (17) fioles de SCP-195 est actuellement détenu par la Fondation. Elles sont séparées en trois groupes dans un casier de confinement sécurisé dans la section de stockage des classes Sûr du site-1279. L'accès aux SCP-195 nécessite une autorisation écrite par au moins deux membres du personnel de niveau quatre et nécessite l’accompagnement d’un membre de la sécurité du site. En raison de la possibilité d'exposition due à l'inhalation des évaporations de SCP-195, l'accès nécessite une tenue intégrale contre les matières dangereuses de type C y compris avec des engins de respirations.
                Il est possible que d'autres cas de SCP-195 existent. Tous les agents de terrains sont invités à signaler toutes bouteilles ressemblantes à SCP-195, ainsi que - SUPPRIMÉ. Si d’autres cas de SCP-195 sont découverts, ils doivent être collectés par une équipe de confinement des matières dangereuses temporaire munie d’un kit complet y compris avec des respirateurs.
                Description : SCP-195 est un 'médicament au whisky' vendu par deux vendeurs ambulants durant la Pré-Guerre Civile d’Afrique du Sud. Diverses sources historiques conviennent que le 'whisky' était destiné aux chasseurs d’esclaves fugitifs de cette époque, et aurait la propriété d’améliorer 'l'esprit'. Ces sources s'accordent également à dire que les vendeurs ont souvent été chassés des villes quand les effets secondaires de leurs concoctions ont été découverts, et ont étés condamné par '… pendaison pour leurs actions démoniaques, sic' à aux moins deux reprises.",
                'number' => '195',
            ],
            [
                'title' => 'La machine à café',
                'content' => "Procédures de confinement spéciales : Aucune procédure de confinement spéciale standard n’est nécessaire pour l’objet SCP-294. Cependant, seuls les membres du personnel de Niveau 2 ou plus sont autorisés à interagir avec lui. SCP-294 se trouve actuellement dans la salle de repos du personnel du 2ème étage, et est surveillé par deux gardes de Niveau 3 en toutes circonstances.
                Description : L’objet SCP-294 ressemble à une machine à café standard, la seule différence notable étant un clavier avec des touches correspondantes à celles d’un clavier QWERTY anglais. Lorsque l’utilisateur dépose une pièce de cinquante cents américains dans la fente, il lui est demandé de taper le nom d’un liquide en utilisant le clavier. S’il le fait, un gobelet en carton standard sort de la machine et le liquide indiqué y est versé. Quatre-vingt dix-sept tests initiaux ont été réalisés, comprenant des demandes d’eau, de café, de bière, de soda, et de liquides non-consommables tels que de l’acide sulfurique, du détachant, de l’essence, ainsi que des substances n’existant pas habituellement à l’état liquide, telle que l'azote, le fer et le verre, et chacun fut un succès. Les tests conduits avec des matières solides telles que le diamant ont échoué, cependant, car il semble que SCP-294 ne puisse délivrer que des substances existant à l'état liquide.",
                'number' => '294',
            ],
        ];

        foreach ($stories as $key => $data) {
            $story = new Story();
            $story->setTitle($data['title']);
            $story->setSlug($this->slug->generate($story->getTitle()));
            $story->setContent($data['content']);
            $story->setNumber($data['number']);
            $story->setCreatedAt($date);
            $story->setImage($this->getReference('image_' . $faker->numberBetween(0, 10)));
            $story->setIsValidated('true');
            $story->setUser($this->getReference('user_' . $faker->numberBetween(1, 10)));
            for ($j=0; $j < count(MenaceFixtures::MENACES); $j++) {
                $story->addMenace($this->getReference('menace_' . $j));
            }

            $manager->persist($story);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
