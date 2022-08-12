# error-reporter


## Install

 
``` composer require upkareno/error-reporter ```



## Configuration
##### Add this provider to your config file

```php artisan vendor:publish --provider="Upkareno\ErrorReporter\Providers\ReporterProvider" ```



## Then run
``` php artisan migrate ```

## Create a new reporter  

```php artisan make:reporter ```

##### enter your name and email address to report bugs to email address


## Confing Reporter 
##### open ``` app/Exeptions/Handler.php ```
###### add  the following lines : 
```   public function register() ```
```    {  ```
```        $this->reportable(function (Throwable $e) { ```
```              $reporter = new \Upkareno\ErrorReporter\Reporter(); ```
```              $reporter->report($e); ```
```        }); ```
```   } ```
