# Laravel & VueJs by Hizam

## Murai with VueJs

### Installation

Clone this repo and run `composer install`. 

Setup your database in `.env` file and `php artisan migrate --seed`. 

Then you're ready to run `php artisan clear:serve` - a simple command to clear all caches then serve the application.

#### Gulp

Make sure you have install `gulp-cli`. You may follow the installation guide here at [Laravel's Compiling Asset](https://laravel.com/docs/5.3/elixir#installation)

### VueJs Introduction

Remove the following in `resources/assets/js/app.js`

```javascript
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
```

Then in terminal run `gulp` to recompile the `app.js`.

The reason we remove above lines, we don't want our application to load Vue on application main layout - see `resources/views/layouts/app.blade.php`, there's a `<div id="app">...`. We only need Vue to be load when it's required. 

### VueJs Initialize

Following are the basic of VueJs application

```html
<!-- Initialize Vue Application -->
<script type="text/javascript">
	new Vue({
		el : '#application-id'
	});
</script>
```

### VueJs Components

Following are the main skeleton of our VueJs Component. You can use it in `resources/views/home.blade.php` for test purpose.

Open up `layouts/app.blade.php` and add `@yield('scripts')` after the `app.js`.

Then we going to use `@section('scripts')` for our application.

This to ensure VueJs loaded before we declare our VueJs application and components.

```html
<script type="text/x-template" id="message-component">
    <p> @{{ message }} </p>
</script>
```

```html
<script type="text/javascript">
    var messageComponent = Vue.component('message-component',{
        template : '#message-component',
        props : {
            message : ''
        },
        methods : {
            say : function() {
                alert(this.message);
            }
        }
    });
</script>
```

**Usage**

Initialize VueJs Application and register component with VueJs Application

```html
<script type="text/javascript">
    new Vue({
        el : '#application-id',
        components : {
            'message-component' : messageComponent
        }
    })
</script>
```

Replace the following:

```html
<div class="panel-body">
	You are logged in!
</div>
```

with the following:

```html
<div class="panel-body" id="application-id">
    <message-component message="You are logged in!"></message-component>
</div>
```

Now you should have same result as using normal Blade template. This example is just an example of the basic structure and steps of implementation of VueJs in Laravel.
