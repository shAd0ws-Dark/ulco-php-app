# Guide de Déploiement ULCO sur PlanetHoster

## Prérequis
- Compte PlanetHoster avec accès SSH
- Base de données créée (prhsyxwm_ulcolien)
- Identifiants de base de données :
  - Utilisateur : prhsyxwm_lord
  - Mot de passe : M@nolo1234/*

## 1. Préparation des fichiers

1. **Exclure les fichiers inutiles** :
   - Dossier `vendor/`
   - Fichier `composer.lock`
   - Dossier `tmp/*`
   - Fichiers de cache

2. **Compresser les fichiers** :
   ```bash
   # Sur Windows
   tar -czvf ulco-app.tar.gz --exclude="vendor" --exclude="composer.lock" --exclude="tmp/*" .
   ```

## 2. Transfert des fichiers

1. **Connexion FTP/SFTP** :
   - Hôte : Votre domaine ou adresse IP
   - Identifiants : Ceux fournis par PlanetHoster
   - Dossier de destination : `/www` ou `/public_html`

2. **Décompression** :
   ```bash
   tar -xzvf ulco-app.tar.gz
   ```

## 3. Configuration du serveur

1. **Renommer le fichier de configuration** :
   ```bash
   mv config/app_production.php config/app_local.php
   ```

2. **Définir les permissions** :
   ```bash
   chmod 755 -R /chemin/vers/votre/site
   chmod 777 -R /chemin/vers/votre/site/tmp
   chmod 777 -R /chemin/vers/votre/site/logs
   chmod 777 -R /chemin/vers/votre/site/webroot/img
   ```

3. **Installer les dépendances** :
   ```bash
   php -d memory_limit=-1 /chemin/vers/php/composer.phar install --no-dev --optimize-autoloader
   ```

## 4. Configuration de la base de données

1. **Importer la base de données** :
   - Via phpMyAdmin ou en ligne de commande :
   ```bash
   mysql -u prhsyxwm_lord -p prhsyxwm_ulcolien < backup.sql
   ```

## 5. Configuration du serveur web

1. **Document Root** :
   - Définir le document root sur `/chemin/vers/votre/site/webroot`

2. **Configuration Apache** :
   ```apache
   <VirtualHost *:80>
       ServerName votre-domaine.com
       DocumentRoot /chemin/vers/votre/site/webroot

       <Directory "/chemin/vers/votre/site/webroot">
           Options -Indexes +FollowSymLinks
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

## 6. Vérifications finales

1. **Vérifier les logs** :
   ```bash
   tail -f logs/error.log
   ```

2. **Tester l'application** :
   - Visitez votre domaine
   - Vérifiez toutes les fonctionnalités
   - Assurez-vous que le mode debug est désactivé

## Dépannage

- **Erreurs de permissions** : Vérifiez les logs d'erreur et ajustez les permissions
- **Problèmes de base de données** : Vérifiez les identifiants dans `app_local.php`
- **Pages blanches** : Activez temporairement le mode debug pour voir les erreurs

## Sécurité

1. **Mettre à jour la clé de sécurité** :
   - Générez une nouvelle clé aléatoire pour `Security.salt`
   - Mettez à jour le fichier `app_local.php`

2. **Protéger les fichiers sensibles** :
   ```apache
   <FilesMatch "^\\.">
       Require all denied
   </FilesMatch>
   <FilesMatch "^(\\.(bak|config|dist|fla|inc|ini|log|psd|sh|sql|swp)|~)$">
       Require all denied
   </FilesMatch>
   ```

## Maintenance

- **Mises à jour** :
  ```bash
  git pull
  php composer.phar update
  ```

- **Sauvegardes** :
  ```bash
  mysqldump -u prhsyxwm_lord -p prhsyxwm_ulcolien > backup_$(date +%Y%m%d).sql
  ```
