# Atelier cybersécurité : Laravel Form

> ⚠️ **Attention : cette application est volontairement vulnérable.** Les protections CSRF sont désactivées et aucun filtrage n'empêche l'injection de contenu malveillant. **Ne l'utilisez en aucun cas en production.**

## Objectif
Cette mini-application Laravel sert de support à un atelier de sensibilisation aux attaques **Cross-Site Scripting (XSS)** et **Cross-Site Request Forgery (CSRF)**. Elle offre un terrain d'expérimentation concret pour observer la naissance de ces failles et tester les contre-mesures recommandées par Laravel.

## Fonctionnalités proposées
- Formulaire de contact accessible sur `/` ou `/contact` qui enregistre le nom, l'adresse e-mail et le message dans la base de données.
- Route POST volontairement dépourvue de protection CSRF afin de démontrer la simplicité d'une soumission frauduleuse.
- Page `/contact/messages` affichant toutes les entrées enregistrées sous forme de tableau pour illustrer l'injection XSS lorsqu'un contenu n'est pas traité correctement.

## Mise en place
1. **Cloner** le dépôt puis installer les dépendances avec `composer install` (et `npm install` si vous souhaitez également illustrer les aspects front-end).
2. **Configurer la base de données** dans votre fichier `.env` puis exécuter `php artisan migrate` pour créer la table `contact_messages`.
3. Démarrer le serveur local avec `php artisan serve` (et `npm run dev` pour compiler les assets si besoin) avant de lancer l'atelier.

## Déroulé suggéré de l'atelier
- Montrer comment un tiers peut fabriquer une requête POST pour exploiter l'absence de token CSRF.
- Saisir un message contenant du JavaScript afin d'observer l'exécution de code sur la page de liste.
- Discuter des protections natives de Laravel (middleware CSRF, directives Blade, validation, etc.) et guider les participantes et participants vers leur mise en œuvre.

## Avertissement
Ce projet est un **bac à sable pédagogique** exclusivement destiné aux démonstrations. Il n'est ni complet, ni sécurisé, et n'a pas vocation à être utilisé en dehors d'un cadre d'apprentissage. Toute utilisation hors atelier se fait à vos propres risques.
