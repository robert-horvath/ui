[![Build Status](https://travis-ci.org/robert-horvath/ui.svg?branch=master)](https://travis-ci.org/robert-horvath/ui)
[![Code Coverage](https://codecov.io/gh/robert-horvath/ui/branch/master/graph/badge.svg)](https://codecov.io/gh/robert-horvath/ui)
[![Latest Stable Version](https://img.shields.io/packagist/v/robert/ui.svg)](https://packagist.org/packages/robert/ui)

# UI
The user input validation is the outer defensive perimeter for your web application. It is intended to prevent the entry of unsafe data into your system. The **User Interface** module validates untrusted user data and raises an exception whenerver malicious data is received.

The module supports built in PHP primitive types (e.g.: [boolean](http://php.net/manual/en/language.types.boolean.php), [integer](http://php.net/manual/en/language.types.integer.php), [string](http://php.net/manual/en/language.types.string.php)) as well as custom defined types (e.g.: Email, Password).

If the validation fails, then an exception of type ```\RHo\UIException\Exception``` is raised with special error code describing the reason of failure. 

Use ```::mandatory``` class method to validate mandatory user input and ```::optional``` class method to validate optional user input.

### 1. Example usage with valid data
```php
namespace RHo\UI;

try {
    $bool = Boolean::optional('t');
    $str = StrAny::mandatory('example', 1, 10, '/[a-z]+/');
    $byte = UInt8::mandatory(255);
    $word = UInt16::optional(NULL);
    $dt = DateTime::mandatory('2000-01-01 12:30:50');
    var_dump($bool, $str, $byte, $word, $dt);
} catch (\RHo\UIException\Exception $e) {
    // Validation error.
    // Check $e->code() for more details.
}
```
#### 1.1. The above example outputs
```
bool(true)
string(7) "example"
int(255)
NULL
class DateTime#2 (3) {
  public $date =>
  string(26) "2000-01-01 12:30:50.000000"
  public $timezone_type =>
  int(3)
  public $timezone =>
  string(13) "Europe/Berlin"
}
```
### 2. Example usage with invalid data
```php
namespace RHo\UI;

try {
    $int = Int32::mandatory(5.7);
} catch (\RHo\UIException\Exception $e) {
    // Validation error.
    var_dump($e->getMessage(), $e->getCode());
}
```
#### 2.1. The above example outputs
```
string(31) "<int|string> data type required"
int(101)
```
### 3. Example usage with custom data type
```php
namespace RHo\UI;

try {
    $auth = Authorization::mandatory('Bearer XauPV7DpJvVPJD7RW4eaLmGLa4cPQxBgwEMtuGuuX8QkNjSuHd9z82cpTdTDsGFM~Thu.04-Jan-2018_10/15/45.610572_GMT');
    var_dump($auth);
} catch (\RHo\UIException\Exception $e) {
    // Validation error.
    var_dump($e->getMessage(), $e->getCode());
}
```
#### 3.1. The above example outputs
```php
class stdClass#5 (2) {
  public $expiresAt =>
  class DateTime#6 (3) {
    public $date =>
    string(26) "2018-01-04 10:15:45.610572"
    public $timezone_type =>
    int(2)
    public $timezone =>
    string(3) "GMT"
  }
  public $token =>
  string(64) "XauPV7DpJvVPJD7RW4eaLmGLa4cPQxBgwEMtuGuuX8QkNjSuHd9z82cpTdTDsGFM"
}
```