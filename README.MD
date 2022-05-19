# SQRS Library for Symfony

## 1. Installation:
```bash
composer require dimkinthepro/sqrs
```

### update "config/services.yaml"
```yaml
services:
    #...
    _instanceof:
      Dimkinthepro\SQRS\Command\CommandHandlerInterface:
        tags:
          - { name: messenger.message_handler, bus: command.bus }

      Dimkinthepro\SQRS\Query\QueryHandlerInterface:
        tags:
          - { name: messenger.message_handler, bus: query.bus }
    #...
```

### update "config/packages/messenger.yaml":

```yaml
framework:
    messenger:
        default_bus: query.bus
        buses:
            command.bus:
                middleware:
                    - doctrine_transaction
            query.bus:
#...
```

## 2. Usage example:
