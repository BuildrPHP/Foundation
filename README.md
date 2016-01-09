[![Build Status](http://ci.zolli.hu/buildStatus/icon?job=Foundation)](http://ci.zolli.hu/job/Foundation/)
[![Code Coverage](https://scrutinizer-ci.com/g/BuildrPHP/Foundation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BuildrPHP/Foundation/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BuildrPHP/Foundation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BuildrPHP/Foundation/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/567d97c5a7c90e00350004db/badge.svg?style=flat)](https://www.versioneye.com/user/projects/567d97c5a7c90e00350004db)
[![PHP7 Status](https://img.shields.io/badge/PHP7-tested-8892BF.svg)](https://github.com/BuildrPHP/Foundation)

# BuildR - Foundation
### Highly experimental PHP framework

## Installation

### With Composer

```
composer require buildr/foundation
```

## Exceptions

This package provide a base `Exception` that used to be a base class for other exceptions inside this project.
The `BuildR\Foundation\Exception\Exception` also provide a static factory method, that
allows to easily create exceptions with beautifully formatted message.

In example:

```php
<?php namespace Test\Package;

use BuildR\Foundation\Exception\Exception;

const MESSAGE_NOT_FOUND = "The element (%s) is not found in position: %s!";

class MyCustomException extends Exception {

}
```
#### The `createByFormateMethod`

Method signature:
```php
function createByFormat(string $message, array $format, int $code, \Exception $previous);
```

this method allows you to create exceptions with formatted messages. To populate message this
function use the `sprintf()` function. In the above example is used like this:

```php
    ...
    if($result === FALSE) {
        throw MyCustomException::createByFormat(MyCustomException::MESSAGE_NOT_FOUND, ['element', 5]);
    }
    ...
```

## ToDo

 - [X] Exceptions

## Contribution

For contribution please refer our [Contribution Guide](https://raw.githubusercontent.com/Zolli/BuildR/master/LICENSE.md) Repository.

## License

BuildR and its components are licensed under GPL v3 ([Read](https://raw.githubusercontent.com/Zolli/BuildR/master/LICENSE.md))
[![License image](http://gplv3.fsf.org/gplv3-88x31.png)]()

## Thanks

Huge thanks all the package and tool author.
