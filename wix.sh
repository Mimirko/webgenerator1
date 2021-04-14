#!/bin/bash
echo "===>ejecutando"
	mkdir $1
	chmod 777 $1
echo $2 | cat > $1/index.php
mkdir $1/css
	chmod 777 1/css
mkdir $1/user
	chmod 777 1/user
echo " " | cat > $1/user/estilo.css
mkdir $1/admin
chmod 777 1$/admin
echo " " | cat > $1/admin/estilo.css
mkdir $1/img
chmod 777 $1/img
mkdir $1/img/avatars
chmod 777 $1/img/avatars
mkdir $1/img/buttons
chmod 777 1$/img/buttons
mkdir $1/img/products
chmod 777 1$/img/products
mkdir $1/img/pets
chmod 777 1$/img/pets
mkdir $1/js
chmod 777 1$/js
mkdir $1/js/validations
chmod 777 1$/js/validations
echo " " | cat > $1/js/validations/login.js
echo " " | cat > $1/js/validations/register.js
mkdir $1/js/effects
chmod 777 1$/js/effects
echo " " | cat > $1/js/effects/panels.js
mkdir $1/tpl
chmod 777 1$/tpl
echo " " | cat > $1/tpl/main.tpl
echo " " | cat > $1/tpl/login.tpl
echo " " | cat > $1/tpl/register.tpl
echo " " | cat > $1/tpl/panels.tpl
echo " " | cat > $1/tpl/profile.tpl
echo " " | cat > $1/tpl/crud.tpl
mkdir $1/php
chmod 777 1$/php
echo " " | cat > $1/php/create.php
echo " " | cat > $1/php/read.php
echo " " | cat > $1/php/update.php
echo " " | cat > $1/php/delete.php
echo " " | cat > $1/php/dbconnect.php
echo "===>fin"