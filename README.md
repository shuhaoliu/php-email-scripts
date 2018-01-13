# PHP Email Scripts

This Docker image can be used to send template emails.

> *Note:* This image is built on top of the ```php:5.6-apache``` image, which has an Apache web server running. We are not using any of the features provided by the web server, but it is the most convenient way of running php scripts.

## Customization

### *CC* and *BCC* list

Please customize the email headers before use. In ```send_email.php```, change the ```CC:``` and the ```BCC:``` list in the following lines:

```php
$headers = "From: Sender Name <sender@server.com>" . "\r\n" .
    'Reply-To: Sender Name <replyto@server.com>' . "\r\n" .
    //'CC: CC <cc@server.com>' . "\r\n" .
    //'BCC: BCC <bcc@server.com>' .
    "";
```

### *From* Email Address

Customizing the ```FROM``` address is a little bit trickier if the IMAP server name is changed. Say, if the new email address is ```test@newserver.com```, modify the following line in ```runWithMail.php```

```shell
echo "$line server.com $host" >> /etc/hosts
```
to

```shell
echo "$line newserver.com $host" >> /etc/hosts
```
before building the Docker image.

## Launching the Container

+ ```cd php-email-scripts```
+ Build the docker image. ```docker build -t php-email .```
+ Run the container (in background). ```docker run -d --name container_name php-email```
+ Attach a shell to the container. ```docker exec -it container_name /bin/bash```

Then, the shell is ready to run ```send_email.php```.


## Usage

```shell
php send_email.php [recipient_email] [score1] [score2] [score3]
```

+ ```recipient_email``` is the email address of the recipient. Acceptable formats include ```name@server.com``` and ```Full Name <name@server.com>```.

+ ```score*``` is the score for each criteria.