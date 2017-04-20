FROM wnameless/oracle-xe-11g

ADD startup.sh /docker-entrypoint-initdb.d/
RUN chmod +x /docker-entrypoint-initdb.d/startup.sh
ADD sqlscripts/*.sql /assets/
