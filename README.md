# php-design-patterns-studies

1. docker run --rm -it -p 8000:8000 -v $PWD:/var/www/html -w /var/www/html --network="host" php php index.php
2. docker run --rm -it -p 8000:8000 -v $PWD:/var/www/html -w /var/www/html --network="host" php php generate-order.php 200 3 "Paulo"