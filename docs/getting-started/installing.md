---
title: Installation
description: Installing Aware for Laravel in your project
head:
- - meta
  - name: keywords
    content: laravel, eloquent, auditing, model, tracking, aware, laravel aware installation
---

# Installation

### Require package

```bash
composer require charlgottschalk/laravel-aware
```

### Install Aware

```bash
php artisan aware:install
```

> [!IMPORTANT]
> If your models use `UUID` primary keys, please follow the instructions [here](/setup/uuid-models) first.

### Migrate

```bash
php artisan migrate
```

### Track

You're ready to go and tracking will happen automatically.
