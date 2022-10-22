FROM registry.gitlab.com/sentryoz/vinafa_laravel:build-up-v2

ADD  ./  /web

WORKDIR /web

EXPOSE 80
RUN rm -rf composer.lock &&  php composer.phar install && php composer.phar dumpautoload

CMD [ "php" , "artisan" , "serv" ,"--host=0.0.0.0" , "--port=80" ]
