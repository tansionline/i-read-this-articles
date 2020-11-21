# DEPLOYMENT SETUP

## How to deploy from server to dockerhub

Before deploying application to hub you should first test changed environment. run:

```bash
docker-compose build
```

if everything is okay then push to docker.

## Examples

### Push a new image to a registry

First save the new image by finding the container ID:

```bash
docker ps
```

You should look for azuracast_web and copy that id.

 and then committing it to a new image name. Note that only a-z0-9-_. are allowed when naming images:

```bash
docker commit container_id azuracast_web
```
Now, push the image to the registry using the image ID. In this example the registry is on host named bytelusdev. To do this, tag the image with the host name or IP address, and the port of the registry:

```bash
docker tag azuracast_web bytelusdev/azuracast_web
```

```bash
docker push bytelusdev/azuracast_web
```
Check that this worked by running:

```bash
docker images
```

You should see both azuracast_web and bytelusdev/azuracast_web listed.
