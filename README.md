# Préparation du projet

Nous avons préparé le projet avec un diagramme de classe et un diagramme d'activité.

## Diagramme de classe vers les entités

Création de entités à partir du diagramme de classe.

```bash
symfony console make:entity [Nom de l'entité]
```

Nous avons pris de mettre en place les relation entre les entités. La liste au 11/03 des entités est la suivante :

- User
- Offer
- Booking
- Image
- Review
- Favorite
- Equipment

## Création d'un formulaire d'inscription

Pour la création d'un formulaire d'inscription, nous avons utilisé la commande suivante :

```bash
symfony console make:registration-form
```

Ce qui permet désormais au uinternautes anonymes de s'inscrire sur notre application.
Nous avons également mis en place une vérification de l'adresse mail avec un envoi de lien de vérification (token + durée de validité).

Il est important de préparer une ou plusieurs route pour les redirect apres la création du compte ainsi que pour la vérification de l'adresse mail.

Pour cela, nous avons utilisé la commande suivante :

```bash
symfony console make:controller PageController
```

Cette route se nomme 'after_register' et est accessible via l'url '/after_register'. Un message flash est affiché pour indiquer à l'utilisateur que son adresse mail a bien été vérifiée.

Un fois la vérification effectué, l'utilisateur est mis à jour dans la base de donnée, à la colonne 'isVerified' qui passe à 'true'.

## Création d'un formulaire de connexion

Nous avons également mis en place un système de connexion.

Pour cela, nous avons utilisé la commande suivante :

```bash
symfony console make:auth
```

Comme pour le formulaire d'inscription, il est important de préparer une ou plusieurs route pour les redirections après la connexion. Cela se passe dans l'authenticator.

## Création des pages statiques

La liste des pages statiques est la suivante :

- Accueil ('/', home)
- Profil ('/profile', profile)
- Villes ('/cities', cities)
- A propos ('/about', about)
- Offres ('/offers', offers)
- Contact ('/contact', contact)

## Création d'un formulaire de contact

Pour la création d'un formulaire de contact, nous avons utilisé la commande suivante :

```bash
symfony console make:form ContactType
```

Nous avons également mis en place une vérification des données du formulaire de contact.
Cela se fait avec la validation des données dans le fichier 'Contact.php' dans le dossier 'src/Entity'.
