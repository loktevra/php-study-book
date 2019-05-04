docker-compose build
docker-compose up

docker kill $(docker ps -q)

если есть проблемы с доступом возможно поможет:
docker-compose rm web
docker-compose rm db