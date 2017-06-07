---
layout: default
---
### API Documentation
----

Returns json data regarding all groups present in the application.
## Warning!
__Your requests are limited to 50 per minute!__
Otherwise, you will get a "Too Many Requests" message.

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
