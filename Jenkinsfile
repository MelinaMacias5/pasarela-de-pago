pipeline {
    agent any

    stages {
        stage('Pruebas de Código (Test)') {
            steps {
                // Validamos la sintaxis de los archivos PHP principales
                sh 'php -l index.php'
                sh 'php -l respuesta.php'
            }
        }

        stage('Construir Imagen (Build)') {
            steps {
                // Construimos la imagen de Docker usando el Dockerfile
                sh 'docker build -t pettrack-pro:latest .'
            }
        }

        stage('Despliegue (Deploy)') {
            steps {
                // Detenemos y borramos cualquier versión anterior del contenedor
                sh 'docker stop pettrack-container || true'
                sh 'docker rm pettrack-container || true'
                
                // Levantamos el nuevo contenedor mapeándolo al puerto 8080
                sh 'docker run -d --name pettrack-container -p 8080:80 pettrack-pro:latest'
            }
        }
    }
}
