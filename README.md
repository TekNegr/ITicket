# ITicket

Ce projet consiste en la conception et le développement d'une application de gestion de tickets informatiques destinée à une entreprise. L'objectif est de fournir une solution efficace pour le suivi, la gestion et la résolution des demandes informatiques. Une fois développée, l'application sera déployée pour être utilisée par les employés et les équipes techniques, facilitant ainsi la communication et l'organisation des tâches liées au support informatique.

__Auteurs__ : 
- Henintsoa RAMAKAVELO
- Jeff DJOUSSE ZANGUE
- Pierre Steve NGWEHA PENI 

## Sommaire
1. [**Cahier des charges**](#cahier-des-charges)
2. [**Taches**](#taches)
3. [**Demarrage**](#demarrage-de-lapplication)


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

| Tache | Description | Assigné à | Statut | Notes du dernier ***~.X*** |
|-------|-------------|-----------|--------|------------------|
| Base | SetUp du projet | Jeff & Henin | Deboggage nec. **(87%)** | **X** | 
| Permissions | Permettre les accès par permissions | Henin | En cours **(78%)** | Corriger l'assignation des *roles + restriction *middleware ***~H*** | 
| Data-Tickets | Mettre en place les modèles et ressources des Tickets | Jeff | En cours **(99%)** | c.f *Tickets ***~H*** |
| Tickets | Mettre en place le system de Ticket | Jeff | En cours **(65%)** | Manque plus que le *TicketController et le connecter à une *Vue ***~H*** | 
| Vues | Visuels et accès aux microservices | Steve (?) | A faire | **X** | 
| Gestion Ressources | Permettre à l'admin la modification dynamique de la BDD | Henin | En cours **(60%)** | c.f *Permissions ***~H*** | 
| Container | Mettre en place le container Docker | Steve |A faire | **X** | 
| CICD | Mettre en place les pipelines github d'après deploiement | Steve (?) | A faire | **X** | 
| Compiling + Deploiement | Mettre l'application à disposition | ???/@all | A faire | **X** | 



**Repartition** : Henin (3) ; Jeff (3) ; Steve (3)  -- **Avancement** : 43.22%

Score Avancement = (0.87+ 0.78+ 0.99+ 0.65+ 0+ 0.6+ 0+ 0+ 0)/9

**Liste Assets**:

- [x] Write the press release
- [ ] Update the website
- [ ] Contact the media


## Demarrage de l'application 

0. **Autorisations** : User : "Admin" // Mail : "admin@mail.com" // MDP : "admin1234"

### HORS DOCKER - DevMode ###
1. Copier le projet :
```cmd
PS C:\xampp\htdocs\ITicket> cp .env.example .env        !--Copier le fichier environnement

PS C:\xampp\htdocs\ITicket> php artisan key:generate    !--Crée une clé d'application

PS C:\xampp\htdocs\ITicket> php artisan install         !--Installe les dépendances si pas déja fait

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
                                                        !-- Publie les permissions Spatie afin de les accéder

PS C:\xampp\htdocs\ITicket>php artisan migrate          !--Migrer la BDD  

PS C:\xampp\htdocs\ITicket>php artisan tinker           !-- Créer les roles 
>use Spatie\Permission\Models\Role;
>Role::create(['name' => 'employee']);
>Role::create(['name' => 'admin']);
>Role::create(['name' => 'technicien']);
>Role::create(['name' => 'unknown']);

!-- Ctrl+c pour quitter ou "exit;"

!-- Vous pouvez utiliser filament ou le seeder pour créer le premier utilisateur
PS C:\xampp\htdocs\ITicket>({php artisan database:seed} // {php artisan make:filament-user})  
!-- En choisir UN SEUL

```
   
3. Vérifier les instances:

   - **DB** : Verifier le bon setup de la *BDD* et qu'elle a été créé et migrer
   - **Dépendances** :  Verifier que ces dépendances sont installé : {Breeze, NPM, Livewire, Filament, Spatie}


4. Lancer le serveur :

```cmd
PS C:\xampp\htdocs\ITicket> php artisan serve

   INFO  Server running on [http://127.0.0.1:8000].  

  Press Ctrl+C to stop the server

```
x. 


### DOCKER  ###

 **A compléter**
