# LINE Laravel Notifications Channel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/line.svg?style=flat-square)](https://packagist.org/packages/leochien/laravel-notification-channel-line)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/leochien/laravel-notification-channel-line.svg?style=flat-square)](https://packagist.org/packages/leochien/laravel-notification-channel-line)

## Introduction

This package makes it easy to send notifications using [LINE](https://line.me/) with Laravel 5.6+. 

## Contents

- [LINE Laravel Notifications Channel](#line-laravel-notifications-channel)
  - [Introduction](#introduction)
  - [Contents](#contents)
  - [Installation](#installation)
    - [Setting up the LINE service](#setting-up-the-line-service)
  - [Usage](#usage)
    - [Available methods](#available-methods)
  - [Security](#security)
  - [Contributing](#contributing)
  - [Credits](#credits)
  - [License](#license)

## Installation

You can install the package via composer:

```shell script
$ composer require leochien/laravel-notification-channel-line
```

### Setting up the LINE service

In order to send message to LINE channels, you need to obtain [Messaging API overview](https://developers.line.biz/en/docs/messaging-api/overview/).

Add your LINE Message API Token to your `config/services.php`:

```php
// config/services.php
...
'line_message_api' => [
    'token' => env('LINE_MESSAGE_TOKEN', 'YOUR MESSAGE TOKEN HERE'),
],
...
```

## Usage

You can use the channel in your `via()` method inside the notification:

```php
use Illuminate\Notifications\Notification;
use LeoChien\LaravelNotificationChannelLine\LineMessage;
use LeoChien\LaravelNotificationChannelLine\LineWebhookChannel;

class TaskCompleted extends Notification
{
    public function via($notifiable): array
    {
        return [
            'line',
        ];
    }

    public function toLine($notifiable): LineMessage
    {
        return LineMessage::create('Test message')
            ->to('line_user_id')
            ->from('message_api_token'); // optional if set in config
    }
}
```

### Available methods

`from()`: Sets the sender's access token.

`to()`: Specifies the line user id to send the notification to.

`content()`: Sets a content of the notification message. Only support plain text for now.

## Security

If you discover any security related issues, please email s950329@hotmail.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Leo Chien](https://github.com/s950329)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
