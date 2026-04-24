# Design Patterns — PHP

30 patterns PHP — Création, Structure, Comportement, Architecture — tous illustrés autour d'un objet `Product`.

---

## Structure du projet

```
patterns/
├── architecture/          # Patterns d'architecture (Repository, Service, DTO)
├── creation/              # Patterns de création
├── structure-avance/      # Patterns structurels
└── comportement-avance/   # Patterns comportementaux
```

---

## 1. Architecture

> Séparer les responsabilités entre les couches d'une application.

| Pattern | Fichier | Description |
|---------|---------|-------------|
| **Repository** | `Repository/ProductRepository.php` | Isole l'accès aux données (tableau, BDD, API…) |
| **Service** | `Service/ProductService.php` | Contient la logique métier (ex: calcul TVA) |
| **DTO** | `DTO/ProductDTO.php` | Transfère uniquement les données nécessaires entre couches |

**Flux :**
```
index.php → Service → Repository → Entité → DTO → Réponse
```

---

## 2. Patterns de Création

> Contrôler et abstraire la façon dont les objets sont instanciés.

| Pattern | Fichier | Description |
|---------|---------|-------------|
| **Singleton** | `singleton/index.php` | Garantit une seule instance de l'objet |
| **Factory** | `factory/index.php` | Délègue la création d'objets à une méthode selon un type |
| **Builder** | `builder/index.php` | Construit un objet complexe étape par étape (fluent interface) |
| **Prototype** | `prototype/index.php` | Crée de nouveaux objets par clonage d'un existant |
| **Abstract Factory** | `abstract-factory/index.php` | Produit des familles d'objets selon une région (FR, US, MA…) |

---

## 3. Patterns Structurels

> Organiser et composer des objets pour former des structures plus grandes.

| Pattern | Fichier clé | Description |
|---------|-------------|-------------|
| **Adapter** | `adapter/ProductAdapter.php` | Convertit un tableau associatif en objet `Product` |
| **Composite** | `composite/ProductComposite.php` | Traite un objet unique et un groupe d'objets de façon uniforme |
| **Decorator** | `decorator/DiscountDecorator.php` | Ajoute dynamiquement un comportement (ex: remise) sans modifier la classe |
| **Facade** | `facade/ProductFacade.php` | Simplifie l'interface d'un sous-système complexe |
| **Proxy** | `proxy/ProductProxy.php` | Contrôle l'accès à un objet (ici : chargement paresseux) |

---

## 4. Patterns Comportementaux

> Définir comment les objets communiquent et se répartissent les responsabilités.

| Pattern | Fichier clé | Description |
|---------|-------------|-------------|
| **Chain of Responsibility** | `chain/Handler.php` | Chaîne de validations (libellé, prix…) passées de handler en handler |
| **Command** | `command/Invoker.php` | Encapsule une action en objet, permet l'historique et l'annulation |
| **Observer** | `observer/ProduitSujet.php` | Notifie automatiquement plusieurs observateurs lors d'un changement (Logger, Email, SMS, Stock) |
| **State** | `state/ProduitEtat.php` | Change le comportement d'un objet selon son état (Brouillon → Publié) |
| **Strategy** | `strategy/CalculateurPrix.php` | Permet d'interchanger des algorithmes (TVA, Promo) sans modifier le contexte |

---

## Vue d'ensemble des patterns

```
Création          Structurel         Comportemental      Architecture
─────────         ──────────         ──────────────      ────────────
Singleton         Adapter            Chain               Repository
Factory           Composite          Command             Service
Builder           Decorator          Observer            DTO
Prototype         Facade             State
Abstract Factory  Proxy              Strategy
```

---

## Prérequis

- PHP 8.0+
- Aucune dépendance externe

## Lancer un exemple

```bash
php architecture/Repository/index.php
php creation/factory/index.php
php structure-avance/decorator/index.php   # (avec un index.php d'entrée)
php comportement-avance/observer/index.php
```
