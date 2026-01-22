pipeline {
    agent any
     parameters {
        string(name: 'BRANCH', defaultValue: 'main', description: 'Branch to build')
     }
    stages {
        
        
        stage('test') {
            steps {
                echo 'Hello World'
                sh 'docker ps'
//                sh 'mvn test'
                
                
            
            }
        }
       stage('build') {
          steps {
           sh 'docker stop prajwal'
           sh 'docker rm prajwal'
           sh 'docker build -t test .'
             
             sh 'cd /var/lib/jenkins/workspace/pipline'
             
             sh 'mvn clean compile package'
              sh 'mvn test'
            
            
//            sh 'cd /var/lib/jenkins/workspace/pipeline/'
          

          }
    }
          stage ('deploy') {
              steps {
                  sh 'docker run -itd -p 80:80  --name prajwal test'
                  
              }
          }
       
}
}
