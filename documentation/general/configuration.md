# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.encrypted',
        'config' => [
            'show_text'   => false,
            'auto_decode' => false
        ]
    ]
];
```

### `show_text`

Display plain text in the input by default. This option can be toggled on and off during input as well. The default value is `false`.

### `auto_decode`

Automatically decode the value when retrieving from the database. The default value is `false`.
