#!groovy

def options = [

  NUM_TO_KEEP   : 10,
  BRANCH_DEVELOP: 'master',
  MAVEN_VERSION : '3.5.3-jdk-8'
]
timestamps {
    agent any
    def repos = sh(returnStdout: true, script: 'curl -s https://api.github.com/users/goldentechnologyrec').readLines()
    stages {
        stage('Checkout Repositories') {
            steps {
                script {
                    for (repo in repos) {
                        if (repo.language == 'Java') {
                            checkout(
                                        scm: [$class: 'GitSCM', branches: [[name: '*/master']],
                                        doGenerateSubmoduleConfigurations: false,
                                        extensions: [],
                                        submoduleCfg: [],
                                        userRemoteConfigs: [[credentialsId: '<credentials_id>',
                                        url: "https://github.com/goldentechnologyrec/${repo.name}.git"]]]
                                )
                        }
                    }
                }
            }
        }
        stage('Build Maven Projects') {
            steps {
                script {
                    for (repo in repos) {
                        if (repo.language == "Java") {
                            sh "mvn clean install"
                        }
                    }
                }
            }
        }

        // stage('Containerize with Docker') {
        //     steps {
        //         script {
        //             for (repo in repos) {
        //                 if (repo.language == "Java") {
        //                     sh "docker build -t ${repo.name} .
        //                     docker push ${repo.name}"
        //                 }
        //             }
        //         }
        //     }
        // }
    }
}

