#!/bin/bash

# Script de déploiement pour ULCO sur PlanetHoster

# 1. Arrêter le script en cas d'erreur
set -e

echo "🚀 Début du processus de déploiement..."

# 2. Vérifier les dépendances
if ! command -v php &> /dev/null; then
    echo "❌ PHP n'est pas installé"
    exit 1
fi

if ! command -v composer &> /dev/null; then
    echo "❌ Composer n'est pas installé"
    exit 1
fi

# 3. Installer les dépendances en mode production
echo "📦 Installation des dépendances..."
php -d memory_limit=-1 $(which composer) install --no-dev --optimize-autoloader

# 4. Configurer les permissions
echo "🔒 Configuration des permissions..."
chmod 755 -R .
chmod 777 -R tmp/
chmod 777 -R logs/
chmod 777 -R webroot/img/

# 5. Vider les caches
echo "🧹 Nettoyage des caches..."
rm -rf tmp/cache/*
rm -rf tmp/cache/models/*
rm -rf tmp/cache/persistent/*
rm -rf tmp/cache/views/*

# 6. Mettre à jour le schéma de la base de données si nécessaire
# Décommentez les lignes suivantes si nécessaire
# echo "🔄 Mise à jour de la base de données..."
# bin/cake migrations migrate
# bin/cake orm_cache clear

echo "✅ Déploiement terminé avec succès !"
echo "🌐 Vérifiez votre application à l'adresse : http://votre-domaine.com"
