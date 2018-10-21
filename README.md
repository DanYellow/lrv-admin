## Symfony commands
- start server: php bin/console server:run
- encode password: php bin/console security:encode-password
- clear cache: php bin/console cache:clear

{
  products {
    edges {
      node {
        price,
        name,
        description
      }
    }
  }
}

query EnabledProducts {
  products {
    edges {
      node {
        id,
        name,
        description,
        price,
        enabled
      }
    }
  }
}

 {
  products {
    edges {
      node {
        id,
        name,
        description,
        price,
        enabled,
        type {
          id,
          name,
          slug,
          description
        }
      }
    }
  }
}