# GIT

## Description

C'est un gestionnaire de dépendances qui permet de faciliter le développment d'applications.

## Installation

[Télécharger](https://nodejs.org/en/download/)

## Utilisation

```bash
git branch dev-diene
git checkout dev-diene
git merge master
git push --set-upstream origin dev-diene
```

## Workflow 

master = master  
develop = beta  test  
dev = developper  

## Récupération des mises à jour

```bash
git checkout develop
git pull
npm install
```

permet de récupérer les modifications de la branche develop

```bash
git checkout dev-diene
git merge develop
```

## Git

### Créér un nouveau répo 

```bash
echo "# senecolo4" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/desmond8500/senecolo4.git
git push -u origin master
```

### Lier à un répo qui existe

```bash
git remote add origin https://github.com/desmond8500/senecolo4.git
git push -u origin master
```
