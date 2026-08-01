# Azores AI Chatbot - Modular Package

This directory contains the self-contained Azores AI Chatbot module for inclusion across your website pages.

## Directory Structure
- `chatbot-widget.php`: HTML, CSS styling, and JavaScript logic for the floating chatbot UI.
- `../api-chat.php`: PHP endpoint that handles intent matching and knowledge retrieval.
- `../data/business_truths.json`: Master company knowledge base and truth repository.

## Quick Integration Guide

To include the chatbot in any PHP page in `F:\Azores`, simply add this line of code before the closing `</body>` tag (or inside your `footer.php`):

```php
<?php include __DIR__ . '/chatbot/chatbot-widget.php'; ?>
```

Or if importing from a subfolder:
```php
<?php include $_SERVER['DOCUMENT_ROOT'] . '/chatbot/chatbot-widget.php'; ?>
```
