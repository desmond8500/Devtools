# Remplir un tableau dynamiquement

## Description

Remplir un tableau dynamiquement avec du javascript

## Code HTML

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire</title>
</head>
<body>
   
    <!-- Formulaire  -->
    <h3>Utilisateurs</h3>
    <input type="text" placeholder="Prénom" id="prenom">
    <input type="text" placeholder="Nom" id="nom">
    <button onclick="addUser()">valider</button>
 
    <br>
    <br>
    <!-- Tableau  -->
    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <tbody id="Noms">

        </tbody>
    </table>
    
</body>
<script src='app.js'></script>
</html>
```

## Javascript 

```js
// Fonction qui va permettre d'ajouter dynamiquement les noms à partir du formulaire
function addUser() {
    // prémet de récupérer le prénom 
    prenom = document.getElementById('prenom').value;
    // prémet de récupérer le nom 
    nom = document.getElementById('nom').value;

    // permet d'ajouter les prénom et nom
    document.getElementById("Noms").innerHTML +=
        "<tr>" +
        "<td>" + prenom + "</td>" +
        "<td>" + nom + "</td>" +
        "</tr>";
}
```

## Css

```css
table, th, tr, td{
    border: 1px solid black;
}

th,tds{
    padding: 5px;
}
```

## Sources

* [W3 Schools](https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_push)
