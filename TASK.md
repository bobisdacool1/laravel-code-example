Develop functionality on **Laravel** with **PostgreSQL** database.

Implement the output of a list of products, viewing the product card, adding, editing and deleting a product.

**Create table** "products".

| id      | uint, autoincrement        |                            |
| :---:   | :----:                     | :---:                      |
| article | varchar(255), unique index |                            |
| name    | varchar(255)               | And more                   |
| status  | varchar(255)               |"available" / "unavailable" |
| data    | json                       | several different fields <br> (for example, Color and Size) <br> at your discretion |
|         | timestamps                 |                            |
|         |soft deletes                |                            |

**Create an Eloquent model "Product"** associated with the "products" table. In the model, implement **Local Scope** to
get only available products (STATUS = “available”).

**Make validation** create and edit:
NAME is a required field, at least 10 characters long; ARTICLE is a required field, only Latin characters and numbers,
unique in the table.

**Create an administrator role** that can edit the article, other users can edit the article not available. The user's
role can be found in the settings (config('products.role')).  
**Implement validation and rights checking** (controller, model, separate service - at your discretion).

_Additionally_:
When creating a product, send notifications to the configured Email (config('products.email')) (
Notification) that the product has been created. The notification must be sent via a Job in a Queue.

Package the finished application in docker.

Implement the application interface according to the layout (see link):  
https://www.figma.com/proto/hQ0IZkC4ULeX7vwiEXN2q3/PIN-ERP-%D0%A2%D0%97-03.02.2022?node-id=3%3A218&scaling=min-zoom&page-id=0%3A1&starting-point-node-id=3%3A218

Put the finished application on GitHub / Bitbucket
