#!groovy

pipeline {
    agent any
    tools {
        maven 'Maven 3.3.9'
        jdk 'jdk11'
    }
    stages {
      stage('initialisation') {
        steps {
          sh '''
            echo "PATH = ${PATH}"
            echo "M2_HOME = ${M2_HOME}"
              '''
            }
      }
      stage('D') {
        steps {
          sh 'mvn package'
        }
      post {
        success {
          sh 'cp target/*.jar /home/adm1/articatory/'
          sh 'ansible-playbook playbook.yml'
        }
      }
    }
      stage('Build de l\'api') {
        steps {
          sh 'mvn package'
        }
      post {
        success {
          sh 'cp target/*.jar /home/adm1/articatory/'
          sh 'ansible-playbook playbook.yml'
        }
      }
    }
  }
}
