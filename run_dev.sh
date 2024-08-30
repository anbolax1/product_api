#!/bin/bash

echo "Запуск Docker Compose в режиме разработки..."
docker-compose -f docker-compose.dev.yml up -d
