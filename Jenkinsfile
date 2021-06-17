pipeline {

    agent any

    stages {

        stage("build") {
            steps {
                echo 'installing deps...'
                sh 'composer install'
                echo 'deps installed!'
            }
        }

        stage("test") {
            steps {
                echo 'testing...'
                sh 'composer test'
                echo 'tests done!'
            }
        }
    }
}
