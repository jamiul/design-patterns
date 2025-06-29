#!/bin/bash
# This script runs the PHP application in a Docker container.
# It assumes that Docker is installed and running on your machine.
# Usage: ./run.sh
# Build the Docker image
cd docker && docker compose -p php84 up -d && cd ..
echo "Docker container is running. You can access the application at http://localhost:8000"
