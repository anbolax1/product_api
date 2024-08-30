#!/bin/bash

echo "Запуск Docker Compose для прода"
docker-compose -f docker-compose.prod.yml up -d
