#!/bin/bash
# ==========================================
# Hostinger Auto-Deploy Script for Talisha Software
# ==========================================

echo "🚀 Starting Deployment for Talisha Software..."

# Pull latest changes from git
git pull origin main

# Install PHP dependencies without dev packages
composer install --no-dev --optimize-autoloader --no-interaction

# Run database migrations
php artisan migrate --force

# Clear and rebuild application caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Link storage directory
php artisan storage:link

echo "✅ Deployment completed successfully!"
