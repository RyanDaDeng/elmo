## Tech
1. Laravel 5.8
2. Vuejs
3. Vue-bootstrap


## Folder structure

#### backend
1. app/modules

#### frontend
1. resources/js

#### Solution
1. Back-end uses modular basis strategy (which is similar to package development)
2. Front-end uses Vuejs as Laravel natively support it, so it comes in handy.
3. Bootstrap-vue is used for Table controller, however, its a bit overkill after I finish the project. The bootstrap is already enough.
4. Front-end splits widgets in different component-based file, so they can be applied from different type in JSON schema without touching core code. (This follows Strategy/component concept.)
5. The data is doing two-way and props binding based on component communication.

## Installation
1. Create your .env file
2. run composer install and php artisan key:generate
3. config your database, and run php artisan migrate
4. run php artisan serve, go to your host, you should see the project. (the project has already contained compiled js file.)

If you want to compile locally, you could do the following:
1. run npm install
2. Go to webpack.mix.js:
````
mix.browserSync('http://elmo.test/'); change the url to your local host
````
3. npm run watch (this might require you to run twice, after that, you should see a pop-up window, if you can't, just go to your host)


## Guide
1. Go to route: http://{{Your.Host}}/app, register an account 
2. You can create, edit, view dynamic form.
3. There is a default json schema defined when you click "create a dynamic form"


## TODO
Due to time limit, the following hasn't been finished:

1. File upload front-end structure has not been fully finished, however, the backend applies factory/template design pattern to handle different input type (Modules/DynamicFormGenerator/Services)
2. Tests not started, proposed test would be using Laravel's phpunit by calling API to compare json data
3. Front-end router is controlled by backend which is located at Modules/UI, however, its better to do it in Front end by using Vue-Router which might increase complexity and time consuming, so I didn't implement it.
4. File input backend storage structure hasn't been finished, the proposed solution would create user_id/form_id/file_input_field_name format as folder structure
5. I am not sure what "menu" is.

## Resources I used:
1. My own Boilerplate https://github.com/RyanDaDeng/laravel-seo-meta-management
2. Some ideas from API module generator https://github.com/RyanDaDeng/laravel-api-module-generator
3. Initial modular idea from: https://github.com/nWidart/laravel-modules
4. Bootstrap-vue: https://bootstrap-vue.js.org/


## Reflection
1. This assessment seems to have more weight on front-end as it requires a form builder and save form in DB, so it is not a data-driven dynamic form. I have previously implemented data-driven dynamic form which is different approach to the assessment requirement.
2. The assessment can be extended in many ways, I am not entirely certain which part(front-end/back-end) I should mainly focus on, so my overall strategy is to finish a low-fidelity prototype to primarily have function to work.
3. The UI builder which is using JSON as strategy as its much simple for me to implement, it can be fancy UI e.g. Survey Monkey style or Google form style.
4. If the requirement is SPA (single page application) which would increase a lot complexity.
5. vuex state management is not used here as I think $emit is enough to handle the assessment.
6. The front-end can have api.js component to centralise all APIs instead of using axios calling endpoint in different places.

## Overall
The difficulty of ssessment is average level. I can think about so many details to improve the solution e.g. json schema validation on both frontend and backend, Form builder with fancy control UI, branching lgoic etc. 

It is a good exercise alough I didn't finish all the requirements.




