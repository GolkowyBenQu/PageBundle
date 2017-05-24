# ApsensaPageBundle #

Bundle to manage static pages easy. It is designed using simple CQRS, DDD and Repository Pattern.

## How to install? ##

You have to add bundle to requirements in package.json
```json
    "require": {
        "apsensa/page-bundle": "dev-master"
    },
```

Next, you have to defined custom repositories
```json
    "repositories": [
        {
            "url": "https://explodus@bitbucket.org/explodus/pagebundle.git",
            "type": "git"
        }
    ]
```

## Configuration ##

In /app/config/routing.yml add bundle routing at the end of file beacuse of Symfony routing loading order:

```yaml
page_routing:
    resource: '@ApsensaPageBundle/Resources/config/routing.yml'
```

Import services to app services: /app/config/services.yml 

```yaml
imports:
    - { resource: '@ApsensaPageBundle/Resources/config/services.yml' }
```

## Use cases ##

There is a few services to get pages, or create new one. If would like to do it in controller, do it like this:

### Query ###

* Get all pages count

```php
/** @var DoctrinePageQuery $pageQuery */
$pageQuery = $this->get('pages_query');
 
/** @var int $count */
$count = $pageQuery->count();
```

* Get page view object by id

```php
/** @var DoctrinePageQuery $pageQuery */
$pageQuery = $this->get('pages_query');
 
/** @var PageView $page */
$page = $pageQuery->getById($id);
```

* Get all pages as view objects

```php
/** @var DoctrinePageQuery $pageQuery */
$pageQuery = $this->get('pages_query');
 
/** @var PageView $pages */
$pages = $pageQuery->getAll();
```

* Get page by slug as view object

```php
/** @var DoctrinePageQuery $pageQuery */
$pageQuery = $this->get('pages_query');
 
/** @var PageView $page */
$page = $pageQuery->getBySlug($slug);
```

### Command ###

* Create new page

```php
$newPageCommand = new CreateNewPage('mySlug', 'myTitle', 'myContent');
 
/** @var CreateNewPageHandler $newPageHandler */
$newPageHandler = $this->get('new_page_handler');
$newPageHandler->handle($newPageCommand);
 
/** @var PagesRepository $pagesRepository */
$pagesRepository = $this->get('pages_repository');
$pagesRepository->commit();
```