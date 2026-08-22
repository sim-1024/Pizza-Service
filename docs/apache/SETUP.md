# Apache

Apache wird über das XAMPP Control Panel als lokaler Webserver verwendet.

## Einrichtung
- XAMPP installieren und das XAMPP Control Panel öffnen.


- Das Projekt nach `C:\xampp\htdocs\Pizza-Service\` kopieren.


- In `C:\xampp\apache\conf\httpd.conf` folgende Einstellungen prüfen bzw. anpassen:
  - `Listen 8080`
  - `ServerName localhost:8080`
  - `LoadModule rewrite_module modules/mod_rewrite.so`
  - `DocumentRoot "C:/xampp/htdocs/Pizza-Service/src"`
  - 
    ```apache
    <Directory "C:/xampp/htdocs/Pizza-Service/src">
      Options Indexes FollowSymLinks Includes ExecCGI
      AllowOverride All
      Require all granted
    </Directory>
    ```
  - `DirectoryIndex index.php index.html`

    
- Apache im XAMPP Control Panel starten.
- Die Anwendung über http://localhost:8080/ aufrufen.