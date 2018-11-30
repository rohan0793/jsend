# jsend

This is a simple composer package to issue JSend responses from a Laravel 5 application.

To read about JSend, go through this [guide](https://labs.omniti.com/labs/jsend)

### Installation

Require the package through composer:

`composer require rohan0793/jsend`

Add the service provider to the provider's array in your app.php config file:

`RC\JSend\ResponseMacroServiceProvider::class,`

### Basic Example

```php
return response()->jsend(
    $data = ['foo', 'bar'],
    $presenter = null,
    $status = 'success',
    $message = 'This is a JSend Response',
    $code = 200
);
```

Output:

```json
{
  "data": [
    "foo",
    "bar"
  ],
  "status": "success",
  "message": "This is a JSend Response"
}
```



### Resource Fetched Example

```php
return response()->resource_fetched(
    $data = ['foo', 'bar']
);
```

Output:

```json
{
    "status": "success",
    "message": "Resource Fetched Successfully",
    "data": [
        "foo",
        "bar"
    ]
}
```

The resource fetched macro is defined for ease and readability. It is calling the underlying JSend macro itself. The message, status and code will be filled automatically as `success`, `Resource Fetched Successfully`, and `200` respectively. This can useful in removing duplicated code when you have many routes for fetching different resources.



### Resource Updated Example

```php
return response()->resource_updated(
	$data = ['foo', 'bar']
);
```



```json
{
    "status": "success",
    "message": "Resource Updated Successfully",
    "data": [
        "foo",
        "bar"
    ]
}
```



Similar to `resource_fetched` we have `resource updated`. The message, status and code will be filled automatically as `success`, `Resource Updated Successfully`, and `200` respectively.



### Resource Created Example

```php
return response()->resource_updated(
	$data = ['foo', 'bar']
);
```



```json
{
    "status": "success",
    "message": "Resource Created Successfully",
    "data": [
        "foo",
        "bar"
    ]
}
```



Similar to `resource_fetched` we have `resource_created`. The message, status and code will be filled automatically as `success`, `Resource Created Successfully`, and `201` respectively.



### Resource Deleted Example

```php
return response()->resource_deleted(
	$data = ['foo', 'bar']
);
```



The `resource_deleted` is a little special. It will output code `204 No Content`. According to HTTP code specifications, it will have no output at all.





### JSend Error Example

```php
return response()->jsend_error(
    new \Exception('Some Exception'),
    $message = null,
    $code = null
);
```



```json
{
    "status": "error",
    "message": "Some Exception",
    "data": null
}
```



Finally, we have the `jsend_error` macro which is basically used to respond when there has been an error. It takes an exception as the first argument. It will output code and message from the exception itself. If  custom message and code is passed, they will be output instead.





## Presenter

Other than the basic response macros with messages and codes, this package also supports presenters. You can build your own presenters. The package will automatically call the `present()` method on the presenter passed. The recommended approach is using [Fractal Package from The PHP League](https://fractal.thephpleague.com/). This package provides very powerful data transforming and presenting capabilities. The documentation is extensive and easy to read and understand.