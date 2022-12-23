#!groovygit

def options = [

  NUM_TO_KEEP   : 10,
  BRANCH_DEVELOP: 'master',
  MAVEN_VERSION : '3.5.4-jdk-8'
]
def repos = sh(returnStdout: true, script: 'curl -s https://api.github.com/users/goldentechnologyrec').readLines()

timestamps {
    withTools([name: 'maven', version: "${options['MAVEN_VERSION']}"])
    agent any
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
                                        userRemoteConfigs: [[credentialsId: 'github_idx',
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
                        if (repo.language == 'Java') {
                            sh 'mvn clean install'
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

