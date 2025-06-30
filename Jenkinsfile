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
                sh 'composer install'
            }
        }
        stage('Run Unit Test') {
            steps {
                sh './vendor/bin/phpunit tests'
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
                sh 'docker run -d -p 8081:80 php-simple-app'
            }
        }
    }
}
