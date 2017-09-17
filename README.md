# Sending Logs From Symfony Applications To GrayLog Through RabbitMQ

This repository contains example application which is mentioned in the following blog post.<br />
[https://medium.com/@ibrahimgunduz34/sending-logs-from-symfony-applications-to-graylog-through-rabbitmq-4735aebfce4b](https://medium.com/@ibrahimgunduz34/sending-logs-from-symfony-applications-to-graylog-through-rabbitmq-4735aebfce4b)

## Requirements:

* Docker
* Docker Compose

## How To Run Example ?

Run the following command to building and starting environment in background

```shell
$ cd devenv
$ sudo docker-compose build --build-arg host_uid=$(id -u) php 
$ sudo docker-compose build  nginx
$ sudo docker-compose up -d
```

Run the following command to install composer dependencies
```shell
$ sudo docker-compose exec php composer install -d src
```

Run the following command to create virtualhost for rabbitmq and adjust needed permissions
```shell
$ sudo docker-compose exec rabbitmq rabbitmqctl add_vhost logging
$ sudo docker-compose exec rabbitmq rabbitmqctl set_permissions -p logging guest ".*" ".*" ".*"
$ sudo docker-compose exec php /var/www/testapp/src/bin/console rabbitmq:setup-fabric
```

You can access graylog from: 172.20.0.7 with the following credentials:
username: admin
password: admin

You can run the example application with the following command after configured graylog

```shell
$ sudo docker-compose exec php /var/www/testapp/src/bin/console logging:test
```