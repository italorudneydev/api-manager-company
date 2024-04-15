#!/bin/bash

if ! command -v docker &> /dev/null
then
    echo "Docker não está instalado. Por favor, instale o Docker e tente novamente."
    exit 1
fi

echo "Montando o contêiner do Docker para o projeto Laravel..."
docker-compose up -d

echo "Aguardando os contêineres inicializarem..."
sleep 60

CONTAINER_NAME="laravel-app"
if ! docker ps | grep -q $CONTAINER_NAME; then
    echo "Falha ao iniciar o contêiner do Docker."
    exit 1
fi

echo "Contêiner do Docker está rodando."

echo "Executando composer install..."
docker exec $CONTAINER_NAME composer install

echo "Executando migrations do Laravel..."
docker exec $CONTAINER_NAME php artisan migrate --seed

echo "Setup concluído com sucesso."
