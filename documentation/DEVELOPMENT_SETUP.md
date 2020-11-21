# DEVELOPMENT SETUP

## How to setup development environment to server

### Clone Repositories

Using Git, clone the Radiolize core repository and the various Docker containers into a single folder. You will need to authorize yourself to clone this repositories. When developing locally, the Docker containers are built from scratch, so you will need those repositories to be alongside the main "AzuraCast" project in the same folder.

```bash
git clone https://github.com/bytelus/AzuraCast.git
git clone https://github.com/bytelus/docker-azuracast-redis.git
git clone https://github.com/bytelus/docker-azuracast-radio.git
git clone https://github.com/bytelus/docker-azuracast-nginx-proxy.git
git clone https://github.com/bytelus/docker-azuracast-db.git
```

### Move into AzuraCast repository folder

All commands from this point forward should be run in the **AzuraCast** repository's folder. From the parent folder, run:

```bash
cd AzuraCast
```

to enter the core repository's directory.

### Copy default files

Copy the example configuration files into their proper locations:

```bash
cp sample.env .env
cp azuracast.dev.env azuracast.env
cp docker-compose.sample.yml docker-compose.yml
cp docker-compose.dev.yml docker-compose.override.yml
```

### Modify the Environment File

Radiolize can automatically load data "fixtures" which will preconfigure a sample station with sensible defaults, to avoid needing to complete the setup process every time.

To customize how the fixtures load in your environment, open the newly copied azuracast.env file and customize the following values:

```env
INIT_ADMIN_EMAIL=default@email.com
INIT_ADMIN_PASSWORD=DEFAULTPASS
```

### Build Docker containers

Build the Docker containers from your local copies by running:

```bash
docker-compose build
```

This will take long time(~20 mins).

#### Authorize azuracast user in container after build is done

We need to authorize 'azuracast' user inside docker with root user first.

```bash
docker exec -it azuracast_web bash
```

Now be sure you are inside azuracast container. Your root path should look like.
> root@container_id:/var/azuracast/www#

Now run this to authorize azuracast user in container:

```bash
usermod -aG sudo azuracast
exit
```

with this you authorized azuracast user with sudo permissions.

### Run the container configuration installation

Be sure you are outside of docker container.

#### Without Data Fixtures

To run the setup process without preconfiguring the installation in any way, run:

```bash
./docker.sh install
```

#### With Data Fixtures(run with this for development)

To preload sample data (provided in the azuracast.env file above) and start with a preconfigured installation, run:

```bash
./docker.sh install --load-fixtures
```

### Run in-container installation

We need to be sure required development tools are installed.

```bash
./docker.sh bash
```

after this you should see following output:

```bash
To run a command as administrator (user "root"), use "sudo <command>".
See "man sudo_root" for details.

azuracast@container_id:~/www$
```

if you are not seeing following part you did something wrong or something went wrong and you will get permission issues on your setup:

```bash
To run a command as administrator (user "root"), use "sudo <command>".
See "man sudo_root" for details.
```

If you have done everything right you should continue for development.

First we will install php packages with composer:

```bash
sudo composer install
```

After this we will download packages for fronted:

```bash
cd fronted
sudo apt update
sudo apt install npm
sudo npm install gulp
sudo npm run build
```

after this we should be all ready to test development environment. If you fail to see changes try to run:

```bash
docker-compose build
```

### Translations

Locales are managed by the application in two places: the backend PHP code and the frontend (primarily Vue.js) JavaScript code. When new locales are added or translations are changed, they should be processed in both locations.

There are two steps to the translation process:

#### Generating New Translations

When new strings have been added to the application, they should be added to the .POT (localization template) file, so that our CrowdIn translation service recognizes it as a translatable string.

This can be done by running the respective "Generate Locales" commands:

```bash
# Backend
bash docker.sh cli locale:generate

# Frontend
bash docker.sh static npm run generate-locales
```

#### Import New Translated Strings

When strings have been translated, they should be converted back into optimized files that can easily be read by the PHP and Vue.js parts of the application, respectively.

This can be done by running the respective "Import Locales" commands:

```bash
# Backend
bash docker.sh cli locale:import

# Frontend
bash docker.sh static npm run import-locales
```
