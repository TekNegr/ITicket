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


## Demarrage de l'application 

0. **Autorisations** : User : "Admin" // Mail : "admin@mail.com" // MDP : "admin1234"

```cmd
PS C:\xampp\htdocs\ITicket> php artisan serve

   INFO  Server running on [http://127.0.0.1:8000].  

  Press Ctrl+C to stop the server

```

