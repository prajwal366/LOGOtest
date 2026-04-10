pipeline {
    agent any

    parameters {
        string(name: 'BRANCH', defaultValue: 'main', description: 'Branch to build')
    }

    environment {
        SONAR_TOKEN = credentials('sonar-token')
    }

    stages {

        stage('Build') {
            steps {
                sh 'mvn clean package'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    sh '''
                    mvn sonar:sonar \
                    -Dsonar.projectKey=Test \
                    -Dsonar.host.url=http://localhost:9000 \
                    -Dsonar.login=$SONAR_TOKEN
                    '''
                }
            }
        }

        stage('Docker Build') {
            steps {
                sh 'docker build -t test app/.'
                sh 'docker stop pipline_web_1 || true'
                sh 'docker rm pipline_web_1 || true'
            }
        }

        stage('Snyk Security Scan') {
            steps {
                sh 'snyk auth snyk_uat.1fcad39e.eyJlIjoxNzc2NDM2NzM2LCJoIjoic255ay5pbyIsImoiOiJBWjEzMVVmN0xmTmFNWkI3Q0xTWHR3IiwicyI6InU2NEJkcWt1UkR5dDI0SURqN09SVUEiLCJ0aWQiOiJBQUFBQUFBQUFBQUFBQUFBQUFBQUFBIn0.xF9xlQjG_isPXxBA5vgWA-CK9nijQQHJDSno2QpPm47sT3sAF0yZmbtbw_kTDMLgxNSWkdAOXt8fd6dafVTcAA'
                sh 'snyk test'
            }
        }
    }
}
