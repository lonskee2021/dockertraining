# SOC Faculty Training Resources: Integrating Docker in Web Development

This repository provides training resources for the School of Computing (SOC) faculty on using Docker containers in web development. The project demonstrates how to build and deploy a simple **Student Information Management** application with basic add and delete functionalities.

## Project Overview

The **Student Information Management** application is a PHP-based web application that interacts with a MySQL database and is served by an Apache web server. By deploying the application in a Docker container, SOC faculty can gain hands-on experience in using containerized environments for web development.

## Docker Image

The Docker image for this project can be pulled from Docker Hub:

- **Docker Image**: `081207/student-app`

This image includes:
- PHP and Apache for the web server
- MySQL for the database

## Deployment with Docker Compose

A `docker-compose.yml` file is included in this repository to streamline the deployment process. This configuration file defines and orchestrates the necessary Docker services, enabling easy setup and management.

### Prerequisites

- **Docker** and **Docker Compose** should be installed on your system. 
- Clone this repository:

  ```bash
  git clone https://github.com/yourusername/soc-faculty-docker-training.git
  cd soc-faculty-docker-training

### Quick Start

1. **Start the Application**:

   Use the following command to start the containers defined in `docker-compose.yml`:

   ```bash
   docker-compose up -d
