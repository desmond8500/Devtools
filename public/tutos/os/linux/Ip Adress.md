# Adressage IP

## Fixer une adresse ip

Lancer cette commande dans un terminal.

```bash
    nano /etc/network/interfaces
```

Editer le fichier sous nano.

```bash
 auto lo
iface lo inet loopback

auto eth0
iface eth0 inet static
     address 192.168.1.3
     netmask 255.255.255.0
     gateway 192.168.1.1
```
