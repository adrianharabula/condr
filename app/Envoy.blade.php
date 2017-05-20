@servers(['localhost' => '127.0.0.1'])

@task('deploy')
    cd /root/condr
    git pull origin master
@endtask

@task('getlastcommit')
    cd /root/condr
    git log --pretty="%h - %cr %ce - %s" -1
@endtask