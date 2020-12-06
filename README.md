# MaherTW - Easy Twitter API!

A simple api for getting data from twitter.
Made with Lumen framework.

### You should have a [Twitter Developer](https://developer.twitter.com/en) Account

### Before Start

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Choose a random String and replace them to __APP_KEY__ in .env
- Replace __Twitter_Api_Key__ in .env
- Replace __Twitter_Secret_Key__ in .env
- Replace __Twitter_Bearer_Token__ in .env
- Replace __Twitter_ACCESS_TOKEN__ in .env
- Replace __TWITTER_ACCESS_TOKEN_SECRET__ in .env
- Run __php -S 127.0.0.1:8000 -t public__

---

### How To Use?  

| Route | Method | Value | 
|--|--|--|
|/api/v1/home-timeline | Get | home-timeline.json |
|/api/v2/tweet/:id|Get|Single Tweet (id + text)|
|/api/v2/tweets/:ids|Get|Multiple Tweet (id + text + author info)|

---

This list will be updated! :)
