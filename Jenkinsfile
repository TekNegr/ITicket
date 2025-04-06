pipeline {
    agent any

    environment {
        DB_CONNECTION = 'pgsql'
        DB_HOST = '127.0.0.1'
        DB_PORT = '5432'
        DB_DATABASE = 'iticket'
        DB_USERNAME = 'user'
        DB_PASSWORD = 'password'
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
                sh 'npm install'
            }
        }

        stage('Build Assets') {
            steps {
                sh 'npm run build'
            }
        }

        stage('Run Migrations') {
            steps {
                sh 'php artisan migrate --force'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: '**/storage/logs/*.log', allowEmptyArchive: true
        }
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}
