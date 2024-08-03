PARA ESTE PROYECTO ES NECESARIO TENER EN TU DISPOSITIVO LARAVEL , COMPOSER Y XAMPP PREVIAMENTE INSTALADOS 
![laravel](https://github.com/user-attachments/assets/4c442f2a-02fa-4790-97c6-0660e6b1838f)

Si aun no cuentas con ellos, a continuación se presenta una serie de pasos para su instalación 

Paso 1: Descargue XAMPP de la siguiente liga https://www.apachefriends.org/es/download.html. Una vez descargado instalelo unicamente dando click en el botón continue y seleccione el idioma según su preferencia 

Paso 2 : visitar la página https://getcomposer.org/download/ y seleccionar "Download and run Composer-Setup.exe"
-> una vez descargado ejecutalo y da "continue " o "continuar" a todo hasta finalizar la instalación

Paso 3: Una vez instalado composer ejecute su terminal y ponga el siguiente comando ![image](https://github.com/user-attachments/assets/8482400f-db8c-4782-8628-854d9b362ccd)


Una vez ejecutado este comando prosiga a clonar el presente repositorio
1. COPIAR LA URL DEL REPOSITORIO
![image](https://github.com/user-attachments/assets/0fead1eb-bd9f-4ef7-9211-8ebaaf30ae9d)

2. Ir a htdocs y abrir la terminal
 ![image](https://github.com/user-attachments/assets/031037c3-8fd8-40bd-9129-fb850abfbea0)

3. Una vez abierta la terminal ejecutar
   git clone https://github.com/JsonD23/CVS-GENERATOR.git

4.Ahora se abre y se ejecuta la terminal desde la carpeta CVS 
![image](https://github.com/user-attachments/assets/27ba4130-bdcf-4fb8-b521-a67f27b059b8)

5. Se pone composer install en la linea de comando
   ![image](https://github.com/user-attachments/assets/5191b029-477d-4e53-a828-df1be5762292)

6. A continuacion se pone  " code . " para abrirlo en su editor favorito (En este caso visual studio code)

Ahora abriremos nuestra terminal de visual
 ![image](https://github.com/user-attachments/assets/116d2bc4-14fa-4679-88e2-bbde5469e3a6)

pondremos el comando $ cp .env.example .env para nosotros poder editarlo conforme a nuestra base de datos local que mencionaremos mas adelante 

7. Ahora pondremos este comando para generar una API Key 
   ![image](https://github.com/user-attachments/assets/70c24bed-685c-47fa-822d-129a025561d6)

8.Enseguida activaremos nuestro xampp 
![image](https://github.com/user-attachments/assets/399f40fb-002d-441b-9cc6-5030b2732b24)

9. Se crea la base de datos user_profile
    ![image](https://github.com/user-attachments/assets/42e46d63-fcd8-4525-9f53-3926ce69571c)

10. Se hacen las migraciones a la base de datos con este comando
    -> php artisan migrate
    
12. Dentro de esta base de datos se crea la tabla 'users' para nuestro login con los siguientes parámetros
    ![image](https://github.com/user-attachments/assets/9d737f09-eee6-4baf-bac2-d2b7d3fc6c04)

    TENEMOS QUE DAR CTRL + CLICK A LA LIGA PARA ACCEDER
    ![image](https://github.com/user-attachments/assets/c9b5736f-836a-43e3-bfe0-789ab907e3da)


*NOTA . PASSWORD DEBE TENER UNA LONGITUD ESTABLECIDA DE 60 YA QUE COMO SON ENCRIPTADAS LAS CONTRASEÑAS DEBEN ABARCAR OBLIGATORIAMENTE ESA LONGITUD

13. Finalmente utilizamos 'php artisan serve ' para probar nuestro proyecto
    ![image](https://github.com/user-attachments/assets/79545417-4674-4677-81c1-0e22ec4d23d8)

*SI TE APARECE ESTA PANTALLA, FELICIDADES. HAS INSTALADO CORRECTAMENTE EL PROYECTO* 
![image](https://github.com/user-attachments/assets/62d8f092-e227-428d-99d5-7d78397c6fa0)

