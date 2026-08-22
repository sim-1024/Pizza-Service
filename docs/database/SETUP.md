# Datenbank

Die Anwendung verwendet MariaDB, die in XAMPP als **MySQL** angezeigt wird.

## Einrichtung

1. MariaDB über das XAMPP Control Panel starten.
2. `http://localhost:8080/phpmyadmin/` öffnen.
3. Die Datenbank `pizzaservice` erstellen.
4. `schema.sql` über phpMyAdmin importieren.
5. Einen Datenbankbenutzer anlegen und die benötigten Berechtigungen vergeben.
6. Die Datenbankverbindung in `App/Core/BaseModel.php` konfigurieren.
7. Die Anwendung starten.