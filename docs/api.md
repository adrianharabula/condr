---
layout: default
---
### API Documentation
----

Returns json data regarding all groups present in the application.
## Warning!
__Your requests are limited to 50 per minute!__
<<<<<<< Updated upstream
Otherwise, you will get a "Too Many Requests" message.
=======
Otherwise, you will get a "Too Many Attempts" message.
>>>>>>> Stashed changes

* **URL**

  /api/groups

* **Method:**

  `GET`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
    ```json
[
{
"id": 1,
"name": "FII@Iasi",
"description": "This is where your sleepless nights begin!"
},
{
"id": 2,
"name": "Food Lovers",
"description": "Life has never tasted so good! Join us for the best recipes!"
},
{
"id": 3,
"name": "PSGBD",
"description": "Never ask a DBA to move furniture, they are known for dropping tables. :)"
},
{
"id": 4,
"name": "Web Technologies",
"description": "I know I am going to heaven, cause I am already in hell! *web dev life*"
},
{
"id": 5,
"name": "Software Engeneering",
"description": "We will teach you how to work in a company!"
},
{
"id": 6,
"name": "Cat Lovers",
"description": "Meow all the time"
},
{
"id": 7,
"name": "Science",
"description": "Come on, it is not like it is rocket science, they tell me.."
},
{
"id": 8,
"name": "Education",
"description": "Your future starts today!"
},
{
"id": 9,
"name": "Highschool",
"description": "Well, we still got time to do stupid things..."
},
{
"id": 10,
"name": "Clothes Lovers",
"description": "Never stop buying stuff!"
},
{
"id": 11,
"name": "Fashion",
"description": "Life is not perfect, but your outfit should be!"
},
{
"id": 12,
"name": "Daily Entertainment",
"description": "We will make you cry from laughing!"
},
{
"id": 13,
"name": "Story of my life",
"description": "*Dont even need a description*"
},
{
"id": 14,
"name": "IFL Science",
"description": "Do not be an ignorant!"
},
{
"id": 15,
"name": "Football Lovers",
"description": "Gooooaaaaal!"
},
{
"id": 16,
"name": "PC Garage",
"description": "We are the best!"
}
]]
```

* **Error Response:**

  * **Code:** 404  
    **Content:**
    ```json
    {
      "data": {
      "message": "No groups found",
      "status_code": "404"
        }
    }
    ```

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "https://condr.me/api/groups",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
<<<<<<< Updated upstream
=======


  * **URL**

    /api/categories

  * **Method:**

    `GET`

  * **Data Params**

    None

  * **Success Response:**

    * **Code:** 200 <br />
      **Content:**
      ```json
      [
    {
    "id": 1,
    "name": "Electronics",
    "description": "Electronics can cover a large area of products that work based on electric devices, cables, circuits or others. Usually describes the house keeping or personal use devices that an user may need.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 2,
    "name": "Clothes",
    "description": "Clothes describe a category that includes jackets, sweaters, t-shirts, pants, skirts, hats, accesories and other clothing items.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 3,
    "name": "Footwear",
    "description": "Footwear category includes all items that someone may walk into, like heeled shoes, platforms, casual shoes, sport shoes and others.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 4,
    "name": "Food",
    "description": "Food describes a very large area consisting of fruits, vegetables, meat, lactates, specific recipes and others. Here you may find the best recipes for your regarding your allergies and tastes.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 5,
    "name": "Games",
    "description": "Games category includes games, recreational activities and relaxation technique in order to help you release the stress and gain a new fresh attitude.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 6,
    "name": "Services",
    "description": "Services describe a large area of interests that a person may need or want, like internet, TV cable, mobile services, electricity, water and others.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 7,
    "name": "Education",
    "description": "Education category consists of products that a person may need for educational purposes,like books, records, maps etc, but also includes services that an university can provide, like scholarships, training programs and other.",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 8,
    "name": "Entertainment",
    "description": "Entertainment category consists of sports and shows  that anyone should watch after a hard day of work! Just relax and enjoy!",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 9,
    "name": "Other",
    "description": "Here you find everything you could not find in the other categories!",
    "created_at": null,
    "updated_at": null
    }
    ]
  ```

  * **Error Response:**

    * **Code:** 404  
      **Content:**
      ```json
      {
        "data": {
        "message": "No categories found",
        "status_code": "404"
          }
      }
      ```

  * **Sample Call:**

    ```javascript
      $.ajax({
        url: "https://condr.me/api/categories",
        dataType: "json",
        type : "GET",
        success : function(r) {
          console.log(r);
        }
      });
    ```
>>>>>>> Stashed changes
