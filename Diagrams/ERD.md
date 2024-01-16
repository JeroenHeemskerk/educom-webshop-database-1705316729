```mermaid
%%{`  More info on mermaid notation see: https://mermaid.js.org/syntax/entityRelationshipDiagram.html.  `}%%
erDiagram
    users ||--o{ orders : Places
    users {
        int    id        PK
        string name
        string email     UK
        string password
    }
    orders ||--{ order_items : Contains
    orders {
        int    id                PK
        int    user_id           FK
        int    total_price
    }
    order_items||--{ products : Contains
    order_items {
        int    id                PK
        int    order_id          FK
        int    product_id        FK
        int    quantity
        int    price
    }
    products {
        int    id                PK
        string product_name
        int    price
    }
```
