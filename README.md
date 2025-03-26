# ITicket

Ce projet consiste en la conception et le développement d'une application de gestion de tickets informatiques destinée à une entreprise. L'objectif est de fournir une solution efficace pour le suivi, la gestion et la résolution des demandes informatiques. Une fois développée, l'application sera déployée pour être utilisée par les employés et les équipes techniques, facilitant ainsi la communication et l'organisation des tâches liées au support informatique.

__Auteurs__ : 
- Pierre Steve NGWEHA PENI 
- Jeff DJOUSSE ZANGUE
- Henintsoa RAMAKAVELO


## Cahier des charges 
### 1. Fonctionnalités de base
- **Création de tickets** : les utilisateurs peuvent créer des tickets pour signaler des problèmes au service IT
- **Gestion des tickets** : les administrateurs peuvent gérer les tickets, y compris les supprimer ou assigner quelqu'un pour sa résolution
- **Résolution des tickets** : les techniciens peuvent résoudre les tickets et changer leurs statuts
- **Notification** : les utilisateurs sont notifiés des mises à jour sur leurs tickets
- **Déploiement** : l'application sera déployé et sera associé à un pipeline qui permettra 

## Spécificités 

### Roles 
- **Employés** : Soumets des tickets, Check leurs avancement, Est notifé de son état


- **Technicien** : Consulte les tickets ouvert, mettent à jour les tickets 


- **Administrateur** : Gère, Assigne, Modifie et Peuvent analyser les tickets et les utilisateurs 

### Technologies 


- **Fullstack** : Laravel
    - **Frontend** : Blade, Filament, Tailwind, Livewire
    - **Backend** : Spatie-Permissions, Breeze
    - **Database** : MySQL

- **Deploiement** : 
    - **Container** : Docker, jenkins
    - **CI/CD** : GitLab CI/CD

## Taches : 

| Tache | Description | Assigné à | Statut |
|-------|-------------|-----------|--------|
| Base | SetUp du projet | Jeff & Henin | Deboggage nec. |
| Permissions | Permettre les accès par permissions | Henin | En cours (78%) |
| Data-Tickets | Mettre en place les modèles et ressources des Tickets | Jeff | En cours (50%) |
| Tickets | Mettre en place le system de Ticket | Jeff | En cours (50%) |
| Vues | Visuels et accès aux microservices | Steve (?) | A faire |
| Gestion Ressources | Permettre à l'admin la modification dynamique de la BDD | Henin | En cours (30%) |
| Container | Mettre en place le container Docker | Steve |A faire |
| CICD | Mettre en place les pipelines github d'après deploiement | Steve (?) | A faire |
| Compiling + Deploiement | Mettre l'application à disposition | ??? | A faire |

**Repartition** : Henin (3) ; Jeff (3) ; Steve (3)  -- **Avancement** : 30.8%


## Demarrage de l'application 

0. **Autorisations** : User : "Admin" // Mail : "admin@mail.com" // MDP : "admin1234"

### HORS DOCKER - DevMode ###
1. Copier le projet :
```cmd
PS C:\xampp\htdocs\ITicket> cp .env.example .env        --Copier le fichier environnement

PS C:\xampp\htdocs\ITicket> php artisan key:generate    --Crée une clé d'application

PS C:\xampp\htdocs\ITicket> php artisan install         --Installe les dépendances si pas déja fait

PS C:\xampp\htdocs\ITicket>php artisan migrate          --Migrer la BDD  

```
   
3. Vérifier les instances:

   
4. Lancer le serveur :

```cmd
PS C:\xampp\htdocs\ITicket> php artisan serve

   INFO  Server running on [http://127.0.0.1:8000].  

  Press Ctrl+C to stop the server

```
x. 
