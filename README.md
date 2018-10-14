## Symfony commands
- start server: php bin/console server:run


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

type ProductType {
  id: Int
  name: String
}


query EnabledProducts {
  products {
    edges {
      node {
        id,
        name,
        description,
        price,
        enabled,
        type: ProductType
      }
    }
  }
}