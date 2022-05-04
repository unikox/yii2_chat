#docker network create "demo_chat_default" --subnet="192.168.114.0/24"
docker-compose -f docker-compose.yml --project-name="demo_chat" up -d
