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
                h 'docker stop pipline2_web_1 || true'
                sh 'docker rm pipline2_web_1 || true'
                
            }
        }

        stage('Deploy') {
            steps {
                sh 'docker-compose up -d'
//                sh 'docker run -d -p 80:80 --name prajwal test'
            }
        }
    }

    
}
        

