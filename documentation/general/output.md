# Output

### Decrypted

The decrypted method returns the decrypted value.

```
// Twig usage
{{ entry.example.decrypted }}

// API Usage
$entry->example->decrypted;
```

### Hash

The hash method returns a secure hash of the **decrypted** value.

```
// Twig usage
{{ entry.example.hash }}

// API Usage
$entry->example->hash;
```