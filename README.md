![](https://radiolize.com/uploads/2020/04/radiolizelogo200.png)

# Radiolize: A Self-Hosted Web Radio Manager


**Radiolize** is a self-hosted, all-in-one web radio management suite. Using its easy installer and powerful but intuitive web interface, you can start up a fully working web radio station in a few quick minutes.

Radiolize works for web radio stations of all types and sizes, and is built to run on even the most affordable VPS web hosts.


#### Radio Software Service

* **[Liquidsoap](https://www.liquidsoap.info/)** as the always-playing "AutoDJ"
* **[Icecast 2.4](https://icecast.org/)** as a radio broadcasting frontend (Icecast-KH installed on supported platforms)

#### Application STACK

* **[NGINX](https://www.nginx.com)** for serving web pages and the radio proxy
* **[MariaDB](https://mariadb.org/)** as the primary database
* **[PHP 7.4](https://secure.php.net/)** powering the web application
* **[Redis](https://redis.io/)** for sessions, message queue storage, database and general caching

## Radiolize API

Once installed and running, Radiolize exposes an API that allows you to monitor and interact with your stations. Documentation about this API and its endpoints are available on the [Radiolize API Documentation](https://studio18.radiolize.com/api).
