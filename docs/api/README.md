# API

## Ordering

### GET /api/ordering
Gibt die aktuelle Bestellung des Benutzers als JSON zurück.

### GET /api/ordering/{id}
Gibt die Bestellung mit der angegebenen ID zurück.
Die ID muss zur aktuellen Session gehören.

### Response
```json
{
  "1": {
    "ordering_id": 1,
    "address": "Musterstraße 1",
    "items": [
      {
        "ordered_article_id": 1,
        "article_name": "Margherita",
        "article_price": 12.5,
        "article_picture": "margherita.png",
        "status": 0
      },
      {
        "ordered_article_id": 2,
        "article_name": "Hawaii",
        "article_price": 11.99,
        "article_picture": "hawaii.png",
        "status": 0
      }
    ],
    "total": 24.49
  }
}