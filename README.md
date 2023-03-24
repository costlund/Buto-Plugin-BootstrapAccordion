# Buto-Plugin-BootstrapAccordion

Bootstrap (version 5) According.

## Widget

```
type: widget
data:
  plugin: bootstrap/accordion
  method: accordion
  data:
```
### ID
(optional).
```
    id: my_accordion
```
### Always open
Keep open reardless of others (optional).
```
    always_open: true
```
### Item
```
    item:
      -
```
### Header
```
        header: Item 1
```
### Body
As text.
```
        body: Text for item 1.
```
As element.
```
        body:
          -
            type: div
            attribute: 
              class: alert alert-success
            innerHTML: Success
```

### Show
If show as start (optional).
```
        show: true
```

### Example
```
type: widget
data:
  plugin: bootstrap/accordion
  method: accordion
  data:
    id: my_accordion
    always_open: true
    item:
      -
        header: Item 1
        body: Text for item 1.
        show: false
      -
        header: Item 2
        body:
          -
            type: div
            attribute: 
              class: alert alert-success
            innerHTML: Success
        show: true
```
