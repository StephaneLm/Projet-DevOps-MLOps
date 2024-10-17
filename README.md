# Projet-DevOps-MLOps
Projet DevOps et MLOps



# Docker TP Instructions

## Nettoyage des conteneurs, réseaux et volumes

Avant de commencer les étapes, assurez-vous de nettoyer tous les conteneurs, réseaux et volumes précédents :

```bash
docker stop $(docker ps -aq)
docker rm $(docker ps -aq)
docker network rm tp1-network tp2-network tp3-network tp4-network
docker rmi tp1-http tp1-script tp2-http tp2-script tp2-data tp3-http tp3-script tp3-data
docker volume prune -f
```

---

## Étape 1

1. **Construire les conteneurs :**
   ```bash
   cd etape1/http
   docker build -t tp1-http .

   cd ../script
   docker build -t tp1-script .
   ```

2. **Créer un réseau et lancer les conteneurs :**
   ```bash
   docker network create tp1-network
   docker run -d --name tp1-script-container --network tp1-network tp1-script
   docker run -d --name tp1-http-container -p 8080:8080 --network tp1-network tp1-http
   ```

3. **Accéder à l'application :**
   - URL : [http://localhost:8080/index.php](http://localhost:8080/index.php)

---

## Étape 2

1. **Construire les conteneurs :**
   ```bash
   cd etape2/http
   docker build -t tp2-http .

   cd ../script
   docker build -t tp2-script .

   cd ../data
   docker build -t tp2-data .
   ```

2. **Créer un réseau et lancer les conteneurs :**
   ```bash
   docker network create tp2-network
   docker run -d --name tp2-data-container --network tp2-network tp2-data
   docker run -d --name tp2-script-container --network tp2-network tp2-script
   docker run -d --name tp2-http-container -p 8081:8080 --network tp2-network tp2-http
   ```

3. **Accéder à l'application :**
   - URL : [http://localhost:8081/test_bdd.php](http://localhost:8081/test_bdd.php)

---

## Étape 3

1. **Construire les conteneurs :**
   ```bash
   cd etape3/http
   docker build -t tp3-http .

   cd ../script
   docker build -t tp3-script .

   cd ../data
   docker build -t tp3-data .
   ```

2. **Créer un réseau et lancer les conteneurs :**
   ```bash
   docker network create tp3-network
   docker run -d --name tp3-data-container --network tp3-network tp3-data
   docker run -d --name tp3-script-container --network tp3-network tp3-script
   docker run -d --name tp3-http-container -p 8082:8080 --network tp3-network tp3-http
   ```

3. **Accéder à l'application :**
   - URL : [http://localhost:8082](http://localhost:8082)

---

## Étape 4

1. **Lancer les conteneurs avec Docker Compose :**
   ```bash
   docker-compose up --build -d
   ```

2. **Accéder à l'application :**
   - URL : [http://localhost:8083](http://localhost:8083)

3. **Arrêter et supprimer les conteneurs Docker Compose :**
   ```bash
   docker-compose down
   ```

---

