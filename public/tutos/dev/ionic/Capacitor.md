# Capacitor

## Projet existant

```
  ionic integrations enable capacitor
  ionic build
  npx cap add android
  npx cap open android
  npx cap copy
```

## Installer google map
```
  npm install @ionic-native/core@beta @ionic-native/google-maps@beta
  ionic cordova plugin add https://github.com/mapsplugin/cordova-plugin-googlemaps#multiple_maps --variable API_KEY_FOR_ANDROID="..." --variable API_KEY_FOR_IOS="..."
```
## new project
```
ionic start myApp tabs --capacitor
ionic build
npx cap add android
npx cap open android
```

## workflow
Compiler
```
ionic build
```
exporter les assets
```
npx cap copy
```
créer un dossier android
```
npx cap add android
```
exécuter
```
npx cap open android
```

## Live run

```bash
ionic build
ionic cap add android
ionic cap copy
ionic cap sync
```