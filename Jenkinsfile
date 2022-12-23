#!groovy

pipeline {
    agent any
    stages {
        stage('Checkout Repository') {
            steps {
                
                checkout(
                    scm: [$class: 'GitSCM', branches: [[name: '*/master']],
                    doGenerateSubmoduleConfigurations: false,
                    extensions: [],
                    submoduleCfg: [],
                    userRemoteConfigs: [[credentialsId: 'github_idx',
                    url: "https://github.com/goldentechnologyrec/apiEtudiant.git"]]]
                )
            }
        }
        stage('Build API Etudiant') {
            steps {
                sh "mvn clean install"
            }
        }

        stage('Send to Front server'){
            steps {
                sh"sshpass -p 'adm1' scp apiEtudiant-1.jar adm1@192.168.1.59:~/jars"
            }
        }
        // stage('Create Dockerfile') {
        //     steps {
        //         script {
        //             def jar_file = sh(returnStdout: true, script: 'find . -type f -name "*.jar"').trim()
        //             writeFile file: 'Dockerfile', text: """
        //             FROM openjdk:8-jre
        //             COPY $jar_file /app.jar
        //             CMD ["java", "-jar", "/app.jar"]
        //             """
        //         }
        //     }
        // }
        // stage('Build Docker Image') {
        //     steps {
        //         sh "docker build -t apietudiant ."
        //     }
        // }
    }
}

// def options = [

//   NUM_TO_KEEP   : 10,
//   BRANCH_DEVELOP: 'master',
//   MAVEN_VERSION : '3.5.4-jdk-8'
// ]
// def repos = sh(returnStdout: true, script: 'curl -s https://api.github.com/users/goldentechnologyrec').readLines()

// timestamps {
//     withTools([name: 'maven', version: "${options['MAVEN_VERSION']}"])
//     agent any
//     stages {
//         stage('Checkout Repositories') {
//             steps {
//                 script {
//                     for (repo in repos) {
//                         if (repo.language == 'Java') {
//                             checkout(
//                                         scm: [$class: 'GitSCM', branches: [[name: '*/master']],
//                                         doGenerateSubmoduleConfigurations: false,
//                                         extensions: [],
//                                         submoduleCfg: [],
//                                         userRemoteConfigs: [[credentialsId: 'github_idx',
//                                         url: "https://github.com/goldentechnologyrec/${repo.name}.git"]]]
//                                 )
//                         }
//                     }
//                 }
//             }
//         }
//         stage('Build Maven Projects') {
//             steps {
//                 script {
//                     for (repo in repos) {
//                         if (repo.language == 'Java') {
//                             sh 'mvn clean install'
//                         }
//                     }
//                 }
//             }
//         }

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
//     }
// }




