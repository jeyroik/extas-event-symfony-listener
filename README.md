# extas-event-symfony-listener

Symfony event listener for using extas stages.

# Usage

```php
use Symfony\Component\EventDispatcher\EventDispatcher;
use extas\components\events\SymfonyEventContainer;
use Symfony\Component\EventDispatcher\Event;

$dispatcher = new EventDispatcher();
SymfonyEventContainer::loadStages($dispatcher);

/**
 * You can use extas stages as event names 
 */
$event = new Event();
$dispatcher->dispatch($event, 'some.event');
```
