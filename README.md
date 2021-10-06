# HuntBazaar


Default Seed for admin access
- id : admin
- pass : admin

Installation
```bash
php artisan migrate:refresh --seed
```

### Create a website for registration of an event named HUNTBAZAAR which will be held at 12 December 2021 with following criterias:

- ** Registration can only be accessed by invitation. Registration only can be submited by person who have the link to the registration website. ✅ **
- ** Registration link only can be send by email that inputted by admin. Link will be generated when the invitation sent. ✅ **
- ** These are inputs format that must be filled in registartion form: **
- Email - autopopulate according to email that inputted by admin. ✅**
- Name✅
- DoB✅
- Gender✅
- Favorit Designer (List can be accessed in this link: ✅  https://www.huntstreet.com/designer (user can choose more than 1) 
- ** Every invitation only can be submited once ✅ **
- ** Time limit of the registration is 1 month from the technical test received. ✅ **
- ** Show countdown timer remained time before the registration closed. ✅ **
- ** When form submitted, generate random registration code. ✅ **
- ** After registered, when invitation link registration openned again show registartion code.✅ **
- ** 1 Hour after submitted the form, automatically send an email for thank you to the registered email. ✅** 
- ** Admin can see list of invitation that have been sent with the status of the invitation. Status must be saved in the invitation list wih foreign key. ✅ **

### Technical Criterias

- ** No specification for the interface design but will be count for scores. ✅**
- ** Email doesn't have to be designed. ✅**
- ** Create the test using PHP with Laravel Framework. List of must have features:**
- Migration✅
- Seeder✅
- Eloquent✅
- Blade✅
- Middleware✅
- FormRequest✅
- Queue✅
- ** Countdown timer must be writen by your own code in jQuery and VueJs without using any built library. ✅**
- ** Submit the test using BitBucket Repository. (Have a clear commit history while doing the test will be a plus score).✅**

### Screen Shoot
https://imgur.com/a/wzXWX7O

![alt text](https://i.imgur.com/XUvcx1e.jpg)
![alt text](https://i.imgur.com/2v7X1Cq.jpg)
![alt text](https://i.imgur.com/E6kE3w7.jpg)
![alt text](https://i.imgur.com/7hXckQ0.jpg)
![alt text](https://i.imgur.com/H6cRaw2.jpg)
