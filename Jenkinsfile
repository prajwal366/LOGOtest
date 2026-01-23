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
                sh 'mvn package'
                sh 'docker build -t test .'
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

    post {
        success {
            mail(
                to: "prajwalwankhede003@gmail.com",
                subject: "Build SUCCESS: ${env.JOB_NAME}",
                body: "Build succeeded ✅\n${env.BUILD_URL}"
            )
        }
        failure {
            mail(
                to: "prajwalwankhede003@gmail.com",
                subject: "Build FAILED: ${env.JOB_NAME}",
                body: "Build failed ❌\nCheck logs: ${env.BUILD_URL}"
            )
        }
    }
}
        

