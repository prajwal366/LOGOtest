pipeline {
    agent any

    parameters {
        string(name: 'BRANCH', defaultValue: 'main', description: 'Branch to build')
    }

    stages {

       

      

        stage('Build') {
            steps {
//                sh 'mvn package'
 //               sh 'docker build -t test app/.'
                sh 'docker stop pipline_web_1 || true'
                sh 'docker rm pipline_web_1 || true'
                
            }
        }

        stage('Deploy') {
            steps {
//                sh 'docker-compose up -d'
                sh 'docker build -t test app/.'
                sh 'trivy image --severity CRITICAL  test:latest'
            }
        }
        stage('synk security scan') {
            steps {
                sh 'snyk auth snyk_uat.1fcad39e.eyJlIjoxNzc0OTM4OTYwLCJoIjoic255ay5pbyIsImoiOiJBWnpyRDdOMjRlNUJUWjZvTV9TRDB3IiwicyI6InU2NEJkcWt1UkR5dDI0SURqN09SVUEiLCJ0aWQiOiJBQUFBQUFBQUFBQUFBQUFBQUFBQUFBIn0.ztsux5gJUp1fWXn-Yf-LRRVSA0vSryiTKMoFxaRRxWFaN2gge2ZP3XVdJb0t2KzPzHuagkfStlmypXnD5-s3BQ'
                sh 'snyk test'
            }
        }
                
//                sh 'docker run -d -p 80:80 --name prajwal test'
            
        
    }

    
}
        

