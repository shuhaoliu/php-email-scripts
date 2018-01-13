#!/bin/bash

set -e

#add host to /etc/hosts
host=$(hostname)
line=$(cat /etc/hosts |grep [1]27.0.0.1)
#placed at end to prevent being changed by weave
echo "$line server.com $host" >> /etc/hosts

#finally
echo "$host" >> /etc/mail/relay-domains
m4 /etc/mail/sendmail.mc > /etc/mail/sendmail.cf

#start service
service sendmail start

apache2-foreground
