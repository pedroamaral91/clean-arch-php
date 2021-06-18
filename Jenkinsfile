pipeline {

    agent any

    stages {

        stage("build") {
            steps {
                echo 'installing deps...'
                script {
                    docker image pull node:lts
                }
                echo 'deps installed!'
                
            }
        }

        stage("test") {
            steps {
                echo 'testing...'                
                echo 'tests done!'
            }
        }
    }
}
