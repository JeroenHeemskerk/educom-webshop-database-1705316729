```mermaid
%%{`  More info on mermaid notation see: https://mermaid.js.org/syntax/entityRelationshipDiagram.html.  `}%%
erDiagram
    users ||--o{ orders : Places
    orders ||--{ order_items : Contains
    order_items||--{ products : Contains
    users {
        int    id        PK
        string name
        string email     UK
        string password
    }    
    orders {
        int    id                PK
        int    user_id           FK
        int    total_price
    }
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
