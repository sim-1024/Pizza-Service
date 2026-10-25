# Docker Setup

## Voraussetzungen

- Docker Desktop installiert und gestartet

## Einrichtung

1. Repository klonen und in das `src/` Verzeichnis wechseln.
2. Die Vorlage `.env.example` nach `.env` kopieren und die Zugangsdaten anpassen.
3. Container erstellen und starten:
   ```bash
   docker compose up --build -d
   ```
4. Anwendung im Browser öffnen: ```http://localhost:8080```

## Datenbank
Die MariaDB-Datenbank wird **nur** beim **ersten Start** automatisch initialisiert. Die SQL-Dateien aus dem Verzeichnis `src/database/` werden dabei ausgeführt.
Nach dem Stoppen und Entfernen der Container bleiben die Daten im Docker-Volume `db_data` erhalten.

## Container verwalten

Container stoppen und entfernen:
```bash
docker compose down
```

Container erneut starten:
```bash
docker compose up -d
```

Logs anzeigen:
```bash
docker compose logs
```

Container stoppen und entfernen (Datenbank-Volume auch löschen):
```bash
docker compose down -v
```
→ Dabei werden die **persistent gespeicherten Datenbankdaten** gelöscht. Beim nächsten Start wird die Datenbank **neu initialisiert**