pipeline {
    agent any

    parameters {
        string(name: 'BRANCH', defaultValue: 'main', description: 'Branch to build')
    }

    stages {

       

        stage('Test') {
            steps {
                sh 'mvn clean test'
            }
            post {
                always {
                    // ✅ Publish JUnit reports
                    junit 'target/surefire/*.xml'
                }
            }
        }

        stage('Build') {
            steps {
//                sh 'mvn package'
                sh 'docker build -t test .'
                sh 'docker-compose up'
            }
        }

        stage('Deploy') {
            steps {
                sh 'docker stop prajwal || true'
                sh 'docker rm prajwal || true'
                sh 'docker run -d -p 80:80 --name prajwal test'
            }
        }
    }

    
}
        

