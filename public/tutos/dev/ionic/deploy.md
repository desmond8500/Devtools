# Déploiment d'un application Ionic avec capacitor

## keytool

A installer au besoin, télécharger jdk et l'ajouter au variables d'environnement de windows `C:\Program Files\Java\jdk1.8.0_181\bin`

Ensuite il faut générer le fichier  `release.jks`

```sh
keytool -genkey -v -keystore release.jks -keyalg RSA -keysize 2048 -validity 1000
```

## Passer en production

```sh
ionic capacitor build android
npx cap sync android
npx cap open android
```

Dans le terminal aller dans le dossier android :

```dh
cd android
```

créer à la racine du projet un fichier `keystore.properties`

```sh
storePassword=Passer1234!
keyPassword=Passer1234!
keyAlias=release
storeFile=./../../release.jks
```


Configurer la génération automatique de bundle signé dans le fichier `android>app>build.gradle` et ajouter juste après `apply plugin`

```js
def keystorePropertiesFile = rootProject.file("../keystore.properties")
def keystoreProperties = new Properties()
keystoreProperties.load(new FileInputStream(keystorePropertiesFile))
```

puis avant `buildTypes` :

```js
signingConfigs{
    release{
        keyAlias keystoreProperties['keyAlias']
        keyPassword keystoreProperties['keyPassword']
        storeFile file(keystoreProperties['storeFile'])
        storePassword keystoreProperties['storePassword']
    }
}
```

dans `buildTypes` ajouter :

```sh
buildTypes {
    release {
        signingConfig signingConfigs.release
        minifyEnabled false
        proguardFiles getDefaultProguardFile('proguard-android.txt'), 'proguard-rules.pro'
    }
}
```

**Installer gradle**

En cas d'erreurs vérifier le fichier `android > gradle > wrapper`

```sh
./gradlew task
./gradlew bundle
```

```sh
./gradlew bundleRelease
```

**Signer le bundle**

```sh
jarsigner -sigalg SHA256withRSA -digestalg SHA-256 -kesytore release.jks
./android/app/build/outputs/bundle/release/app-release.aab
```

---

## Les erreurs

* [Could not open proj generic class cache for build file](https://stackoverflow.com/questions/32513740/gradle-build-failure-could-not-open-proj-class-cache-for-build-file)  
    Il faudra supprimer le dossier `/Users/<username>/.gradle/caches`