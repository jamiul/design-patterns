#!/bin/bash
# This script stops the PHP application running in a Docker container.
# It assumes that Docker is installed and running on your machine.
# Usage: ./stop.sh
# Stop the Docker container
cd docker && docker compose -p php84 down -v && cd ..
echo "Docker container has been stopped."