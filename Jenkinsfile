pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/Onlyudha/prak8.git'
            }
        }
        stage('Install Dependencies') {
            steps {
                sh 'docker run --rm -v $PWD:/app composer:2.5 install'
            }
        }
        stage('Run Unit Test') {
            steps {
                sh 'docker run --rm -v $PWD:/app composer:2.5 ./vendor/bin/phpunit tests'
            }
            post {
                success {
                    echo 'All tests passed!'
                }
                failure {
                    echo 'Some tests failed!'
                }
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t php-simple-app .'
            }
        }
        stage('Deploy Container') {
            steps {
                sh 'docker stop php-simple-app || true'
                sh 'docker rm php-simple-app || true'
                sh 'docker run -d -p 8081:80 --name php-simple-app php-simple-app'
            }
        }
    }
}
