#…or create a new repository on the command line
fuente mejor:
https://git-scm.com/book/es/v1/Empezando-Configurando-Git-por-primera-vez



#----------------------------configurando para este proyecto
# $ git config --global user.name "John Doe"
# $ git config --global user.email johndoe@example.com
 git config  user.name "Cesar Auris"
 git config  user.email solito_203@hotmail.com
#---------------------------------------------------------


#------comprobando configuracion
git config --list

#Inicializando un repositorio en un directorio existente
git init



echo "# test_trabajos" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/cesar23/test_trabajos.git
git push -u origin master

#https://github.com/cesar23/prestashop6_final
#git@github.com:cesar23/prestashop6_final.git
git remote add origin https://github.com/cesar23/prestashop6_final.git
git push -u origin master


#---------- para cuando ya estea  todo bajado solo se remite a comitear loas cambios
git pull
git add .
git commit -m "first commit2"
git push origin master
#---comandos git para  la  actualizacion
# git config --global user.name "cesar auris"
# git config --global user.email solito_203@hotmail.com
git pull origin master && git commit -am "2017-01-11" && git push origin master

#PARA  COMPRIMIR
zip -r demo.zip config css js Librerias css template-01 modelo *.php

#----log de apache
tail -f /var/log/apache2/error.log
#git commit -am "modificacion1.5" && git push origin master

git commit -am "creacion de api-json" && git push origin master
