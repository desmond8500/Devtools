# Nouvelle installation Linux

## Description

Lors d'une nouvelle installation d'une machine linux, nous avons besoin d'installer et de configurer nos outils favoris
avant de pouvoir travailler correctement.  
Ce document rassemble l'ensemble des procédures à suivre pour bien mener cet tache.

## Mise en place du serveur web

Nous aurons besoin de :
* Apache 2 comme serveur http pour afficher les pages web
* Php comme langage backend
* NodeJS pour le front end nottament pour Ionic et Angular
* Maria DB comme serveur de base de données

```bash
sudo apt install apache2 php libapache2-mod-php mariadb-server php-mysql
sudo apt install php-curl php-gd php-intl php-json php-mbstring php-xml php-zip
```
[Source](https://doc.ubuntu-fr.org/lamp)

## Configuration de Php

Activer les extensions qu'il faut dans le fichier **/etc/php/7.0/cli/php.ini**.

* xmml
* pdo_mysql
* pdo_sqlite

et autres

## installation de composer

```bash
sudo apt-get install composer
```

### Editeurs de textes

* Atom
* Visual Studio code
