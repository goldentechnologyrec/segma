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
          sh 'cp target/*.jar artifactory/'
          sh 'ansible-playbook playbook_api.yml'
        }
      }
    }
  }
}
