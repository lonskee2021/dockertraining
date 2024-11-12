# Create a network for communication between containers
# Run this command in the terminal before building the container
# docker network create mysql-network

# MySQL Service
FROM mysql:latest as mysql
ENV MYSQL_ROOT_PASSWORD=rootpassword
ENV MYSQL_DATABASE=mydatabase
EXPOSE 3306

# phpMyAdmin Service
FROM phpmyadmin/phpmyadmin:latest as phpmyadmin
ENV PMA_HOST=mysql
EXPOSE 80
