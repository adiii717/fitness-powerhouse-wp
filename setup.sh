#!/bin/bash

# Fitness Power House WordPress - Setup Script

echo "=========================================="
echo "Fitness Power House WordPress Setup"
echo "=========================================="

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo "Error: Docker is not installed. Please install Docker first."
    exit 1
fi

if ! command -v docker-compose &> /dev/null && ! docker compose version &> /dev/null; then
    echo "Error: Docker Compose is not installed. Please install Docker Compose first."
    exit 1
fi

# Start containers
echo ""
echo "Starting Docker containers..."
docker-compose up -d

echo ""
echo "Waiting for services to be ready..."
sleep 10

# Check if services are running
if docker-compose ps | grep -q "fitness-wordpress"; then
    echo ""
    echo "=========================================="
    echo "Setup Complete!"
    echo "=========================================="
    echo ""
    echo "Access your site at:"
    echo "  - WordPress: http://localhost:8080"
    echo "  - phpMyAdmin: http://localhost:8081"
    echo ""
    echo "Database Credentials:"
    echo "  - Database: wordpress"
    echo "  - User: wordpress"
    echo "  - Password: wordpress_secret"
    echo ""
    echo "Next steps:"
    echo "  1. Complete WordPress installation at http://localhost:8080"
    echo "  2. Go to Appearance > Themes"
    echo "  3. Activate 'Fitness Power House' theme"
    echo "  4. (Optional) Install WooCommerce for e-commerce features"
    echo ""
else
    echo "Error: Failed to start containers. Check docker-compose logs for details."
    docker-compose logs
    exit 1
fi
