FROM php:8.2-apache
# Cài đặt extension kết nối MySQL
RUN docker-php-ext-install mysqli
# Copy toàn bộ code vào thư mục web của Apache
COPY . /var/www/html/
EXPOSE 80