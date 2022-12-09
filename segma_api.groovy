#!groovy

pipeline {
    agent any
    stages {
      stage('initialisation') {
        steps {
          sh '''
            echo "PATH = ${PATH}"
            echo "M2_HOME = ${M2_HOME}"
              '''
            }
      }
      stage('Build') {
        steps {
          sh 'mvn package'
        }
      post {
        success {
          sh 'cp target/*.jar /home/adm1/artifactory/'
          sh 'ansible-playbook playbook_sigma.yml'
        }
      }
    }
  }
}
