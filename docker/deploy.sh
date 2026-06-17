#!/bin/bash
# ============================================================
# Pratama Design Studio - Docker Deployment Script
# Server: antony@100.73.16.92
# Project path: /home/repo/pratama-design
# ============================================================

set -e

echo "=================================================="
echo "  Pratama Design Studio - Docker Setup Script"
echo "=================================================="

# 1. Copy .env.docker ke .env (jika .env belum ada)
if [ ! -f .env ]; then
    echo "[1/6] Copying .env.docker -> .env ..."
    cp .env.docker .env
else
    echo "[1/6] .env sudah ada, skip copy."
fi

# 2. Build Docker images
echo "[2/6] Building Docker images ..."
docker compose build --no-cache

# 3. Start containers
echo "[3/6] Starting containers ..."
docker compose up -d

# 4. Tunggu MySQL siap
echo "[4/6] Waiting for MySQL to be ready ..."
sleep 15

# 5. Setup Laravel
echo "[5/6] Running Laravel setup ..."
docker compose exec app php artisan key:generate
docker compose exec app php artisan storage:link
docker compose exec app php artisan migrate:fresh --seed
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan route:clear
docker compose exec app php artisan view:clear

# 6. Fix permissions
echo "[6/6] Fixing storage permissions ..."
docker compose exec app chown -R www-data:www-data storage bootstrap/cache
docker compose exec app chmod -R 775 storage bootstrap/cache

echo ""
echo "=================================================="
echo "  SELESAI! Website siap diakses:"
echo "  http://100.73.16.92:8090"
echo "  phpMyAdmin: http://100.73.16.92:8091"
echo "=================================================="
