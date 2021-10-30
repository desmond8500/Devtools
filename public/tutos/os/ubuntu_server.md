# ubuntu server

## Apache

```shell
sudo apt-get install apache2 build-essential
```

## PHP

```shell
sudo apt-get install php libapache2-mod-php php-curl php-gd php-intl php-json php-mbstring php-xml php-zip  
```

## Sqlite3
```sh
sudo apt-get install sqlite3 php-sqlite3
```


## MySQL

```shell
sudo apt-get install mysql-server php-mysql
```

## Maria DB

```shell
sudo apt-get install mariadb-server php-mysql
```

## Phpmyadmin

```shell
sudo apt-get install php-myadmin
```

## Configuration de lancement

Pour empêcher le demmarage automatique il faut :

```shell
sudo systemctl disable apache2
sudo systemctl disable mysql
```

Pour le lancement manuel

```shell
sudo systemctl start apache2
sudo systemctl start mysql
```

Pour réactiver le demmarage automatique.

```shell
sudo systemctl enable apache2
sudo systemctl enable mysql
```

## Configuration de PHP

Pour que **PHP** fonctionne correctement il faut activer certaines extensions utiles. Il faut pour cela éditer le fichier `php.ini`.  

```shell
sudo nano /etc/php/7.2/cli/php.ini
```

Il faut activer les extensions: 

* curl
* pdo_mysql
* pdo_sqlite
* sqlite3

La modification du fichier php.ini peut ne pas marcher, il faudra faire les modification au niveau d'apache. 

```sh
sudo nano /etc/apache2/sites-available/000-default.conf
```

ajouter le code suivant : 

```sh
    php_value upload_max_filesize 8G
    php_value post_max_size 2G
    php_value memory_limit -1
    php_value max_file_uploads 1000
```

Redemmarer le serveur apache

```sh
sudo service apache2 restart
```

[Source](https://serverfault.com/questions/723801/upload-max-filesize-php-ini-or-apache-virtual-host-entry)

## Autres logiciels utiles

### Git

```language
sudo apt-get install git 
```

### Composer

```bash
sudo apt-get install composer
```

### Open shh server

```bash
sudo apt-get install openssh-server
```

## Virtual box 

Nous allons faire de la redirection de port

[port fowarding](https://www.techrepublic.com/article/how-to-use-port-forwarding-in-virtualbox/)

## Sources

* [Ubuntu.fr](https://doc.ubuntu-fr.org/lamp)
