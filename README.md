# api_notification

```
Config your .env file :
### config .env file

Launch updates :
### composer update
>Install composer : [ https://getcomposer.org/ ]

Make a migration :
### php bin/console make:migration

Load the fixtures :
### php bin/console doctrine:fixtures:load

Launch the phpunit test :
### php bin/phpunit 
```

```
When your server is launch and your db is created. Please to try to get this url and select a valid userId existing in your DB :

**../api/users/userId/notifications**

```


### Example of json response :

```json
[
    {
        "description": "test_1",
        "contentRelated": {
            "track": {
                "title": "Yes Baby Yes v",
                "img": "https://lh3.googleusercontent.com/proxy/wS7DONUPOMchMnJqo0Zx32A2v1G01vNyV5kTYJya73svD-c9M4QD4vmlmmGasAd1lIVYzKS0kGCzeIfGTcPAvXN6TFoKPA",
                "author": "Mo Horizons"
            }
        },
        "contentType": "information",
        "authorName": "USER_1",
        "authorAvatar": "https://i.skyrock.net/8992/90898992/pics/3216399797_1_2_AbWeQIrc.jpg",
        "elapsedTime": "2020-07-05T01:58:29+00:00",
        "validityTime": 1,
        "view": true
    },
    {
        "description": "USER_1a sorti newness",
        "contentRelated": {
            "album": {
                "title": "We go home together",
                "img": "https://static1.millenium.org/articles/6/33/65/76/@/1049538-vegeta-ssj-leak-article_m-1.jpg",
                "author": "Mo Horizons"
            }
        },
        "contentType": "newness",
        "authorName": "USER_1",
        "authorAvatar": "https://i.skyrock.net/8992/90898992/pics/3216399797_1_2_AbWeQIrc.jpg",
        "elapsedTime": "2020-07-05T01:58:29+00:00",
        "validityTime": 1,
        "view": true
    },
    {
        "description": "USER_1 recommande : recommendation",
        "contentRelated": {
            "playlist": {
                "title": "Urban Hits",
                "img": "https://www.mediacritik.com/wp-content/uploads/2019/04/luffy-wanted-poster.jpeg",
                "author": "Digster France"
            }
        },
        "contentType": "recommendation",
        "authorName": "USER_1",
        "authorAvatar": "https://i.skyrock.net/8992/90898992/pics/3216399797_1_2_AbWeQIrc.jpg",
        "elapsedTime": "2020-07-05T01:58:29+00:00",
        "validityTime": 1,
        "view": true
    },
    {
        "description": "USER_1 a partagé : shared avec vous.",
        "contentRelated": {
            "podcast": {
                "title": "La drole d'humeur de pierre-emmanuel",
                "img": "https://vignette.wikia.nocookie.net/onepiece/images/1/1c/Usopp_Drum.png/revision/latest/scale-to-width-down/340?cb=20160424133817&path-prefix=fr"
            }
        },
        "contentType": "shared",
        "authorName": "USER_1",
        "authorAvatar": "https://i.skyrock.net/8992/90898992/pics/3216399797_1_2_AbWeQIrc.jpg",
        "elapsedTime": "2020-07-05T01:58:29+00:00",
        "validityTime": 1,
        "view": true
    }
]
```

```
    ### Design Pattern : 
    
    - Strategy :
        I choose this pattern for his flexibility, to change the notification format depending of his type.
        We could have a recommandation, a shared or other thing notification with an independant logic.
        Moreover, this pattern respect the "S" of Solid principle (Single responsability principle).
                
        set up :
            An interfance where we implement a method called 'format()' with our notification type in argument.
            This interface is implemented in our central strategy and our different child strategy type (shared, recommandation, newess, information).
        
    - Factory : 
        I choose to use this pattern for to create my Content Model.
    
```

```
    ### Compiler pass : 
    
```


