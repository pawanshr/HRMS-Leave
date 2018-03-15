# HRMS-Leave


>copy whole folder and paste in xammp htdocs
>to run for window
       xammp>apache>conf>extra
       edit(right click>edit with notepad) -> httpd-vhosts.conf
  
     add:
      <VirtualHost *:80>
        DocumentRoot "C:\xampp\htdocs\slimapp\public"
        ServerName localhost
      </VirtualHost>

>save 
>restart xammp
>on url "http://localhost/api/customers/1" 

for database
>extract
>create new database name "customers"
>upload attached sql file 
