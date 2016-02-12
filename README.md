# jsend

This is a simple composer package to issue JSend responses from a Laravel 5 application.

To read about JSend, go through this [guide](https://labs.omniti.com/labs/jsend)

# Installation

Require the package through composer:

`composer require rohan0793/jsend`

Add the service provider to the provider's array in your app.php config file:

`RC\JSend\ResponseMacroServiceProvider::class,`

# Example Route

```
return response()->jsend(
		$data = ['foo', 'bar'],
		$presenter = null,
		$status = 'success',
		$message = 'This is a Jsend Response',
		$code = 200
	);
```

Output:

```
{
  "data": [
    "foo",
    "bar"
  ],
  "status": "success",
  "message": "This is a Jsend Response"
}
```

Note: If the presenter is present, it will simply call a `present()` method on it behind the scenes like so:

`$presenter->present($data);`

Currently developing another package which will help with laravel 5 presenters.
