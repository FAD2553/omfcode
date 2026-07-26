# OMF

Bienvenue dans le projet OMF : un site vitrine professionnel développé en Laravel, conçu pour présenter une agence digitale avec prises de rendez-vous, blog, témoignages, demandes de devis, newsletter et chatbot IA.

## ✅ Présentation

OMF est une application web basée sur Laravel 13 et Filament 5. Elle sert de site de présentation pour une agence numérique, avec un front-office accessible aux visiteurs et un back-office d'administration via Filament.

Le site inclut :
- Page d'accueil dynamique avec projets et témoignages.
- Page services et fiches services.
- Pages de réalisations et témoignages.
- Blog avec articles, likes et commentaires.
- Formulaire de contact fonctionnel.
- Prise de rendez-vous en ligne.
- Demande de devis.
- Inscription à la newsletter.
- Chatbot IA connecté à l'API Groq.
- Console d'administration Filament pour gérer le contenu.

## 🧰 Technologies utilisées

- PHP 8.3
- Laravel 13
- Filament 5
- Tailwind CSS 4
- Vite 8
- SQLite (par défaut pour le développement)
- Pest pour les tests
- Laravel Boost / Pint / Pail pour le dev

## 📄 Fonctionnalités principales

### Front-end utilisateur

- Accueil (`/`) avec projets et témoignages récents.
- À propos (`/about`).
- Contact (`/contact`) avec envoi de message.
- FAQ (`/faq`).
- Rendez-vous (`/rendez-vous`) avec validation et stockage.
- Services (`/services`) et page service individuelle (`/services/{slug}`).
- Réalisations (`/realisations`).
- Blog (`/blog`) et article détaillé (`/blog/{slug}`).
- Likes sur article de blog.
- Commentaires de blog soumis pour modération.
- Témoignages (`/temoignages`) avec soumission de nouveau témoignage.
- Devis (`/devis`) avec formulaire complet.
- Abonnement newsletter via `/newsletter/subscribe`.
- Chatbot IA via `/chatbot`.
- Pages légales : mentions légales, politique de confidentialité, conditions d'utilisation.

### Back-office (Filament)

Le panneau d'administration est disponible sur :

- `/admin`

Il permet de gérer :
- Appointments (rendez-vous)
- Contact messages
- Posts (articles de blog)
- Post comments
- Projects (réalisations)
- Quote requests (devis)
- Service categories
- Services
- Testimonials

## 📁 Structure du projet

- `app/Models/` : entités de données (Post, Projet, Service, etc.).
- `app/Http/Controllers/` : logique des formulaires, abonnement newsletter et chatbot.
- `app/Filament/` : ressources d'administration.
- `routes/web.php` : routes publiques et API internes.
- `resources/views/` : vues Blade front-end.
- `database/migrations/` : structure de la base de données.
- `database/seeders/` : exemple d'utilisateur admin.
- `public/` : fichiers publics compilés.

## ⚙️ Installation et configuration

### Prérequis

- PHP 8.3
- Composer
- Node.js + npm
- Git

### Étapes pour démarrer

1. Cloner le dépôt :
   ```bash
   git clone <ton-repo-url>
   cd omf
   ```

2. Installer les dépendances PHP :
   ```bash
   composer install
   ```

3. Installer les dépendances Node :
   ```bash
   npm install
   ```

4. Copier le fichier d'environnement :
   ```bash
   copy .env.example .env
   ```

5. Générer la clé d'application :
   ```bash
   php artisan key:generate
   ```

6. Créer le fichier SQLite si vous utilisez SQLite :
   ```bash
   type nul > database\database.sqlite
   ```

7. Configurer `.env` si nécessaire :
   - `APP_URL=http://localhost`
   - `DB_CONNECTION=sqlite`
   - `DB_DATABASE=${PWD}\\database\\database.sqlite` ou `database/database.sqlite`
   - `SESSION_DRIVER=database`
   - `QUEUE_CONNECTION=database`
   - `MAIL_MAILER=log`
   - `GROQ_API_KEY=` (pour le chatbot)

8. Exécuter les migrations :
   ```bash
   php artisan migrate
   ```

9. (Optionnel) Exécuter le seeder :
   ```bash
   php artisan db:seed
   ```

### Compte administrateur par défaut

Le seeder crée un utilisateur :
- Email : `test@example.com`
- Mot de passe : `password`

> Ce compte est un exemple. Change-le avant de déployer en production.

## 🚀 Lancer le projet

### En développement

```bash
npm run dev
php artisan serve
```

### Compilation de production

```bash
npm run build
```

## 🧪 Tests

Pour lancer les tests :

```bash
php artisan test --compact
```

Ou avec npm :

```bash
npm test
```

## 🔧 Routes importantes

- `/` : page d'accueil
- `/about` : à propos
- `/contact` : page de contact
- `/faq` : FAQ
- `/rendez-vous` : prise de rendez-vous
- `/services` : liste des services
- `/services/{slug}` : page service
- `/realisations` : projets réalisés
- `/blog` : liste d’articles
- `/blog/{slug}` : article détaillé
- `/temoignages` : témoignages
- `/devis` : demande de devis
- `/admin` : administration Filament

## 🔐 Variables d'environnement importantes

Voici les variables les plus utiles décrites simplement :

- `APP_NAME` : nom du site.
- `APP_URL` : URL locale du site.
- `APP_ENV` : environnement (`local`, `production`).
- `DB_CONNECTION` : connexion à la base de données.
- `DB_DATABASE` : chemin vers le fichier SQLite.
- `QUEUE_CONNECTION` : connexion de file d’attente.
- `SESSION_DRIVER` : gestion des sessions.
- `MAIL_MAILER` : gestion des emails en local (`log`).
- `GROQ_API_KEY` : clé API pour le chatbot IA.

## 💡 Notes importantes

- Le chatbot IA utilise l'API Groq avec le modèle `llama-3.1-8b-instant`.
- Les commentaires de blog et les témoignages sont soumis en `draft` par défaut et doivent être validés dans le back-office.
- Les likes de blog ne sont comptés qu’une seule fois par session.
- Les données envoyées par formulaire utilisent des validations Laravel standards.

## 📌 Astuce pour GitHub

Avant de mettre en ligne sur GitHub :
- Ne publie jamais ton `.env`.
- Ajoute `database/database.sqlite` à `.gitignore` si nécessaire.
- Vérifie que les mots de passe de démonstration ne restent pas en production.

## 📚 Ressources utiles

- Laravel : https://laravel.com/docs
- Filament : https://filamentphp.com/docs
- Tailwind CSS : https://tailwindcss.com/docs
- Vite : https://vitejs.dev/

---

Merci d'avoir choisi ce projet. Si tu veux, je peux aussi t'aider à ajouter une section de déploiement ou une documentation technique API plus détaillée.
