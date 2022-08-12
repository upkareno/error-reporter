# error-reporter


## Install

 
``` composer require upkareno/error-reporter ```



## Configuration
##### run this artisan command to publish provider

```php artisan vendor:publish --provider="Upkareno\ErrorReporter\Providers\ReporterProvider" ```



## Then run
``` php artisan migrate ```

## Create a new reporter  

```php artisan make:reporter ```

##### enter your name and email address to report bugs to email address


## Confing Reporter 
##### open ``` app/Exeptions/Handler.php ```
###### add  the following lines : 
```  
public function register()  
    {   
        $this->reportable(function (Throwable $e) {  
              $reporter = new \Upkareno\ErrorReporter\Reporter();  
              $reporter->report($e); 
        });  
   } 
   
```

## Get Error Reports 
#### use this JSON response to view in admin dashboard or developer page 
* http://127.0.0.1:8000/error-reports-api/todays
* http://127.0.0.1:8000/error-reports-api/last-week
* http://127.0.0.1:8000/error-reports-api/last-month
* http://127.0.0.1:8000/error-reports-api/last-year
* http://127.0.0.1:8000/error-reports-api/all
