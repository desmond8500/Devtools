# Odoo 12

## Description

Odoo est un CRM assez complet qui permet de faire plein de choses notament la gestion d'entreprise etc.

## Installation Odoo 13

### Environnement

Nous allons installer Odoo sur un serveur virtuel sous VirtualBox avec Ubuntu 18.04 server comme OS.  
Au moment de l'installation il faudra veiller à ne pas utilise "odoo" comme nom d'utilisateur.  
Nous allons installer **Openssh-server** pour pouvoir travailler plus facilement.

## Installation online

1. Créer un compte chez [Alwaysdata](http://alwaysdata.com/);  
2. Créer le site odoo à partir de l'installateur, il faudra faire une migration de posgrestsql avant de procéder à l'installation
3. Les identifiants par défaut sont : **admin/admin**
4. Changer la langue
5. Configurer le serveur mail [lien](https://www.odoo.com/fr_FR/forum/aide-1/question/incoming-outgoing-mail-configuration-44842)

## Bugs

### Editer des contacts

Pour pouvoir créer et éditer des utilisateurs il faut :  

* Activer le __mode développeur__ (dans le menu de configuration)
* Aller dans la section __Facture__ puis __Configuration__
* Installer un plan comptable (HOADA pour l'Afrique de l'ouest)

## Liens d'exploitation

[Lien web Local](http://localhost:8069)  
[Administration de la base de données](http://localhost:8069/web/database/manager)
