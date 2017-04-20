FROM almir/webhook
MAINTAINER Adrian Harabula <adrian.harabula@gmail.com>

RUN apk update && apk upgrade && apk add --no-cache bash git openssh

ADD webhook/.ssh /root/.ssh
RUN chmod 400 /root/.ssh/id_rsa

ADD webhook/scripts/*.sh /var/scripts/
RUN chmod +x /var/scripts/*.sh
