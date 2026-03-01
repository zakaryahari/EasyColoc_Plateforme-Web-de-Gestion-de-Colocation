<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🏠 EasyColoc  
### Rapport de Finalisation du Projet Web Dynamique  
**Système de Gestion de Colocation et de Réputation – EasyColoc**

---

## 🎯 Résumé Exécutif

Ce document atteste de la finalisation du projet **EasyColoc**, une application web complète dédiée à la gestion financière et sociale des colocations.

L'objectif était de développer une solution **Full-Stack robuste en Laravel**, capable de :

- Gérer des flux de dépenses complexes (calcul de parts, dettes, règlements)
- Automatiser la gestion financière entre colocataires
- Encourager un comportement responsable via un système de réputation unique

Le projet repose sur :

- 🏗️ Une architecture **MVC moderne**
- 🗄️ Une base de données **SQL relationnelle**
- 🌙 Une interface utilisateur professionnelle en **Dark Mode**

---

## 🛠️ Achèvements Techniques Clés (Logique & Interface)

---

### 1️⃣ 🔐 Hiérarchie des Pouvoirs et Sécurité

#### 👥 Multi-Rôles Strict
Distinction claire entre :

- **Administrateur** → Gestion globale de la plateforme
- **Propriétaire** → Gestion complète de la maison
- **Membres** → Participation aux dépenses

#### 🛡️ Contrôle d’Accès (Middleware)

- Protection des routes sensibles
- Seul le **propriétaire** peut :
  - Expulser un membre
  - Supprimer une dépense

#### ✉️ Système d’Invitation Sécurisé

- Invitation par email
- Génération de **tokens uniques**
- Accès sécurisé à une colocation

---

### 2️⃣ 💸 Moteur de Calcul et Gestion des Dettes

#### 🧮 Auto-Splitter de Dettes

Calcul automatique de la part de chaque membre lors de l'ajout d'une dépense.

> Exemple : 200 DH ÷ 4 occupants = 50 DH chacun

#### 🔄 Gestion des Sorties et Expulsions

- Transfert automatique des dettes impayées vers le propriétaire
- Maintien de la cohérence financière du groupe

#### 📅 Filtrage Avancé

- Consultation des dépenses par mois spécifique
- Meilleure clarté budgétaire

---

### 3️⃣ 📈 Gamification et Réputation

#### ⭐ Score de Réputation Dynamique

| Action | Impact |
|--------|--------|
| Paiement effectué | +1 |
| Départ volontaire | -1 |
| Expulsion | -5 |

#### 📊 Dashboard Analytics

Visualisation en temps réel :

- 💰 Dépenses totales
- 📥 Qui vous doit
- 📤 Ce que vous devez
- ⭐ Réputation personnelle

#### 🛠️ Panneau Admin Global

Interface dédiée à :

- 🚫 Bannir les utilisateurs toxiques
- 📈 Consulter les statistiques de croissance
- 📊 Superviser l’activité globale du réseau

---

## 💻 Technologies Clés

| Catégorie | Technologie | Rôle dans le Projet |
|------------|-------------|---------------------|
| **Framework Back-End** | Laravel 10/11 | Architecture MVC, Eloquent ORM, Routing, Middlewares |
| **Base de Données** | MySQL / SQL | Schémas relationnels, contraintes d'intégrité, agrégations (SUM / COUNT) |
| **Langages Web** | PHP / JavaScript | Logique métier serveur & interactivité du Dashboard |
| **Interface (UI)** | CSS3 / Dark Theme | Design moderne & expérience utilisateur optimisée |
| **Versioning** | Git / GitHub | Gestion du code source & suivi des commits |

---

## 👨‍💻 Auteur

Projet réalisé par **Safiy**  
Dans le cadre de la formation **YouCode**

---

## 🚀 Évolutions Futures Possibles

- 🔔 Notifications en temps réel
- 📱 Version mobile
- 📊 Graphiques avancés
- 💳 Intégration de paiements en ligne
